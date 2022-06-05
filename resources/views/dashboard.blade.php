@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body bg-info text-center">
                                <small class="font-weight-bolder" style="font-size: 18px !important">SELAMAT DATANG DI SISTEM
                                    TEMA QURAN</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content mt-n3">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <img src="/img/gambar1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h2 class="font-wight-bolder">BROWSING</h2>
                            <p class="card-text">Jelajahi surah-surah Al-Quran dalam tiap Kategori yang ada.
                            </p>
                            <a href="/browsing" class="btn btn-primary float-right">Klik Disini!</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <img src="/img/gambar2.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h2 class="font-wight-bolder"> SEARCHING </h2>
                            <p class="card-text">Cari surah-surah Al-Quran sesuai yang diinginkan berdasarakan kategori
                                yang ada.
                            </p>
                            <a href="/searching" class="btn btn-primary float-right">Klik Disini!</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <img src="/img/gambar3.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h2 class="font-wight-bolder text-uppercase"> Questionnaire </h2>
                            <p class="card-text">Dukung aplikasi dengan berpartisipasi dalam pengujian dan
                                evaluasi sistem.
                            </p>
                            <button type="button" class="btn btn-primary float-right" onclick="kuesioner()">Klik Disini!</>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        function kuesioner() {
            window.open(
                "https://docs.google.com/forms/d/e/1FAIpQLSdCy9Ee9m7p2CRaHXWLoPxGpCII3ZaMK4ZmZ8NYC44CPmlPrw/viewform",
                "_blank");
        }
    </script>
@endsection
