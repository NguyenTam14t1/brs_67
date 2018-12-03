<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\AddUserRequest;
use App\Repositories\User\UserInterface;

class UserController extends Controller
{
    protected $userRepository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct(UserInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listAllUsers = $this->userRepository->getAllUser();

        return view('admin.user.index', compact('listAllUsers'));
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
        $user = $this->userRepository->getUserById($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        try {
            $data = $request->only(['name', 'email']);
            $this->userRepository->update($data, $id);
            $validate = trans('lang.msg.edit_success');
        } catch (Exception $e) {
            $validate = trans('lang.msg.edit_fail');            
        } 
        return redirect()->route('manager-user.index')->with('alert', $validate);
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
            $this->userRepository->delete($id);
            $validate = trans('lang.msg.delete_success');
        } catch (Exception $e) {
            $validate = trans('lang.msg.delete_fail');            
        } 
        return redirect()->route('manager-user.index')->with('alert', $validate);
    }

    public function getInforSearch(Request $request)
    {
        $data = $request->all();
        $listUsers = $this->userRepository->searchUser($data);

        return view('admin.user.list_user', compact('listUsers'));
    }
}
