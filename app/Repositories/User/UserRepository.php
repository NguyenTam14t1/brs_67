<?php

namespace App\Repositories\User;

use Auth;
use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Input;
use Session;
use DB;
use Exception;

class UserRepository extends BaseRepository implements UserInterface
{
    /**
    * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
    * function getProduct.
     *
     * @return imageName
     */
    public function getAllUser()
    {
        return $this->model->orderBy('id', 'desc')->paginate(config('setting.paginate'));
    }

    public function getUserById($id)
    {
        return $this->model->where('id', $id)->with('roles')->first();
    }

    public function searchUser($data)
    {
        $listUsers = $this->model;

        if (isset($data['search_name'])) {
            $listUsers = $listUsers->where('name', 'like', "%{$data['search_name']}%");
        }

        if (isset($data['search_email'])) {
            $listUsers = $listUsers->where('email', 'like', "%{$data['search_email']}%");
        }

        return $listUsers->paginate(config('setting.paginate'));
    }
    
    public function update($input, $id)
    {
        DB::beginTransaction();
        try {
            $result = parent::update($input, $id);
            DB::commit();
            
            return $result;
        } catch (Exception $e) {
            
            DB::rollback();
            return false;
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $result = parent::delete($id);

            DB::commit();
            return $result;
        } catch (Exception $e) {
            
            DB::rollback();
            return false;
        }
    }
}