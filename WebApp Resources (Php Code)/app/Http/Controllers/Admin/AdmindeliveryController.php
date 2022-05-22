<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeliveryBoy;
use App\Models\Order;
class AdmindeliveryController extends Controller
{
    public function index()
    {
        // $delivery_boys = DeliveryBoy::all();
        $delivery_boys = DeliveryBoy::where('deleted',0)->get();

        $search_helper = 'rider';
        

        return view('admin.delivery',['delivery_boys' => $delivery_boys, 'search_helper'=>$search_helper]);
    }

    public function index_API()
    {
        
        if(auth()->user()->role !== 2)
        {
            return ['message' => 'Unauthorized'];
        }


        // $delivery_boys = DeliveryBoy::all();
        $delivery_boys = DeliveryBoy::where('deleted',0)->get();
        return \Response::json(['delivery_boys'=>$delivery_boys]);
    }

    public function Index_Deliveries()
    {
        $orders = Order::where('deleted',0)->get();

        $delivered = Order::where('delivery_status', 'delivered')->get();
        // $pending = Order::where('delivery_status', 'pending')->get();
        $pending = Order::where('delivery_status', 'initiated')->get();
        $cancelled = Order::where('delivery_status', 'cancelled')->get();
        // dd($cancelled);


        $search_helper = 'delivery';
        $from_where = 'deliveryComponent';
        return view('admin.deliveriesSection',['from_where'=>$from_where ,'orders'=>$orders,'delivered'=>$delivered, 'pending' => $pending, 'cancelled' =>$cancelled, 'search_helper'=>$search_helper]);
    }
    
    public function Index_Deliveries_API()
    {
        if(auth()->user()->role !== 2)
        {
            return ['message' => 'Unauthorized'];
        }

        
        $orders = Order::where('deleted',0)->get();

        $delivered = Order::where('delivery_status', 'delivered')->get();
        $pending = Order::where('delivery_status', 'pending')->get();
        $cancelled = Order::where('delivery_status', 'cancelled')->get();
        // dd($cancelled);
        // return view('admin.deliveriesSection',['orders'=>$orders,'delivered'=>$delivered, 'pending' => $pending, 'cancelled' =>$cancelled]);

        return \Response::json(['orders'=>$orders,'delivered'=>$delivered, 'pending' => $pending, 'cancelled' =>$cancelled]);

    }

    public function Delete_Rider($id)
    {
        // dd($id);
        $del = DeliveryBoy::find($id);
        $del->deleted = 1;
        $del->save();
        return back()->with("message_success", "Rider Deleted Successfully.");
    }

    public function Delete_Rider_API($id)
    {
        if(auth()->user()->role !== 2)
        {
            return ['message' => 'Unauthorized'];
        }


        $del = DeliveryBoy::find($id);
        $del->deleted = 1;
        $del->save();
        return \Response::json(['Success'=>'Deleted']);
    }

    public function API_FOR_IMAGE_IN_RIDER($id, Request $request)
    {
        // dd('hi');
        // dd($request->image);
        $del = DeliveryBoy::find($id);

         //for image
         $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
     
        // $request->image->move(public_path('images/product_images'), $imageName);
        $request->image->move(('images/delivery_boy_images'), $imageName);

        /* Store $imageName name in DATABASE from HERE */
        $del->image = $imageName ;

        $del->timestamps = false;
        $del->save();
        
        return 1;
    }

    public function Add_Rider_PAGE()
    {
        // dd('hi');

        $search_helper = 'rider';
        return view('admin.AddRider', ['search_helper'=>$search_helper]);
    }

    public function Update_Rider_PAGE($id)
    {
        $d = DeliveryBoy::find($id);

        $search_helper = 'rider';
        return view('admin.UpdateRider',['d'=>$d, 'search_helper'=>$search_helper]);
    }

    public function Add_Rider(Request $request)
    {
        if($request->name == NULL
        || $request->username  == NULL
        || $request->contact == NULL
        || $request->password == NULL
        || $request->area == NULL
        || $request->account == NULL
        // || $request->designation == NULL
        // || $request->date == NULL
        || $request->image == NULL )
        {
                // dd($request);
                dd('nullhere');
                // Session::flash('message', 'This is a message!'); 

                return back()
            ->with('message','Fill up the form completely.');
        }

        if( !is_numeric($request->contact) )
        {
            // dd('no');
            return back()
            ->with('message_salary','Contact must be numeric.');
        }



        $worker = new DeliveryBoy();
        $worker->name = $request->name;
        $worker->username = $request->username;
        $worker->contact = $request->contact;
        $worker->password = $request->password;
        $worker->Area_ID = $request->area;
        $worker->Account_ID = $request->account;

        // $worker->designation = $request->designation;
        // $worker->hire_date = $request->date;
        //for image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
     
        // $request->image->move(public_path('images/rider_images'), $imageName);
        $request->image->move(('images/delivery_boy_images'), $imageName);  
  
        /* Store $imageName name in DATABASE from HERE */
        $worker->image = $imageName ;

        $worker->save();
        $search_helper = 'rider';
        return back()->with("message_success", "Rider Added Successfully.",['search_helper'=> $search_helper]);
        // return back()
        // ->with('success','You have successfully upload image.');
        // ->with('image',$imageName); 
    }

