<?php

namespace App\Http\Livewire;

use App\Models\Lab;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Labs extends Component
{

    public $data = [];    
    public $lab_id;
    public $showEdit = false;
    
    public function render()
    {
        $lab = Lab::all();
        return view('livewire.labs', [
            'lab' => $lab
        ]);
    }

    public function viewTambah()
    {
        $this->showEdit = false;
        $this->reset();
        $this->dispatchBrowserEvent('tampil-tambah');
    }

    public function createLab()
    {
        $validasiLab = Validator::make($this->data, [
            'kd_lab' => 'required',
            'nama_lab' => 'required',
        ])->validate();

        Lab::create($validasiLab);
        $this->dispatchBrowserEvent('hide-tambah', ['message' => 'Simpan Data Berhasil']);
        return redirect()->route('admin.lab');
    }

    public function updateLab()
    {
        // dd($this->lab_id);
        $validasiLab = Validator::make($this->data, [
            'kd_lab' => 'required',
            'nama_lab' => 'required',
        ])->validate();

        $lab = Lab::findOrfail($this->lab_id);
        if ($lab) {
            $lab->update($validasiLab);
            $this->dispatchBrowserEvent('hide-tambah', ['message' => 'Ubah Data Berhasil']);
        } else {
            $this->dispatchBrowserEvent('pesan', ['message' => 'Ubah Data Gagal']);
        }
        return redirect()->route('admin.lab');
    }
    
    public function viewRubah(Lab $lab)
    {
        $this->showEdit = true;
        $this->lab_id = $lab->id;
        $this->data = $lab->toArray();
        $this->dispatchBrowserEvent('tampil-tambah');
    }
    
    public function viewHapus($lab_id)
    {
        $this->dispatchBrowserEvent('tampil-hapus');
        $this->lab_id = $lab_id;
    }

    public function deleteLab()
    {
        try {
            $lab = Lab::findOrFail($this->lab_id);
            $lab->delete();
            $this->dispatchBrowserEvent('hide-hapus', ['message' => 'Hapus Data Berhasil']);
            return redirect()->route('admin.lab');
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('hide-hapus', ['message' => 'Hapus Data Gagal']);
        }
    }
}
