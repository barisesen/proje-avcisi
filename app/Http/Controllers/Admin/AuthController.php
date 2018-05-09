<?php
namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $guard = 'admin';
    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin) {
            return redirect('/admin/login')->with('error', 'Admin does not exist');
        }

        if (Hash::check($request->password, $admin->password)) {
            Auth::guard('admin')->login($admin);
            return redirect('/admin');
        }
        return redirect('/admin/login')->with('error', 'email or password not valid');
    }

    public function register(Request $request)
    {
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->save();
        return back();
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }

    public function destroy(Request $request)
    {
        Admin::find($request->id)->delete();
        return back();
    }
}