    public function Add_Rider_API(Request $request)
    {

        
        if(auth()->user()->role !== 2)
        {
            return ['message' => 'Unauthorized'];
        }


        // dd('hi');
        // dd($request->image);
        // dd($request->request);

        if($request->name == NULL
        || $request->username  == NULL
        || $request->contact == NULL
        || $request->password == NULL
        || $request->area == NULL
        || $request->account == NULL
        // || $request->designation == NULL
        // || $request->date == NULL
        || $request->image == NULL )
        {
                // dd('nullhere');
                // Session::flash('message', 'This is a message!'); 
                // return 0;
                return \Response::json(['Error'=>'Enter All Fields']);
            // dd('something MISSED');

            //     return back()
            // ->with('message','Fill up the form completely.');
        }

        $worker = new DeliveryBoy();
        $worker->name = $request->name;
        $worker->username = $request->username;
        $worker->contact = $request->contact;
        $worker->password = $request->password;
        $worker->Area_ID = $request->area;
        $worker->Account_ID = $request->account;

         //for image
         $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
     
        // $request->image->move(public_path('images/product_images'), $imageName);
        $request->image->move(('images/delivery_boy_images'), $imageName);

        /* Store $imageName name in DATABASE from HERE */
        $worker->image = $imageName ;

        $worker->timestamps = false;
        $worker->save();
        // dd($product);
        return \Response::json(['Success'=>'Rider Added']);
        // return back()
        // ->with('message_success','Variant Successfuly Updated');
        // // dd('added');

    }

    public function update_rider_confirm(Request $request)
    {

        // $validated = $request->validate([
        //     // 'title' => 'required|unique:posts|max:255',
            
        //     'name' => 'required',
        //     'address' => 'required',
        //     'contact' => 'required',
        //     'postal' => 'required|numeric',
        //     'email' => 'required',
        //     'salary' => 'required|numeric',
        //     'designation' => 'required',
        //     'date' => 'required',
        //     // 'subcategory_id' => 'required',
        //     // 'image' => 'required',
        //     ]);
        // dd($request);

        if($request->name == NULL
        || $request->username  == NULL
        || $request->contact == NULL
        || $request->password == NULL
        || $request->area == NULL
        || $request->account == NULL
        // || $request->designation == NULL
        // || $request->date == NULL
        // || $request->image == NULL 
        )
        {
            dd($request);
                dd('nullhere');
                // Session::flash('message', 'This is a message!'); 

                return back()
            ->with('message','Fill up the form completely.');
        }

        if( !is_numeric($request->contact) )
        {
            // dd('no');
            return back()
            ->with('message_salary','Contact must be numeric.');
        }


        $worker = DeliveryBoy::find($request->id);
        // dd($cat);
        // $cat->name = $request->cat_name;
        $worker->name = $request->name;
        $worker->username = $request->username;
        $worker->contact = $request->contact;
        $worker->password = $request->password;
        $worker->Area_ID = $request->area;
        $worker->Account_ID = $request->account;

        
        if($request->image)
        {
            // dd('yes');
            //for image

            //deleting old image
            unlink("images/delivery_boy_images/".$worker->image);

            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        
            $imageName = time().'.'.$request->image->extension();  
        
            // $request->image->move(public_path('images/delivery_boy_images'), $imageName);
            $request->image->move(('images/delivery_boy_images'), $imageName);  
    
            /* Store $imageName name in DATABASE from HERE */
            $worker->image = $imageName ;
        }
        $worker->save();


        $search_helper = 'rider';
        return back()->with("message_success", "Rider Updated Successfully.",['search_helper'=>$search_helper]);
        // $worker->save();
        // return back()->with("success", "Updated Successfully.");
    }

    public function update_rider_confirm_API(Request $request, $id)
    {

        if(auth()->user()->role !== 2)
        {
            return ['message' => 'Unauthorized'];
        }


        $product = DeliveryBoy::find($id);
        if($product == NULL)
        {
            // return 0;
            return \Response::json(['error'=>'No such Rider with this ID']);
        }
        // dd($product);

        if($request->name )
        {
            $product->name  = $request->name;
        }

        if($request->username)
        {
            $product->username  = $request->username;
        }

        if($request->contact)
        {
            $product->contact  = $request->contact;
        }

        if($request->password)
        {
            $product->password  = $request->password;
        }


        
       
        
        
        
        

        if($request->area)
        {
            $product->Area_ID  = $request->area;
        }

        if($request->account)
        {
            $product->Account_ID  = $request->account;
        }

        // if($request->Expiry_date)
        // {
        //     $product->Expiry_date  = $request->Expiry_date;
        // }

        // if($request->Price)
        // {
        //     $product->Price  = $request->Price;
        // }

        // if($request->SideEffects)
        // {
        //     $product->SideEffects  = $request->SideEffects;
        // }

        // if($request->prescription_needed)
        // {
        //     $product->prescription_needed  = $request->prescription_needed;
        // }

        // if($request->name)
        // {
        //     $product->name  = $request->name;
        // }

        
        // dd($product);
        // $product->timestamps = false;
        // $product->save();

        
        
        // dd($request->product_id);
        

        

         //for image
        if($request->image)
        {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        
            $imageName = time().'.'.$request->image->extension();  
         
            // $request->image->move(public_path('images/product_images'), $imageName);
            $request->image->move(('images/delivery_boy_images'), $imageName);
    
            /* Store $imageName name in DATABASE from HERE */
            $product->image = $imageName ;
        }

        // $product->timestamps = false;
        // dd($product->name);
        $product->save();
        // dd($product);
        return \Response::json(['Success'=>'UPDATED']);
        // return $product;
        // return back()
        // ->with('message_success','Variant Successfuly Updated');
        // dd('updated');

    }
}
