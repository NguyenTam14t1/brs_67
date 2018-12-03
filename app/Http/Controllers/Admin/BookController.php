<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\Book\BookInterface;
use App\Http\Controllers\Controller;
use Exception;
use App\Models\Book;
use App\Http\Requests\AddBookRequest;

class BookController extends Controller
{
    protected $bookRepository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct(BookInterface $bookRepository) {
        $this->bookRepository = $bookRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listAllBook = $this->bookRepository->getAllBook();

        return view('admin.book.index', compact('listAllBook'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddBookRequest $request)
    {
        $data = $request->only(['title', 'category_id', 'author', 'publish_date', 'content', 'introduction']);
        $category_id = $request->category_id;
        try {
            $result = $this->bookRepository->create($data);
            $result->categories()->attach($category_id);
            $validate = trans('lang.msg.add_success');
        } catch (Exception $e) {
            $validate = trans('lang.msg.add_fail');            
        } 

        return redirect()->route('manager-book.index')->with('alert', $validate);
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
        //
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
            $this->bookRepository->delete($id);
            $validate = trans('lang.msg.delete_success');
        } catch (Exception $e) {
            $validate = trans('lang.msg.delete_fail');            
        } 

        return redirect()->route('manager-book.index')->with('alert', $validate);
    }

    public function getInforSearch(Request $request)
    {
        $data = $request->all();
        $listBooks = $this->bookRepository->searchBook($data);

        return view('admin.book.list_book', compact('listBooks'));
    }
}
