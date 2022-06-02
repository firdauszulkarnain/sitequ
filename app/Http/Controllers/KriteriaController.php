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

            foreach ($result as $row) {
                $data = $this->result($row->juz->getUri());
                $title = substr($data, 0, 3);
                $akhir = strlen($data) - strlen($title);
                $angka = substr($data, -$akhir);
                $susun = $title . ' ' . $angka;
                array_push($dataResult, [
                    'url' => $data,
                    'name' => $susun
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
}
