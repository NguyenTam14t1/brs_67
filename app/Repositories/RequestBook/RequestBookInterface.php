<?php

namespace App\Repositories\RequestBook;

interface RequestBookInterface
{
    // public function create($request);

    public function delete($id);

    public function getRequestBook();

    public function getRequestBookByUserId($user_id);

    public function update($input, $id);

    public function searchRequestBook($data);
}
