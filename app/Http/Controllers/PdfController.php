<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generateVoucher(Booking $booking)
    {
        $data = [
            'booking' => $booking,
        ];

        $pdf = PDF::loadView('pdf.voucher', $data);
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed'=> TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );

        return $pdf->stream('voucher.pdf');
    }
}
