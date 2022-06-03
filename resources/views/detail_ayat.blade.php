@extends('layouts/main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                </div>
            </div>
        </section>

        <section class="content">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="card mb-5 pb-3">
                        <div class="card-header bg-dark">
                            <div class="row">
                                <div class="col-4">
                                    <a href="/surah/detail/{{ $surah }}"
                                        class="btn btn-sm btn-danger font-weight-bolder px-3"> <i
                                            class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                                </div>
                                <div class="col-lg-8">
                                    <small class="float-right font-weight-bolder"
                                        style="font-size: 18px !important;">{{ $title }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-5">
                            <h2 class="text-center mt-2"><b>ARTI AYAT SURAH {{ $surah }}</b></h2>
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
