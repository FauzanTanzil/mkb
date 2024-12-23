@extends('layouts.master')

@section('content')


<!-- aBOUT -->

<div class="untree_co-section before-footer-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post" action="{{url('keranjang/proses')}}">
              @csrf
                <div class="site-blocks-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($data as $m)
                            <tr>
                                <td class="product-thumbnail">
                                    <img src="{{url('public/images/menu/'.$m->image)}}" alt="Image" class="img-fluid" width="80px">
                                </td>
                                <td class="product-name">
                                  <input type="text" name="produk_id[]" value="{{$m->produk_id}}" class="d-none">
                                    <h2 class="h5 text-black">{{$m->nama}}</h2>
                                </td>
                                <td>@rupiah($m->harga)</td>
                                <td>
                                    <div class="input-group mb-3 d-flex align-items-center quantity-container"
                                        style="max-width: 120px;">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-black decrease"
                                                type="button">&minus;</button>
                                        </div>
                                        <input type="text" class="form-control text-center quantity-amount" harga="{{$m->harga}}"  value="{{$m->jumlah}}"
                                          name="jumlah[]"
                                            placeholder="" aria-label="Example text with button addon"
                                            aria-describedby="button-addon1">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-black increase" type="button">&plus;</button>
                                        </div>
                                    </div>

                                </td>
                                <td class="stotal">@rupiah($m->harga*$m->jumlah)</td>
                                <td><a href="{{url('menu/hapuskeranjang/'.$m->id)}}" class="btn btn-black btn-sm">X</a></td>
                            </tr>
                            @endforeach

                            
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-6">
                        <a href="{{url('menu')}}" class="btn btn-outline-black btn-sm btn-block">Tambah Pesanan</a>
                    </div>
                </div>

            </div>
            <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12 text-right border-bottom mb-5">
                                <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-6">
                                <span class="text-black">Total</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black totalall">0</strong>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-black btn-lg py-3 btn-block"
                                    onclick="proses()">Proceed To Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About -->


@endsection

@push('js')
<script>

  $(document).ready(()=>{
    TotalHarga()
  })

  $(".quantity-amount").on('change keyup',(e)=>{
    let jumlah = $(e.target).val()
    if(jumlah <= 0){
      $(e.target).val(1)
    }
    jumlahTotal(e.target)
  })

  $(".decrease").on('click',(e)=>{
    let ar = $(e.target).parent().parent().find(".quantity-amount")
    jumlahTotal(ar)
  })
  $(".increase").on('click',(e)=>{
    let ar = $(e.target).parent().parent().find(".quantity-amount")
    jumlahTotal(ar)
  })

  let jumlahTotal = (e)=>{
    let stotal = parseInt($(e).attr('harga')) * parseInt($(e).val())
    let ss = $(e).parent().parent().parent().find(".stotal").html(rupiah(stotal))
    TotalHarga()
  }

  let rupiah = (num)=>{
    return "Rp. "+num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
  }

  let TotalHarga = ()=>{
    let totalH = 0
    $("table tbody tr").each((i,tr)=>{
      let t = $(tr).find(".quantity-amount").val()
      let h = $(tr).find(".quantity-amount").attr('harga')
      totalH = totalH + parseInt(t)*parseInt(h)
    })
    $(".totalall").html(rupiah(totalH))
  }

  let proses = ()=>{
    let sas = $("table tbody tr").length
    if(sas >=1){
      $("form").submit()
    }
  }

</script>
@endpush