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
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            @foreach ($result as $item)
                                <li><a href="/surah/detail/{{ $item['surah'] }}">{{ $item['surah'] }}</a>
                                </li>
                            @endforeach
                        </div>
                    </div>
                </div>
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
