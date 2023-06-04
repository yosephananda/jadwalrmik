<div>
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Users Control</h4>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 mt-2 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Table</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td><a class="btn btn-outline-success"
                                                wire:click.prevent="viewRubah({{ $user->id }})">
                                                <i data-feather="edit"></i></a>
                                            <a class="btn btn-outline-danger"
                                                wire:click.prevent="viewHapus({{ $user->id }})">
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

        <!-- Modal Tambah-->
        <div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            @if ($showEdit)
                                Ubah Informasi User
                            @else
                                Tambah Informasi User
                            @endif
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="btn-close"></button>
                    </div>
                    <form wire:submit.prevent="{{ $showEdit ? 'updateUser' : 'createUser' }}" autocomplete="off">
                        <div class="modal-body">

                            <div class="row mb-3">
                                <label for="name" class="col-sm-3 col-form-label">Nama: </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name"
                                        wire:model.defer="data.name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="username" class="col-sm-3 col-form-label">Username: </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="username"
                                        wire:model.defer="data.username">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="roleSelect" class="form-label">Role: </label>
                                <select wire:model.defer="data.role" class="form-select" name="age_select"
                                    id="roleSelect">
                                    <option selected disabled>Select roles</option>
                                    <option value="admin">Admin</option>
                                    <option value="dosen">Dosen</option>
                                    <option value="user">User</option>
                                </select>
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="btn-close"></button>
                    </div>
                    <form wire:submit.prevent="deleteUser" autocomplete="off">
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
</div>
