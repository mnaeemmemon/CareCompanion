<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Support\Facades\Auth;

class PharmacyAddMedicineController extends Controller
{

    public function index(){
        $types = ProductType::all();
        // $search_helper = 'products';
         $search_helper = 'products';
        return view('pharmacy.addmedicine',['types'=>$types,'search_helper'=>$search_helper]);
    }

    public function category_list_API()
    {
        if(auth()->user()->role !== 1)
        {
            return ['message' => 'Unauthorized'];
        }

        $categories = ProductType::all();
        return \Response::json(['categories' => $categories]);
    }

    public function category_by_id_API($id)
    {
        if(auth()->user()->role !== 1)
        {
            return ['message' => 'Unauthorized'];
        }

        $cat = ProductType::find($id);
        return \Response::json(['category' => $cat]);
    }
    

    public function update_category(Request $request)
    {
        // dd($request->id);
        $cat = ProductType::find($request->id);
        $cat->name = $request->name;
        $cat->save();
         $search_helper = 'category';
        return back()
        ->with('message_success','Variant Successfuly Updated',['search_helper'=>$search_helper]);
    }

    public function update_category_API(Request $request, $id)
    {
        if(auth()->user()->role !== 1)
        {
            return ['message' => 'Unauthorized'];
        }

        // dd($request->id);
        $cat = ProductType::find($request->id);
        $cat->name = $request->name;
        $cat->save();

        return \Response::json(['category' => $cat]);
    }

    

    public function category_update_PAGE($id)
    {
        $cat = ProductType::find($id);
        $search_helper = 'category';
        return view('pharmacy.UpdateCategory',['cat'=>$cat,'search_helper'=>$search_helper]);
    }

    public function delete_category($id)
    {
        // dd($id);
        $cat = ProductType::find($id);
        $cat->deleted = 1;
        $cat->save();
        return back()
        ->with('message_success','Variant Successfuly Updated');
    }

    public function delete_category_API($id)
    {
        if(auth()->user()->role !== 1)
        {
            return ['message' => 'Unauthorized'];
        }

        $cat = ProductType::find($id);
        $cat->deleted = 1;
        $cat->save();
        return \Response::json(['success' => 'DELETED']);
    }

    public function category_list()
    {
        // $cats = ProductType::all();
        $cats = ProductType::where('deleted',0)->get();
         $search_helper = 'category';
        return view('pharmacy.category_list',['cats'=>$cats,'search_helper'=>$search_helper]);
    }


    public function Add_cat(Request $request)
    {
        if(auth()->user()->role !== 1)
        {
            return ['message' => 'Unauthorized'];
        }

        // dd($request->name);
        $cat = new ProductType();
        $cat->name = $request->name;
        $cat->save();
        // dd('hi');

        return \Response::json(['success' => 'ADDED']);
    }

    public function add_product(Request $request)
    {
        // dd($request->image);
        // dd($request->request);
        $pharmacy = Auth::guard('pharmacist')->user();
        $pharmacy_id = $pharmacy->pharmacy_id;


        if($request->name == NULL
        || $request->productType_ID  == NULL
        || $request->gram == NULL
        || $request->Manufacture == NULL
        || $request->Formula == NULL
        || $request->Manufacturing_date == NULL
        || $request->Expiry_date == NULL
        || $request->Price == NULL
        || $request->quantity == NULL
        || $request->SideEffects == NULL
        // || $request->image == NULL
        || $request->prescription_needed == NULL )
        {
                // dd('nullhere');
                // Session::flash('message', 'This is a message!'); 
            dd('something MISSED');
                return back()
            ->with('message','Fill up the form completely.');
        }

        $product = New Product();
        $product->name  = $request->name;
        $product->productType_ID  = $request->productType_ID;
        $product->gram  = $request->gram;
        $product->quantity  = $request->quantity;
        // dd($request->product_id);
        $product->Manufacture  = $request->Manufacture;

        $product->Formula  = $request->Formula;
        $product->Manufacturing_date  = $request->Manufacturing_date;
        $product->Expiry_date  = $request->Expiry_date;
        $product->Price  = $request->Price;
        $product->SideEffects  = $request->SideEffects;
        $product->prescription_needed  = $request->prescription_needed;
        $product->pharmacy_id = $pharmacy_id;
        // $product->Manufacture  = $request->Manufacture;
        // dd($product->product_id);
         //for image
         $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
     
        // $request->image->move(public_path('images/product_images'), $imageName);
        $request->image->move(('images/product_images'), $imageName);

        /* Store $imageName name in DATABASE from HERE */
        $product->image = $imageName ;

        $product->timestamps = false;
        $product->save();
        // dd($product);
         $search_helper = 'products';
        return back()
        ->with('message_success','Variant Successfuly Updated',['search_helper'=>$search_helper]);
        // dd('added');

    }

