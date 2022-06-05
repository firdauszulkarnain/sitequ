<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrowsingController extends Controller
{
    public function index()
    {

        $queryJuz = "SELECT ?juz WHERE { ?juz a quran:Juz .}";
        $querySurah = "SELECT ?surah WHERE { ?surah a quran:Surah .}";
        // $queryTema = "SELECT ?tema WHERE { ?tema a quran:Tema .}";
        $queryTema = "SELECT ?tema WHERE { ?surah quran:MengandungTema ?tema .}";
        $queryGolongan = "SELECT ?golongan WHERE { ?golongan a quran:GolonganSurah .}";
        $resultJuz = $this->sparql->query($queryJuz);
        $resultSurah = $this->sparql->query($querySurah);
        $resultTema = $this->sparql->query($queryTema);
        $resultGolongan = $this->sparql->query($queryGolongan);

        $dataJuz = [];
        $dataSurah = [];
        $dataTema = [];
        $dataGolongan = [];
        $angkaJuz = [];

        foreach ($resultJuz as $row) {
            $data = $this->result($row->juz->getUri());
            $title = substr($data, 0, 3);
            $akhir = strlen($data) - strlen($title);
            $angka = (int)substr($data, -$akhir);
            $angkaJuz[] = $angka;
        }

        asort($angkaJuz);
        foreach ($angkaJuz as $row) {
            array_push($dataJuz, [
                'url' => 'Juz' . $row,
                'juz' => 'Juz ' . $row
            ]);
        }

        foreach ($resultSurah as $row) {
            $surah = $this->result($row->surah->getUri());
            $string =  str_replace('_', ' ', $surah);
            $nama_surah = str_replace("'", "", $string);
            array_push($dataSurah, [
                'url' => $surah,
                'surah' => $nama_surah,
            ]);
        }


        foreach ($resultTema as $row) {
            $tema =  $this->result($row->tema->getUri());
            if (!is_numeric(array_search($tema, array_column($dataTema, "url")))) {
                array_push($dataTema, [
                    'url' => $tema,
                    'tema' => str_replace('_', ' ', $tema),
                ]);
            }
        }

        foreach ($resultGolongan as $row) {
            array_push($dataGolongan, [
                'golongan' => $this->result($row->golongan->getUri()),
            ]);
        }

        $data = [
            'title' => 'Browsing',
            'juz' => $dataJuz,
            'surah' => $dataSurah,
            'tema' => $dataTema,
            'golongan' => $dataGolongan,
        ];
        return view('browsing', $data);
    }

    public function browsing($kategori, $keyword, Request $request)
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
            // $queryCek = "SELECT * WHERE {?tema a quran:Tema .}";
            $queryCek = "SELECT ?cek WHERE { ?surah quran:MengandungTema ?cek .}";
            $cek  = $this->sparql->query($queryCek);
            foreach ($cek as $row) {
                $tema = $this->result($row->cek->getUri());
                if (!in_array($tema, $arrayCek)) {
                    $arrayCek[] = $tema;
                }
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
            'title' => 'Browsing Result',
            'header' => $title,
            'result' => $dataResult,
            'query' => $query,
        ];
        $request->session()->now('message', $query);
        return view('browsing_result', $data);
    }
}
