<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurahController extends Controller
{
    public function detail($name, Request $request)
    {
        $query = "SELECT * WHERE { ?juz quran:MengandungSurah  quran:$name . quran:$name quran:MengandungTema ?tema . quran:$name quran:TermasukGolonganSurah ?golongan . quran:$name quran:MengandungArtiSurah ?arti . quran:$name quran:MengandungAyat ?ayat. quran:$name quran:MemilikiJumlahAyat ?total.}";
        $request->session()->now('message', $query);
        $resultDetail = $this->sparql->query($query);
        $ayat = [];
        $dataJuz = [];
        $dataGolongan = [];
        $dataTema = [];
        $dataArtiSurah = [];
        $dataAyat = [];
        $dataKalimat = [];
        $kalimat = '';

        foreach ($resultDetail as $row) {

            // JUZ
            if (!is_numeric(array_search($this->result($row->juz->getUri()), array_column($dataJuz, "url")))) {
                $data = $this->result($row->juz->getUri());
                $title = substr($data, 0, 3);
                $akhir = strlen($data) - strlen($title);
                $angka = substr($data, -$akhir);
                $susun = $title . ' ' . $angka;
                array_push($dataJuz, [
                    'url' => $this->result($row->juz->getUri()),
                    'juz' => $susun,
                ]);
            }

            // TEMA
            if (!is_numeric(array_search($this->result($row->tema->getUri()), array_column($dataTema, "url")))) {
                array_push($dataTema, [
                    'url' =>  $this->result($row->tema->getUri()),
                    'tema' =>  str_replace('_', ' ', $this->result($row->tema->getUri())),
                ]);
            }

            // GOLONGAN
            if (!is_numeric(array_search($this->result($row->golongan->getUri()), array_column($dataGolongan, "golongan")))) {
                array_push($dataGolongan, [
                    'golongan' => $this->result($row->golongan->getUri()),
                ]);
            }

            // ARTI
            if (!is_numeric(array_search($this->result($row->arti->getUri()), array_column($dataArtiSurah, "cek")))) {
                array_push($dataArtiSurah, [
                    'cek' => $this->result($row->arti->getUri()),
                    'arti' =>  str_replace('_', ' ', $this->result($row->arti->getUri())),
                ]);
            }

            // AYAT
            $ayat = $this->result($row->ayat->getValue());

            // TOTAL AYAT
            $total = $this->result($row->total->getValue());
        }

        // PECAH AYAT SUPAYA RAPI PAS DITAMPILIN
        $dataKalimat = preg_split("/[\s,]+/", $ayat);
        $j = 2;
        $i = 1;
        $jumlah = count($dataKalimat);
        foreach ($dataKalimat as $kata) {
            $nomor = $i . ".";
            if ($kata == $nomor) {
                unset($kata);
                $kalimat = '';
            } else {
                $kalimat = $kalimat . ' ' . $kata;
                $nomorAkhir =  $j . ".";
                if ($kata == $nomorAkhir || $i == $jumlah) {
                    $kalimat = preg_replace("/$nomorAkhir/", "", $kalimat);
                    $dataAyat[] = $kalimat;
                    if (count($dataAyat) == 5) {
                        break;
                    }
                    $kalimat = '';
                    $j++;
                }
            }
            $i++;
        }

        $data = [
            'title' => 'Detail Surah ' . $name,
            'surah' => $name,
            'tema' => $dataTema,
            'golongan' => $dataGolongan,
            'arti' => $dataArtiSurah,
            'ayat' => $dataAyat,
            'total_ayat' => $total,
            'juz' => $dataJuz
        ];


        return view('detail', $data);
    }

    public function detail_ayat($name)
    {
        $queryAyat = "SELECT * WHERE {quran:$name quran:MengandungAyat ?ayat.}";
        $ayat = $this->sparql->query($queryAyat);

        $dataAyat = [];
        $dataKalimat = [];
        $kalimat = '';

        foreach ($ayat as $row) {
            $dataKalimat = preg_split("/[\s,]+/", $this->result($row->ayat->getValue()));
            $j = 2;
            $i = 1;
            $jumlah = count($dataKalimat);
            foreach ($dataKalimat as $kata) {
                $nomor = $i . ".";
                if ($kata == $nomor) {
                    unset($kata);
                    $kalimat = '';
                } else {
                    $kalimat = $kalimat . ' ' . $kata;
                    $nomorAkhir =  $j . ".";
                    if ($kata == $nomorAkhir || $i == $jumlah) {
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
            'surah' => $name,
            'ayat' => $dataAyat,
        ];
        return view('detail_ayat', $data);
    }
}
