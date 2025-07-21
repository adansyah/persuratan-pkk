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
    <h2>Data Laporan Surat Masuk & Surat Keluar</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Ditangani Oleh</th>
                <th>Jenis Surat</th>
                <th>Tanggal Surat Masuk</th>
                <th>Tanggal Surat Keluar</th>
                <th>Keterangan</th>
                <th>File</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->jenis_surat }}</td>
                    <td> {{ $item->tgl_surat_masuk ? \Carbon\Carbon::parse($item->tgl_surat_masuk)->translatedFormat('d F Y') : \Carbon\Carbon::parse($item->tgl_surat_keluar)->translatedFormat('d F Y') }}
                    </td>
                    <td>{{ $item->tgl_surat_keluar ? \Carbon\Carbon::parse($item->tgl_surat_keluar)->translatedFormat('d F Y') : \Carbon\Carbon::parse($item->tgl_surat_masuk)->translatedFormat('d F Y') }}
                    </td>
                    <td>{{ $item->keterangan ?? '-' }}</td>
                    <td class="py-3 px-4">
                        @if ($item->file)
                            <a href="{{ asset('storage/' . $item->file) }}" target="_blank" download
                                class="text-blue-500 underline hover:text-blue-700">
                                Unduh File
                            </a>
                        @else
                            <span class="text-gray-500 italic">Tidak ada file</span>
                        @endif
                    </td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
