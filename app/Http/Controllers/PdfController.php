<?php

namespace App\Http\Controllers;

use App\Models\PlacingOrder;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generatePdf()
    {
        $placingOrders = placingOrder::get();
        $data = [
            'title'=> 'Test',
            'date' => date('m/d/y'),
            'placingOrder' => $placingOrders
        ];


        $pdf = Pdf::loadView('placingOrder.show', $data);
        return $pdf->download('invoice.pdf');
    }
}