    public function add_product_API(Request $request, $pharm_id)
    {
        if(auth()->user()->role !== 1)
        {
            return ['message' => 'Unauthorized'];
        }

        // dd($request->image);
        // dd($request->request);

        if($request->name == NULL
        || $request->productType_ID  == NULL
        || $request->gram == NULL
        || $request->Manufacture == NULL
        || $request->Formula == NULL
        || $request->Manufacturing_date == NULL
        || $request->Expiry_date == NULL
        || $request->quantity == NULL
        || $request->Price == NULL
        || $request->SideEffects == NULL
        // || $request->image == NULL
        || $request->prescription_needed == NULL )
        {
                // dd('nullhere');
                // Session::flash('message', 'This is a message!'); 
                return 0;
                dd('something MISSED');
                // return back()
                // ->with('message','Fill up the form completely.');
        }

        $product = New Product();
        $product->name  = $request->name;
        $product->productType_ID  = $request->productType_ID;
        $product->gram  = $request->gram;
        // dd($request->product_id);
        $product->Manufacture  = $request->Manufacture;
        $product->quantity  = $request->quantity;

        $product->Formula  = $request->Formula;
        $product->Manufacturing_date  = $request->Manufacturing_date;
        $product->Expiry_date  = $request->Expiry_date;
        $product->Price  = $request->Price;
        $product->SideEffects  = $request->SideEffects;
        $product->prescription_needed  = $request->prescription_needed;

        $product->pharmacy_id =$pharm_id;
        // $product->Manufacture  = $request->Manufacture;
        // dd($product->product_id);
         //for image
         $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
     
        // $request->image->move(public_path('images/product_images'), $imageName);
        $request->image->move(('images/product_images'), $imageName);

        /* Store $imageName name in DATABASE from HERE */
        $product->image = $imageName ;

        $product->timestamps = false;
        $product->save();
        // dd($product);
        return 1;
        // return back()
        // ->with('message_success','Variant Successfuly Updated');
        // // dd('added');

    }

    public function delete_product($id)
    {


        // try {

            // dd('hi');
            // $product = Product::find($id);
            $product = Product::where('id',$id)->first();
            // dd($product);    //GETTING PRODUCT
            $product->deleted = 1;
            // dd($product); 
            $product->timestamps = false;
            // $product->update();
            $product->save();
             $search_helper = 'products';
            return back()
            ->with('message_success','Variant Successfuly Updated',['search_helper'=>$search_helper]);

        // } catch (Throwable $e) {
        //     report($e);
     
        //     return false;
        // }

    }

    public function delete_product_API($pharm_id, $id)
    {

        if(auth()->user()->role !== 1)
        {
            return ['message' => 'Unauthorized'];
        }

        // try {

            // dd('hi');
            // $product = Product::find($id);
            $product = Product::where('id',$id)->where('pharmacy_id',$pharm_id)->first();
            // dd($product);    //GETTING PRODUCT
            $product->deleted = 1;
            // dd($product); 
            $product->timestamps = false;
            // $product->update();
            $product->save();
            return \Response::json(['Success'=>'DELETED']);
            // return 1;
            // return back()
            // ->with('message_success','Variant Successfuly Updated');

        // } catch (Throwable $e) {
        //     report($e);
     
        //     return false;
        // }

    }

    public function add_category(Request $request)
    {
        // dd($request->Name);
        $cat = new ProductType();
        $cat->name = $request->name;
        $cat->save();
         $search_helper = 'products';
        return back()
        ->with('message_success','Variant Successfuly Updated',['search_helper'=>$search_helper]);

    }

    public function add_category_API(Request $request)
    {
        // dd('hi');
        dd($request);
        $cat = new ProductType();
        $cat->name = $request->name;
        $cat->save();
        
        return \Response::json(['Success'=>'ADDED']);

    }
    
}
