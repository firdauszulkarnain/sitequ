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
                    <div class="card mb-5 pb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-7 pt-3 px-5">
                                    <h2 class="text-center"><b>ARTI AYAT</b></h2>
                                    <hr class="mb-4">
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
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <a href="/surah/detail-ayat/{{ $surah }}"
                                                class="btn btn-sm btn-light bg-secondary px-3 py-2">Lanjut Baca
                                                Ayat...</a>
                                        </div>
                                        <div class="col-lg-8 mt-2">
                                            <small style="font-size: 16px" class="font-weight-bolder float-right">Total
                                                {{ $total_ayat }}
                                                Jumlah Ayat</small>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-5 mt-2 pr-4">
                                    <label for="" class="mb-n3"><i class="fas fa-thumbtack"></i> JUZ SURAH</label>
                                    <div class="row">
                                        @foreach ($juz as $item)
                                            <div class="col-lg-3 mt-3">
                                                <a href="/browsing/juz/{{ $item['url'] }}"
                                                    class="badge badge-info border border-secondary py-2"
                                                    style="font-size: 15px !important; width: 100% !important">{{ $item['juz'] }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <hr>
                                    <label for="" class="mb-n3"><i class="fas fa-thumbtack"></i> TEMA SURAH</label>
                                    <div class="row">
                                        @foreach ($tema as $item)
                                            <div class="col-lg-4 mt-3">
                                                <a href="/browsing/tema/{{ $item['url'] }}"
                                                    class="badge badge-info border border-secondary py-2"
                                                    style="font-size: 15px !important; width: 100% !important">{{ $item['tema'] }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <hr>

                                    <label for="" class="mb-n3"><i class="fas fa-thumbtack"></i> GOLONGAN
                                        SURAH</label>
                                    <div class="row">
                                        @foreach ($golongan as $item)
                                            <div class="col-lg-4 mt-3">
                                                <a href="/browsing/golongan/{{ $item['golongan'] }}"
                                                    class="badge badge-info border border-secondary py-2"
                                                    style="font-size: 15px !important; width: 100% !important">{{ $item['golongan'] }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <hr>
                                    <label for="" class="mb-n3"><i class="fas fa-thumbtack"></i> ARTI SURAH</label>
                                    <div class="row">
                                        @foreach ($arti as $item)
                                            <ul>
                                                <li>
                                                    <p style="font-size: 16px !important;" class="font-weight-bolder">
                                                        {{ $item['arti'] }}
                                                    </p>
                                                </li>
                                            </ul>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
