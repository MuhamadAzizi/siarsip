<html>

<head>
    <title>SIARSIP - Dinas Kesehatan Kabupaten Serang</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <h1>Laporan Surat Keluar</h1>
        <p>Dinas Pendidikan Kabupaten Serang</p>
        <br>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No. Surat</th>
                    <th>Tanggal Surat Dikeluarkan</th>
                    <th>Perihal</th>
                    <th>Tujuan Surat</th>
                    <th>Keterangan</th>
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
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <br>
        <br>
        <br>

        <div class="text-right">
            <div class="d-inline-flex text-center">
                <span>Kepala Bagian</span>
                <br>
                <br>
                <br>
                <span>________________</span>
            </div>
        </div>
    </div>
</body>

</html>