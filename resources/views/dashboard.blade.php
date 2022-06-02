@extends('layouts.main')

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
                            <h2 class="font-wight-bolder">BROWSING</h2>
                            <p class="card-text">Jelajahi surah-surah Al-Quran dalam tiap Kategori yang ada </p>
                            <a href="#" class="btn btn-primary float-right">Klik Disini!</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="font-wight-bolder"> SEARCHING </h2>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque,
                                quibusdam.</p>
                            <a href="#" class="btn btn-primary float-right">Klik Disini!</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="font-wight-bolder text-uppercase"> Questionnaire </h2>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque,
                                quibusdam.</p>
                            <a href="#" class="btn btn-primary float-right">Klik Disini!</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
