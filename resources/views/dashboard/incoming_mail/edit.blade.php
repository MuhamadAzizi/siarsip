@extends('dashboard/master')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
</div>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Surat Masuk</h6>
    </div>
    <form action="{{ route('surat-masuk.update', $incoming_mail->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="exampleFormControlInput1">Tanggal Surat Diterima</label>
                    <input class="form-control small @error('date_received') is-invalid @enderror"
                        id="exampleFormControlInput1" type="date" name="date_received"
                        value="{{ $incoming_mail->date_received }}">

                    @error('date_received')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-6 mb-3">
                    <label for="exampleFormControlInput2">Tanggal Surat</label>
                    <input class="form-control small @error('mail_date') is-invalid @enderror"
                        id="exampleFormControlInput2" type="date" name="mail_date"
                        value="{{ $incoming_mail->mail_date }}">

                    @error('mail_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="exampleFormControlInput3">Nomor Surat</label>
                    <input class="form-control small @error('mail_number') is-invalid @enderror"
                        id="exampleFormControlInput3" type="text" name="mail_number"
                        value="{{ $incoming_mail->mail_number }}">

                    @error('mail_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-6 mb-3">
                    <label for="exampleFormControlInput4">Keterangan <small><em>(Opsional)</em></small></label>
                    <input class="form-control small" id="exampleFormControlInput4" type="text" name="notes"
                        value="{{ $incoming_mail->notes }}">
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="exampleFormControlInput5">Asal Surat</label>
                    <input class="form-control small @error('mail_from') is-invalid @enderror"
                        id="exampleFormControlInput5" type="text" name="mail_from"
                        value="{{ $incoming_mail->mail_from }}">

                    @error('mail_from')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-0">
                    <label for="exampleFormControlTextarea6">Perihal</label>
                    <textarea class="form-control small @error('mail_subject') is-invalid @enderror"
                        id="exampleFormControlTextarea6" rows="3"
                        name="mail_subject">{{ $incoming_mail->mail_subject }}</textarea>

                    @error('mail_subject')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-12 mb-0 text-right">
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-sm shadow-sm">
                        <i class="fas fa-fw fa-save fa-sm text-white-50"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection