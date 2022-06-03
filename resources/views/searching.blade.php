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
                        <div class="card-header bg-secondary font-weight-bolder">
                            FILTER PENCARIAN
                        </div>
                        <div class="card-body">
                            <form action="/searching" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="juz">Juz</label>
                                        <select class="form-control selectpicker border border-secondary" data-size="5"
                                            data-live-search="true" title="Pilih Juz" id="juz" name="juz">
                                            @foreach ($juz as $item)
                                                <option value="{{ $item['nilai'] }}">{{ $item['juz'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="tema">Tema</label>
                                        <select class="form-control selectpicker border border-secondary" data-size="5"
                                            data-live-search="true" title="Pilih Tema" id="tema" name="tema">
                                            @foreach ($tema as $item)
                                                <option value="{{ $item['nilai'] }}">{{ $item['tema'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="golongan">Golongan</label>
                                        <select class="form-control selectpicker border border-secondary"
                                            data-live-search="true" title="Pilih Golongan" id="golongan" name="golongan">
                                            @foreach ($golongan as $item)
                                                <option value="{{ $item['golongan'] }}">{{ $item['golongan'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-2 mt-2">
                                        <button class="btn btn-info mt-4 float-right px-4"><i
                                                class="fas fa-fw fa-search"></i>
                                            Search</button>
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
                            HASIL PENCARIAN
                        </div>

                        <div class="card-body">
                            @if ($info == 1)
                                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                    <strong>Tidak Ada Surah Yang Ditemukan</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
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
