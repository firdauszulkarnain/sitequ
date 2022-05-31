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
                                    <li><a href=""></a>{{ $item['juz'] }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
