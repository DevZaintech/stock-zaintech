<?php

namespace App\Http\Controllers;

use App\Models\Barcode;
use Illuminate\Http\Request;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;

class BarcodeController extends Controller
{
    // Tampilkan dashboard
    public function index()
    {
        $barcodes = Barcode::latest()->get();
        return view('dashboard', compact('barcodes'));
    }

    // Form buat barcode kosong
    public function create()
    {
        return view('content.barcode.create');
    }

    // Simpan barcode kosong
    public function store(Request $request)
    {
        $dateCode = now()->format('ymd');
        $unique = substr(uniqid(), -5);
        $code = "ST{$dateCode}{$unique}";

        Barcode::create(['code' => $code]);

        $result = Builder::create()
            ->writer(new PngWriter())
            ->data($code)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(ErrorCorrectionLevel::High) // ✅ enum yang bener
            ->size(300)
            ->margin(10)
            ->logoPath(public_path('logo/logo-z.png'))
            ->logoResizeToWidth(50)
            ->logoResizeToHeight(50)
            ->build();

        $qrPath = storage_path('app/public/qr_codes/' . $code . '.png');
        $result->saveToFile($qrPath);

        return view('content.barcode.qr', [
            'code' => $code,
            'qr_url' => asset('storage/qr_codes/' . $code . '.png'),
        ]);
    }

    // Form scan barcode
    public function scanForm()
    {
        return view('content.barcode.scan');
    }

    // Proses scan barcode
    public function processScan(Request $request)
    {
        $barcode = Barcode::where('code', $request->code)->first();

        if (!$barcode) {
            return response()->json(['status' => 'error', 'message' => 'QR Code tidak ditemukan']);
        }

        if (is_null($barcode->serial_number)) {
            return response()->json([
                'status' => 'empty',
                'barcode' => $barcode
            ]);
        } else {
            return response()->json([
                'status' => 'filled',
                'barcode' => $barcode
            ]);
        }
    }

    // Form isi data barcode
    public function edit($id)
    {
        $barcode = Barcode::findOrFail($id);
        return view('barcodes.edit', compact('barcode'));
    }

    // Simpan data barcode yang sudah di-scan
    public function update(Request $request)
    {
        $barcode = Barcode::where('code', $request->code)->firstOrFail();

        $barcode->serial_number = $request->serial_number;
        $barcode->machine_name = $request->machine_name;
        $barcode->sold_at = $request->sold_at;
        $barcode->id_user = auth()->id();
        $barcode->save();

        return redirect()->route('barcodes.scanForm')->with('success', 'Data berhasil disimpan!');
    }
}