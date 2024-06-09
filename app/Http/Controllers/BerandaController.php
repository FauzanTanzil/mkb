<?php

namespace App\Http\Controllers;
use App\Models\produk;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function beranda()
    {
        $menu = produk::orderBy('id','DESC')->get();
        return view('user.beranda',compact('menu'));
    }
    public function about()
    {
        return view('user.about');
    }
    public function menu()
    {
        $menu = produk::orderBy('id','DESC')->get();
        return auth()->check() && auth()->user()->role == 'admin' ? view('admin.menu',compact('menu')) : view('user.menu',compact('menu'));
    }
}
