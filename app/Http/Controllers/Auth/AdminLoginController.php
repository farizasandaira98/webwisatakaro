<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Hash;
use Auth;
use Route;
use Validator;
use Session;
class AdminLoginController extends Controller
{

    public function __construct()
    {
      $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
      return view('auth.admin_login');
    }

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);
      // Attempt to log the user in
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('admin.dashboard'));
      }
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function showFormRegister()
    {
        return view('auth.admin_register');
    }

    public function register(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed'
        ];

        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = new Admin;
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $simpan = $user->save();

        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('admin.login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('admin.register');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
