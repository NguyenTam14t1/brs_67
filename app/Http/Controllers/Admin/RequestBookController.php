<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\RequestBook\RequestBookInterface;
use App\Http\Controllers\Controller;
use Exception;
use App\Models\RequestBook;

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

    public function index()
    {
        $listAllRequestBook = $this->requestBookRepository->getRequestBook();

        return view('admin.request_book.index', compact('listAllRequestBook'));
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
        
        return view('admin.book.add', compact('requestBook'));
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
        //
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

        return redirect()->route('manager-request-book.index')->with('alert', $validate);
    }

    public function getInforSearch(Request $request)
    {
        $data = $request->all();
        $listBooks = $this->requestBookRepository->searchRequestBook($data);

        return view('admin.request_book.list_request_book', compact('listBooks'));
    }
}
