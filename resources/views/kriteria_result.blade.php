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
                <div class="col-lg-12">
                    <div class="card mb-5">
                        <div class="card-header bg-info">
                            <div class="row">
                                <div class="col-lg-2">
                                    <a href="/kriteria/{{ $kategori }}"
                                        class="btn btn-sm btn-danger font-weight-bolder px-3"> <i
                                            class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                                </div>
                                <div class="col-lg-10">
                                    <strong class="mt-1 float-right text-uppercase">{{ $header }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-4">
                            <div class="row mt-n2">
                                @foreach ($result as $item)
                                    <div class="col-lg-2 mb-2">
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
