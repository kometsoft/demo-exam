@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->isNotEmpty())
            <div class="alert alert-danger mb-3" role="alert">
                <h5 class="alert-heading">Whoops! Error occured!</h5>
                <ol>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ol>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <h5 class="alert-heading">Berjaya!</h5>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="card mb-3">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-info">Go somewhere</a>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                Permohonan Peperiksaan Peningkatan Secara Lantikan Ke Penolong Pegawai Pembangunan Masyarakat Gred S29
            </div>
            <div class="card-body">
                <h5 class="card-title">ARAHAN</h5>
                <p class="card-text">Sila lengkapkan borang dengan jelas menggunakan huruf besar dan tandakan ruang
                    yang berkenaan.</p>
            </div>
        </div>

        <form id="form-application"
            action="{{ $application->exists ? route('application.update', $application) : route('application.store') }}"
            method="POST">
            @csrf
            @method($application->exists ? 'PUT' : 'POST')
            <div class="card">
                <div class="card-header">
                    {{ __('A. BUTIR-BUTIR DIRI') }}
                    {{ $newVariable }}
                </div>
                <div class="card-body">

                    <div class="mb-3 row">
                        <label class="col-2 col-form-label">@lang('Nama')</label>
                        <div class="col-4">
                            <input type="text" class="form-control" aria-describedby="name" name="name"
                                value="{{ old('name', $application->name) }}" placeholder="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label">@lang('No KP')</label>
                        <div class="col-4">
                            <input type="text" class="form-control" aria-describedby="name" name="icno"
                                value="{{ old('icno', $application->icno) }}" placeholder="">
                        </div>
                        <label class="col-2 col-form-label">@lang('Negeri Bertugas') </label>
                        <div class="col-4">
                            <select name="state" id="state" class="form-select">
                                <option value=""></option>
                                @forelse($options as $action_status)
                                    <option value="{{ $action_status->id }}" @selected($action_status->id == request()->input('grade'))>
                                        {{ $action_status->name }}
                                    </option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label">@lang('Gred')</label>
                        <div class="col-4">
                            <select name="grade" id="grade" class="form-select">
                                <option value=""></option>
                                @forelse($options as $action_status)
                                    <option value="{{ $action_status->id }}" @selected($action_status->id == request()->input('grade'))>
                                        {{ $action_status->name }}
                                    </option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <label class="col-2 col-form-label">@lang('Jawatan') </label>
                        <div class="col-4">
                            <select name="position" id="position" class="form-select">
                                <option value=""></option>
                                @forelse($options as $action_status)
                                    <option value="{{ $action_status->id }}" @selected($action_status->id == request()->input('grade'))>
                                        {{ $action_status->name }}
                                    </option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label">@lang('Tarikh Lantikan ke Skim sekarang')</label>
                        <div class="col-4">
                            <input type="date" class="form-control" id="appointed_date" name="appointed_date">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label">@lang('Emel')</label>
                        <div class="col-4">
                            <input type="email" class="form-control" aria-describedby="email" name="email"
                                value="{{ old('email') }}" placeholder="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label">@lang('Nama Ketua Jabatan')</label>
                        <div class="col-4">
                            <input type="text" class="form-control" aria-describedby="nama_ketua_jabatan"
                                name="nama_ketua_jabatan" value="{{ old('nama_ketua_jabatan') }}" placeholder="">
                        </div>
                        <label class="col-2 col-form-label">@lang('Email Ketua Jabatan')</label>
                        <div class="col-4">
                            <input type="email" class="form-control" aria-describedby="email_ketua_jabatan"
                                name="email_ketua_jabatan" value="{{ old('email_ketua_jabatan') }}" placeholder="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label">@lang('Kertas Peperiksaan')</label>
                        <div class="col-4">
                            <div class="form-selectgroup">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Bahagian I: Pentadbiran Dan Kerja Kemasyarakatan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                        checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Bahagian II: Penyediaan Laporan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    {{ __('B. MAKLUMAT PENGHANTARAN') }}
                </div>
                <div class="card-body">
                    Kepada: Ketua Pengarah<BR>
                    Kebajikan Masyarakat Malaysia<BR>
                    Aras 6, 9 - 18, No. 55 Persiaran Perdana,<BR>
                    Presint 4, 62100 Putrajaya<BR>
                    (u.p: Cawangan Latihan & Kompetensi)<BR>
                    No. Faks: 03-8323 2040<BR>
                    E-mel: latihan_kompetensi@jkm.gov.my
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-header d-flex justify-content-between">
                    {{ __('C. PENGAKUAN PEMOHON') }}
                    <div class="card-actions">
                        <div class="btn-list">
                            <button type="submit" form="form-application" class="btn btn-primary">Hantar</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    Saya mengaku bahawa:<BR>
                    i. Segala maklumat di atas adalah benar;<BR>
                    ii. Saya layak menduduki peperiksaan yang dipohon;<BR>
                    iii. Sekiranya kenyataan yang diberikan tidak benar atau borang permohonan
                    diterima selepas tarikh tutup yang telah ditetapkan, Urus Setia Peperiksaan
                    berhak menolak permohonan ini.
                </div>
        </form>
    </div>
@endsection
