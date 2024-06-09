<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\produk;


class AdminMenuController extends Controller
{
    public function add(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('image')){
            $tujuan_upload = public_path('images/menu');
            $file = $request->file('image');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            $data['image'] = $namaFile;
        }
        produk::create($data);
        return redirect()->back()->with('success',"Berhasil menambah menu");
    }

    public function edit($id,Request $request)
    {
        $data = [
            'nama'=>$request->nama,
            'type'=>$request->type,
            'harga'=>$request->harga,
        ];
        if($request->hasFile('image')){
            $tujuan_upload = public_path('images/menu');
            $file = $request->file('image');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            $data['image'] = $namaFile;
        }
        produk::where('id',$id)->update($data);
        return redirect()->back()->with('success',"Berhasil mengubah menu");

    }

    public function hapus($id)
    {
        produk::findOrFail($id)->delete();
        return redirect()->back()->with('success',"Berhasil menghapus menu");
    }

}
