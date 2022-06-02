@extends('layouts.main')

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
                <div class="col-lg-11">
                    <div class="card pb-3">
                        <div class="card-header bg-primary font-weight-bolder text-center text-uppercase"
                            style="font-size: 18px !important;">
                            {{ $title }}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($data as $item)
                                    <div class="col-lg-2">
                                        @if ($kriteria == 'surah')
                                            <a href="/surah/detail/{{ $item['url'] }}"
                                                class="badge badge-light border border-secondary px-3 py-2 mt-3 ml-1"
                                                style="font-size: 15px !important; width: 100%">{{ $item['name'] }}</a>
                                        @else
                                            <a href="/browsing/{{ $kriteria }}/{{ $item['url'] }}"
                                                class="badge badge-light border border-secondary px-3 py-2 mt-3 ml-1"
                                                style="font-size: 15px !important; width: 100%">{{ $item['name'] }}</a>
                                        @endif
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
