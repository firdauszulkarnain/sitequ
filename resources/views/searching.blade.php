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
                    <div class="card mb-5">
                        <div class="card-header bg-secondary font-weight-bolder">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h4 class="mt-2 font-weight-bolder">HASIL PENCARIAN</h4>
                                </div>
                                <div class="col-lg-8 ">
                                    @if ($hasil != '')
                                        <small class="float-right font-weight-bolder bg-info shadow-sm px-3 py-2"
                                            style="font-size: 16px !important;">{{ $hasil }}</small>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="card-body mb-3">
                            <div class="row">
                                @if ($info == 1)
                                    <div class="col-lg-12">
                                        <div class="alert alert-danger text-center" role="alert">
                                            <strong>Tidak Ada Surah Yang Ditemukan!</strong>
                                        </div>
                                    </div>
                                @endif
                                @if ($surah != 0)
                                    @foreach ($surah as $item)
                                        <div class="col-lg-2">
                                            <a href="/surah/detail/{{ $item['url'] }}"
                                                class="badge badge-light border border-secondary mt-3 py-2"
                                                style="font-size: 15px !important; width: 100%;">{{ $item['surah'] }}</a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
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
