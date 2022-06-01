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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-primary font-weight-bolder">
                            Browsing - Juz Quran
                        </div>
                        <div class="card-body">
                            <div class="row mt-n2">
                                @foreach ($juz as $item)
                                    <div class="col-lg-1">
                                        <a href="/browsing/juz/{{ $item['url'] }}"
                                            class="badge badge-light border border-secondary px-3 py-2 mt-3 ml-1"
                                            style="font-size: 15px !important; width: 100%">{{ $item['juz'] }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-danger font-weight-bolder">
                            Browsing - Tema Quran
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($tema as $item)
                                    <div class="col-lg-2">
                                        <a href="/browsing/tema/{{ $item['url'] }}"
                                            class="badge badge-light border border-secondary px-3 py-2 mt-3 ml-1 text-capitalize"
                                            style="font-size: 15px !important;  width: 100%">{{ $item['tema'] }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-green font-weight-bolder">
                            Browsing - Golongan Quran
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($golongan as $item)
                                    <div class="col-lg-2">
                                        <a href="/browsing/golongan/{{ $item['golongan'] }}"
                                            class="badge badge-light border border-secondary px-3 py-2 mt-3 ml-1"
                                            style="font-size: 15px !important; width: 100%">{{ $item['golongan'] }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card ">
                        <div class="card-header bg-secondary font-weight-bolder">
                            Browsing - Surah Quran
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                @foreach ($surah as $item)
                                    <div class="col-lg-2">
                                        <a href="/surah/detail/{{ $item['url'] }}"
                                            class="badge badge-light border border-secondary px-3 py-2 mt-3 ml-1 "
                                            style="font-size: 15px !important;  width: 100%">{{ $item['surah'] }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
