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
            font-size: 12px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 10px;
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
        /* .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        } */

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
                </th>
                <th width="50%" colspan="5" class="text-end company-data">
                    <span>Type : History </span> <br>               
                    <span>Date Now :  {{now()->format('Y-m-d') }} </span> <br>
                    <span>Report As : Transaction History Weekly</span> <br>
                </th>
            </tr>

            <tr class="bg-blue">
                <th>Tracking Code</th>              
                <th>Payment ID</th>
                <th>Client</th>
                <th>Payment Type</th>
                <th>Amount</th>
                <th>Completed Date</th>
                <th>Occurred</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sumeru as $sus)
            <tr>
                <td>{{$sus->tracking_no}}</td>
                <td>{{$sus->payment_id}}</td>
                <td>{{$sus->ClientAcc->firstname}} {{$sus->ClientAcc->lastname}}</td>
                <td>{{$sus->paymentmode}}</td>
                <td>PHP. {{number_format((float)$sus->paid, 2,".",",") }}</td>  
                <td> <p class="slayers"> {{$sus->created_at->format('F j, Y')}} </p> </td>
                <td>{{$sus->created_at->diffForHumans()}}</td> 
            </tr>  
            @endforeach  
        </tbody>
    </table>
 
    <p class="text-center">
        Printed By: {{auth()->user()->name}} <br>
        Date Printed:  {{now()->format('Y-m-d') }}
    </p>
</body>
</html>