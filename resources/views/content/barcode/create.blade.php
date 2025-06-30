<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Buat Barcode Kosong
        </h2>
    </x-slot>

    <div class="py-6 px-4 max-w-md mx-auto">
        <div class="bg-white p-6 rounded shadow text-center">
            <p class="mb-4">
                Tekan tombol di bawah untuk membuat barcode kosong.
            </p>

            <form action="{{ route('barcodes.store') }}" method="POST">
                @csrf
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Buat Barcode
                </button>
            </form>
        </div>
    </div>
</x-app-layout>