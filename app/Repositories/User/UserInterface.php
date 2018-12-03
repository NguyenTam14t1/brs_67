<?php

namespace App\Repositories\User;

interface UserInterface
{
    // public function create($request);

    public function delete($id);
    
    public function getAllUser();

    public function update($input, $id);
    
    public function getUserById($id);
    
    public function searchUser($data);
}
