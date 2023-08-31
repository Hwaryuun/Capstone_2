<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice #6</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
  
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
   

        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start" >DESIGN PLUS +</h2>
                     {{-- <img src="/images/Asset_img/Logow.png" alt=""> --}}
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice ID : {{$order->id}} </span> <br>
                 
                    <span>Date Now : {{now()->format('Y-m-d') }}</span> <br>
                    <span>Address: {{$order->Orders->ClientAcc->address}}</span> <br>
                    <span>Tracking Id/No - Old : {{$order->tracking_old}}</span> <br>
                
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Order Details</th>
                <th width="50%" colspan="2">User Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Order Id:</td>
                <td> {{$order->id}} </td>

                <td>Full Name:</td>
                <td>{{$order->Orders->fullname}}</td>
            </tr>
            <tr>
                <td>Tracking Id/No. :</td>
                <td>{{$order->Orders->tracking_no}}</td>

                <td>Email Id:</td>
                <td>{{$order->Orders->emailadd}}</td>
            </tr>
            <tr>
                <td>Ordered Date:</td>
                <td> {{$order->created_at}} </td>

                <td>Phone:</td>
                <td>{{$order->Orders->phone}}</td>
            </tr>
            <tr>
                <td>Payment Mode:</td>
                <td>{{$order->Orders->paymentmode}}</td>

                <td>Address:</td>
                <td>{{$order->Orders->ClientAcc->address}}</td>
            </tr>
            <tr>
                <td>Order Status:</td>
                <td>{{$order->status}}</td>

                <td rowspan="2">Remarks :</td>
                <td rowspan="2">{{$order->Orders->remarks}}</td>
                
            </tr>

            <tr>
                <td>Payment ID :</td>
                <td>{{$order->Orders->payment_id}}</td>

         
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Specification
                </th>
            </tr>
            <tr class="bg-blue">
           
                <th colspan="4">Specification</th>
            
                 <th  colspan="2">Price</th>          
            </tr>
        </thead>
        <tbody>
            <tr>       
                <td colspan="2"> Product : </td>
                <td colspan="4"> {{$order->Products->name}}</td>
       
            </tr>
            <tr>       
                <td colspan="2"> Size : </td>
                <td colspan="2"> {{$order->size }}</td>
                <td colspan="2">  {{ number_format((float)$order->OrderItemPrice->sizeprice , 2,".",",") }} PHP</td>
            </tr>
            <tr>       
                <td colspan="2"> Stock : </td>
                <td colspan="2"> {{$order->paperdefault}}</td>
                <td colspan="2">  {{ number_format((float)$order->OrderItemPrice->defaultprice , 2,".",",") }} PHP</td>
            </tr>
            @if ($order->cover)

            <tr>       
                <td colspan="2"> Cover : </td>
                <td colspan="2"> {{$order->cover}}</td>
                <td colspan="2">   {{ number_format((float)$order->OrderItemPrice->coverprice , 2,".",",") }} PHP</td>
            </tr>
            <tr>       
                <td colspan="2"> Page : </td>
                <td colspan="2"> {{$order->page}}</td>
                <td colspan="2">  {{ number_format((float)$order->OrderItemPrice->leafprice , 2,".",",") }} PHP</td>
            </tr>
                
            @endif
      
   
            <tr>       
                <td colspan="2"> Quantity : </td>
                <td colspan="2"> {{$order->quantity}}</td>
                <td colspan="2"> {{$order->OrderItemPrice->quantity }}</td>
            </tr>

            <tr>       
                <td colspan="2"> Total Price : </td>
                <td colspan="4"> PHP. {{ number_format((float)$order->price, 2, ".",",") }} </td>
            </tr>
   
   

        </tbody>
    </table>

    <br>
    <p class="text-center">
        Printed By: {{auth()->user()->name}} <br>
        Date Printed:  {{now()}}
    </p>

</body>
</html>