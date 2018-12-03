<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RequestBook;
use Exception;
use Auth;
use App\Repositories\RequestBook\RequestBookInterface;

class RequestBookController extends Controller
{
    protected $requestBookRepository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct(RequestBookInterface $requestBookRepository) {
        $this->requestBookRepository = $requestBookRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $user_id = Auth::user()->id;
            $listRequestBook = $this->requestBookRepository->getRequestBookByUserId($user_id);
            
            return view('member.request', compact('listRequestBook'));
        } catch(Exception $e) {
            return view('member.request')->with('alert', trans('lang.msg.error'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requestBook = $this->requestBookRepository->find($id);

        return view('member.books.edit', compact('requestBook'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only(['title', 'category_id']);
        try {
            $this->requestBookRepository->update($data, $id);
            $validate = trans('lang.msg.edit_success');
        } catch (Exception $e) {
            $validate = trans('lang.msg.edit_fail');            
        } 

        return redirect()->route('request-book.index')->with('alert', $validate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->requestBookRepository->delete($id);
            $validate = trans('lang.msg.delete_success');
        } catch (Exception $e) {
            $validate = trans('lang.msg.delete_fail');            
        } 

        return redirect()->route('request-book.index')->with('alert', $validate);
    }
}
