<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class ProfilController extends Controller
{
    public function index()
    {
        return view('user.profil');
    }
    public function update(Request $request)
    {
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
        ];

        $cek_email = User::where('email',$request->email)->where('email','!=',auth()->user()->email)->first();
        if($cek_email){
            return redirect()->back()->with('error','Email sudah digunakan');
        }
        if($request->password != ''){
            $data['password'] = bcrypt($request->password);
        }

        User::find(auth()->user()->id)->update($data);
        return redirect()->back()->with('success','Berhasil di update');

    }
}
