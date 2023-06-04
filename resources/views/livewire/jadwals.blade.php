<div>
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Jadwal</h4>
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
                                    <th>Nama Lab</th>
                                    <th>Nama Dosen</th>
                                    <th>Mata Kuliah</th>
                                    <th>Kelas</th>
                                    <th>Waktu Pelaksanaan</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jadwal as $jdwl)
                                    <tr>
                                        <td>{{ $jdwl->nama_lab }}</td>
                                        <td>{{ $jdwl->nama_dosen }}</td>
                                        <td>{{ $jdwl->nama_matkul }}</td>
                                        <td>{{ $jdwl->nama_kelas }}</td>
                                        <td>{{ $jdwl->waktu }}</td>
                                        <td>{{ $jdwl->tanggal }}</td>
                                        <td>@if( $jdwl->status === "Diterima" )
                                            <span class="badge bg-success">Diterima</span>
                                            @elseif( $jdwl->status === "Pending")
                                            <span class="badge bg-warning">Pending</span>
                                            @elseif( $jdwl->status === "Ditolak" )
                                            <span class="badge bg-danger">Ditolak</span>
                                            @endif
                                        </td>
                                        <td><a class="btn btn-outline-success"
                                                wire:click.prevent="viewRubah({{ $jdwl->id }})">
                                                <i data-feather="edit"></i></a>
                                            <a class="btn btn-outline-danger"
                                                wire:click.prevent="viewHapus({{ $jdwl->id }})">
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
                            Ubah Informasi Jadwal
                        @else
                            Tambah Informasi Jadwal
                        @endif
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <form wire:submit.prevent="{{ $showEdit ? 'updateJadwal' : 'createJadwal' }}" autocomplete="off">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="labSelect" class="form-label">Nama Lab: </label>
                            <select @error('lab') is-invalid @enderror wire:model.defer="data.kd_lab"
                                class="form-select" name="age_select" id="labSelect">
                                <option selected disabled>Pilih lab</option>
                                @foreach ($lab as $lab)
                                    <option value="{{ $lab->kd_lab }}">{{ $lab->nama_lab }}</option>
                                @endforeach
                            </select>
                            @error('lab')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="dosenSelect" class="form-label">Nama Dosen: </label>
                            <select @error('dosen') is-invalid @enderror wire:model.defer="data.nama_dosen"
                                class="form-select" name="age_select" id="dosenSelect">
                                <option selected disabled>Pilih dosen</option>
                                @foreach ($dosen as $dsn)
                                    <option value="{{ $dsn->name }}">{{ $dsn->name }}</option>
                                @endforeach
                            </select>
                            @error('dosen')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="matkulSelect" class="form-label">Nama Mata Kuliah: </label>
                            <select @error('matkul') is-invalid @enderror wire:model.defer="data.kd_matkul"
                                class="form-select" name="age_select" id="matkulSelect">
                                <option selected disabled>Pilih mata kuliah</option>
                                @foreach ($matkul as $mtk)
                                    <option value="{{ $mtk->kd_matkul }}">{{ $mtk->nama_matkul }}</option>
                                @endforeach
                            </select>
                            @error('matkul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kelasSelect" class="form-label">Nama Kelas: </label>
                            <select @error('kelas') is-invalid @enderror wire:model.defer="data.kd_kelas"
                                class="form-select" name="age_select" id="kelasSelect">
                                <option selected disabled>Pilih kelas</option>
                                @foreach ($kelas as $kls)
                                    <option value="{{ $kls->kd_kelas }}">{{ $kls->nama_kelas }}</option>
                                @endforeach
                            </select>
                            @error('kelas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="time" class="col-sm col-form-label">Waktu: </label>
                            <div class="input-group" id="datetimepickerExample" data-target-input="nearest">
                                <input type="time" class="form-control @error('waktu') is-invalid @enderror"
                                    id="time" wire:model.defer="data.waktu">
                                @error('waktu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="datePickerExample" class="col-sm col-form-label">Tanggal: </label>
                            <div class="input-group" id="datePickerExample">
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                    wire:model.defer="data.tanggal">
                                @error('tanggal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        @if(Auth::user()->role === 'admin')
                        <div class="mb-3">
                            <label for="statusSelect" class="form-label">Status: </label>
                            <select @error('matkul') is-invalid @enderror wire:model.defer="data.status"
                                class="form-select" name="age_select" id="statusSelect">
                                <option selected disabled>Pilih status</option>
                                <option value="Diterima">Diterima</option>
                                <option value="Pending">Pending</option>
                                <option value="Ditolak">Ditolak</option>
                            </select>
                            @error('matkul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @endif

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
                <form wire:submit.prevent="deleteJadwal" autocomplete="off">
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
