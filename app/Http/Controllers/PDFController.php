<?php

namespace App\Http\Controllers;

// use Barryvdh\DomPDF\PDF;

use App\Models\Vehicule;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
          
        $pdf = PDF::loadView ('myPDF');
    
        return $pdf->download('Attestation.pdf');
    }
}
