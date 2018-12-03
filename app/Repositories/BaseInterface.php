<?php

namespace App\Repositories;

interface BaseInterface
{
    public function all();

    public function paginate($limit = null, $columns = ['*']);

    public function find($id, $columns = ['*']);
    
    public function where($conditions, $operator = null, $value = null);

    public function create($input);

    public function update($input, $id);

    public function delete($id);

    public function getConnection();
}
