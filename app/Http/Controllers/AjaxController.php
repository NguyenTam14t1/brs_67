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

class AjaxController extends Controller
{
    public function postReview(ReviewRequest $request)
    {
        try {
            $data = [
                'book_id' => $request->book_id,
                'user_id' => $request->user_id,
                'rating' => $request->rating,
                'content' => $request->review
            ];
            Review::create($data);

            if (!$bookDetail = Book::findOrFail($data['book_id'])) {
                throw new Exception();
            }
            $reviews = $bookDetail->reviews()->orderBy('id', 'desc')->take(config('setting.counter_review'))->get();

            return View('member.review', compact('bookDetail', 'reviews'));
        } catch (Exception $e) {
            
            return View('member.review')->with('alert', trans('lang.msg.error'));
        }
    }

    public function getRequest(DemandBookRequest $request)
    {
        try {
            
            $data = [
                'user_id' => $request->user_id,
                'category_id' => $request->category_id,
                'title' => $request->title_book
            ];
            RequestBook::create($data);
            
            $listRequestBook = RequestBook::orderBy('id', 'desc')->Paginate(config('setting.paginate'));
            // $listRequestBook = RequestBook::orderBy('id', 'desc')->join('categories', 'categories.id', '=', 'request_books.category_id')->Paginate(config('setting.paginate'));

            return View('member.list_request', compact('listRequestBook'));
        } catch (Exception $e) {

            return View('member.request')->with('alert', trans('lang.msg.error'));
        }
    }
}

