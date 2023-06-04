<?php

namespace App\Http\Livewire;

use App\Models\MataKuliah;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class MataKuliahs extends Component
{
    
    public $data = [];    
    public $matkul_id;
    public $showEdit = false;

    public function render()
    {
        $matkul = MataKuliah::all();
        return view('livewire.mata-kuliahs', [
            'matakul' => $matkul
        ]);
    }

    public function viewTambah()
    {
        $this->showEdit = false;
        $this->reset();
        $this->dispatchBrowserEvent('tampil-tambah');
    }

    public function createMatkul()
    {
        $validasiMatkul = Validator::make($this->data, [
            'kd_matkul' => 'required',
            'nama_matkul' => 'required',
        ])->validate();

        MataKuliah::create($validasiMatkul);
        $this->dispatchBrowserEvent('hide-tambah', ['message' => 'Simpan Data Berhasil']);
        return redirect()->route('admin.matkul');
    }

    public function updateMatkul()
    {
        // dd($this->dkt_id);
        $validasiMatkul = Validator::make($this->data, [
            'kd_matkul' => 'required',
            'nama_matkul' => 'required',
        ])->validate();

        $matkul = MataKuliah::findOrfail($this->matkul_id);
        if ($matkul) {
            $matkul->update($validasiMatkul);
            $this->dispatchBrowserEvent('hide-tambah', ['message' => 'Ubah Data Berhasil']);
        } else {
            $this->dispatchBrowserEvent('pesan', ['message' => 'Ubah Data Gagal']);
        }
        return redirect()->route('admin.matkul');
    }
    
    public function viewRubah(MataKuliah $matkul)
    {
        $this->showEdit = true;
        $this->matkul_id = $matkul->id;
        $this->data = $matkul->toArray();
        $this->dispatchBrowserEvent('tampil-tambah');
    }
    
    public function viewHapus($matkul_id)
    {
        $this->dispatchBrowserEvent('tampil-hapus');
        $this->matkul_id = $matkul_id;
    }

    public function deleteMatkul()
    {
        try {
            $matkul = MataKuliah::findOrFail($this->matkul_id);
            $matkul->delete();
            $this->dispatchBrowserEvent('hide-hapus', ['message' => 'Hapus Data Berhasil']);
            return redirect()->route('admin.matkul');
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('hide-hapus', ['message' => 'Hapus Data Gagal']);
        }
    }
}
