<?php

namespace App\Http\Controllers;

use App\Http\Request\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginView()
    {
        return view('login.main', [
            'layout' => 'login'
        ]);
    }

    /**
     * Authenticate login user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            throw new \Exception('Wrong email or password.');
        }
    }

    /**
     * Logout user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }


    public function registerView()
    {
        return view('login.register');
    }

    public function register(Request $request)
    {

        // dd($request);
        $request->validate(
            [
                'name' => 'required',
                'tlp' => 'required',
                'gender' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required'
            ]);
            $data = [
                'name' => $request->name,
                'nis' => $request->tlp,
                'gender' => $request->gender,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role_id' => 2,
                'active' => 1,
                'created_at' => now(),
            ];
        DB::table('users')->insert($data);
        return redirect()->route('login.index')->withSuccess('Akun Berhasil dibuat');;

    }

}
