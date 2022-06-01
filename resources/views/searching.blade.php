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
            <div class="row d-flex justify-content-center">
                <div class="col-lg-11">
                    <div class="card">
                        <div class="card-header">
                            FILTER PENCARIAN
                        </div>
                        <div class="card-body">
                            <form action="/searching" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="juz">Juz</label>
                                        <select class="form-control" id="juz" name="juz">
                                            @foreach ($juz as $item)
                                                <option value="{{ $item['nilai'] }}">{{ $item['juz'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="tema">Tema</label>
                                        <select class="form-control" id="tema" name="tema">
                                            @foreach ($tema as $item)
                                                <option value="{{ $item['nilai'] }}">{{ $item['tema'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="golongan">Golongan</label>
                                        <select class="form-control" id="golongan" name="golongan">
                                            @foreach ($golongan as $item)
                                                <option value="{{ $item['golongan'] }}">{{ $item['golongan'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-2 mt-2">
                                        <button class="btn btn-primary mt-4 float-right px-4">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-11">
                    <div class="card">
                        <div class="card-header bg-secondary font-weight-bolder">
                            Hasil Pencarian
                        </div>
                        <div class="card-body">
                            @if ($surah != 0)
                                @foreach ($surah as $item)
                                    <a href="/browsing/surah/{{ $item['url'] }}"
                                        class="badge badge-light border border-secondary px-3 py-2 mt-3 ml-1 "
                                        style="font-size: 15px !important;">{{ $item['surah'] }}</a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
@endsection
