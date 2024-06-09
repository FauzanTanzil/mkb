<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use DB; 
use Carbon\Carbon; 
use Mail; 
use Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect('/');
        }else{
            return redirect('login')->with('error','Email atau password salah');
        }
    }


    public function create(Request $request)
    {
        if(User::where('email',$request->email)->first()){
            return redirect('register')->with('error','Email sudah terdaftar');
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role'=>'user'
        ]);
        return redirect('login')->with('success',"Berhasil mendaftar");
    }


    public function logout() {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
      }

      public function reset_password()
      {
        return view('reset-password');
      }

      public function send_reset_password(Request $request)
      {
       
        $cek_email = User::where('email',$request->email)->first();
        if(!$cek_email){
            return back()->with('error', 'Email tidak ditemukan!');
        }
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);

        Mail::send('mail-reset-password', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('success', 'Link reset password telah dikirim, silahkan cek email, atau spam!');
      }

      public function show_reset_password($token) { 
        $data = DB::table('password_resets')->where('token',$token)->first();
        return view('update-reset-password', compact('data'));
     }

     public function update_reset_password(Request $request)
     {
        $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                              ])
                              ->first();
  
          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }
  
          $user = User::where('email', $request->email)
                      ->update(['password' => bcrypt($request->password)]);
 
          DB::table('password_resets')->where(['email'=> $request->email])->delete();
  
          return redirect('/login')->with('success', 'Password berhasil diubah silahkan login!');
     }

}
