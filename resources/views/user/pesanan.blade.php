@extends('layouts.master')

@section('content')


<!-- aBOUT -->
<div class="why-choose-section">
    <div class="container">
    
    <div class="table-responsive">
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Tanggal</th>
                    <th>Pesanan</th>
                    <th>Total</th>
                    <th>Bukti</th>
                    <th>Status</th>
                    @if(auth()->user()->role == 'user') 
                    <th>#</th>
                    @endif
                    @if(auth()->user()->role == 'admin') 
                     <th>Alamat Pengiriman</th>
                    <th>Nama</th>
                    <th>Hapus</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($trans as $n=>$t)
                <tr>
                    <td>{{$n+1}}</td>
                    <td>{{$t->kode}}</td>
                    <td>{{$t->created_at}}</td>
                    <td>
                        <ul>
                        @foreach($t->pesanan as $p)
                            <li>{{$p->nama . ' ('. $p->jumlah.')'}}</li>
                        @endforeach
                        </ul>
                    </td>
                    <td>@rupiah($t->total)</td>
                    <td>
                        @if($t->bukti_pembayaran)
                        <a target="_blank" href="{{url('public/images/bukti/'.$t->bukti_pembayaran)}}">Lihat</a>
                        @else
                        -
                        @endif
                    </td>
                    <td>{{$t->status}}
                    @if(auth()->user()->role == 'admin' && $t->status == "Menunggu Konfirmasi") 
                    <br>
                    
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                      <a href="{{url('pesanan/terima/'.$t->id)}}" class="badge bg-success me-2">Terima</a>
                      <a href="{{url('pesanan/tolak/'.$t->id)}}"  class="badge bg-danger">Tolak</a>
                    </div>
                    
                    @endif
                    
                    </td>
                    @if(auth()->user()->role == 'user') 
                    <td>
                        @if($t->status == 'Belum Dibayar' || $t->status == 'Pembayaran Ditolak')
                        <a href="{{url('pesanan/'.$t->id)}}" class="badge  bg-danger" style="font-size:10px;" >Lakukan Pembayaran</a>
                        @endif
                        @if($t->status == 'Segera Dikirim')
                        <a href="{{url('pesanan/diterima/'.$t->id)}}" class="badge  bg-success" style="font-size:10px;">Konfirmasi Pesanan Diterima</a>
                        @endif
                    </td>
                    @endif
                    @if(auth()->user()->role == 'admin') 
                    <td>
                        @if($t->status !="Belum Dibayar")
                        {{$t->user->alamat->no_hp}}
                        <br>
                        {{$t->user->alamat->alamat}}
                        @else
                        -
                        @endif
                    </td> 
                    <td>
                        {{$t->user->name}}
                    </td>
                    
                    <td> <a href="{{url('pesanan/hapus/'.$t->id)}}" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> </a> </td> 
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </div>
</div>
<!-- About -->


@endsection