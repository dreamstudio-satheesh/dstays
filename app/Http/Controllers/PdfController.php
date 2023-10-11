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
       

        return $pdf->stream('voucher.pdf');
    }
}
