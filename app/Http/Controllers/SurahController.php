<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurahController extends Controller
{
    public function detail($name)
    {
        $query = "SELECT * WHERE 
        { 
        quran:$name quran:MengandungTema ?tema .
        quran:$name quran:TermasukGolonganSurah ?golongan .
        quran:$name quran:MengandungArtiSurah ?arti .
        }";
        $resultDetail = $this->sparql->query($query);
        $dataGolongan = [];
        $dataTema = [];
        $dataArtiSurah = [];

        foreach ($resultDetail as $row) {

            // TEMA
            if (!is_numeric(array_search($this->result($row->tema->getUri()), array_column($dataTema, "tema")))) {
                array_push($dataTema, [
                    'tema' => $this->result($row->tema->getUri()),
                ]);
            }

            // GOLONGAN
            if ($dataGolongan != NULL) {
                if (!is_numeric(array_search($this->result($row->golongan->getUri()), array_column($dataGolongan, "golongan")))) {
                    array_push($dataGolongan, [
                        'golongan' => $this->result($row->golongan->getUri()),
                    ]);
                }
            } else {
                array_push($dataGolongan, [
                    'golongan' => $this->result($row->golongan->getUri()),
                ]);
            }

            // ARTI
            if (!is_numeric(array_search($this->result($row->arti->getUri()), array_column($dataArtiSurah, "arti")))) {
                array_push($dataArtiSurah, [
                    'arti' => $this->result($row->arti->getUri()),
                ]);
            }
        }

        $data = [
            'title' => 'Detail Surah ' . $name,
            'tema' => $dataTema,
            'golongan' => $dataGolongan,
            'arti' => $dataArtiSurah,
        ];

        return view('detail', $data);
    }
}
