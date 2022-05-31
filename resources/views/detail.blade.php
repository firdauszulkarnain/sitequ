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
            <div class="row">
                <div class="col-lg-4">
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
                            <hr>
                            <p class="font-weight-bolder"> <i class="fas fa-map-pin"></i> Golongan Surah</p>
                            <ul class="mt-n2">
                                @foreach ($golongan as $item)
                                    <li><a href="">{{ $item['golongan'] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header bg-light font-weight-bolder text-center">
                            MAKNA AYAT
                        </div>
                        <div class="card-body px-4 py-4">
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($ayat as $item)
                                <span class="badge badge-light"></span>
                                <p class="mt-n2 text-justify font-weight-bolder bg-light p-3 border border-secondary shadow-sm"
                                    style="font-size: 13px !important; line-height: 1.3;">
                                    {{ $i }}.{{ $item }}
                                </p>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
