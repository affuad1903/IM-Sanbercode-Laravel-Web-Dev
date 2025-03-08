<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showregister()
    {
        return view('auth.register');
    }
    public function registeruser(Request $request)
    {
        $request->validate([
            'name' => 'required|min:1',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);
        
        $user = new User;
        $userCount = User::count();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // menggunakan hashing agar terenkripsi dan tidak terlihat user saat akses database
        $user->password =  Hash::make($request->input('password'));
        $user->role =  $userCount === 0 ? 'admin' : 'user' ;
        $user->save();
        return redirect('/')->with('success','Register Berhasil');
    }

    public function showlogin()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/')->with('success','Login Berhasil');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
 
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
        //flash dengan with
        return redirect('/')->with('success','Logout Berhasil');
    }
    public function getprofile()
    {
        // ketika auth untuk user menjalankan funtion profile
        $userAuth = Auth::User()->profile;

        // mengambil id user ketika auth
        $userId = Auth::id();

        // mengambil data profile sesuai id nya
        $profileData = Profile::where('user_id',$userId )->first();

        if($userAuth){
            return view('profile.edit',["profile"=> $profileData]);
        }else{
            return view('profile.create');
        }
    }
    public function createprofile(Request $request)
    {
        $request->validate([
            'age' => 'required|numeric',
            'address' => 'required|min:5',
        ]);
        
        $profile = new Profile;
        $userId = Auth::id();

        $profile->age = $request->input('age');
        $profile->address = $request->input('address');
        $profile->user_id = $userId;
        $profile->save();
        return redirect('/profile')->with('success','Tambah Profile Berhasil');
    }

    public function updateprofile(Request $request,$id)
    {
        $request->validate([
            'age' => 'required|numeric',
            'address' => 'required|min:5',
        ]);

        $profile = Profile::find($id);

        $profile->age = $request->input('age');
        $profile->address = $request->input('address');

        $profile->save();
        return redirect('/profile')->with('success','Edit Profile Berhasil');
    }

}
