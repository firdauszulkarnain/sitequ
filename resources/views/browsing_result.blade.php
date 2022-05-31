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
                @foreach ($result as $item)
                    <div class="col-lg-2">
                        <div class="card shadow-sm rounded ">
                            <div class="card-body">
                                <a class="text-decoration-none text-dark font-weight-bolder">{{ $item['surah'] }}</a>
                                <a href="/surah/detail/{{ $item['surah'] }}"
                                    class="btn btn-sm btn-info float-right rounded-circle shadow-sm rounded"><i
                                        class="fas fa-search"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <h4>Hasil Query</h4>
                            <p>{{ $query }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
