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
                            @foreach ($juz as $item)
                                <a href="/browsing/juz/{{ $item['juz'] }}"
                                    class="badge badge-light border border-secondary px-3 py-2 mt-3 ml-1"
                                    style="font-size: 15px !important;">{{ $item['juz'] }}</a>
                            @endforeach
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
                            @foreach ($tema as $item)
                                <a href="/browsing/tema/{{ $item['tema'] }}"
                                    class="badge badge-light border border-secondary px-3 py-2 mt-3 ml-1"
                                    style="font-size: 15px !important;">{{ $item['tema'] }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-secondary font-weight-bolder">
                            Browsing - Golongan Quran
                        </div>
                        <div class="card-body">
                            @foreach ($golongan as $item)
                                <a href="/browsing/golongan/{{ $item['golongan'] }}"
                                    class="badge badge-light border border-secondary px-3 py-2 mt-3 ml-1"
                                    style="font-size: 15px !important;">{{ $item['golongan'] }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card ">
                        <div class="card-header bg-success font-weight-bolder">
                            Browsing - Surah Quran
                        </div>
                        <div class="card-body ">
                            @foreach ($surah as $item)
                                <a href="/browsing/surah/{{ $item['surah'] }}"
                                    class="badge badge-light border border-secondary px-3 py-2 mt-3 ml-1 "
                                    style="font-size: 15px !important;">{{ $item['surah'] }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
