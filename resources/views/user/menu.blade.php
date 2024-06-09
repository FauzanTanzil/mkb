@extends('layouts.master')
@section('content')

<!-- Start Product Section -->
<div class="product-section">
    <div class="container">


        <div class="row mb-5">
            <div class="col-12 ">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <a class="nav-link disabled fw-bold" href="#" tabindex="-1" aria-disabled="true">MENU</a>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="makanan" data-bs-toggle="tab" data-bs-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">Makanan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="minuman" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Minuman</button>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="makanan">

                        <div class="row justify-content-center mt-5">

                            @foreach($menu->where('type','makanan') as $m)

                            <!-- Start Column 2 -->
                            <div class="col-6 col-md-4 col-lg-3 mb-5 ">
                                <a class="product-item border">
                                    <img src="{{url('public/images/menu/'.$m->image)}}" class="img-fluid product-thumbnail">
                                    <h3 class="product-title">{{$m->nama}}</h3>
                                    <strong class="product-price">@rupiah($m->harga)</strong>

                                     <span class="icon-cross" onclick="addKeranjang('{{$m->id}}')">
                                    Order Now
                                    </span>


                                </a>
                            </div>
                            <!-- End Column 2 -->

                            @endforeach

                        </div>

                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="minuman">

                        <div class="row justify-content-center mt-5">

                            @foreach($menu->where('type','minuman') as $m)

                            <!-- Start Column 2 -->
                            <div class="col-6 col-md-4 col-lg-3 mb-5 ">
                                <a class="product-item border">
                                    <img src="{{url('public/images/menu/'.$m->image)}}" class="img-fluid product-thumbnail">
                                    <h3 class="product-title">{{$m->nama}}</h3>
                                    <strong class="product-price">@rupiah($m->harga)</strong>

                                     <span class="icon-cross" onclick="addKeranjang('{{$m->id}}')">
                                    Order Now
                                    </span>


                                </a>
                            </div>
                            <!-- End Column 2 -->

                            @endforeach

                        </div>

                    </div>
                </div>

            </div>
        </div>



    </div>
</div>
<!-- End Product Section -->

<!-- How to order -->

<div class="why-choose-section">
    <div class="container">

        <div class="row">
            <div class="col-lg-7 mx-auto text-center">
                <h2 class="section-title">HOW TO ORDER</h2>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-6 col-md-4 col-lg-4 mb-4 card">
                <div class="feature">
                    <div class="icon">
                        <img src="{{url('public/images/Food.png')}}" alt="Image" class="imf-fluid">
                    </div>
                    <h3>Pilih Menu</h3>
                    <p>Telusuri menu kami yang beragam dan pilihlah hidangan favorit Anda dari daftar masakan khas
                        Blitar yang kami sajikan.</p>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-4 mb-4 card">
                <div class="feature">
                    <div class="icon">
                        <img src="{{url('public/images/Task.png')}}" alt="Image" class="imf-fluid">
                    </div>
                    <h3>Tentukan Pilihan</h3>
                    <p>Setelah memilih menu, tentukan pilihan Anda sesuai dengan selera dan keinginan.</p>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-4 mb-4 card">
                <div class="feature">
                    <div class="icon">
                        <img src="{{url('public/images/Dollar.png')}}" alt="Image" class="imf-fluid">
                    </div>
                    <h3>Lakukan Pemesanan</h3>
                    <p>Setelah menentukan pilihan, masukan ke keranjang dan lakukan pembayaran.</p>
                </div>
            </div>


        </div>

    </div>
</div>

<!-- HOw to order -->




@endsection

@push('js')
<script>

$(document).ready(()=>{
        let url_ini = window.location.href;
        let cek_url = url_ini.split("#")
        cek_aktif_url(cek_url)
    })
    let cek_aktif_url = (url)=>{
        if(url.length > 1){
            let url_ini = url[1]
            if(url_ini == 'minuman'){
                $("#minuman").click()
            }
        }
        $("html, body").animate({ scrollTop: 0 }, "slow");
    }

    let addKeranjang = (id)=>{
        window.location = `{{url('menu/addkeranjang')}}/${id}`
    }
</script>
@endpush