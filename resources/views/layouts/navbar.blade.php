<?php
   function ceklink($linku)
    {
        $links = explode("|", $linku);
        $status = 'n';
        foreach($links as $l){
            if(request()->is($l)){
                $status = 'active';
            }
        }
        return $status;
    }

    ceklink('/');
?>

<nav class="custom-navbar navbar navbar navbar-expand-md navbar-light " arial-label="Furni navigation bar">

        <div class="container">
            <a class="navbar-brand" href="">MK<span class="text-yellow">B</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
                aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-5 mb-2 mb-md-0">
                

                <li class="nav-item {{ ceklink('/') }}">
                        <a class="nav-link " href="{{url('')}}">HOME</a>
                    </li>
                    <li class="{{ ceklink('menu') }}"><a class="nav-link " href="{{url('menu')}}">MENU</a></li>
                    @if(!auth()->check())
                    <li class="{{ ceklink('about') }}"><a class="nav-link" href="{{url('about')}}">ABOUT</a></li>
                    <li class="{{ ceklink('login|register') }}"><a class="nav-link" href="{{url('login')}}">LOGIN</a></li>
                    @else
                    @if(auth()->user()->role == 'user')
                    <li class="{{ ceklink('keranjang') }}"><a class="nav-link" href="{{url('keranjang')}}">KERANJANG</a></li>
                    @endif
                    <li class="{{ ceklink('pesanan') }}"><a class="nav-link" href="{{url('pesanan')}}">PESANAN</a></li>
                    <li class="{{ ceklink('profil') }}"><a class="nav-link" href="{{url('profil')}}">PROFIL</a></li>
                    <li ><a class="nav-link" href="{{url('logout')}}">LOGOUT</a></li>
                    @endif

                </ul>

            </div>
        </div>

    </nav>