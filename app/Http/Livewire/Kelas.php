<?php

namespace App\Http\Livewire;

use App\Models\Data_Kelas;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Kelas extends Component
{
    public $data = [];    
    public $kelas_id;
    public $showEdit = false;

    public function render()
    {
        $kelas = Data_Kelas::all();
        return view('livewire.kelas',[
            'kelas' => $kelas
        ]);
    }

    public function viewTambah()
    {
        $this->showEdit = false;
        $this->reset();
        $this->dispatchBrowserEvent('tampil-tambah');
    }

    public function createKelas()
    {
        $validasiKls = Validator::make($this->data, [
            'kd_kelas' => 'required',
            'nama_kelas' => 'required',
        ])->validate();

        Data_Kelas::create($validasiKls);
        $this->dispatchBrowserEvent('hide-tambah', ['message' => 'Simpan Data Berhasil']);
        return redirect()->route('admin.kelas');
    }

    public function updateKelas()
    {
        // dd($this->dkt_id);
        $validasiKls = Validator::make($this->data, [
            'kd_kelas' => 'required',
            'nama_kelas' => 'required',
        ])->validate();

        $kelas = Data_Kelas::findOrfail($this->kelas_id);
        if ($kelas) {
            $kelas->update($validasiKls);
            $this->dispatchBrowserEvent('hide-tambah', ['message' => 'Ubah Data Berhasil']);
        } else {
            $this->dispatchBrowserEvent('pesan', ['message' => 'Ubah Data Gagal']);
        }
        return redirect()->route('admin.kelas');
    }
    
    public function viewRubah(Data_Kelas $kelas)
    {
        $this->showEdit = true;
        $this->kelas_id = $kelas->id;
        $this->data = $kelas->toArray();
        $this->dispatchBrowserEvent('tampil-tambah');
    }
    
    public function viewHapus($kelas_id)
    {
        $this->dispatchBrowserEvent('tampil-hapus');
        $this->kelas_id = $kelas_id;
    }

    public function deleteKelas()
    {
        try {
            $kelas = Data_Kelas::findOrFail($this->kelas_id);
            $kelas->delete();
            $this->dispatchBrowserEvent('hide-hapus', ['message' => 'Hapus Data Berhasil']);
            return redirect()->route('admin.kelas');
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('hide-hapus', ['message' => 'Hapus Data Gagal']);
        }
    }
}

