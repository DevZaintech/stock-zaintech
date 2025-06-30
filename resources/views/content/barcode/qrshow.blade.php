<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-4 text-center">Detail Barang</h1>

        <div class="border rounded p-4 bg-gray-50">
            <div class="mb-2">
                <span class="font-semibold">Kode QR:</span>
                <span>{{ $barcode->code }}</span>
            </div>
            <div class="mb-2">
                <span class="font-semibold">Serial Number:</span>
                <span>{{ $barcode->serial_number ?? '-' }}</span>
            </div>
            <div class="mb-2">
                <span class="font-semibold">Nama Mesin:</span>
                <span>{{ $barcode->nama_mesin ?? '-' }}</span>
            </div>
            <div class="mb-2">
                <span class="font-semibold">Tanggal Terjual:</span>
                <span>{{ $barcode->tanggal_terjual ?? '-' }}</span>
            </div>
        </div>

        <div class="text-center mt-6">
            <a href="/" class="text-blue-600 hover:underline">← Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>