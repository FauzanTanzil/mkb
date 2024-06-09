<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\keranjang;
use App\Models\produk;
use App\Models\transaksi;
use App\Models\pesanan;

class KeranjangController extends Controller
{
    public function index()
    {
        $data = keranjang::where('user_id',auth()->user()->id)
        ->leftjoin('produks','produks.id','keranjangs.produk_id')
        ->select('keranjangs.*','produks.nama','produks.harga','produks.image')
        ->get();
        return view('user.keranjang',compact('data'));
    }

    public function add($id)
    {
        $cek_menu = keranjang::where('user_id',auth()->user()->id)->where('produk_id',$id)->first();
        if($cek_menu){
            keranjang::find($cek_menu->id)->update([
                'jumlah'=>$cek_menu->jumlah + 1
            ]);
        }else{
            keranjang::create([
                'produk_id'=>$id,
                'jumlah'=>1,
                'user_id'=>auth()->user()->id
            ]);
        }
        return redirect('keranjang')->with('success','Menu berhasi ditambah');
    }
    public function hapus($id){
        $cek_menu = keranjang::find($id);
        if($cek_menu){
            $cek_menu->delete();
        }
        return redirect('keranjang')->with('success','Menu berhasi dihapus');
    }


    public function proses(Request $request)
    {
        $total = 0;
        foreach($request->produk_id as $n=>$pid){
            $produk = produk::find($pid)->harga;
            $total = $total + $produk * $request->jumlah[$n];
        }

        $tid = transaksi::create([
            'kode'=>'TRX'.rand(1000, 9999),
            'total'=>$total,
            'user_id'=>auth()->user()->id
        ])->id;
        foreach($request->produk_id as $n=>$pid){
            pesanan::create([
                'produk_id'=>$pid,
                'transaksi_id'=>$tid,
                'jumlah'=>$request->jumlah[$n]
            ]);
        }
        keranjang::where('user_id',auth()->user()->id)->delete();
        return redirect('pesanan/'.$tid )->with('success','Pesanan berhasil');

    }

}
