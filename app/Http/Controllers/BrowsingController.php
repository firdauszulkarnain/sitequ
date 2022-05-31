<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrowsingController extends Controller
{
    public function index()
    {

        // Data Juz
        // $query = "SELECT ?juz WHERE { ?juz a quran:Juz .}";
        $query = "SELECT ?juz WHERE { ?juz a quran:Juz .}";
        $quran = $this->sparql->query($query);
        $juz = [];

        foreach ($quran as $row) {
            $data = $this->parseData($row->juz->getUri());
            $title = substr($data, 0, 3);
            $akhir = strlen($data) - strlen($title);
            $angka = substr($data, -$akhir);
            $susun = $title . ' ' . $angka;
            array_push($juz, [
                'juz' => $susun
            ]);
        }

        // dd($juz);
        $data = [
            'title' => 'Browsing',
            'juz' => $juz
        ];
        return view('browsing', $data);
    }
}
