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
                <div class="col-lg-3">
                    <div class="card">
                        <h5 class="card-header">Browsing - Juz Quran</h5>
                        <div class="card-body">
                            <ul>
                                @foreach ($juz as $item)
                                    <li><a href="/browsing/juz/{{ $item['juz'] }}">{{ $item['juz'] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <h5 class="card-header">Browsing - Tema Quran</h5>
                        <div class="card-body">
                            <ul>
                                @foreach ($tema as $item)
                                    <li><a href="/browsing/tema/{{ $item['tema'] }}">{{ $item['tema'] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <h5 class="card-header">Browsing - Surah Quran </h5>
                        <div class="card-body">
                            <ul>
                                @foreach ($surah as $item)
                                    <li><a href="/browsing/surah/{{ $item['surah'] }}">{{ $item['surah'] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <h5 class="card-header">Browsing - Golongan Quran</h5>
                        <div class="card-body">
                            <ul>
                                @foreach ($golongan as $item)
                                    <li><a href="/browsing/golongan/{{ $item['golongan'] }}">{{ $item['golongan'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection
