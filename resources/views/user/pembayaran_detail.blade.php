@extends('layouts.master')
@section('content')


<!-- aBOUT -->
<div class="why-choose-section">
    <div class="container">
    <h4>Pembayaran</h4>
    
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{url('submitpembayaran/'.$pesanan->id)}}" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <table class="w-100 table table-bordered">
                        <tr>
                            <th width="30%">KODE TRANSAKSI</th>
                            <td>{{$pesanan->kode}}</td>
                        </tr>
                        <tr>
                            <th>PESANAN DETAIL</th>
                            <td>
                                <ul>
                                    @foreach($pesanan->pesanan as $p)
                                        <li>{{$p->nama . ' ('. $p->jumlah.') x ' .$p->harga }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>TOTAL PEMBAYARAN</th>
                            <td>@rupiah($pesanan->total)</td>
                        </tr>
                    </table>
                    
                    <div class="border px-3 py-3" style="border-style: dotted !important;">
                        <h6>Alamat Pengiriman</h6>
                        <div class="form-group">
                            <label>Nama Penerima</label>
                            <input type="text" class="form-control" name="nama" required value="{{$alamat ? $alamat->nama : ''}}">
                        </div>
                        <div class="form-group">
                            <label>No Hp</label>
                            <input type="text" class="form-control" name="no_hp" required value="{{$alamat ? $alamat->no_hp : ''}}">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" required name="alamat">{{$alamat ? $alamat->alamat : ''}}</textarea>
                        </div>
                    </div>
                    
                </div>
                
                 <div class="col-md-6">
                     
                     <div class="border px-3 py-3" style="border-style: dotted !important;">
                         <h4>Silahkan melakukan pembayaran melalui</h4>
                         <ul>
                                <li>BRI (000901071264508) a:n : Prayitno</li>
                                <li>Mandiri (1710010744707) a:n Fauzan Tanzil Habibi</li>
                                <li>BNI (729947512) a:n : SDRI Diah Herlinawa</li>
                                <li>Shopepay (085648282072) a:n : Fauzan Tanzil Habibi</li>
                         </ul>
                         <h6>Setelah melakukan pembayaran silahkan unggah bukti pembayaran : </h6>
                         <div class="form-group">
                             <input type="file" accept="images/*" class="form-control" required name="bukti_pembayaran">
                         </div>
                         <button type="submit" class="mt-3 btn btn-sm btn-success">Submit</button>
                     </div>
                    
                </div>
            </div>
            </form>
            
        </div>
    </div>

    </div>
</div>
<!-- About -->


@endsection