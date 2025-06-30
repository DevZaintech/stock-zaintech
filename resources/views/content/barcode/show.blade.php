<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Scan Barcode
        </h2>
    </x-slot>

    <div class="py-6 px-4">
        {{-- QR CODE SHOW --}}
        <div class="flex justify-center">
            <img src="{{ asset('storage/qr_codes/' . $barcode->code . '.png') }}" alt="QR Code">
        </div>

        {{-- PRINT QR CODE --}}
        <div class="flex justify-center">
            <a href="{{ route('barcode.print', $barcode->id) }}" target="_blank"
                class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 mt-4 mb-8">
                Cetak QR Code
            </a>
        </div>

        {{-- TAMPIL DATA BARANG JIKA SUDAH ISI --}}
        @if(is_null($barcode->serial_number))
        <div id="show-data">
            <h3 class="text-lg font-semibold mb-2">Detail Barcode</h3>
            <p><strong>Kode Barcode:</strong> <span id="show_code">{{$barcode->code}}</span></p>
            <p><strong>[Belum Ada Data]</strong></p>
        </div>
        @else
        <div id="show-data">
            <h3 class="text-lg font-semibold mb-2">Detail Barcode</h3>
            <p><strong>Kode Barcode:</strong> <span id="show_code">{{$barcode->code}}</span></p>
            <p><strong>Serial Number:</strong> <span id="serial_number">{{$barcode->serial_number}}</span></p>
            <p><strong>Nama Mesin:</strong> <span id="machine_name">{{$barcode->nama_mesin}}</span></p>
            <p><strong>Tanggal Terjual:</strong> <span id="sold_at">{{$barcode->tanggal_terjual}}</span></p>
        </div>
        @endif
    </div>

    {{-- QR CODE LIBRARY --}}
    
</x-app-layout>