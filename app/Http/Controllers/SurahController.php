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
        $queryAyat = "SELECT * WHERE {quran:$name quran:MengandungAyat ?ayat.}";
        $resultDetail = $this->sparql->query($query);
        $ayat = $this->sparql->query($queryAyat);
        $dataGolongan = [];
        $dataTema = [];
        $dataArtiSurah = [];
        $dataAyat = [];
        $dataKalimat = [];
        $kalimat = '';

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

        foreach ($ayat as $row) {
            $dataKalimat = preg_split("/[\s,]+/", $this->result($row->ayat->getValue()));
            $j = 2;
            $i = 1;
            foreach ($dataKalimat as $kata) {
                $nomor = $i . ".";
                if ($kata == $nomor) {
                    unset($kata);
                    $kalimat = '';
                } else {
                    $kalimat = $kalimat . ' ' . $kata;
                    $nomorAkhir =  $j . ".";
                    if ($kata == $nomorAkhir) {
                        $kalimat = preg_replace("/$nomorAkhir/", "", $kalimat);
                        $dataAyat[] = $kalimat;
                        $kalimat = '';
                        $j++;
                    }
                }
                $i++;
            }
        }

        $data = [
            'title' => 'Detail Surah ' . $name,
            'tema' => $dataTema,
            'golongan' => $dataGolongan,
            'arti' => $dataArtiSurah,
            'ayat' => $dataAyat
        ];

        return view('detail', $data);
    }
}
