<!DOCTYPE html>
<html>

<head>
    <title>Data Laporan Surat</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Data Laporan Surat Masuk</h2>

    <table>
        <thead>
            <tr>
                <th>Ditangani Oleh</th>
                <th>Jenis Surat</th>
                <th>Tanggal Surat Masuk</th>
                <th>Tanggal Surat Keluar</th>
                <th>Keterangan</th>
                <th>Perihal</th>
                <th>Status</th>
                <th>File</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $suratkeluar->no_surat }}</td>
                <td>{{ $suratkeluar->nama_surat }}</td>
                <td> {{ $suratkeluar->tgl_surat ? \Carbon\Carbon::parse($suratkeluar->tgl_surat)->translatedFormat('d F Y') : \Carbon\Carbon::parse($suratkeluar->tgl_dikirim)->translatedFormat('d F Y') }}
                </td>
                <td>{{ $suratkeluar->tgl_dikirim ? \Carbon\Carbon::parse($suratkeluar->tgl_dikirim)->translatedFormat('d F Y') : \Carbon\Carbon::parse($suratkeluar->tgl_surat)->translatedFormat('d F Y') }}
                </td>
                <td>{{ $suratkeluar->keterangan ?? '-' }}</td>
                <td>{{ $suratkeluar->perihal ?? '-' }}</td>
                <td>{{ $suratkeluar->status ?? '-' }}</td>
                <td class="py-3 px-4">
                    @if ($suratkeluar->file)
                        <a href="{{ asset('storage/' . $suratkeluar->file) }}" target="_blank" download
                            class="text-blue-500 underline hover:text-blue-700">
                            Unduh File
                        </a>
                    @else
                        <span class="text-gray-500 italic">Tidak ada file</span>
                    @endif
                </td>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
