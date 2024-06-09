@extends('layouts.master')

@section('content')

<!-- Start Product Section -->
<div class="product-section">
    <div class="container">

        <button class="btn btn-primary float-end" onclick="addMenu()">Tambah</button>

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
                            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                                <a class="product-item border">
                                    <img src="{{url('public/images/menu/'.$m->image)}}" class="img-fluid product-thumbnail">
                                    <h3 class="product-title">{{$m->nama}}</h3>
                                    <strong class="product-price">@rupiah($m->harga)</strong>

                                    <div class="w-100">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" onClick="editMenu({{$m}})"
                                                class="btn btn-sm bg-warning btn-warning">Edit</button>
                                            <button type="button" onClick="hapusMenu({{$m}})"
                                                class="btn btn-sm bg-danger btn-danger">Hapus</button>
                                        </div>
                                    </div>


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
                            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                                <a class="product-item border">
                                    <img src="{{url('public/images/menu/'.$m->image)}}" class="img-fluid product-thumbnail">
                                    <h3 class="product-title">{{$m->nama}}</h3>
                                    <strong class="product-price">@rupiah($m->harga)</strong>

                                    <div class="w-100">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" onClick="editMenu({{$m}})"
                                                class="btn btn-sm bg-warning btn-warning">Edit</button>
                                            <button type="button" onClick="hapusMenu({{$m}})"
                                                class="btn btn-sm bg-danger btn-danger">Hapus</button>
                                        </div>
                                    </div>


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


<!-- Modal add -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{url('menu/add')}}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Nama Menu</span>
                        <input type="text" class="form-control" required name="nama">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Jenis</span>
                        <select name="type" id="" class="form-control">
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Harga</span>
                        <input type="number" class="form-control" required name="harga">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Foto</span>
                        <input type="file" class="form-control" required name="image" accept="image/*">
                    </div>
                    <button class="btn btn-primary float-end">Tambah</button>
                </form>

            </div>

        </div>
    </div>
</div>
<!-- Modal add -->

<!-- Modal edit-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Ubah Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Nama Menu</span>
                        <input type="text" class="form-control" required name="nama">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Jenis</span>
                        <select name="type" id="" class="form-control">
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Harga</span>
                        <input type="number" class="form-control" required name="harga">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Foto</span>
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>
                    <button class="btn btn-primary float-end">Simpan</button>
                </form>

            </div>

        </div>
    </div>
</div>
<!-- Modal edit-->



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

    let addMenu = () => {
        $("#addModal").modal('show')
    }

    let editMenu = (menu) => {
        $("#editModal [name='nama']").val(menu.nama)
        $("#editModal [name='type']").val(menu.type)
        $("#editModal [name='harga']").val(menu.harga)
        $("#editModal form").attr('action', `{{url('menu/edit')}}/${menu.id}`)
        $("#editModal").modal('show')
    }

    let hapusMenu = (menu) => {

        Swal.fire({
            title: 'Hapus Menu?',
            showDenyButton: true,
            denyButtonText: 'No',
            confirmButtonText: 'Yes',
            customClass: {
                actions: 'my-actions',
                confirmButton: 'order-2',
                denyButton: 'order-3',
            },
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = `{{url('menu/hapus')}}/${menu.id}`;
            } else if (result.isDenied) {

            }
        })

    }
</script>

@endpush