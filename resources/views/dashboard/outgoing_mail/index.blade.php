@extends('dashboard/master')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
    <a href="{{ route('surat-keluar.pdf') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Laporan</a>
</div>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Agenda Surat Keluar</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Surat</th>
                        <th>Tanggal Surat Dikeluarkan</th>
                        <th>Perihal</th>
                        <th>Tujuan Surat</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($outgoing_mail as $key => $mail)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $mail->mail_number }}</td>
                        <td>{{ $mail->mail_date }}</td>
                        <td>{{ $mail->mail_subject }}</td>
                        <td>{{ $mail->mail_to }}</td>
                        <td>{{ $mail->notes }}</td>
                        <td class="d-flex">
                            <!-- Edit Button -->
                            <a class="btn btn-sm btn-primary shadow-sm mr-2"
                                href="{{ route('surat-keluar.edit', $mail->id) }}">
                                <i class="fas fa-fw fa-edit fa-sm text-white-50"></i> Edit
                            </a>
                            <!-- Delete Button -->
                            <form action="{{ route('surat-keluar.destroy', $mail->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger shadow-sm"
                                    onclick="return confirm('Apakah anda yakin ingin menghapusnya?')">
                                    <i class="fas fa-fw fa-trash fa-sm text-white-50"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection