<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Scan Barcode
        </h2>
    </x-slot>

    <div class="py-6 px-4">
        {{-- QR CODE SCANNER --}}
        <div id="reader" style="width:300px; margin-bottom: 20px;"></div>

        {{-- TAMPIL KODE SCAN --}}
        <div id="qr-result" class="text-green-600 font-mono mb-4"></div>

        {{-- FORM INPUT DATA JIKA BARCODE KOSONG --}}
        <div id="form-area" style="display:none;" class="mb-6">
            <h3 class="text-lg font-semibold mb-2">Input Data Barang</h3>
            <form method="POST" action="{{ route('barcodes.update') }}" class="space-y-4">
                @csrf
                {{-- HIDDEN CODE --}}
                <input type="hidden" name="code" id="code">

                <div>
                    <label class="block text-sm font-medium">Serial Number</label>
                    <input type="text" name="serial_number" required class="w-full border border-gray-300 rounded px-2 py-1">
                </div>

                <div>
                    <label class="block text-sm font-medium">Nama Mesin</label>
                    <input type="text" name="machine_name" required class="w-full border border-gray-300 rounded px-2 py-1">
                </div>

                <div>
                    <label class="block text-sm font-medium">Tanggal Terjual</label>
                    <input type="date" name="sold_at" required class="w-full border border-gray-300 rounded px-2 py-1">
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                    Simpan Data
                </button>
            </form>
        </div>

        {{-- TAMPIL DATA BARANG JIKA SUDAH ISI --}}
        <div id="show-data" style="display:none;">
            <h3 class="text-lg font-semibold mb-2">Detail Barcode</h3>
            <p><strong>Kode:</strong> <span id="show_code"></span></p>
            <p><strong>Serial Number:</strong> <span id="serial_number"></span></p>
            <p><strong>Nama Mesin:</strong> <span id="machine_name"></span></p>
            <p><strong>Tanggal Terjual:</strong> <span id="sold_at"></span></p>
        </div>
    </div>

    {{-- QR CODE LIBRARY --}}
    <script src="https://unpkg.com/html5-qrcode"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // TAMPILKAN CODE SCAN DI LAYAR
            document.getElementById('qr-result').innerText = "Code: " + decodedText;

            // AJAX CEK BARCODE
            fetch("{{ route('barcodes.processScan') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({code: decodedText})
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'error') {
                    alert(data.message);
                } else if (data.status === 'empty') {
                    // KOSONG ➜ TAMPILKAN FORM INPUT
                    document.getElementById('form-area').style.display = 'block';
                    document.getElementById('show-data').style.display = 'none';
                    document.getElementById('code').value = decodedText; // HIDDEN INPUT KEISI
                } else if (data.status === 'filled') {
                    // SUDAH ISI ➜ TAMPIL DETAIL
                    document.getElementById('form-area').style.display = 'none';
                    document.getElementById('show-data').style.display = 'block';
                    document.getElementById('show_code').innerText = decodedText;
                    document.getElementById('serial_number').innerText = data.barcode.serial_number;
                    document.getElementById('machine_name').innerText = data.barcode.machine_name;
                    document.getElementById('sold_at').innerText = data.barcode.sold_at;
                }
            });
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
</x-app-layout>