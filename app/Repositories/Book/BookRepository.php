<?php

namespace App\Repositories\Book;

use Auth;
use App\Models\Book;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Input;
use Session;
use DB;
use Exception;

class BookRepository extends BaseRepository implements BookInterface
{
    /**
    * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Book $book)
    {
        $this->model = $book;
    }

    /**
    * function getProduct.
     *
     * @return imageName
     */
    public function getAllBook()
    {
        return $this->model->with('categories')->orderBy('id', 'desc')->paginate(config('setting.paginate'));
    }

    public function getBookById($id)
    {
        return $this->model->where('id', $id)->with(['reviews' => function($query) {
            $query->orderBy('id', 'desc')->take(config('setting.counter_review'));
        }])
        ->first();
    }

    public function searchBook($data)
    {
        $listBooks = $this->model;

        if (isset($data['search_box'])) {
            $listBooks = $listBooks->where('title', 'like', "%{$data['search_box']}%");
        }

        if (isset($data['category_id'])) {
            $category_id = $data['category_id'];
            $listBooks = $listBooks->whereHas('categories', function ($categoryQuery) use ($category_id) {
                $categoryQuery->where('category_id', $category_id);
            });        
        }

        if (isset($data['rating_id'])) {
            switch ($data['rating_id'])
            {
                case 1:
                    $listBooks = $listBooks->where('average_rating', '<', 2);
                    break;
                case 2:
                    $listBooks = $listBooks->whereBetween('average_rating', [2, 3]);
                    break;
                case 3:
                    $listBooks = $listBooks->where('average_rating', '>', 3);
                    break;
                default:
                    $listBooks = $listBooks;
                    break;
            }
        }

        return $listBooks->paginate(config('setting.paginate'));
    }

    public function create($input)
    {
        DB::beginTransaction();
        try {
            $result = parent::create($input);
            DB::commit();
            
            return $result;
        } catch (Exception $e) {
            
            DB::rollback();
            return false;
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $result = parent::delete($id);

            DB::commit();
            return $result;
        } catch (Exception $e) {
            
            DB::rollback();
            return false;
        }
    }
}