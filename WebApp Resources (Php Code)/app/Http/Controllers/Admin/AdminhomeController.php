<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
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

class AdminhomeController extends Controller
{
    public function index(){

        // echo "<script>";
        // echo "var ok = 100";
        // echo "</script>";

        //HEADER INFO
        // dd('hi');
        $orders = Order::all();
        $number_of_orders = count($orders); //
        // dd($number_of_orders);
        $sum = 0;
        foreach($orders as $o)
        {
            $sum = $sum + $o->total;
        }
        // dd($sum);
        $total_sales = $sum;    //

        $pharmacy = Pharmacist::all();
        $number_of_Pharmacy = count($pharmacy); //
        // dd($number_of_Pharmacy);

        $del_boys = DeliveryBoy::all();
        $number_of_del_boys = count($del_boys); //
        // dd($number_of_del_boys);

        //NOTIFICATION
        // $notifications = notification::where('receiver_type',2)->get();
        $notifications = notification::where('receiver_type',2)->OrderBy('id','desc')->get();
        // $notifications = notification::where('receiver_type',2)->where('seen',0)->OrderBy('id','desc')->get();
        // dd($notifications);


    

        //BARCHART LOGIC:

        // $NUMBER_OF_PRODUCTTYPE_ORDERED = OrderDetails::select('*')
        // ->join('product','product.id','=','orderdetails.product_ID')->
        // groupBy('productType_ID')->count(); // NUMBER OF PRODUCTTYPE THAT WERE ORDERED.
        // dd($NUMBER_OF_PRODUCTTYPE_ORDERED);


        // $orderDetails = OrderDetails::select('*')
        // ->join('product','product.id','=','orderdetails.product_ID')->
        // groupBy('productType_ID')->count();
        // ->join('product','product.id','=','orderdetails.product_ID')
        // ->get();
        // dd($orderDetails);

        // $date = Carbon::now()->subDays(30);
        // 

        $date = Carbon::now()->subDays(30);
        $ProductID_Occurences = DB::table('orderdetails')
        ->join('product','product.id','=','orderdetails.product_ID')
        ->select('productType_ID', DB::raw('count(*) as total'))
        ->groupBy('productType_ID')
        ->where('created_date', '>=', $date)
        ->inRandomOrder()
        ->get();
        // dd($ProductID_Occurences);  

        $NUMBER_OF_PRODUCTTYPE_ORDERED = count($ProductID_Occurences);

        // dd($ProductID_Occurences[0]->productType_ID);


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


        //Sales STAT GRAPH

        $previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last sunday midnight",$previous_week);
        $end_week = strtotime("next saturday",$start_week);
        $start_week = date("Y-m-d",$start_week);
        $end_week = date("Y-m-d",$end_week);

        // $from = date('2022-03-13');
        // $to = date('2022-03-19');

        // $from = date('2022-03-13');
        // $to = date('2022-03-19');
        
        $previous_week_records  = OrderDetails::whereBetween('created_date', [$start_week, $end_week])->get();
        // dd($previous_week_records);


        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');

        // $meds  = OrderDetails::whereBetween('created_date', [$from, $to])->get();
        $date = Carbon::now()->subDays(7);
        $this_week_records  = OrderDetails::whereBetween('created_date', [$start_week, $end_week])->get();
        // $this_week_records  = OrderDetails::where('created_date', '>=', $date)->get();
        // dd($this_week_records);


        // dd(Carbon::now()->subDays(2));

        $date = Carbon::now()->subDays(2); //older date
        $date1 = Carbon::now()->subDays(1); // newer date
        // $records = OrderDetails::where('created_date','==',$date)->get();
        $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
        // dd($records);

        // dd(Carbon::now()->subDays(0)->format('D'));

        // if(Carbon::now()->subDays(0)->format('D') == 'Fri')
        // {
        //     // dd('Fri');
        //     $this_week = 5;
        //     // dd($this_week);
        //     for($i = 0; $i < $this_week; $i++)
        //     {
        //         // dd($i);
        //         // dd(Carbon::now()->subDays(5)->format('D'));
        //         if($i == 0) //MONDAY HANDLING
        //         {
        //             $date = Carbon::now()->subDays(5); //older date
        //             $date1 = Carbon::now()->subDays(4); // newer date 
        //             $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
        //             // dd($records);
        //             $c = count($records);
        //             for($j =0 ; $j < $c; $j++)
        //             {
        //                 // dd($records[$j]->order->status);
        //                 if($records[$j]->order->status !== 'delivered' )
        //                 {
        //                     // dd('not');
        //                     unset($records[$j]);
        //                 }
        //                 // dd('yes');
        //                 // dd($records[$j]);
        //                 // unset($records[$j]);

        //             }
        //             // dd($records);

        //             //SUM THE TOTAL SALE
        //             $total_monday_sale = 0;
        //             foreach($records as $r)
        //             {
        //                 $total_monday_sale = $total_monday_sale + $r->order->total;
        //             }
        //             // dd($total_monday_sale);

        //             $mon = $total_monday_sale;
        //         }

        //         if($i == 1) //TUESDAY HANDLING
        //         {   
        //             $date = Carbon::now()->subDays(4); //older date
        //             $date1 = Carbon::now()->subDays(3); // newer date 
        //             $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
        //             // dd($records);
        //             $c = count($records);
        //             for($j =0 ; $j < $c; $j++)
        //             {
        //                 // dd($records[$j]->order->status);
        //                 if($records[$j]->order->status !== 'delivered' )
        //                 {
        //                     // dd('not');
        //                     unset($records[$j]);
        //                 }
        //                 // dd('yes');
        //                 // dd($records[$j]);
        //                 // unset($records[$j]);

        //             }
        //             // dd($records);

        //             //SUM THE TOTAL SALE
        //             $total_tue_sale = 0;
        //             foreach($records as $r)
        //             {
        //                 $total_tue_sale = $total_tue_sale + $r->order->total;
        //             }
        //             // dd($total_tue_sale);

        //             $tue = $total_tue_sale;
        //         }

        //         if($i == 3) //Wednesday HANDLING
        //         {   
        //             $date = Carbon::now()->subDays(3); //older date
        //             $date1 = Carbon::now()->subDays(2); // newer date 
        //             $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
        //             // dd($records);
        //             $c = count($records);
        //             for($j =0 ; $j < $c; $j++)
        //             {
        //                 // dd($records[$j]->order->status);
        //                 if($records[$j]->order->status !== 'delivered' )
        //                 {
        //                     // dd('not');
        //                     unset($records[$j]);
        //                 }
        //                 // dd('yes');
        //                 // dd($records[$j]);
        //                 // unset($records[$j]);

        //             }
        //             // dd($records);

        //             //SUM THE TOTAL SALE
        //             $total_wed_sale = 0;
        //             foreach($records as $r)
        //             {
        //                 $total_wed_sale = $total_wed_sale + $r->order->total;
        //             }
        //             // dd($total_wed_sale);

        //             $wed = $total_wed_sale;
        //         }

        //         if($i == 3) //Thursday HANDLING
        //         {   
        //             $date = Carbon::now()->subDays(2); //older date
        //             $date1 = Carbon::now()->subDays(1); // newer date 
        //             $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
        //             // dd($records);
        //             $c = count($records);
        //             for($j =0 ; $j < $c; $j++)
        //             {
        //                 // dd($records[$j]->order->status);
        //                 if($records[$j]->order->status !== 'delivered' )
        //                 {
        //                     // dd('not');
        //                     unset($records[$j]);
        //                 }
        //                 // dd('yes');
        //                 // dd($records[$j]);
        //                 // unset($records[$j]);

        //             }
        //             // dd($records);

        //             //SUM THE TOTAL SALE
        //             $total_thu_sale = 0;
        //             foreach($records as $r)
        //             {
        //                 $total_thu_sale = $total_thu_sale + $r->order->total;
        //             }
        //             // dd($total_thu_sale);

        //             $thu = $total_thu_sale;
        //         }

        //         if($i == 4) //Friday HANDLING
        //         {   
        //             $date = Carbon::now()->subDays(1); //older date
        //             $date1 = Carbon::now()->subDays(0); // newer date 
        //             $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
        //             // dd($records);
        //             $c = count($records);
        //             for($j =0 ; $j < $c; $j++)
        //             {
        //                 // dd($records[$j]->order->status);
        //                 if($records[$j]->order->status !== 'delivered' )
        //                 {
        //                     // dd('not');
        //                     unset($records[$j]);
        //                 }
        //                 // dd('yes');
        //                 // dd($records[$j]);
        //                 // unset($records[$j]);

        //             }
        //             // dd($records);

        //             //SUM THE TOTAL SALE
        //             $total_fri_sale = 0;
        //             foreach($records as $r)
        //             {
        //                 $total_fri_sale = $total_fri_sale + $r->order->total;
        //             }
        //             // dd($total_fri_sale);

        //             $tue = $total_fri_sale;
        //         }

        //     }

        // }

        // // dd(Carbon::now()->subDays(1)->format('D'));
        // if(Carbon::now()->subDays(0)->format('D') == 'Thu')
        // {
        //     // dd('Fri');
        //     $this_week = 4;
        //     // dd($this_week);
        //     for($i = 0; $i < $this_week; $i++)
        //     {
        //         // dd($i);
        //         // dd(Carbon::now()->subDays(5)->format('D'));
        //         if($i == 0) //MONDAY HANDLING
        //         {
        //             $date = Carbon::now()->subDays(4); //older date
        //             $date1 = Carbon::now()->subDays(3); // newer date 
        //             $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
        //             // dd($records);
        //             $c = count($records);
        //             for($j =0 ; $j < $c; $j++)
        //             {
        //                 // dd($records[$j]->order->status);
        //                 if($records[$j]->order->status !== 'delivered' )
        //                 {
        //                     // dd('not');
        //                     unset($records[$j]);
        //                 }
        //                 // dd('yes');
        //                 // dd($records[$j]);
        //                 // unset($records[$j]);

        //             }
        //             // dd($records);

        //             //SUM THE TOTAL SALE
        //             $total_monday_sale = 0;
        //             foreach($records as $r)
        //             {
        //                 $total_monday_sale = $total_monday_sale + $r->order->total;
        //             }
        //             // dd($total_monday_sale);

        //             $mon = $total_monday_sale;
        //         }

        //         if($i == 1) //TUESDAY HANDLING
        //         {   
        //             $date = Carbon::now()->subDays(3); //older date
        //             $date1 = Carbon::now()->subDays(2); // newer date 
        //             $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
        //             // dd($records);
        //             $c = count($records);
        //             for($j =0 ; $j < $c; $j++)
        //             {
        //                 // dd($records[$j]->order->status);
        //                 if($records[$j]->order->status !== 'delivered' )
        //                 {
        //                     // dd('not');
        //                     unset($records[$j]);
        //                 }
        //                 // dd('yes');
        //                 // dd($records[$j]);
        //                 // unset($records[$j]);

        //             }
        //             // dd($records);

        //             //SUM THE TOTAL SALE
        //             $total_tue_sale = 0;
        //             foreach($records as $r)
        //             {
        //                 $total_tue_sale = $total_tue_sale + $r->order->total;
        //             }
        //             // dd($total_tue_sale);

        //             $tue = $total_tue_sale;
        //         }

        //         if($i == 2) //Wednesday HANDLING
        //         {   
        //             $date = Carbon::now()->subDays(2); //older date
        //             $date1 = Carbon::now()->subDays(1); // newer date 
        //             $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
        //             // dd($records);
        //             $c = count($records);
        //             for($j =0 ; $j < $c; $j++)
        //             {
        //                 // dd($records[$j]->order->status);
        //                 if($records[$j]->order->status !== 'delivered' )
        //                 {
        //                     // dd('not');
        //                     unset($records[$j]);
        //                 }
        //                 // dd('yes');
        //                 // dd($records[$j]);
        //                 // unset($records[$j]);

        //             }
        //             // dd($records);

        //             //SUM THE TOTAL SALE
        //             $total_wed_sale = 0;
        //             foreach($records as $r)
        //             {
        //                 $total_wed_sale = $total_wed_sale + $r->order->total;
        //             }
        //             // dd($total_wed_sale);

        //             $wed = $total_wed_sale;
        //         }

        //         if($i == 3) //Thursday HANDLING
        //         {   
        //             $date = Carbon::now()->subDays(1); //older date
        //             $date1 = Carbon::now()->subDays(0); // newer date 
        //             $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
        //             // dd($records);
        //             $c = count($records);
        //             for($j =0 ; $j < $c; $j++)
        //             {
        //                 // dd($records[$j]->order->status);
        //                 if($records[$j]->order->status !== 'delivered' )
        //                 {
        //                     // dd('not');
        //                     unset($records[$j]);
        //                 }
        //                 // dd('yes');
        //                 // dd($records[$j]);
        //                 // unset($records[$j]);

        //             }
        //             // dd($records);

        //             //SUM THE TOTAL SALE
        //             $total_thu_sale = 0;
        //             foreach($records as $r)
        //             {
        //                 $total_thu_sale = $total_thu_sale + $r->order->total;
        //             }
        //             // dd($total_thu_sale);

        //             $thu = $total_thu_sale;
        //         }

        //     }

        // }

        // // dd(Carbon::now()->subDays(1)->format('D'));
        // if(Carbon::now()->subDays(0)->format('D') == 'Wed')
        // {
        //     // dd('Fri');
        //     $this_week = 3;
        //     // dd($this_week);
        //     for($i = 0; $i < $this_week; $i++)
        //     {
        //         // dd($i);
        //         // dd(Carbon::now()->subDays(5)->format('D'));
        //         if($i == 0) //MONDAY HANDLING
        //         {
        //             $date = Carbon::now()->subDays(3); //older date
        //             $date1 = Carbon::now()->subDays(2); // newer date 
        //             $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
        //             // dd($records);
        //             $c = count($records);
        //             for($j =0 ; $j < $c; $j++)
        //             {
        //                 // dd($records[$j]->order->status);
        //                 if($records[$j]->order->status !== 'delivered' )
        //                 {
        //                     // dd('not');
        //                     unset($records[$j]);
        //                 }
        //                 // dd('yes');
        //                 // dd($records[$j]);
        //                 // unset($records[$j]);

        //             }
        //             // dd($records);

        //             //SUM THE TOTAL SALE
        //             $total_monday_sale = 0;
        //             foreach($records as $r)
        //             {
        //                 $total_monday_sale = $total_monday_sale + $r->order->total;
        //             }
        //             // dd($total_monday_sale);

        //             $mon = $total_monday_sale;
        //         }

        //         if($i == 1) //TUESDAY HANDLING
        //         {   
        //             $date = Carbon::now()->subDays(3); //older date
        //             $date1 = Carbon::now()->subDays(2); // newer date 
        //             $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
        //             // dd($records);
        //             $c = count($records);
        //             for($j =0 ; $j < $c; $j++)
        //             {
        //                 // dd($records[$j]->order->status);
        //                 if($records[$j]->order->status !== 'delivered' )
        //                 {
        //                     // dd('not');
        //                     unset($records[$j]);
        //                 }
        //                 // dd('yes');
        //                 // dd($records[$j]);
        //                 // unset($records[$j]);

        //             }
        //             // dd($records);

        //             //SUM THE TOTAL SALE
        //             $total_tue_sale = 0;
        //             foreach($records as $r)
        //             {
        //                 $total_tue_sale = $total_tue_sale + $r->order->total;
        //             }
        //             // dd($total_tue_sale);

        //             $tue = $total_tue_sale;
        //         }

        //         if($i == 2) //Wednesday HANDLING
        //         {   
        //             $date = Carbon::now()->subDays(2); //older date
        //             $date1 = Carbon::now()->subDays(1); // newer date 
        //             $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
        //             // dd($records);
        //             $c = count($records);
        //             for($j =0 ; $j < $c; $j++)
        //             {
        //                 // dd($records[$j]->order->status);
        //                 if($records[$j]->order->status !== 'delivered' )
        //                 {
        //                     // dd('not');
        //                     unset($records[$j]);
        //                 }
        //                 // dd('yes');
        //                 // dd($records[$j]);
        //                 // unset($records[$j]);

        //             }
        //             // dd($records);

        //             //SUM THE TOTAL SALE
        //             $total_wed_sale = 0;
        //             foreach($records as $r)
        //             {
        //                 $total_wed_sale = $total_wed_sale + $r->order->total;
        //             }
        //             // dd($total_wed_sale);

        //             $wed = $total_wed_sale;
        //         }

        //     }

        // }



        $array[] = 0;
        for($i = 6; $i >= 0; $i--)
        {
            $date = Carbon::now()->subDays($i+1); //older date
            $date1 = Carbon::now()->subDays($i); // newer date 
            // $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
            $records = Order::whereBetween('placed_date', [$date, $date1])->get();
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
            $array[] = $sale;
            // dd($day7);
        }
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
            $records = Order::whereBetween('placed_date', [$date, $date1])->get();
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



        // $array[] = 0;
        // for($i = 6; $i > 0; $i--)
        // {
        //     $date = Carbon::now()->subDays($i+1); //older date
        //     $date1 = Carbon::now()->subDays($i); // newer date 
        //     $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
        //     // $records = Order::whereBetween('placed_date', [$date, $date1])->get();
        //     // dd($records);
        //     $c = count($records);
        //     // Only count those that are delivered.
        //     for($j =0 ; $j < $c; $j++)
        //     {
        //         // dd($records[$j]->order->status);
        //         if($records[$j]->order->status !== 'delivered' )
        //         {
        //             // dd('not');
        //             unset($records[$j]);
        //         }
        //     }
        //     //SUM THE TOTAL SALE
        //     $sale = 0;
        //     foreach($records as $r)
        //     {
        //         $sale = $sale + $r->order->total;
        //     }
        //     // dd($sale);
        //     $array[] = $sale;
        //     // dd($day7);
        // }
        // dd($array);


        // echo "<script>";

        // echo "var NUMBER_OF_PRODUCTTYPE_ORDERED = ". $NUMBER_OF_PRODUCTTYPE_ORDERED ." ;";
        // echo "var day1 = ". $array[0] ." ;";
        // echo "var day2 = ". $array[1] ." ;";
        // echo "var day3 = ". $array[2] ." ;";
        // echo "var day4 = ". $array[3] ." ;";
        // echo "var day5 = ". $array[4] ." ;";
        // echo "var day6 = ". $array[5] ." ;";
        // echo "var day7 = ". $array[6] ." ;";
        // echo "</script>";




            // $array[] = 0;
            // for($i = 0; $i < 7; $i++)
            // {
            //     $date = Carbon::now()->subDays($i+1); //older date
            //     $date1 = Carbon::now()->subDays($i); // newer date 
            //     $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
            //     // dd($records);
            //     $c = count($records);
            //     // Only count those that are delivered.
            //     for($j =0 ; $j < $c; $j++)
            //     {
            //         // dd($records[$j]->order->status);
            //         if($records[$j]->order->status !== 'delivered' )
            //         {
            //             // dd('not');
            //             unset($records[$j]);
            //         }
            //     }
            //     //SUM THE TOTAL SALE
            //     $sale = 0;
            //     foreach($records as $r)
            //     {
            //         $sale = $sale + $r->order->total;
            //     }
            //     // dd($sale);
            //     $array[] = $sale;
            //     // dd($day7);
            // }
            // dd($array);



        // //day 7
        // $date = Carbon::now()->subDays(1); //older date
        // $date1 = Carbon::now()->subDays(0); // newer date 
        // $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
        // // dd($records);
        // $c = count($records);
        // //Only count those that are delivered.
        // for($j =0 ; $j < $c; $j++)
        // {
        //     // dd($records[$j]->order->status);
        //     if($records[$j]->order->status !== 'delivered' )
        //     {
        //         // dd('not');
        //         unset($records[$j]);
        //     }
        // }
        // //SUM THE TOTAL SALE
        // $sale = 0;
        // foreach($records as $r)
        // {
        //     $sale = $sale + $r->order->total;
        // }
        // // dd($sale);
        // $day7 = $sale;
        // // dd($day7);



        // //DAY 6
        // $date = Carbon::now()->subDays(2); //older date
        // $date1 = Carbon::now()->subDays(1); // newer date 
        // $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
        // // dd($records);
        // $c = count($records);
        // //Only count those that are delivered.
        // for($j =0 ; $j < $c; $j++)
        // {
        //     // dd($records[$j]->order->status);
        //     if($records[$j]->order->status !== 'delivered' )
        //     {
        //         // dd('not');
        //         unset($records[$j]);
        //     }
        // }
        // //SUM THE TOTAL SALE
        // $sale = 0;
        // foreach($records as $r)
        // {
        //     $sale = $sale + $r->order->total;
        // }
        // // dd($sale);
        // $day6 = $sale;



        // //DAY 5
        // $date = Carbon::now()->subDays(3); //older date
        // $date1 = Carbon::now()->subDays(2); // newer date 
        // $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
        // // dd($records);
        // $c = count($records);
        // //Only count those that are delivered.
        // for($j =0 ; $j < $c; $j++)
        // {
        //     // dd($records[$j]->order->status);
        //     if($records[$j]->order->status !== 'delivered' )
        //     {
        //         // dd('not');
        //         unset($records[$j]);
        //     }
        // }
        // //SUM THE TOTAL SALE
        // $sale = 0;
        // foreach($records as $r)
        // {
        //     $sale = $sale + $r->order->total;
        // }
        // // dd($sale);
        // $day5 = $sale;

        // //DAY 4
        // $date = Carbon::now()->subDays(4); //older date
        // $date1 = Carbon::now()->subDays(3); // newer date 
        // $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
        // // dd($records);
        // $c = count($records);
        // //Only count those that are delivered.
        // for($j =0 ; $j < $c; $j++)
        // {
        //     // dd($records[$j]->order->status);
        //     if($records[$j]->order->status !== 'delivered' )
        //     {
        //         // dd('not');
        //         unset($records[$j]);
        //     }
        // }
        // //SUM THE TOTAL SALE
        // $sale = 0;
        // foreach($records as $r)
        // {
        //     $sale = $sale + $r->order->total;
        // }
        // // dd($sale);
        // $day4 = $sale;

        //  //DAY 3
        //  $date = Carbon::now()->subDays(5); //older date
        //  $date1 = Carbon::now()->subDays(4); // newer date 
        //  $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
        // //  dd($records);
        //  $c = count($records);
        //  //Only count those that are delivered.
        //  for($j =0 ; $j < $c; $j++)
        //  {
        //      // dd($records[$j]->order->status);
        //      if($records[$j]->order->status !== 'delivered' )
        //      {
        //          // dd('not');
        //          unset($records[$j]);
        //      }
        //  }
        //  //SUM THE TOTAL SALE
        //  $sale = 0;
        //  foreach($records as $r)
        //  {
        //      $sale = $sale + $r->order->total;
        //  }
        // //  dd($sale);
        //  $day3 = $sale;

        //  //DAY 2
        //  $date = Carbon::now()->subDays(6); //older date
        //  $date1 = Carbon::now()->subDays(5); // newer date 
        //  $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
        //  //  dd($records);
        //  $c = count($records);
        //  //Only count those that are delivered.
        //  for($j =0 ; $j < $c; $j++)
        //  {
        //      // dd($records[$j]->order->status);
        //      if($records[$j]->order->status !== 'delivered' )
        //      {
        //          // dd('not');
        //          unset($records[$j]);
        //      }
        //  }
        //  //SUM THE TOTAL SALE
        //  $sale = 0;
        //  foreach($records as $r)
        //  {
        //      $sale = $sale + $r->order->total;
        //  }
        // //   dd($sale);
        //  $day2 = $sale;
 

        //  //DAY 1
        //  $date = Carbon::now()->subDays(7); //older date
        //  $date1 = Carbon::now()->subDays(6); // newer date 
        //  $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
        //  //  dd($records);
        //  $c = count($records);
        //  //Only count those that are delivered.
        //  for($j =0 ; $j < $c; $j++)
        //  {
        //      // dd($records[$j]->order->status);
        //      if($records[$j]->order->status !== 'delivered' )
        //      {
        //          // dd('not');
        //          unset($records[$j]);
        //      }
        //  }
        //  //SUM THE TOTAL SALE
        //  $sale = 0;
        //  foreach($records as $r)
        //  {
        //      $sale = $sale + $r->order->total;
        //  }
        // // dd($sale);
        //  $day1 = $sale;


        //  echo "<script>";

        //  echo "var NUMBER_OF_PRODUCTTYPE_ORDERED = ". $NUMBER_OF_PRODUCTTYPE_ORDERED ." ;";
        //  echo "var day1 =  ". $day1 ." ;";
        //  echo "var day2 =  ". $day2 ." ;";
        //  echo "var day3 =  ". $day3 ." ;";
        //  echo "var day4 =  ". $day4 ." ;";
        //  echo "var day5 =  ". $day5 ." ;";
        //  echo "var day6 =  ". $day6 ." ;";
        //  echo "var day7 =  ". $day7 ." ;";
        //  // echo "alert('ho');";

        //  echo "</script>";





        // if(Carbon::now()->subDays(3)->format('D') == 'Tue')
        // {
        //     // dd('Tuesday');
        //     $this_week = 2;
        //     // dd($this_week);
        //     for($i = 0; $i < $this_week; $i++)
        //     {
        //         // dd($i);
        //         // dd(Carbon::now()->subDays(4)->format('D'));
        //         if($i == 0) //MONDAY HANDLING
        //         {
        //             $date = Carbon::now()->subDays(5); //older date //sunday
        //             $date1 = Carbon::now()->subDays(4); // newer date //monday
        //             $records = OrderDetails::whereBetween('created_date', [$date, $date1])->get();
        //             // dd($records);
        //             $c = count($records);
        //             for($j =0 ; $j < $c; $j++)
        //             {
        //                 // dd($records[$j]->order->status);
        //                 if($records[$j]->order->status !== 'delivered' )
        //                 {
        //                     // dd('not');
        //                     unset($records[$j]);
        //                 }
        //                 // dd('yes');
        //                 // dd($records[$j]);
        //                 // unset($records[$j]);

        //             }
        //             // dd($records);

        //             //SUM THE TOTAL SALE
        //             $total_monday_sale = 0;
        //             foreach($records as $r)
        //             {
        //                 $total_monday_sale = $total_monday_sale + $r->order->total;
        //             }
        //             // dd($total_monday_sale);

        //             $mon = $total_monday_sale;
        //         }
        //         if($i == 1)
        //         {   
        //             $tue = 20;
        //         }
        //     }

        // }
        
// 
        // dd('no');


        // $records  = OrderDetails::whereBetween('created_date', [$start_week, $end_week])->get();
        // $records  = OrderDetails::where('created_date', '>=', Carbon::now() )->get();
        // dd($records);


        // $year = 2020;
        // $month = 12;
        // $daysCount = Carbon::createFromDate($year, $month, 1)->daysInMonth;
        // $salesData = OrderDetails::selectRaw("COUNT(*) as count, DATE_FORMAT(created_date, '%Y %m %e') as created_date")
        // ->whereBetween('created_date', [Carbon::createFromDate($year, $month, 1), Carbon::createFromDate($year, $month, $daysCount)])
        // ->groupBy('created_date')
        // ->get();

        // $salesData = OrderDetails::groupBy('created_date')->get();


        // dd($salesData);

        $search_helper = 'home';


        return view('admin.home',['orders'=>$number_of_orders, 'sales'=>$total_sales, 
        'pharmacy'=>$number_of_Pharmacy,'delboys'=>$number_of_del_boys, 'nots'=>$notifications ,'search_helper'=>$search_helper]);
    }
}
