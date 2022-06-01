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
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5">
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
                                <div class="col-lg-7">
                                    <label for="" class="mb-n3"><i class="fas fa-thumbtack"></i> JUZ SURAH</label>
                                    <div class="row">
                                        @foreach ($juz as $item)
                                            <div class="col-lg-3 mt-3">
                                                <a href="/browsing/juz/{{ $item['url'] }}"
                                                    class="badge badge-danger border border-secondary py-2"
                                                    style="font-size: 15px !important; width: 100% !important">{{ $item['juz'] }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <hr>
                                    <label for="" class="mb-n3"><i class="fas fa-thumbtack"></i> TEMA SURAH</label>
                                    <div class="row">
                                        @foreach ($tema as $item)
                                            <div class="col-lg-3 mt-3">
                                                <a href="/browsing/tema/{{ $item['tema'] }}"
                                                    class="badge badge-danger border border-secondary py-2"
                                                    style="font-size: 15px !important; width: 100% !important">{{ $item['tema'] }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <hr>
                                    <label for="" class="mb-n3"><i class="fas fa-thumbtack"></i> ARTI SURAH</label>
                                    <div class="row">
                                        @foreach ($arti as $item)
                                            <div class="col-lg-3 mt-3">
                                                <a href="#" class="badge badge-success border border-secondary py-2"
                                                    style="font-size: 15px !important; width: 100% !important">{{ $item['arti'] }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <hr>
                                    <label for="" class="mb-n3"><i class="fas fa-thumbtack"></i> GOLONGAN
                                        SURAH</label>
                                    <div class="row">
                                        @foreach ($golongan as $item)
                                            <div class="col-lg-3 mt-3">
                                                <a href="/browsing/tema/{{ $item['golongan'] }}"
                                                    class="badge badge-success border border-secondary py-2"
                                                    style="font-size: 15px !important; width: 100% !important">{{ $item['golongan'] }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-8">
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
                </div> --}}
            </div>
        </section>
    </div>
@endsection
