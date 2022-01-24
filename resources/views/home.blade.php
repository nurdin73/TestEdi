@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span class="card-title">{{ __('My Biodata') }}</span>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('biodata.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="position">Posisi yang dilamar</label>
                            <input type="text" name="position" value="{{ $biodata->position ?? "" }}" id="position" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" value="{{ $biodata->name ?? "" }}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_ktp">No KTP</label>
                            <input type="text" name="no_ktp" id="no_ktp" value="{{ $biodata->no_ktp ?? "" }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ttl">Tempat, tanggal lahir</label>
                            <input type="text" name="ttl" id="ttl" value="{{ $biodata->ttl ?? "" }}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gender">Jenis kelamin</label>
                            <select name="gender" id="gender" class="form-select">
                                <option value="">Pilih</option>
                                <option value="L" @if(isset($biodata->gender)) @if($biodata->gender == 'L') selected @endif @endif>Laki laki</option>
                                <option value="P" @if(isset($biodata->gender)) @if($biodata->gender == 'P') selected @endif @endif>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="religion">Agama</label>
                            <input type="text" value="{{ $biodata->religion ?? "" }}" name="religion" id="religion" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="no_ktp">No KTP</label>
                            <input type="text" value="{{ $biodata->no_ktp ?? "" }}" name="no_ktp" id="no_ktp" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="blood">Golongan darah</label>
                            <input type="text" name="blood" value="{{ $biodata->blood ?? "" }}" id="blood" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" name="status" value="{{ $biodata->status ?? "" }}" id="status" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address_ktp">Alamat KTP</label>
                    <textarea name="address_ktp" id="address_ktp" cols="30" rows="3" class="form-control">{{ $biodata->address_ktp ?? "" }}</textarea>
                </div>
                <div class="form-group">
                    <label for="address">Alamat Tinggal</label>
                    <textarea name="address" id="address" cols="30" rows="3" class="form-control">{{ $biodata->address ?? "" }}</textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ $biodata->email ?? "" }}" id="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_telp">No Telp</label>
                            <input type="text" name="no_telp" value="{{ $biodata->no_telp ?? "" }}" id="no_telp" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="close_person">Orang terdekat yang dapat dihubungi</label>
                            <input type="text" name="close_person" value="{{ $biodata->close_person ?? "" }}" id="close_person" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="can_work_all_company">Bersedia ditempatkan diseluruh kantor perusahaan</label>
                            <select name="can_work_all_company" id="can_work_all_company" class="form-select">
                                <option value="true" @if(isset($biodata->can_work_all_company) && $biodata->can_work_all_company) selected @endif>Ya</option>
                                <option value="false" @if( isset($biodata->can_work_all_company) && !$biodata->can_work_all_company) selected @endif>Tidak</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="expected_salary">Penghasilan yang diharapkan (*bulan)</label>
                    <input type="text" name="expected_salary" value="{{ $biodata->expected_salary ?? "" }}" id="expected_salary" class="form-control">
                </div>
                <h3 class="my-2">Pendidikan</h3>
                <div class="educations">
                    @if (isset($biodata->educations))
                        @foreach ($biodata->educations as $education)
                            <div class="card my-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="level[]">Jenjang pendidikan</label>
                                                <input type="text" name="level[]" value="{{ $education->level }}" id="level[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name_institution[]">Nama Institusi</label>
                                                <input type="text" name="name_institution[]" value="{{ $education->name_institution }}" id="name_institution[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="major[]">Jurusan</label>
                                                <input type="text" name="major[]" id="major[]" value="{{ $education->major }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="date_graduate[]">Tahun lulus</label>
                                                <input type="text" name="date_graduate[]" id="date_graduate[]" value="{{ $education->date_graduate }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="grading[]">Nilai(IPK)</label>
                                                <input type="text" name="grading[]" id="grading[]" value="{{ $education->grading }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-sm btn-danger deleteEducation">Hapus</button>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" class="btn btn-sm btn-primary addEducation">Tambah</button>
                <h3 class="my-2">Riwayat pelatihan</h3>
                <div class="trainings">
                    @if (isset($biodata->trainings))
                        @foreach ($biodata->trainings as $training)
                            <div class="card my-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name_training[]">Nama kursus/seminar</label>
                                                <input type="text" name="name_training[]" value="{{ $training->name }}" id="name_training[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="cert[]">Sertifikat</label>
                                                <select name="cert[]" id="cert[]" class="form-select">
                                                    <option value="true" @if($training->cert) selected @endif>Ya</option>
                                                    <option value="false" @if(!$training->cert) selected @endif>Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="date[]">Tahun</label>
                                                <input type="text" name="date[]" value="{{ $training->date }}" id="date[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-sm btn-danger deleteTraining">Hapus</button>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" class="btn btn-sm btn-primary addTraining">Tambah</button>
                <h3 class="my-2">Riwayat pekerjaan</h3>
                <div class="experiences">
                    @if (isset($biodata->experiences))
                        @foreach ($biodata->experiences as $experience)
                            <div class="card my-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name_employer[]">Nama Perusahaan</label>
                                                <input type="text" name="name_employer[]" value="{{ $experience->name }}" id="name_employer[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="position_work[]">Posisi terakhir</label>
                                                <input type="text" name="position_work[]" value="{{ $experience->position }}" id="position_work[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="salary[]">Pendapatan terakhir</label>
                                                <input type="text" name="salary[]" id="salary[]" value="{{ $experience->salary }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="year[]">Tahun</label>
                                                <input type="text" name="year[]" id="year[]" value="{{ $experience->date }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-sm btn-danger deleteExperience">Hapus</button>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" class="btn btn-sm btn-primary addExperience">Tambah</button>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-sm btn-danger">Batal</button>   
                </div>
            </form>

            {{-- <table class="table table-sm table-boderless">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Posisi</th>
                        <th>Nama</th>
                        <th>Jenis kelamin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($biodata) > 0) 
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($biodata as $bio)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $bio->position }}</td>
                                <td>{{ $bio->name }}</td>
                                <td>{{ $bio->gender }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('biodata.update', ['biodatum' => $bio->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('biodata.destroy', ['biodatum' => $bio->id]) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" align="center">Biodata not found</td>
                        </tr>
                    @endif
                </tbody>
            </table> --}}
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
