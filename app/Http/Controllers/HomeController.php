<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // SELECT * WHERE{?hp a handphone:Handphone .?hp handphone:nilaiHarga ?harga .?hp handphone:memilikiGambar ?gambar}ORDER BY ?hp LIMIT '.$limit.''
        $query = "SELECT DISTINCT * WHERE {?surah a quran:Surah .?surah quran:TermasukGolonganSurah quran:Mekah}";
        $quran = $this->sparql->query($query);
        $result = [];

        foreach ($quran as $row) {
            array_push($result, [
                'nama_surah' => $this->parseData($row->surah->getUri())
            ]);
        }
        $data = [
            'title' => 'Surah Mekah',
            'quran' => $result,
        ];
        return view('home', $data);
    }
}
