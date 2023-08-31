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
                </th>
                <th width="50%" colspan="4" class="text-end company-data">
                    <span>Type : Reports Weekly </span> <br>               
                    <span>Date Now :  {{now()->format('Y-m-d') }} </span> <br>
                    <span>Report As : Full Payments</span> <br>
                    
                </th>
            </tr>

            <tr class="bg-blue">
                <th width="50%" > Products </th>
                <th width="50%" > Sales </th>
                <th width="50%" > Revenue </th>
                <th width="50%" > Date </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daiki2 as  $dai)
            <tr>
                <td>{{$dai->prodname}}</td>
                <td>PHP. {{ number_format((float)($dai->sales), 2, ".",",") }}  </td>
                <td>PHP. {{ number_format((float)($dai->sales)  * .30 , 2, ".",",") }}</td>
                <td>{{$dai->dateb}}</td>
            </tr>
            @endforeach

            <tr>
                <td> <b> Total </b> </td>
                <td >  <b> PHP. {{ number_format((float)$daiki2->SUM('sales'), 2, ".",",") }}  </b>   </td>
                <td>  <b>  PHP.  {{ number_format((float)$daiki2->SUM('sales')  * .30 , 2, ".",",") }} </b> </td>
                <td > <b> {{now()->format('Y-m-d') }} </b>  </td>
                
            </tr>
         
        </tbody>
    </table>
    <br>
    
    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start" >DESIGN PLUS +</h2>  
                </th>

                <th width="50%" colspan="4" class="text-end company-data">
                    <span>Type : Reports Weekly </span> <br>               
                    <span>Date Now :  {{now()->format('Y-m-d') }} </span> <br>
                    <span>Report As : Partial Payments</span> <br>
                    
                </th>
            </tr>

            <tr class="bg-blue">
                <th width="50%" > Products </th>
                <th width="50%" > Sales </th>
                <th width="50%" > Revenue </th>
                <th width="50%" > Date </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daiki23 as  $dai)
            <tr>
                <td>{{$dai->prodname}}</td>
                <td>PHP. {{ number_format((float)($dai->salesw), 2, ".",",") }}  </td>
                <td>PHP. {{ number_format((float)($dai->salesw)  * .30 , 2, ".",",") }}</td>
                <td>{{$dai->dateb}}</td>
            </tr>
            @endforeach      
            <tr>
                <td><b> Total </b> </td>
                <td><b> PHP. {{ number_format((float)$daiki23->SUM('salesw'), 2, ".",",") }}  </b></td>
                <td><b> PHP.  {{ number_format((float)$daiki23->SUM('salesw')  * .30 , 2, ".",",") }} </b></td>
                <td><b> {{now()->format('Y-m-d') }} </b></td>            
            </tr>
        </tbody>
    </table>




    <br>
    <table class="order-details">
        <thead>

            <tr class="bg-blue">
                <th width="50%" colspan="2"> Sales </th>
                <th width="50%" colspan="2"> Revenue </th>
        
            </tr>

        </thead>
        <tbody>
      
            <tr >
                <td style="border: 1px solid  #414ab1 " > <b> Total Sales : </b> </td>
                <td style="border: 1px solid  #414ab1 " > PHP. {{ number_format((float)$daiki23->SUM('salesw') + $daiki2->SUM('sales'), 2, ".",",") }}    </td>
                <td style="border: 1px solid  #414ab1 " > <b>  Total Revenue : </b>  </td>
                <td style="border: 1px solid  #414ab1 " >    PHP.  {{ number_format((float)($daiki23->SUM('salesw') + $daiki2->SUM('sales') )* .30 , 2, ".",",") }}  </td>
                 
            </tr>
         
        </tbody>
    </table>



    <p class="text-center">
        Printed By: {{auth()->user()->name}} <br>
        Date Printed:  {{now()->format('Y-m-d') }}
    </p>
</body>
</html>