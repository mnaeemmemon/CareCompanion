<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\DeliveryBoy;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Pharmacist;
use App\Models\Pharmacy;
use App\Models\PharmacyInventory;
use App\Models\Product;
use App\Models\notification;
use App\Models\ProductType;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PharmacyHomeController extends Controller
{
    public function index(){

        // dd('h');
        // dd(Auth::guard('pharmacist')->user()->pharmacy_id);
        $pharmacy_id = Auth::guard('pharmacist')->user()->pharmacy_id;
        
        $orders = Order::where('pharmacy_id',$pharmacy_id)->get();
        // dd($orders);
        $number_of_orders = count($orders); //
        // dd($number_of_orders);

        $sum = 0;
        foreach($orders as $o)
        {
            $sum = $sum + $o->total;
        }
        // dd($sum);
        $total_sales = $sum;    //

        $medicine = Product::where('pharmacy_id',$pharmacy_id)->get();
        $medicine = count($medicine); //
        // dd($medicine);


        $chat = notification::where('receiver_type',1)->where('receiver_id',$pharmacy_id)->where('type_of_notification',3)->get();
        $count_chat = count($chat);
        // dd($count_chat);




        
        //NOTIFICATION
        // $notifications = notification::where('receiver_type',2)->get();
        $notifications = notification::where('receiver_type',1)->where('receiver_id',$pharmacy_id)->OrderBy('id','desc')->get();
        // $notifications = notification::where('receiver_type',2)->where('seen',0)->OrderBy('id','desc')->get();
        // dd($notifications);




        //BARCHART HANDLING
        $pharmacy_id = Auth::guard('pharmacist')->user();
        $acc_id = $pharmacy_id->pharmacy->id;
        // dd($acc_id);

        // $ProductID_Occurences = DB::table('orderdetails')
        // ->join('product','product.id','=','orderdetails.product_ID')
        // ->join('order','order.id','=','orderdetails.order_id')
        // ->where('order.pharmacy_id', '=', $acc_id)

        // ->get();
        // dd($ProductID_Occurences);

    
        // $date = Carbon::now()->subDays(30);
        // $ProductID_Occurences = DB::table('orderdetails')
        // ->join('product','product.id','=','orderdetails.product_ID')
        // ->join('order','order.id','=','orderdetails.order_id')
        // ->select('productType_ID', DB::raw('count(*) as total'))
        // ->groupBy('productType_ID')
        // ->where('created_date', '>=', $date)
        // ->where('order.pharmacy_id', '=', $acc_id)
        // ->inRandomOrder()->get();
        
        // dd($ProductID_Occurences);  




        $date = Carbon::now()->subDays(30);
        $ProductID_Occurences = DB::table('orderdetails')
        ->join('product','product.id','=','orderdetails.product_ID')
        ->join('order','order.id','=','orderdetails.order_id')
        ->select('productType_ID', DB::raw('count(*) as total'))
        ->groupBy('productType_ID')
        ->where('created_date', '>=', $date)
        ->where('order.pharmacy_id', '=', $acc_id)
        ->inRandomOrder()
        ->get();
        // dd($ProductID_Occurences);  




        $NUMBER_OF_PRODUCTTYPE_ORDERED = count($ProductID_Occurences);

        // dd($ProductID_Occurences[0]->productType_ID);
        // dd($NUMBER_OF_PRODUCTTYPE_ORDERED);

        echo "<script>";
        echo "var NUMBER_OF_PRODUCTTYPE_ORDERED = ". $NUMBER_OF_PRODUCTTYPE_ORDERED ." ;";
        echo "</script>";

        if($NUMBER_OF_PRODUCTTYPE_ORDERED == 1)
        {
            // dd('h');
            $label1 = ProductType::find($ProductID_Occurences[0]->productType_ID);
            // $label2 = ProductType::find($ProductID_Occurences[1]->productType_ID);
            // $label3 = ProductType::find($ProductID_Occurences[2]->productType_ID);
            // dd($label1->name);
            echo "<script>";

            echo "var NUMBER_OF_PRODUCTTYPE_ORDERED = ". $NUMBER_OF_PRODUCTTYPE_ORDERED ." ;";
            echo "var label1 = `". $label1->name ."` ;";
            // echo "var label2 = `". $label2->name ."` ;";
            // echo "var label3 = `". $label3->name ."` ;";
            // echo "alert('ho');";
            echo "var prod1 = ". $ProductID_Occurences[0]->total ." ;";
            // echo "var prod2 = ". $ProductID_Occurences[1]->total ." ;";
            // echo "var prod3 = ". $ProductID_Occurences[2]->total ." ;";

            echo "</script>";
        }

        if($NUMBER_OF_PRODUCTTYPE_ORDERED == 2)
        {
            // dd('h');
            $label1 = ProductType::find($ProductID_Occurences[0]->productType_ID);
            $label2 = ProductType::find($ProductID_Occurences[1]->productType_ID);
            // $label3 = ProductType::find($ProductID_Occurences[2]->productType_ID);
            // dd($label1->name);
            echo "<script>";

            echo "var NUMBER_OF_PRODUCTTYPE_ORDERED = ". $NUMBER_OF_PRODUCTTYPE_ORDERED ." ;";
            echo "var label1 = `". $label1->name ."` ;";
            echo "var label2 = `". $label2->name ."` ;";
            // echo "var label3 = `". $label3->name ."` ;";
            // echo "alert('ho');";
            echo "var prod1 = ". $ProductID_Occurences[0]->total ." ;";
            echo "var prod2 = ". $ProductID_Occurences[1]->total ." ;";
            // echo "var prod3 = ". $ProductID_Occurences[2]->total ." ;";

            echo "</script>";
        }
        if($NUMBER_OF_PRODUCTTYPE_ORDERED == 3)
        {
            // dd('h');
            $label1 = ProductType::find($ProductID_Occurences[0]->productType_ID);
            $label2 = ProductType::find($ProductID_Occurences[1]->productType_ID);
            $label3 = ProductType::find($ProductID_Occurences[2]->productType_ID);
            // dd($label1->name);
            echo "<script>";

            echo "var NUMBER_OF_PRODUCTTYPE_ORDERED = ". $NUMBER_OF_PRODUCTTYPE_ORDERED ." ;";
            echo "var label1 = `". $label1->name ."` ;";
            echo "var label2 = `". $label2->name ."` ;";
            echo "var label3 = `". $label3->name ."` ;";
            // echo "alert('ho');";
            echo "var prod1 = ". $ProductID_Occurences[0]->total ." ;";
            echo "var prod2 = ". $ProductID_Occurences[1]->total ." ;";
            echo "var prod3 = ". $ProductID_Occurences[2]->total ." ;";

            echo "</script>";
        }

        if($NUMBER_OF_PRODUCTTYPE_ORDERED == 4)
        {
            // dd('h');
            $label1 = ProductType::find($ProductID_Occurences[0]->productType_ID);
            $label2 = ProductType::find($ProductID_Occurences[1]->productType_ID);
            $label3 = ProductType::find($ProductID_Occurences[2]->productType_ID);
            $label4 = ProductType::find($ProductID_Occurences[3]->productType_ID);
            // $label5 = ProductType::find($ProductID_Occurences[4]->productType_ID);
            // $label6 = ProductType::find($ProductID_Occurences[5]->productType_ID);
            // dd($label1->name);
            echo "<script>";

            echo "var NUMBER_OF_PRODUCTTYPE_ORDERED = ". $NUMBER_OF_PRODUCTTYPE_ORDERED ." ;";
            echo "var label1 = `". $label1->name ."` ;";
            echo "var label2 = `". $label2->name ."` ;";
            echo "var label3 = `". $label3->name ."` ;";
            echo "var label4 = `". $label4->name ."` ;";
            // echo "var label5 = `". $label5->name ."` ;";
            // echo "var label6 = `". $label6->name ."` ;";
            // echo "alert('ho');";
            echo "var prod1 = ". $ProductID_Occurences[0]->total ." ;";
            echo "var prod2 = ". $ProductID_Occurences[1]->total ." ;";
            echo "var prod3 = ". $ProductID_Occurences[2]->total ." ;";
            echo "var prod4 = ". $ProductID_Occurences[3]->total ." ;";
            // echo "var prod3 = ". $ProductID_Occurences[4]->total ." ;";
            // echo "var prod3 = ". $ProductID_Occurences[5]->total ." ;";

            echo "</script>";
        }

        if($NUMBER_OF_PRODUCTTYPE_ORDERED == 5)
        {
            // dd('h');
            $label1 = ProductType::find($ProductID_Occurences[0]->productType_ID);
            $label2 = ProductType::find($ProductID_Occurences[1]->productType_ID);
            $label3 = ProductType::find($ProductID_Occurences[2]->productType_ID);
            $label4 = ProductType::find($ProductID_Occurences[3]->productType_ID);
            $label5 = ProductType::find($ProductID_Occurences[4]->productType_ID);
            // $label6 = ProductType::find($ProductID_Occurences[5]->productType_ID);
            // dd($label1->name);
            echo "<script>";

            echo "var NUMBER_OF_PRODUCTTYPE_ORDERED = ". $NUMBER_OF_PRODUCTTYPE_ORDERED ." ;";
            echo "var label1 = `". $label1->name ."` ;";
            echo "var label2 = `". $label2->name ."` ;";
            echo "var label3 = `". $label3->name ."` ;";
            echo "var label4 = `". $label4->name ."` ;";
            echo "var label5 = `". $label5->name ."` ;";
            // echo "var label6 = `". $label6->name ."` ;";
            // echo "alert('ho');";
            echo "var prod1 = ". $ProductID_Occurences[0]->total ." ;";
            echo "var prod2 = ". $ProductID_Occurences[1]->total ." ;";
            echo "var prod3 = ". $ProductID_Occurences[2]->total ." ;";
            echo "var prod4 = ". $ProductID_Occurences[3]->total ." ;";
            echo "var prod5 = ". $ProductID_Occurences[4]->total ." ;";
            // echo "var prod6 = ". $ProductID_Occurences[5]->total ." ;";

            echo "</script>";
        }

        
        if($NUMBER_OF_PRODUCTTYPE_ORDERED == 6)
        {
            // dd('h');
            $label1 = ProductType::find($ProductID_Occurences[0]->productType_ID);
            $label2 = ProductType::find($ProductID_Occurences[1]->productType_ID);
            $label3 = ProductType::find($ProductID_Occurences[2]->productType_ID);
            $label4 = ProductType::find($ProductID_Occurences[3]->productType_ID);
            $label5 = ProductType::find($ProductID_Occurences[4]->productType_ID);
            $label6 = ProductType::find($ProductID_Occurences[5]->productType_ID);
            // dd($label1->name);
            echo "<script>";

            echo "var NUMBER_OF_PRODUCTTYPE_ORDERED = ". $NUMBER_OF_PRODUCTTYPE_ORDERED ." ;";
            echo "var label1 = `". $label1->name ."` ;";
            echo "var label2 = `". $label2->name ."` ;";
            echo "var label3 = `". $label3->name ."` ;";
            echo "var label4 = `". $label4->name ."` ;";
            echo "var label5 = `". $label5->name ."` ;";
            echo "var label6 = `". $label6->name ."` ;";
            // echo "alert('ho');";
            echo "var prod1 = ". $ProductID_Occurences[0]->total ." ;";
            echo "var prod2 = ". $ProductID_Occurences[1]->total ." ;";
            echo "var prod3 = ". $ProductID_Occurences[2]->total ." ;";
            echo "var prod4 = ". $ProductID_Occurences[3]->total ." ;";
            echo "var prod5 = ". $ProductID_Occurences[4]->total ." ;";
            echo "var prod6 = ". $ProductID_Occurences[5]->total ." ;";

            echo "</script>";
        }

        if($NUMBER_OF_PRODUCTTYPE_ORDERED == 7)
        {
            // dd('h');
            $label1 = ProductType::find($ProductID_Occurences[0]->productType_ID);
            $label2 = ProductType::find($ProductID_Occurences[1]->productType_ID);
            $label3 = ProductType::find($ProductID_Occurences[2]->productType_ID);
            $label4 = ProductType::find($ProductID_Occurences[3]->productType_ID);
            $label5 = ProductType::find($ProductID_Occurences[4]->productType_ID);
            $label6 = ProductType::find($ProductID_Occurences[5]->productType_ID);
            $label7 = ProductType::find($ProductID_Occurences[6]->productType_ID);
            // $label8 = ProductType::find($ProductID_Occurences[7]->productType_ID);
            // $label9 = ProductType::find($ProductID_Occurences[8]->productType_ID);
            // $label10 = ProductType::find($ProductID_Occurences[9]->productType_ID);
            // dd($label1->name);
            echo "<script>";

            echo "var NUMBER_OF_PRODUCTTYPE_ORDERED = ". $NUMBER_OF_PRODUCTTYPE_ORDERED ." ;";
            echo "var label1 = `". $label1->name ."` ;";
            echo "var label2 = `". $label2->name ."` ;";
            echo "var label3 = `". $label3->name ."` ;";
            echo "var label4 = `". $label4->name ."` ;";
            echo "var label5 = `". $label5->name ."` ;";
            echo "var label6 = `". $label6->name ."` ;";
            echo "var label7 = `". $label7->name ."` ;";
            // echo "var label8 = `". $label8->name ."` ;";
            // echo "var label9 = `". $label9->name ."` ;";
            // echo "var label10 = `". $label10->name ."` ;";
            // echo "alert('ho');";
            echo "var prod1 = ". $ProductID_Occurences[0]->total ." ;";
            echo "var prod2 = ". $ProductID_Occurences[1]->total ." ;";
            echo "var prod3 = ". $ProductID_Occurences[2]->total ." ;";
            echo "var prod4 = ". $ProductID_Occurences[3]->total ." ;";
            echo "var prod5 = ". $ProductID_Occurences[4]->total ." ;";
            echo "var prod6 = ". $ProductID_Occurences[5]->total ." ;";
            echo "var prod7 = ". $ProductID_Occurences[6]->total ." ;";
            // echo "var prod8 = ". $ProductID_Occurences[7]->total ." ;";
            // echo "var prod9 = ". $ProductID_Occurences[8]->total ." ;";
            // echo "var prod10 = ". $ProductID_Occurences[9]->total ." ;";

            echo "</script>";
        }

        if($NUMBER_OF_PRODUCTTYPE_ORDERED == 8)
        {
            // dd('h');
            $label1 = ProductType::find($ProductID_Occurences[0]->productType_ID);
            $label2 = ProductType::find($ProductID_Occurences[1]->productType_ID);
            $label3 = ProductType::find($ProductID_Occurences[2]->productType_ID);
            $label4 = ProductType::find($ProductID_Occurences[3]->productType_ID);
            $label5 = ProductType::find($ProductID_Occurences[4]->productType_ID);
            $label6 = ProductType::find($ProductID_Occurences[5]->productType_ID);
            $label7 = ProductType::find($ProductID_Occurences[6]->productType_ID);
            $label8 = ProductType::find($ProductID_Occurences[7]->productType_ID);
            // $label9 = ProductType::find($ProductID_Occurences[8]->productType_ID);
            // $label10 = ProductType::find($ProductID_Occurences[9]->productType_ID);
            // dd($label1->name);
            echo "<script>";

            echo "var NUMBER_OF_PRODUCTTYPE_ORDERED = ". $NUMBER_OF_PRODUCTTYPE_ORDERED ." ;";
            echo "var label1 = `". $label1->name ."` ;";
            echo "var label2 = `". $label2->name ."` ;";
            echo "var label3 = `". $label3->name ."` ;";
            echo "var label4 = `". $label4->name ."` ;";
            echo "var label5 = `". $label5->name ."` ;";
            echo "var label6 = `". $label6->name ."` ;";
            echo "var label7 = `". $label7->name ."` ;";
            echo "var label8 = `". $label8->name ."` ;";
            // echo "var label9 = `". $label9->name ."` ;";
            // echo "var label10 = `". $label10->name ."` ;";
            // echo "alert('ho');";
            echo "var prod1 = ". $ProductID_Occurences[0]->total ." ;";
            echo "var prod2 = ". $ProductID_Occurences[1]->total ." ;";
            echo "var prod3 = ". $ProductID_Occurences[2]->total ." ;";
            echo "var prod4 = ". $ProductID_Occurences[3]->total ." ;";
            echo "var prod5 = ". $ProductID_Occurences[4]->total ." ;";
            echo "var prod6 = ". $ProductID_Occurences[5]->total ." ;";
            echo "var prod7 = ". $ProductID_Occurences[6]->total ." ;";
            echo "var prod8 = ". $ProductID_Occurences[7]->total ." ;";
            // echo "var prod9 = ". $ProductID_Occurences[8]->total ." ;";
            // echo "var prod10 = ". $ProductID_Occurences[9]->total ." ;";

            echo "</script>";
        }


        if($NUMBER_OF_PRODUCTTYPE_ORDERED == 9)
        {
            // dd('h');
            $label1 = ProductType::find($ProductID_Occurences[0]->productType_ID);
            $label2 = ProductType::find($ProductID_Occurences[1]->productType_ID);
            $label3 = ProductType::find($ProductID_Occurences[2]->productType_ID);
            $label4 = ProductType::find($ProductID_Occurences[3]->productType_ID);
            $label5 = ProductType::find($ProductID_Occurences[4]->productType_ID);
            $label6 = ProductType::find($ProductID_Occurences[5]->productType_ID);
            $label7 = ProductType::find($ProductID_Occurences[6]->productType_ID);
            $label8 = ProductType::find($ProductID_Occurences[7]->productType_ID);
            $label9 = ProductType::find($ProductID_Occurences[8]->productType_ID);
            // $label10 = ProductType::find($ProductID_Occurences[9]->productType_ID);
            // dd($label1->name);
            echo "<script>";

            echo "var NUMBER_OF_PRODUCTTYPE_ORDERED = ". $NUMBER_OF_PRODUCTTYPE_ORDERED ." ;";
            echo "var label1 = `". $label1->name ."` ;";
            echo "var label2 = `". $label2->name ."` ;";
            echo "var label3 = `". $label3->name ."` ;";
            echo "var label4 = `". $label4->name ."` ;";
            echo "var label5 = `". $label5->name ."` ;";
            echo "var label6 = `". $label6->name ."` ;";
            echo "var label7 = `". $label7->name ."` ;";
            echo "var label8 = `". $label8->name ."` ;";
            echo "var label9 = `". $label9->name ."` ;";
            // echo "var label10 = `". $label10->name ."` ;";
            // echo "alert('ho');";
            echo "var prod1 = ". $ProductID_Occurences[0]->total ." ;";
            echo "var prod2 = ". $ProductID_Occurences[1]->total ." ;";
            echo "var prod3 = ". $ProductID_Occurences[2]->total ." ;";
            echo "var prod4 = ". $ProductID_Occurences[3]->total ." ;";
            echo "var prod5 = ". $ProductID_Occurences[4]->total ." ;";
            echo "var prod6 = ". $ProductID_Occurences[5]->total ." ;";
            echo "var prod7 = ". $ProductID_Occurences[6]->total ." ;";
            echo "var prod8 = ". $ProductID_Occurences[7]->total ." ;";
            echo "var prod9 = ". $ProductID_Occurences[8]->total ." ;";
            // echo "var prod10 = ". $ProductID_Occurences[9]->total ." ;";

            echo "</script>";
        }



        if($NUMBER_OF_PRODUCTTYPE_ORDERED == 10)
        {
            // dd('h');
            $label1 = ProductType::find($ProductID_Occurences[0]->productType_ID);
            $label2 = ProductType::find($ProductID_Occurences[1]->productType_ID);
            $label3 = ProductType::find($ProductID_Occurences[2]->productType_ID);
            $label4 = ProductType::find($ProductID_Occurences[3]->productType_ID);
            $label5 = ProductType::find($ProductID_Occurences[4]->productType_ID);
            $label6 = ProductType::find($ProductID_Occurences[5]->productType_ID);
            $label7 = ProductType::find($ProductID_Occurences[6]->productType_ID);
            $label8 = ProductType::find($ProductID_Occurences[7]->productType_ID);
            $label9 = ProductType::find($ProductID_Occurences[8]->productType_ID);
            $label10 = ProductType::find($ProductID_Occurences[9]->productType_ID);
            // dd($label1->name);
            echo "<script>";

            echo "var NUMBER_OF_PRODUCTTYPE_ORDERED = ". $NUMBER_OF_PRODUCTTYPE_ORDERED ." ;";
            echo "var label1 = `". $label1->name ."` ;";
            echo "var label2 = `". $label2->name ."` ;";
            echo "var label3 = `". $label3->name ."` ;";
            echo "var label4 = `". $label4->name ."` ;";
            echo "var label5 = `". $label5->name ."` ;";
            echo "var label6 = `". $label6->name ."` ;";
            echo "var label7 = `". $label7->name ."` ;";
            echo "var label8 = `". $label8->name ."` ;";
            echo "var label9 = `". $label9->name ."` ;";
            echo "var label10 = `". $label10->name ."` ;";
            // echo "alert('ho');";
            echo "var prod1 = ". $ProductID_Occurences[0]->total ." ;";
            echo "var prod2 = ". $ProductID_Occurences[1]->total ." ;";
            echo "var prod3 = ". $ProductID_Occurences[2]->total ." ;";
            echo "var prod4 = ". $ProductID_Occurences[3]->total ." ;";
            echo "var prod5 = ". $ProductID_Occurences[4]->total ." ;";
            echo "var prod6 = ". $ProductID_Occurences[5]->total ." ;";
            echo "var prod7 = ". $ProductID_Occurences[6]->total ." ;";
            echo "var prod8 = ". $ProductID_Occurences[7]->total ." ;";
            echo "var prod9 = ". $ProductID_Occurences[8]->total ." ;";
            echo "var prod10 = ". $ProductID_Occurences[9]->total ." ;";

            echo "</script>";
        }

        if($NUMBER_OF_PRODUCTTYPE_ORDERED > 10)
        {
            // dd('h');
            $label1 = ProductType::find($ProductID_Occurences[0]->productType_ID);
            $label2 = ProductType::find($ProductID_Occurences[1]->productType_ID);
            $label3 = ProductType::find($ProductID_Occurences[2]->productType_ID);
            $label4 = ProductType::find($ProductID_Occurences[3]->productType_ID);
            $label5 = ProductType::find($ProductID_Occurences[4]->productType_ID);
            $label6 = ProductType::find($ProductID_Occurences[5]->productType_ID);
            $label7 = ProductType::find($ProductID_Occurences[6]->productType_ID);
            $label8 = ProductType::find($ProductID_Occurences[7]->productType_ID);
            $label9 = ProductType::find($ProductID_Occurences[8]->productType_ID);
            $label10 = ProductType::find($ProductID_Occurences[9]->productType_ID);
            // dd($label1->name);
            echo "<script>";

            echo "var NUMBER_OF_PRODUCTTYPE_ORDERED = ". $NUMBER_OF_PRODUCTTYPE_ORDERED ." ;";
            echo "var label1 = `". $label1->name ."` ;";
            echo "var label2 = `". $label2->name ."` ;";
            echo "var label3 = `". $label3->name ."` ;";
            echo "var label4 = `". $label4->name ."` ;";
            echo "var label5 = `". $label5->name ."` ;";
            echo "var label6 = `". $label6->name ."` ;";
            echo "var label7 = `". $label7->name ."` ;";
            echo "var label8 = `". $label8->name ."` ;";
            echo "var label9 = `". $label9->name ."` ;";
            echo "var label10 = `". $label10->name ."` ;";
            // echo "alert('ho');";
            echo "var prod1 = ". $ProductID_Occurences[0]->total ." ;";
            echo "var prod2 = ". $ProductID_Occurences[1]->total ." ;";
            echo "var prod3 = ". $ProductID_Occurences[2]->total ." ;";
            echo "var prod4 = ". $ProductID_Occurences[3]->total ." ;";
            echo "var prod5 = ". $ProductID_Occurences[4]->total ." ;";
            echo "var prod6 = ". $ProductID_Occurences[5]->total ." ;";
            echo "var prod7 = ". $ProductID_Occurences[6]->total ." ;";
            echo "var prod8 = ". $ProductID_Occurences[7]->total ." ;";
            echo "var prod9 = ". $ProductID_Occurences[8]->total ." ;";
            echo "var prod10 = ". $ProductID_Occurences[9]->total ." ;";

            echo "</script>";
        }



        // SALES GRAPH

        // dd($acc_id);

        $array[] = 0;
        for($i = 6; $i >= 0; $i--)
        {
            $date = Carbon::now()->subDays($i+1); //older date
            $date1 = Carbon::now()->subDays($i); // newer date 
            // dd($date1);
            // $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
            // $records = Order::whereBetween('placed_date', [$date, $date1])->where('pharmacy_id',$acc_id)->get();

            $records = Order::whereBetween('placed_date', [$date, $date1])->get();


            $records = Order::whereBetween('placed_date', [$date, $date1])->where('pharmacy_id',$pharmacy_id->pharmacy_id)->get();
            // dd($records);
            // dd($pharmacy_id->pharmacy_id);
            $c = count($records);
            // Only count those that are delivered.
            for($j =0 ; $j < $c; $j++)
            {
                // dd($records[$j]->order->status);
                if($records[$j]->status !== 'delivered' )
                {
                    // dd('not');
                    unset($records[$j]);
                }
                
            }
            //SUM THE TOTAL SALE
            $sale = 0;
            foreach($records as $r)
            {
                $sale = $sale + $r->total;
            }
            // dd($sale);
            $array[] = $sale;
            // dd($day7);
        }
        // dd($records);
        // dd($array);

        echo "<script>";

        echo "var NUMBER_OF_PRODUCTTYPE_ORDERED = ". $NUMBER_OF_PRODUCTTYPE_ORDERED ." ;";
        echo "var day1 = ". $array[1] ." ;";
        echo "var day2 = ". $array[2] ." ;";
        echo "var day3 = ". $array[3] ." ;";
        echo "var day4 = ". $array[4] ." ;";
        echo "var day5 = ". $array[5] ." ;";
        echo "var day6 = ". $array[6] ." ;";
        echo "var day7 = ". $array[7] ." ;";
        echo "</script>";




        $prev_week_array[] = 0; // index 0 would be a waste as init. by 0;
        for($i = 13; $i >= 7; $i--)
        {
            $date = Carbon::now()->subDays($i+1); //older date
            $date1 = Carbon::now()->subDays($i); // newer date 
            // $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
            $records = Order::whereBetween('placed_date', [$date, $date1])->where('pharmacy_id',$pharmacy_id->pharmacy_id)->get();
            // dd($records);
            $c = count($records);
            // Only count those that are delivered.
            for($j =0 ; $j < $c; $j++)
            {
                // dd($records[$j]->order->status);
                if($records[$j]->status !== 'delivered' )
                {
                    // dd('not');
                    unset($records[$j]);
                }
            }
            //SUM THE TOTAL SALE
            $sale = 0;
            foreach($records as $r)
            {
                $sale = $sale + $r->total;
            }
            // dd($sale);
            $prev_week_array[] = $sale;
            // dd($day7);
        }
        // dd($prev_week_array);

        echo "<script>";

        echo "var NUMBER_OF_PRODUCTTYPE_ORDERED = ". $NUMBER_OF_PRODUCTTYPE_ORDERED ." ;";
        echo "var prev_day1 = ". $prev_week_array[1] ." ;";
        echo "var prev_day2 = ". $prev_week_array[2] ." ;";
        echo "var prev_day3 = ". $prev_week_array[3] ." ;";
        echo "var prev_day4 = ". $prev_week_array[4] ." ;";
        echo "var prev_day5 = ". $prev_week_array[5] ." ;";
        echo "var prev_day6 = ". $prev_week_array[6] ." ;";
        echo "var prev_day7 = ". $prev_week_array[7] ." ;";
        echo "</script>";









        $search_helper = 'home';
    
        return view('pharmacy.home',['orders'=>$number_of_orders, 'sales'=>$total_sales, 
        'medicine'=>$medicine, 'count_chat'=>$count_chat, 'nots'=>$notifications ,'search_helper'=>$search_helper]);

        // return view('pharmacy.home');
    }
}
