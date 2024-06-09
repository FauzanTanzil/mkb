<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\pesanan;
use App\Models\alamat;
use Carbon\Carbon;


class PesananController extends Controller
{
    public function index()
    {
        $trans = transaksi::with(['user.alamat','pesanan' => function($query) {
            $query->join('produks','produks.id','pesanans.produk_id');
        } ])->orderBy('id','DESC')->get();

        if(auth()->user()->role == 'user'){
            $trans = transaksi::with(['user','pesanan' => function($query) {
                $query->join('produks','produks.id','pesanans.produk_id');
            } ])
            ->where('user_id',auth()->user()->id)
            ->orderBy('id','DESC')
            ->get();
        }
        return view('user.pesanan',compact('trans')); 
    }

    public function hapus($id)
    {
        pesanan::where('transaksi_id',$id)->delete();
        transaksi::find($id)->delete();
        return redirect()->back()->with('success','Transaksi berhasil dihapus');
    }
    
    public function pembayaran($id){
        $pesanan = transaksi::with(['user','pesanan' => function($query) {
            $query->join('produks','produks.id','pesanans.produk_id');
        } ])->findOrFail($id);
        if($pesanan->status !='Belum Dibayar' && $pesanan->status != 'Pembayaran Ditolak'){
            return redirect('pesanan');
        }
        
        $alamat = alamat::where('user_id',auth()->user()->id)->first();
        return view('user.pembayaran_detail',compact('alamat','pesanan'));
        
    }
    public function submit_pembayaran($id, Request $request){
        alamat::updateOrCreate(['user_id'=>auth()->user()->id], [
                'nama'=>$request->nama,
                'no_hp'=>$request->no_hp,
                'alamat'=>$request->alamat
            ]);
        if($request->hasFile('bukti_pembayaran')){
            $tujuan_upload = public_path('images/bukti');
            $file = $request->file('bukti_pembayaran');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            transaksi::find($id)->update(['bukti_pembayaran'=>$namaFile,'status'=>'Menunggu Konfirmasi']);
        }
        return redirect('pesanan')->with('success','Pembayaran telah dilakukan, menunggu admin untuk konfirmasi pesanan anda');
    }
    
    public function pembayaran_terima($id){
        transaksi::find($id)->update(['status'=>'Segera Dikirim']);
        return redirect('pesanan')->with('success','Pembayaran telah dikonfirmasi');
    }
        
    public function pembayaran_tolak($id){
        transaksi::find($id)->update(['status'=>'Pembayaran Ditolak']);
        return redirect('pesanan')->with('success','Pembayaran telah dikonfirmasi');
    }
    
      public function pesanan_diterima($id){
        transaksi::find($id)->update(['status'=>'Sudah Diterima']);
        return redirect('pesanan')->with('success','Pesanan telah dikonfirmasi, Terimakasih');
    }
}
