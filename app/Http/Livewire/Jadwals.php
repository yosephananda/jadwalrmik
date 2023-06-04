<?php

namespace App\Http\Livewire;

use App\Models\Jadwal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Jadwals extends Component
{
    public $data = [];    
    public $jadwal_id;
    public $showEdit = false;

    public function render()
    {
        $jadwal = DB::table('jadwals')->join('data__kelas', 'jadwals.kd_kelas', '=', 'data__kelas.kd_kelas')
                                      ->join('labs', 'jadwals.kd_lab', '=', 'labs.kd_lab')
                                      ->join('mata_kuliahs', 'jadwals.kd_matkul', '=', 'mata_kuliahs.kd_matkul')
                                      ->join('users', 'jadwals.nama_dosen', '=','users.name')
                                      ->get();
        $kelas = DB::table('data__kelas')->get();
        $lab = DB::table('labs')->get();
        $matkul = DB::table('mata_kuliahs')->get();
        $dosen = DB::table('users')->where('role', 'dosen')->get();
        return view('livewire.jadwals', [
            'dosen' => $dosen,
            'jadwal' => $jadwal,
            'kelas' => $kelas,
            'lab' => $lab,
            'matkul' => $matkul
        ]);
    }

    public function viewTambah()
    {
        $this->showEdit = false;
        $this->reset();
        $this->dispatchBrowserEvent('tampil-tambah');
    }

    public function createJadwal()
    {
        $validasi = Validator::make($this->data, [
            'kd_lab' => 'required',
            'nama_dosen' => 'required',
            'kd_matkul' => 'required',
            'kd_kelas' => 'required',
            'waktu' => 'required',
            'tanggal' => 'required',
            'status' => 'required'
        ])->validate();

        Jadwal::create($validasi);
        $this->dispatchBrowserEvent('hide-tambah', ['message' => 'Simpan Data Berhasil']);
        return redirect()->route('admin.jadwal');
    }

    public function updateKelas()
    {
        // dd($this->dkt_id);
        $validasi = Validator::make($this->data, [
            'kd_lab' => 'required',
            'nama_dosen' => 'required',
            'kd_matkul' => 'required',
            'kd_kelas' => 'required',
            'waktu' => 'required',
            'tanggal' => 'required',
            'status' => 'required'
        ])->validate();

        $jadwal = Jadwal::findOrfail($this->kelas_id);
        if ($jadwal) {
            $jadwal->update($validasi);
            $this->dispatchBrowserEvent('hide-tambah', ['message' => 'Ubah Data Berhasil']);
        } else {
            $this->dispatchBrowserEvent('pesan', ['message' => 'Ubah Data Gagal']);
        }
        return redirect()->route('admin.jadwal');
    }
    
    public function viewRubah(Jadwal $jadwal)
    {
        $this->showEdit = true;
        $this->jadwal_id = $jadwal->id;
        $this->data = $jadwal->toArray();
        $this->dispatchBrowserEvent('tampil-tambah');
    }
    
    public function viewHapus($jadwal_id)
    {
        $this->dispatchBrowserEvent('tampil-hapus');
        $this->jadwal_id = $jadwal_id;
    }

    public function deleteJadwal()
    {
        try {
            $jadwal = Jadwal::findOrFail($this->kelas_id);
            $jadwal->delete();
            $this->dispatchBrowserEvent('hide-hapus', ['message' => 'Hapus Data Berhasil']);
            return redirect()->route('admin.jadwal');
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('hide-hapus', ['message' => 'Hapus Data Gagal']);
        }
    }
}
