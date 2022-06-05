@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                </div>
            </div>
        </section>

        <section class="content mt-4">
            <div class="row d-flex justify-content-center">
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
