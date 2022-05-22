<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Slip</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="shortcut icon" href="../favicon.ico">

</head>
<style>
    .center{
        margin-left: auto;
  margin-right: auto;
  text-align: justify;
  text-justify: inter-word;
    }
</style>
<body>
    <img src="{{public_path('/assets/images/logo.png')}}" style="width: 10%; display: block;

    margin-left: auto;
    margin-right: auto;
    padding: 2em;">

    {{-- <img style="width: 250px; " src="{{public_path('/assets/images/logo.png')}}" alt="" width="22px"> --}}

    {{-- <img style="width: 250px; " src="{{ public_path('img\core-img\logoNew.png') }}" alt="" width="22px"> --}}
    



    <h2 style="text-align: center; margin-top: -1em; color: #008080;">Care Companion</h2>
    <br>
    <div class="container p-3">
        {{-- <h3>Order Details</h3> --}}
        <table class="table">
            {{-- <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead> --}}
            <tbody>
                {{-- <tr>
                    <th>Order ID</th>
                    <td>{{$order->id}}</td>
                </tr> --}}
      
                <tr>
                    <th>Customer</th>
                    <td>{{$order->user->name}}</td>
                </tr>

                <tr>
                    <th>Pharmacy</th>
                    <td>{{$order->pharmacy->name}}</td>
                </tr>

                <tr>
                    <th>Date</th>
                    <td>{{$order->placed_date}}</td>
                </tr>

                <tr>
                    <th></th>
                    <td></td>
                </tr>

                {{-- <tr>
                    <th>details</th>
                    <td>{{$order->orderDetails}}</td>
                </tr> --}}
              {{-- <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr> --}}
            </tbody>
          </table>
          {{-- <h3>Product Details</h3> --}}
          <table class="table" >
            <thead class="thead-light">
              <tr>
                <th scope="col">Product ID</th>
                <th scope="col"> Name</th>
                <th scope="col"> Type</th>
                <th scope="col"> Quantity </th>
                <th scope="col"> Amount </th>
                {{-- <th scope="col"> Quantity </th> --}}
              </tr>
            </thead>
            <tbody>

                @foreach($order->orderDetails as $d)
                    <tr>
                    <th scope="row">{{$d->id}}</th>
                    <td>{{$d->product->name}}</td>
                    <td>{{$d->product->type->name}}</td>
                    <td>{{$d->Quantity}}</td>
                    <td style="width: 110%;">Rs. {{$d->Amount}}</td>
                    {{-- <td>@mdo</td> --}}
                  </tr>
                @endforeach

              

              {{-- <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr> --}}
            </tbody>
          </table>


        <table class="center table table-hover">

            <tr>
                <th>Total:</th>
                <td>Rs. {{$order->total}}</td>
            </tr>

            {{-- <tr>
              <th>Id</th>
              <td>{{$order}}</td>
            </tr>

            <tr>
                <th>details</th>
                <td>{{$order->orderDetails}}</td>
            </tr> --}}

          </table>
    
    </div>
    






    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <!-- Javascript -->
    <script src="../assets/plugins/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>