<div>
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Kelas</h4>
        </div>
    </div>
    
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambah"
        wire:click.prevent="viewTambah">
        Tambah Data
    </button>

    <div class="row">
        <div class="col-md-12 mt-2 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Table</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Kode Kelas</th>
                                    <th>Nama Kelas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelas as $kls)
                                <tr>
                                    <td>{{ $kls->kd_kelas }}</td>
                                    <td>{{ $kls->nama_kelas }}</td>
                                    <td><a class="btn btn-outline-success"
                                            wire:click.prevent="viewRubah({{ $kls->id }})">
                                            <i data-feather="edit"></i></a>
                                        <a class="btn btn-outline-danger"
                                            wire:click.prevent="viewHapus({{ $kls->id }})">
                                            <i data-feather="trash-2"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah-->
    <div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        @if ($showEdit)
                            Ubah Informasi Kelas
                        @else
                            Tambah Informasi Kelas
                        @endif
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <form wire:submit.prevent="{{ $showEdit ? 'updateKelas' : 'createKelas' }}" autocomplete="off">
                    <div class="modal-body">

                        <div class="row mb-3">
                            <label for="kd_lab" class="col-sm-3 col-form-label">Kode Kelas: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="kd_lab"
                                    wire:model.defer="data.kd_kelas">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nama_lab" class="col-sm-3 col-form-label">Nama Kelas: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_lab"
                                    wire:model.defer="data.nama_kelas">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        @if ($showEdit)
                            <button type="submit" class="btn btn-primary">Simpan Ubah</button>
                        @else
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Hapus -->
    <div class="modal fade" id="modalhapus" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">
                        Hapus Data
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <form wire:submit.prevent="deleteKelas" autocomplete="off">
                    <div class="modal-body">
                        <p>Apakah yakin data dihapus?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
