@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('admin') }}" method="get">
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" name="search" id="search" value="{{ $search ?? "" }}" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-block btn-primary">Cari</button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-sm table-boderless">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Posisi</th>
                                <th>Nama</th>
                                <th>Tempat Tanggal lahir</th>
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
                                        <td>{{ $bio->ttl }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('biodata.show', ['biodatum' => $bio->id]) }}" class="btn btn-sm btn-primary">Detail</a>
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
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
