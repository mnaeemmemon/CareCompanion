@extends('layouts.pharmacymain')
@section('main-container')


<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            
            <div class="row g-4 mb-4">
                {{-- <h1 class="app-page-title">Pharmacy</h1> --}}

                <div class="p-4 bg-white rounded">
                    <div class="row g-4 mb-4">
                        <h1 class="app-page-title">Account</h1>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Beneficiary_Name</th>
                                        <th scope="col">Bank_Name</th>
                                        <th scope="col">Account_number</th>
                                        <th scope="col">Remaining Ammount</th>
                                        {{-- <th scope="col">City</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Contact</th> --}}
                                        {{-- <th scope="col">Action</th> --}}
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
        
                                    {{-- <tr>{{$account}}</tr> --}}
                                   <tr> 

                                    <td>#{{$account[0]->id}}</td>
                                    <td>{{$account[0]->Beneficiary_Name}}</td>
                                    <td>{{$account[0]->Bank_Name}}</td>
                                    <td>{{$account[0]->Account_number}}</td>
                                    <td>{{$account[0]->amount}}</td>
                                
                                </tr>
                                   {{-- <tr>  </tr>
                                   <tr>  </tr>
                                   <tr>  </tr>
                                   <tr>  </tr> --}}
                                    
        
        
                                    {{-- <tr>
        
                                        <td>2</td>
                                        <td>Faizan Medicos</td>
                                        <td>03125465421</td>
                                        <td>Shop no 1 Street no 2 Gulshan </td>
                                        <td>Karachi</td>
                                        <td><img src="{{url('/assets/images/Downloads/download.jpg')}}"  style="width: 5em;" ></td>
                                        <td><a href="{{url('/adminchat')}}"><button class="btn btn-primary">Contact</button></a></td>
        
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Fransis Medical</td>
                                        <td>03145542115</td>
                                        <td>Shop no 17 Street no 22 Gulistan-e-Johar </td>
                                        <td>Karachi</td>
                                        <td><img src="{{url('/assets/images/Downloads/download (2).jpg')}}"  style="width: 5em;" ></td>
                                        <td><a href="{{url('/adminchat')}}"><button class="btn btn-primary">Contact</button></a></td>
        
                                    </tr> --}}
        
                                </tbody>
                            </table>
                        </div>
                           
        
                            
                        
                    </div>
                    
                    
                    <!--//row-->
                </div>
                   

                    
                
            </div>
            <!--//container-fluid-->
        </div>
        <!--//app-content-->
    </div>

</div>
<!--//app-wrapper-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Javascript -->
<script src="assets/plugins/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>



<!-- Charts JS -->
<script src="assets/plugins/chart.js/chart.min.js"></script>
<script src="assets/js/charts-demo.js"></script>

<!-- Page Specific JS -->
<script src="assets/js/app.js"></script>

</body>

</html>

@endsection