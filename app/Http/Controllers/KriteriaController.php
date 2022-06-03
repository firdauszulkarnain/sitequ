<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index(Request $request, $name)
    {
        $dataResult = [];
        if ($name == 'juz') {

            $query = "SELECT ?juz WHERE { ?juz a quran:Juz .}";
            $result = $this->sparql->query($query);
            $angkaJuz = [];

            foreach ($result as $row) {
                $data = $this->result($row->juz->getUri());
                $title = substr($data, 0, 3);
                $akhir = strlen($data) - strlen($title);
                $angka = (int)substr($data, -$akhir);
                $angkaJuz[] = $angka;
            }

            asort($angkaJuz);
            foreach ($angkaJuz as $row) {
                array_push($dataResult, [
                    'url' => 'Juz' . $row,
                    'name' => 'Juz ' . $row
                ]);
            }
        } elseif ($name == 'tema') {

            $query = "SELECT ?tema WHERE { ?tema a quran:Tema .}";
            $result = $this->sparql->query($query);

            foreach ($result as $row) {
                $tema =  $this->result($row->tema->getUri());
                array_push($dataResult, [
                    'url' => $tema,
                    'name' => str_replace('_', ' ', $tema),
                ]);
            }
        } elseif ($name == 'golongan') {
            $query = "SELECT ?golongan WHERE { ?golongan a quran:GolonganSurah .}";
            $result = $this->sparql->query($query);

            foreach ($result as $row) {
                $golongan = $this->result($row->golongan->getUri());
                array_push($dataResult, [
                    'url' => $golongan,
                    'name' => $golongan,
                ]);
            }
        } elseif ($name == 'surah') {
            $query = "SELECT ?surah WHERE { ?surah a quran:Surah .}";
            $result = $this->sparql->query($query);

            foreach ($result as $row) {
                $surah = $this->result($row->surah->getUri());
                $nama_surah =  str_replace('_', ' ', $surah);
                $nama_surah = str_replace("'", "", $nama_surah);
                array_push($dataResult, [
                    'url' => $surah,
                    'name' => $nama_surah,
                ]);
            }
        } else {
            abort(404);
        }

        $request->session()->now('message', $query);

        $data = [
            'title' => 'Kriteria - ' . $name,
            'kriteria' => $name,
            'data' => $dataResult,
        ];


        return view('kriteria', $data);
    }

    public function kriteria_result($kategori, $keyword, Request $request)
    {
        $arrayCek = [];
        if ($kategori == 'juz') {
            // CEK JUZ URL
            $queryCek = "SELECT * WHERE {?cek a quran:Juz .}";
            $cek  = $this->sparql->query($queryCek);
            foreach ($cek as $row) {
                $arrayCek[] = $this->result($row->cek->getUri());
            }

            if (!in_array($keyword, $arrayCek)) {
                abort(404);
            }
            // END CEK

            // BUAT SPASI JUZ
            $pecah = substr($keyword, 0, 3);
            $akhir = strlen($keyword) - strlen($pecah);
            $angka = substr($keyword, -$akhir);
            $kata = $pecah . ' ' . $angka;

            $query = "SELECT * WHERE { quran:$keyword quran:MengandungSurah ?surah .}";
            $title = 'Kategori Juz - ' . $kata;
        } elseif ($kategori == 'tema') {

            // CEK TEMA URL
            $queryCek = "SELECT * WHERE {?cek a quran:Tema .}";
            $cek  = $this->sparql->query($queryCek);
            foreach ($cek as $row) {
                $arrayCek[] = $this->result($row->cek->getUri());
            }

            if (!in_array($keyword, $arrayCek)) {
                abort(404);
            }
            // END CEK

            $query = "SELECT ?surah WHERE {?surah quran:MengandungTema quran:$keyword}";
            $title = 'Kategori Tema - ' . $keyword;
        } elseif ($kategori == 'golongan') {

            // CEK GOLONGAN
            $queryCek = "SELECT * WHERE {?cek a quran:GolonganSurah .}";
            $cek  = $this->sparql->query($queryCek);
            foreach ($cek as $row) {
                $arrayCek[] = $this->result($row->cek->getUri());
            }

            if (!in_array($keyword, $arrayCek)) {
                abort(404);
            }
            // END CEK

            $query = "SELECT ?surah WHERE {?surah quran:TermasukGolonganSurah quran:$keyword}";
            $title = 'Kategori Golongan - ' . $keyword;
        } else {
            abort(404);
        }

        $result = $this->sparql->query($query);
        $dataResult = [];

        foreach ($result as $row) {
            $surah = $this->result($row->surah->getUri());
            $nama_surah =  str_replace('_', ' ', $surah);
            $nama_surah = str_replace("'", "", $nama_surah);
            array_push($dataResult, [
                'url' => $surah,
                'surah' => $nama_surah,
            ]);
        }

        $data = [
            'title' => 'Kriteria Result',
            'header' => $title,
            'result' => $dataResult,
            'query' => $query,
            'kategori' => $kategori
        ];
        $request->session()->now('message', $query);
        return view('kriteria_result', $data);
    }
}
