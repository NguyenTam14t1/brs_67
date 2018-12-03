<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Exception;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.login');
    }

    public function getLogin(Request $request)
    {
    	try {
            $data = $request->only(['email', 'password']);
            $user = User::where('email', "{$data['email']}")->with('roles')->first();
            $role_id = $user->roles->first()->id;

			if(Auth::attempt($data) && ($role_id == config('setting.role_id'))) {
	            return view('admin.index');
	        }
        	$msgLoginFail = trans('login.msg.login_fail');

        	return view('admin.login')->with('alert', $msgLoginFail);
        } catch (Exception $e) {
            $msgLoginFail = trans('login.msg.login_fail');

            return view('admin.login')->with('alert', $msgLoginFail);
        }
    }

    public function getLogout() {
       Auth::logout();

       return redirect()->route('book.index');
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
}
