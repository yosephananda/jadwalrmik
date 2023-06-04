<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class UserControls extends Component
{
    public $data = [];    
    public $user_id;
    public $showEdit = false;

    public function render()
    {
        $user = User::all();
        return view('livewire.user-controls', [
            'user' => $user
        ]);
    }

    public function viewTambah()
    {
        $this->showEdit = false;
        $this->reset();
        $this->dispatchBrowserEvent('tampil-tambah');
    }

    public function createUser()
    {
        $validasi = Validator::make($this->data, [
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
        ])->validate();

        User::create($validasi);
        $this->dispatchBrowserEvent('hide-tambah', ['message' => 'Simpan Data Berhasil']);
        return redirect()->route('admin.usercontrol');
    }

    public function updateUser()
    {
        // dd($this->dkt_id);
        $validasi = Validator::make($this->data, [
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
        ])->validate();

        $user = User::findOrfail($this->user_id);
        if ($user) {
            $user->update($validasi);
            $this->dispatchBrowserEvent('hide-tambah', ['message' => 'Ubah Data Berhasil']);
        } else {
            $this->dispatchBrowserEvent('pesan', ['message' => 'Ubah Data Gagal']);
        }
        return redirect()->route('admin.usercontrol');
    }
    
    public function viewRubah(User $user)
    {
        $this->showEdit = true;
        $this->user_id = $user->id;
        $this->data = $user->toArray();
        $this->dispatchBrowserEvent('tampil-tambah');
    }
    
    public function viewHapus($user_id)
    {
        $this->dispatchBrowserEvent('tampil-hapus');
        $this->user_id = $user_id;
    }

    public function deleteUser()
    {
        try {
            $user = User::findOrFail($this->user_id);
            $user->delete();
            $this->dispatchBrowserEvent('hide-hapus', ['message' => 'Hapus Data Berhasil']);
            return redirect()->route('admin.usercontrol');
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('hide-hapus', ['message' => 'Hapus Data Gagal']);
        }
    }
}
