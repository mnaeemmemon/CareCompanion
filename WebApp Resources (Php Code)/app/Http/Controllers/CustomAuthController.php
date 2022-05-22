<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Pharmacy;
use App\Models\Pharmacist;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  

    // public function __construct()   //my code
    //     {
    //         // dd("nothing");
    //         $this->middleware('guest')->except('logout');
    //         // $this->middleware('guest:admin')->except('logout');
    //         // $this->middleware('guest:writer')->except('logout');
    //     }
    
    public function customLogin_ADMIN_API(Request $request)
    {
        // dd($request);
        // dd('out out out');
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);
        // dd(Auth::guard());
        // dd($provider);


        // if($request->role == 0)
        // {
        //     return ['Message' => 'No Admin Creds'];
            //pharmacist
            // if (Auth::guard('pharmacist')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            //     // dd(Auth::user());
            //     // return redirect()->intended('/admin'); 
            //     $user = Auth::guard('pharmacist')->user();
            //     // dd($user);
            //     $token = $user->createToken('mytokens');
            //     return ['pharmacist' =>$user, 'token' => $token->plainTextToken];

            //     // return redirect()->intended('/pharmacyhome');
            // }
            // dd('out Pharmacist');
            // return back()->withInput($request->only('email', 'remember'));
        // }
        // elseif($request->role == 2)
        // {
            //Admin
            //pharmacist
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                // dd(Auth::user());
                // return redirect()->intended('/admin'); 
                // dd(Auth::user());
                // return redirect()->intended('/admin'); 
                $user = Auth::guard('admin')->user();
                // dd($user);
                $token = $user->createToken('mytokens');
                return ['admin' =>$user, 'token' => $token->plainTextToken];
                return redirect()->intended('/adminhome');
            }
            dd('out Admin');
            return back()->withInput($request->only('email', 'remember'));
        // }

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        $credentials = $request->only('email', 'password');
        // dd(Auth::attempt($credentials));
        dd('out out out');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
        dd('out out out');
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function customLogin(Request $request)
    {
       
        // dd($request);

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);
        // dd(Auth::guard());
        // dd($provider);
        

        if($request->role == 0)
        {
            //pharmacist
            if (Auth::guard('pharmacist')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                // dd(Auth::user());
                // return redirect()->intended('/admin'); 
                
                return redirect()->intended('/pharmacyhome');
            }
            dd('out Pharmacist');
            return back()->withInput($request->only('email', 'remember'));
        }
        elseif($request->role == 1)
        {
            //Admin
            //pharmacist
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                // dd(Auth::user());
                // return redirect()->intended('/admin'); 
    
                return redirect()->intended('/adminhome');
            }
            dd('out Admin');
            return back()->withInput($request->only('email', 'remember'));
        }

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   

        $credentials = $request->only('email', 'password');
        // dd(Auth::attempt($credentials));

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function customLogin_API(Request $request)
    {
       
        // dd($request);

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);
        // dd(Auth::guard());
        // dd($provider);
        

        if($request->role == 0)
        {
            //pharmacist
            if (Auth::guard('pharmacist')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                // dd(Auth::user());
                // return redirect()->intended('/admin'); 
                $user = Auth::guard('pharmacist')->user();
                // dd($user);
                $token = $user->createToken('mytokens');
                return ['pharmacist' =>$user, 'token' => $token->plainTextToken];

                // return redirect()->intended('/pharmacyhome');
            }
            dd('out Pharmacist');
            return back()->withInput($request->only('email', 'remember'));
        }
        elseif($request->role == 1)
        {
            //Admin
            //pharmacist
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                // dd(Auth::user());
                // return redirect()->intended('/admin'); 
    
                return redirect()->intended('/adminhome');
            }
            dd('out Admin');
            return back()->withInput($request->only('email', 'remember'));
        }

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   

        $credentials = $request->only('email', 'password');
        // dd(Auth::attempt($credentials));

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }
      

    public function customRegistration_pharmacy(Request $request)
    {
        // dd($request);

        $request->validate([
            'name' => 'required',
            // 'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'ben_name' => 'required',
            'bank_name' => 'required',
            'account_no' => 'required',
        ]);

        // if(!$request->ben_name)
        // {

        // }

        $checking_email = Pharmacist::where('email',$request->email)->get();
        // dd($checking_email);

        // dd(count($checking_email));

        if(count($checking_email) > 0)
        {
            return back()->with("message", "EMAIL ALREADY TAKEN.");
        }
        // dd('hi');


        $user = new Pharmacist();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        // $user->account_id = $request->account_id;
        $user->role = 1; // 1 for pharmacy


        //pharmacy
        $pharmacy = new Pharmacy();
        $pharmacy->save();

        // dd(DB::table('pharmacy')->orderBy('id', 'DESC')->first());
        $pharmacy_lastest = DB::table('pharmacy')->orderBy('id', 'DESC')->first();
        $id = $pharmacy_lastest->id;
        // dd($id);
        // DB::table('pharmacy')->orderBy('id', 'DESC')->first()
        $user->pharmacy_id = $id;
        $user->save();

        //account
        $account = new Account();
        // $account->save();

        $account->Beneficiary_Name = $request->ben_name;
        $account->Bank_Name = $request->bank_name;
        $account->Account_number = $request->account_no;
        $account->amount = $request->amount;
        $account->save();

        $account_again= DB::table('account')->orderBy('id', 'DESC')->first();
        // dd($account_id);
        $user_lastest = DB::table('pharmacist')->orderBy('id', 'DESC')->first();

        $pharmacy->handler_id = $user_lastest->id;
        // $pharmacy->account_id = $user->account_id ;
        $pharmacy->account_id = $account_again->id ;

        $pharmacy->name = $user_lastest->name;
        $pharmacy->contact = $user_lastest->contact;

        $pharmacy->save();

        



        // dd($check);
        return redirect("/")->withSuccess('You have signed-in');
    }

    public function customRegistration_pharmacy_API(Request $request)
    {
        
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6',
        //     'Beneficiary_Name' => 'required',
        //     'Bank_Name' => 'required',
        //     'Account_number' => 'required',
        //     // 'name' => 'required',
        // ]);
        

        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6',
        //     'ben_name' => 'required',
        //     'bank_name' => 'required',
        //     'account_no' => 'required',
        // ]);
       

        

        if(!$request->ben_name)
        {
            return \Response::json(['Success'=>'Beneficiary Name i.e. $ben_name was not found']);
        }
        if(!$request->name)
        {
            return \Response::json(['Success'=>'Name i.e. $name was not found']);
        }
        if(!$request->email)
        {
            return \Response::json(['Success'=>'Email i.e. $email was not found']);
        }
        if(!$request->password)
        {
            return \Response::json(['Success'=>'Password i.e. $password was not found']);
        }
        if(!$request->bank_name)
        {
            return \Response::json(['Success'=>'Bank Name i.e. $bank_name was not found']);
        }
        if(!$request->account_no)
        {
            return \Response::json(['Success'=>'Account Number i.e. $account_no was not found']);
        }


        //if acc_no already taken
        $acc = Account::where('Account_number',$request->account_no)->get();
        if(count($acc))
        {
            return \Response::json(['MSG'=>'Account Number already exists']);
        }
        // dD('no exit');
        // if($request->amount)
        // {
            
        // }

        // dd('hi');

        $checking_email = Pharmacist::where('email',$request->email)->get();
        // dd($checking_email);

        // dd(count($checking_email));

        if(count($checking_email) > 0)
        {
            return \Response::json(['MSG'=>'Email already exists']);

            // return back()->with("message", "EMAIL ALREADY TAKEN.");
        }
        // dd('hi');


        $user = new Pharmacist();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        // $user->account_id = $request->account_id;
        $user->role = 1; // 1 for pharmacy


        //pharmacy
        $pharmacy = new Pharmacy();
        $pharmacy->save();

        // dd(DB::table('pharmacy')->orderBy('id', 'DESC')->first());
        $pharmacy_lastest = DB::table('pharmacy')->orderBy('id', 'DESC')->first();
        $id = $pharmacy_lastest->id;
        // dd($id);
        // DB::table('pharmacy')->orderBy('id', 'DESC')->first()
        $user->pharmacy_id = $id;
        $user->save();

        //account
        $account = new Account();
        // $account->save();

        $account->Beneficiary_Name = $request->ben_name;
        $account->Bank_Name = $request->bank_name;
        $account->Account_number = $request->account_no;

        if($request->amount)
        {
            $account->amount = $request->amount;
        }
        else
        {
            $account->amount = 0;
        }

        
        $account->save();

        $account_again= DB::table('account')->orderBy('id', 'DESC')->first();
        // dd($account_id);
        $user_lastest = DB::table('pharmacist')->orderBy('id', 'DESC')->first();

        $pharmacy->handler_id = $user_lastest->id;
        // $pharmacy->account_id = $user->account_id ;
        $pharmacy->account_id = $account_again->id ;

        $pharmacy->name = $user_lastest->name;
        $pharmacy->contact = $user_lastest->contact;

        $pharmacy->save();


        $token = $pharmacy->createToken('mytokens');
        return [
            'pharmacy' =>$pharmacy,
            'token' => $token->plainTextToken];




        return \Response::json(['Success'=>'REQUESTED PROCEEDED']);
        // dd($check);
        // return redirect("/")->withSuccess('You have signed-in');
    }


    public function customLogin_USER_API(Request $request)
    {
        // dd('h');
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        // $credentials = $request->only('email', 'password');
        // if (Auth::attempt($credentials)) {
        //     return redirect()->intended('api/dashboard')
        //                 ->withSuccess('Signed in');
        // }
        // dd('h');
        $user = User::where('email',$request->email)->first();
        // dd($user->password);
        if($user)
        {
            // dd($user->id);
            // dd('in');
            if(Hash::check($request->password, $user->password))
            {
                // dd('right password');
                $token = $user->createToken('mytokens');
                return ['token' => $token->plainTextToken];
            }
            else
            {
                return ['msg' => 'bad creds'];
            }
        }
        else
        {
            return ['msg' => 'bad creds'];
        }
        
        // return redirect("login")->withSuccess('Login details are not valid');
    }


    public function customRegistration(Request $request)
    {  

        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6',
        // ]);
           
        // $checking_email = User::where('email',$request->email)->get();
        // if($checking_email)
        // {
        //     return \Response::json(['Message'=>'Email Already Taken']);
        // }

        // $data = $request->all();
        // $check = $this->create($data);
         
        dd('see Controller');
        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function customRegistration_API(Request $request)
    {  
        // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'Beneficiary_Name' => 'required',
            'Bank_Name' => 'required',
            'Account_number' => 'required',
            // 'name' => 'required',
        ]);
        // dd($request);
        $data = $request->all();
        $check = $this->create($data);


        $account = new Account();
        $account->Beneficiary_Name = $request->Beneficiary_Name;
        $account->Bank_Name = $request->Bank_Name;
        $account->Account_number = $request->Account_number;
        if($request->amount)
        {
            $account->amount = $request->amount;
        }
        else
        {
            $account->amount = 0;
        }
        $account->save();

        // $user_lastest = DB::table('users')->orderBy('id', 'DESC')->first();
        $user_lastest = User::latest()->first();

        $acc_lastest = DB::table('account')->orderBy('id', 'DESC')->first();
        // dd($acc_lastest);
        $user_lastest->account_id = $acc_lastest->id;
        $user_lastest->save();


        $token = $user_lastest->createToken('mytokens');
        return [
            'user' =>$user_lastest,
            'token' => $token->plainTextToken];
        // return \Response::json(['Success'=>'REQUESTED PROCEEDED']);
        // return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function set_user_Account_INFO(Request $request)
    {  

        $user = User::find($request->id);
        $account->Beneficiary_Name = $request->ben_name;
        $account->Bank_Name = $request->bank_name;
        $account->Account_number = $request->account_no;
        $account->amount = $request->amount;
        $user->save();

        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6',
        // ]);
        
        // $data = $request->all();
        // $check = $this->create($data);

        return \Response::json(['Success'=>'REQUESTED PROCEEDED']);
        // return redirect("dashboard")->withSuccess('You have signed-in');
    }



    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            

            // dd(Auth::user()->role);
            if(Auth::user()->role == 1)
            {
                return redirect('/pharmacyhome');
            }
            elseif(Auth::user()->role == 2)
            {
                return redirect('/adminhome');
            }

            return view('dashboard');
        }
  
        return redirect("/")->withSuccess('You are not allowed to access');

        // return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
        // return Redirect('login');
    }

    public function signOut_USER_API() 
    {
        // dd(Auth::user());
        auth()->user()->tokens()->delete();

    
        return response([
            'message' => 'logout',
        ]);

    }





}