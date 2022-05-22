<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pharmacy;


class AdminpharmacyController extends Controller
{
    public function index()
    {
        // $pharmacy = Pharmacy::all();
        $pharmacy = Pharmacy::where('deleted',0)->get();

        $search_helper = 'pharmacy';
        return view('admin.pharmacy',['pharmacy'=>$pharmacy, 'search_helper'=>$search_helper]);
    }

    public function index_API()
    {
        if(auth()->user()->role !== 2)
        {
            return ['message' => 'Unauthorized'];
        }

        // $pharmacy = Pharmacy::all();
        $pharmacy = Pharmacy::where('deleted',0)->get();
        return \Response::json(['pharmacy'=>$pharmacy]);
    }

    public function Add_Pharmacy_PAGE()
    {
        $search_helper = 'pharmacy';
        return view('admin.AddPharmacy',['search_helper'=>$search_helper]);
    }

    public function Update_Pharmacy_PAGE($id)
    {
        
        $pharmacy = Pharmacy::find($id);

        $search_helper = 'pharmacy';
        return view('admin.UpdatePharmacy',['p'=>$pharmacy, 'search_helper'=>$search_helper]);
    }

    public function Delete_Pharmacy($id)
    {
        $pharmacy = Pharmacy::find($id);
        $pharmacy->deleted = 1;
        $pharmacy->save();
        $search_helper = 'pharmacy';
        return back()->with("message_success", "Pharmacy Deleted Successfully.",['search_helper'=>$search_helper]);
    }

    public function Delete_Pharmacy_API($id)
    {
        if(auth()->user()->role !== 2)
        {
            return ['message' => 'Unauthorized'];
        }

        
        $pharmacy = Pharmacy::find($id);
        $pharmacy->deleted = 1;
        $pharmacy->save();
        return \Response::json(['Success'=>'Deleted']);
    }

    

    public function Add_Pharmacy(Request $request)
    {
        if($request->name == NULL
        || $request->address  == NULL
        || $request->contact == NULL
        || $request->city == NULL
        // || $request->area == NULL
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



        $worker = new Pharmacy();
        $worker->name = $request->name;
        $worker->address = $request->address;
        $worker->contact = $request->contact;
        $worker->city = $request->city;
        // $worker->Area_ID = $request->area;
        $worker->Account_ID = $request->account;

        // $worker->designation = $request->designation;
        // $worker->hire_date = $request->date;
        //for image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
     
        // $request->image->move(public_path('images/rider_images'), $imageName);
        $request->image->move(('images/pharmacy_images'), $imageName);  
  
        /* Store $imageName name in DATABASE from HERE */
        $worker->image = $imageName ;

        $worker->save();

        $search_helper = 'pharmacy';
        return back()->with("message_success", "Pharmacy Added Successfully.",['search_helper'=>$search_helper]);
        // return back()
        // ->with('success','You have successfully upload image.');
        // ->with('image',$imageName); 
    }

    public function Add_Pharmacy_API(Request $request)
    {

        if(auth()->user()->role !== 2)
        {
            return ['message' => 'Unauthorized'];
        }

        if($request->name == NULL
        || $request->address  == NULL
        || $request->contact == NULL
        || $request->city == NULL
        // || $request->area == NULL
        || $request->account == NULL
        // || $request->designation == NULL
        // || $request->date == NULL
        || $request->image == NULL )
        {
            return \Response::json(['Error'=>'Enter All Fields']);
        }

        if( !is_numeric($request->contact) )
        {
            // dd('no');
            return back()
            ->with('message_salary','Contact must be numeric.');
        }



        $worker = new Pharmacy();
        $worker->name = $request->name;
        $worker->address = $request->address;
        $worker->contact = $request->contact;
        $worker->city = $request->city;
        // $worker->Area_ID = $request->area;
        $worker->Account_ID = $request->account;

        // $worker->designation = $request->designation;
        // $worker->hire_date = $request->date;
        //for image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
     
        // $request->image->move(public_path('images/rider_images'), $imageName);
        $request->image->move(('images/pharmacy_images'), $imageName);  
  
        /* Store $imageName name in DATABASE from HERE */
        $worker->image = $imageName ;

        $worker->save();

        return \Response::json(['Success'=>'Pharmacy Added']);
        // return back()
        // ->with('success','You have successfully upload image.');
        // ->with('image',$imageName); 
    }

    public function Update_Pharmacy(Request $request)
    {
        if($request->name == NULL
        || $request->address  == NULL
        || $request->contact == NULL
        || $request->city == NULL
        || $request->account == NULL)
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


        $worker = Pharmacy::find($request->id);
        // dd($cat);
        // $cat->name = $request->cat_name;
        $worker->name = $request->name;
        $worker->address = $request->address;
        $worker->contact = $request->contact;
        $worker->city = $request->city;
        // $worker->Area_ID = $request->area;
        $worker->Account_ID = $request->account;

        
        if($request->image)
        {
            // dd('yes');
            //for image

            //deleting old image
            unlink("images/pharmacy_images/".$worker->image);

            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        
            $imageName = time().'.'.$request->image->extension();  
        
            // $request->image->move(public_path('images/pharmacy_images'), $imageName);
            $request->image->move(('images/pharmacy_images'), $imageName);  
    
            /* Store $imageName name in DATABASE from HERE */
            $worker->image = $imageName ;
        }
        $worker->save();

        $search_helper = 'pharmacy';
        return back()->with("message_success", "Pharmacy Updated Successfully.",['search_helper'=>$search_helper]);
    }

    public function Update_Pharmacy_API(Request $request, $id)
    {
        if(auth()->user()->role !== 2)
        {
            return ['message' => 'Unauthorized'];
        }


        // dd('hi');
        $product = Pharmacy::find($id);
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

        if($request->address)
        {
            $product->address  = $request->address;
        }

        if($request->contact)
        {
            $product->contact  = $request->contact;
        }

        if($request->city)
        {
            $product->city  = $request->city;
        }

        if($request->account)
        {
            $product->Account_ID  = $request->account;
        }
        

         //for image
        if($request->image)
        {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        
            $imageName = time().'.'.$request->image->extension();  
         
            // $request->image->move(public_path('images/product_images'), $imageName);
            $request->image->move(('images/pharmacy_images'), $imageName);
    
            /* Store $imageName name in DATABASE from HERE */
            $product->image = $imageName ;
        }

        $product->save();
        return \Response::json(['Success'=>'UPDATED']);
    }







    public function API_FOR_IMAGE_IN_PHARMACY($id, Request $request)
    {
        $del = Pharmacy::find($id);

         //for image
         $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
     
        // $request->image->move(public_path('images/product_images'), $imageName);
        $request->image->move(('images/pharmacy_images'), $imageName);

        /* Store $imageName name in DATABASE from HERE */
        $del->image = $imageName ;

        $del->timestamps = false;
        $del->save();
        
        return 1;
    }
}
