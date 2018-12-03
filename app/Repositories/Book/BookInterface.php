<?php

namespace App\Repositories\Book;

interface BookInterface
{
    // public function create($request);

    public function delete($id);
    
    public function getAllBook();

    public function create($input);
    
    public function getBookById($id);
    
    public function searchBook($data);
}
