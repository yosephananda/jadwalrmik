<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Welcome extends Controller
{
    public function render()
    {
        $jadwal = DB::table('jadwals')->join('data__kelas', 'jadwals.kd_kelas', '=', 'data__kelas.kd_kelas')
                                      ->join('labs', 'jadwals.kd_lab', '=', 'labs.kd_lab')
                                      ->join('mata_kuliahs', 'jadwals.kd_matkul', '=', 'mata_kuliahs.kd_matkul')
                                      ->join('users', 'jadwals.nama_dosen', '=','users.name')
                                      ->get();
        return view('welcome', [
            'jadwal' => $jadwal
        ]);
    }
}
