<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\User;
use App\Models\Book;
use App\Models\Review;
use App\Models\RequestBook;
use App\Http\Requests\ReviewRequest;
use App\Http\Requests\DemandBookRequest;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Book\BookInterface;
use App\Repositories\RequestBook\RequestBookInterface;

class AjaxController extends Controller
{
    protected $bookRepository;
    protected $requestBookRepository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct(BookInterface $bookRepository, RequestBookInterface $requestBookRepository) {
        $this->bookRepository = $bookRepository;
        $this->requestBookRepository = $requestBookRepository;
    }

    public function postReview(ReviewRequest $request)
    {
        try {
            $data = $request->all();
            Review::create($data);
            $bookDetail = $this->bookRepository->getBookById($request->book_id);

            return view('member.review', compact('bookDetail'));
        } catch (Exception $e) {
            return view('member.review')->with('alert', trans('lang.msg.error'));
        }
    }

    public function getRequest(DemandBookRequest $request)
    {
        try {
            $data = $request->all();
            RequestBook::create($data);
            $listRequestBook = $this->requestBookRepository->getRequestBookByUserId($data['user_id']);

            return view('member.list_request', compact('listRequestBook'));
        } catch (Exception $e) {
            return view('member.list_request')->with('alert', trans('lang.msg.error'));
        }
    }

    public function changeStatus(Request $request)
    {
        try {
            $id = $request->request_id;
            $status = $request->status;

            // if($status == config('setting.active')) {
            //     $status = config('setting.deactive');
            // } else {
            //     $status = config('setting.active');
            // }
            $status = !$status;
            RequestBook::where('id', $id)->update(['status' => $status]);
            $imgStatus = '';

            if($status == config('setting.deactive')) {
                $imgStatus = "<img onclick='return changeStatus({$id}, {$status})' src='" . config('setting.path_img_deactive') . "'>";
                
            } else {
                $imgStatus = "<img onclick='return changeStatus({$id}, {$status})' src='" . config('setting.path_img_active') . "'>";


            }

            return $imgStatus;
        } catch (Exception $e) {
            return view('admin.request_book.list_request_book')->with('alert', trans('lang.msg.error'));
        }
    }
}
