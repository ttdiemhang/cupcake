<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\LoginRequest;
use App\Http\Requests\Admin\PasswordRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {

        return view('backend.login');
    }
    public function handleLogin(LoginRequest $request)
    {
        $params = $request->all();
        $email = $params['email'];
        $password = $params['password'];
        $user = User::where('email', $email)
            ->whereIn('role_id',array(1,2))
            ->first();
        if (!empty($user)) {
            // check hash password
            if (!Hash::check($password, $user->password)) {
                return redirect()->back()->withErrors(['password' => 'Password không tồn tại']);
            }
            // login success
            session(['admin_users' => $user]);
            return redirect(route('admin-home'));
        }

        // login fail
        return redirect(route('admin-login'))->with('error', 'Email hoặc Password không tồn tại');
}
    public function logout(Request $request)
    {
        // Forget a single key
        $request->session()->forget('admin_users');

        $request->session()->flush();

        return redirect(route('admin-login'));
    }

}
