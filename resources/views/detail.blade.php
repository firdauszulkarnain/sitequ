@extends('layouts/main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <h1>{{ $title }}</h1>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <p class="font-weight-bolder"> <i class="fas fa-map-pin"></i> Tema Surah</p>
                            <ul class="mt-n2">
                                @foreach ($tema as $item)
                                    <li><a href="">{{ $item['tema'] }}</a></li>
                                @endforeach
                            </ul>
                            <hr>
                            <p class="font-weight-bolder"> <i class="fas fa-map-pin"></i> Arti Surah</p>
                            <ul class="mt-n2">
                                @foreach ($arti as $item)
                                    <li><a href="">{{ $item['arti'] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
