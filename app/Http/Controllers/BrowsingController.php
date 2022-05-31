<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrowsingController extends Controller
{
    public function index()
    {

        $queryJuz = "SELECT ?juz WHERE { ?juz a quran:Juz .}";
        $querySurah = "SELECT ?surah WHERE { ?surah a quran:Surah .}";
        $queryTema = "SELECT ?tema WHERE { ?tema a quran:Tema .}";
        $queryGolongan = "SELECT ?golongan WHERE { ?golongan a quran:GolonganSurah .}";
        $resultJuz = $this->sparql->query($queryJuz);
        $resultSurah = $this->sparql->query($querySurah);
        $resultTema = $this->sparql->query($queryTema);
        $resultGolongan = $this->sparql->query($queryGolongan);

        $dataJuz = [];
        $dataSurah = [];
        $dataTema = [];
        $dataGolongan = [];

        foreach ($resultJuz as $row) {
            $data = $this->result($row->juz->getUri());
            // $title = substr($data, 0, 3);
            // $akhir = strlen($data) - strlen($title);
            // $angka = substr($data, -$akhir);
            // $susun = $title . ' ' . $angka;
            array_push($dataJuz, [
                'juz' => $data
            ]);
        }

        foreach ($resultSurah as $row) {
            array_push($dataSurah, [
                'surah' => $this->result($row->surah->getUri()),
            ]);
        }


        foreach ($resultTema as $row) {
            array_push($dataTema, [
                'tema' => $this->result($row->tema->getUri()),
            ]);
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

    public function browsing($kategori, $keyword)
    {
        if ($kategori == 'juz') {
            $query = "SELECT * WHERE { quran:$keyword quran:MengandungSurah ?surah .}";
            $title = ' - Kategori Juz - ' . $keyword;
        } elseif ($kategori == 'tema') {
            $query = "SELECT ?surah WHERE {?surah quran:MengandungTema quran:$keyword}";
            $title = ' - Kategori Tema - ' . $keyword;
        } elseif ($kategori == 'golongan') {
            $query = "SELECT ?surah WHERE {?surah quran:TermasukGolonganSurah quran:$keyword}";
            $title = ' - Kategori Golongan - ' . $keyword;
        }

        $result = $this->sparql->query($query);
        $dataResult = [];

        foreach ($result as $row) {
            array_push($dataResult, [
                'surah' => $this->result($row->surah->getUri()),
            ]);
        }

        $data = [
            'title' => 'Browsing Result' . $title,
            'result' => $dataResult,
            'query' => $query,
        ];

        return view('browsing_result', $data);
    }
}
