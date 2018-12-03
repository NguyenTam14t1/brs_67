<?php

namespace App\Repositories\RequestBook;

use Auth;
use App\Models\RequestBook;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Input;
use Session;
use DB;
use Exception;

class RequestBookRepository extends BaseRepository implements RequestBookInterface
{
    /**
    * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RequestBook $requestBook)
    {
        $this->model = $requestBook;
    }

    /**
    * function getProduct.
     *
     * @return imageName
     */
    public function getRequestBook()
    {
        return $this->model->with(['user','category'])->orderBy('id', 'desc')->paginate(config('setting.paginate'));
    }

    public function getRequestBookByUserId($user_id)
    {
        return $this->model->with('category')->where('user_id', $user_id)->orderBy('id', 'desc')->paginate(config('setting.paginate'));
    }

    public function searchRequestBook($data)
    {
        $listBooks = $this->model;

        if (isset($data['search_box'])) {
            $listBooks = $listBooks->where('title', 'like', "%{$data['search_box']}%");
        }

        if (isset($data['category_id'])) {
            $category_id = $data['category_id'];
            $listBooks = $listBooks->whereHas('category', function ($categoryQuery) use ($category_id) {
                $categoryQuery->where('category_id', $category_id);
            });        
        }

        return $listBooks->paginate(config('setting.paginate'));
    }

    public function update($input, $id)
    {
        DB::beginTransaction();
        try {
            $result = parent::update($input, $id);
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