<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Repositories\Book\BookInterface;
use App\Repositories\MSSQL\MSQQLInterface;
use App\Repositories\MySQL\MySQLInterface;
use App\Http\Controllers\Controller;
use Exception;
use App\Models\Book;

class BookController extends Controller
{
    protected $bookRepository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct(BookInterface $bookRepository, MSSQLInterface $MSSQLRepository, MySQLInterface $MySQLRepository) {
        $this->bookRepository = $bookRepository;
        $this->MSSQLRepository = $MSSQLRepository;
        $this->MySQLRepository = $MySQLRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $MSSQL = $this->MSSQLRepository->getConnection();
        $mySql = $this->MySQLRepository->getConnection();
        return compact('MSSQL', 'mySql');
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
        try {
            $bookDetail = $this->bookRepository->getBookById($id);

            return view('member.books.book_detail', compact('bookDetail'));
        } catch (Exception $e) { 
            return $e->getMessage();        
        }
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
        //
    }

    public function introduceBook()
    {
        $book = $this->bookRepository->getAllBook();
        
        return view('layouts.introduce_book', $book);
    }

    public function getInforSearch(Request $request)
    {
        $data = $request->all();
        $listBooks = $this->bookRepository->searchBook($data);
        
        return view('member.books.books_are_found', compact('listBooks'));
    }
}
