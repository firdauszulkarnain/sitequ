<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchingController extends Controller
{
    public function index(Request $request)
    {
        $queryJuz = "SELECT ?juz WHERE { ?juz a quran:Juz .}";
        $queryTema = "SELECT ?tema WHERE { ?tema a quran:Tema .}";
        $queryGolongan = "SELECT ?golongan WHERE { ?golongan a quran:GolonganSurah .}";
        $resultJuz = $this->sparql->query($queryJuz);
        $resultTema = $this->sparql->query($queryTema);
        $resultGolongan = $this->sparql->query($queryGolongan);

        $dataJuz = [];
        $dataTema = [];
        $dataGolongan = [];
        $dataSurah = [];
        $cek = 0;
        foreach ($resultJuz as $row) {
            $data = $this->result($row->juz->getUri());
            $title = substr($data, 0, 3);
            $akhir = strlen($data) - strlen($title);
            $angka = substr($data, -$akhir);
            $susun = $title . ' ' . $angka;
            array_push($dataJuz, [
                'nilai' => $data,
                'juz' => $susun
            ]);
        }


        foreach ($resultTema as $row) {
            $tema =  $this->result($row->tema->getUri());
            array_push($dataTema, [
                'nilai' => $tema,
                'tema' => str_replace('_', ' ', $tema),
            ]);
        }

        foreach ($resultGolongan as $row) {
            array_push($dataGolongan, [
                'golongan' => $this->result($row->golongan->getUri()),
            ]);
        }


        if ($request->isMethod('POST')) {
            $query = 'SELECT * WHERE {';
            if ($request->juz) {
                $query = $query . "quran:$request->juz quran:MengandungSurah ?surah .";
            }

            if ($request->tema) {
                $query = $query . "?surah quran:MengandungTema quran:$request->tema .";
            }

            if ($request->golongan) {
                $query =  $query . "?surah quran:TermasukGolonganSurah quran:$request->golongan .";
            }

            $query = $query . '}';
            $resultSearch = $this->sparql->query($query);
            foreach ($resultSearch as $row) {
                $surah = $this->result($row->surah->getUri());
                array_push($dataSurah, [
                    'url' => $surah,
                    'surah' => str_replace('_', ' ', $surah),
                ]);
            }
            if ($dataSurah == NULL) {
                $cek = 1;
            }
            $request->session()->now('message', $query);
        }

        $data = [
            'title' => 'Searching',
            'juz' => $dataJuz,
            'surah' => $dataSurah,
            'tema' => $dataTema,
            'golongan' => $dataGolongan,
            'surah' => $dataSurah,
            'info' => $cek,
        ];

        return view('searching', $data);
    }
}
