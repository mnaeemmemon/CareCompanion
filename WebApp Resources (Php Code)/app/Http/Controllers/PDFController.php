<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Order;
use App\Models\OrderDetails;

class PDFController extends Controller
{

    public function pharmacy_invoice_get($id)
    {
        // dd($id);
        $order = Order::find($id);
        $data = [
            'order' => $order
        ];

        $pdf = PDF::loadView('pharmacy.pharmacy_invoice_export', $data);
    
        return $pdf->download('pharmacy-invoice.pdf');
    }

   

    public function pharmacy_invoice(Request $request)
    {
        // dd('hi');
        // dd($request);
        // $order = Order::find($id);
        // dd($order->order_details);

        $data = [
            // 'title' => 'Warehouse Invoice',
            // 'date' => date('m/d/Y'),
            // 'order_id' => $order->id,
            // 'firstname' => $order->first_name,
            // 'lastname' => $order->last_name,
            // 'details' => $order->order_details,
            // 'total' => $order->total,
            // 'order' => $order,

            'pharmacy_name' => $request->pharmacy_name,
            'patient_name' => $request->patient_name,
            'date' => $request->date,
            'status' => $request->status,
            'delboy_name' => $request->delboy_name,
            'no_of_products' => $request->no_of_products,
            'total_amount' => $request->total_amount,

            // 'date' => date('m/d/Y'),
            // 'order_id' => $order->id,
            // 'firstname' => $order->first_name,
            // 'lastname' => $order->last_name,
            // 'details' => $order->order_details,
            // 'total' => $order->total,
            // 'order' => $order,
        ];

        $pdf = PDF::loadView('pharmacy.pharmacy_invoice_export', $data);
    
        return $pdf->download('pharmacy-invoice.pdf');
    }
}
