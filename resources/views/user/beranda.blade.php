@extends('layouts.master')

@section('content')
<!-- Start Hero Section -->
<div class="hero mb-5">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h4 class="mb-0">Makanan Khas</h4>
                    <h1>BLITAR</h1>
                    <p class="mb-4">
                        Selamat datang di Makanan Khas Blitar Kami menyajikan cita rasa khas Blitar dengan hidangan
                        istimewa. Rasakan kelezatan autentik dari dapur Blitar hanya di sini!
                    </p>
                    <p>
                        <a href="{{url('menu')}}" class="btn btn-secondary me-2">Our Food</a>
                        <a href="{{url('menu#minuman')}}" class="btn btn-dark me-2">Our Drink</a>
                    </p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="{{url('public')}}/images/bg_makanan.png" class="img-fluid w-100">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<!-- aBOUT -->
<div class="why-choose-section">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6">
                <h2 class="section-title">About Us</h2>
                <p>
                    Restoran Masakan Khas Blitar dengan penuh semangat dan dedikasi, kami menghadirkan kelezatan otentik
                    dari dapur Blitar di lokasi kami yang terletak di Plumpungrejo. Dengan komitmen untuk
                    mempersembahkan hidangan khas Blitar yang memikat lidah dan memanjakan selera, kami menyajikan ragam
                    menu yang kaya akan rempah-rempah dan bumbu tradisional. Setiap hidangan yang kami sajikan tidak
                    hanya mencerminkan warisan kuliner Blitar yang kaya, tetapi juga memberikan pengalaman kuliner yang
                    autentik dan tak terlupakan bagi setiap pengunjung kami.

                    Kami mengundang Anda untuk menikmati kelezatan masakan kami di suasana yang hangat dan ramah, di
                    alamat kami di Jl. Jendral Sudirman No. 12.
                </p>


            </div>

            <div class="col-lg-5">
                <div class="img-wrap">
                    <img src="{{asset('public/images')}}/makanan_2.png" alt="Image" class="img-fluid">
                </div>
            </div>

        </div>
    </div>
</div>
<!-- About -->

<!-- Start Product Section -->
<div class="product-section">
    <div class="container">

        <div class="row mb-5">
            <div class="col-12 ">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <a class="nav-link disabled fw-bold" href="#" tabindex="-1" aria-disabled="true">MENU</a>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">Makanan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Minuman</button>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


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
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

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


<!-- Start Testimonial Slider -->
<div class="testimonial-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto text-center">
                <h2 class="section-title">WHAT CUSTOMER SAY</h2>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="testimonial-slider-wrap text-center">

                    <div id="testimonial-nav">
                        <span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
                        <span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
                    </div>

                    <div class="testimonial-slider">

                        <div class="item">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 mx-auto">

                                    <div class="testimonial-block text-center">
                                        <blockquote class="mb-5">
                                            <p>&ldquo;
                                                Kuah kacangnya begitu lezat dan sayuran segarnya memberikan sentuhan
                                                yang sempurna.
                                                &rdquo;</p>
                                        </blockquote>

                                        <div class="author-info">
                                            <div class="author-pic">
                                                <img src="{{url('public/furni')}}/images/person-1.png" alt="Maria Jones"
                                                    class="img-fluid">
                                            </div>
                                            <h3 class="font-weight-bold">Maria Jones</h3>
                                            <span class="position d-block mb-3">Customer</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- END item -->

                        <div class="item">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 mx-auto">

                                    <div class="testimonial-block text-center">
                                        <blockquote class="mb-5">
                                            <p>&ldquo;
                                                Daging sapinya sangat lembut dan bumbu marinadenya sungguh enak.
                                                .&rdquo;</p>
                                        </blockquote>

                                        <div class="author-info">
                                            <div class="author-pic">
                                                <img src="{{url('public/furni')}}/images/person_3.jpg" alt="Maria Jones"
                                                    class="img-fluid">
                                            </div>
                                            <h3 class="font-weight-bold">Jhon Sans</h3>
                                            <span class="position d-block mb-3">Customer</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- END item -->

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Testimonial Slider -->



<!-- Start JOin Us -->
<div class="testimonial-section mb-5" style="background : url({{url('public/images/bg_2.png')}})">
    <div class="container">
        <h1 class="mb-1 text-white text-center">Join Us To Get Amazing</h1>
        <h1 class="text-white text-center">Discount On Your Next Order</h1>

        <div class="input-group mb-3 px-5">
            <input type="email" class="form-control" placeholder="Enter Your Email" aria-label="Enter Your Email"
                aria-describedby="basic-nextorder">
            <div class="input-group-prepend">
                <span class="input-group-text btn btn-primary" id="basic-nextorder">Submit</span>
            </div>
        </div>
    </div>
</div>
<!-- End JOin Us -->


@endsection

@push('js')
<script>
    let addKeranjang = (id)=>{
        window.location = `{{url('menu/addkeranjang')}}/${id}`
    }
</script>
@endpush