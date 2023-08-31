@extends('Admin.Layout.App')

@section('css')
<link rel="stylesheet" href="{{ asset('css/Products.css')}}">
<link rel="stylesheet" href="{{ asset('css/FeaturedNTemplates.css')}}">

@endsection
@section('content')
@section('title','Transaction History')
@section('navi','Transaction History')



<div class="main">




         <div  class = "M-Table">

            <div class="Table-1" >

                <div class="Table-con">
                    <div class="Cnt">
                        <H3 class="ORP">Trasaction History : Weekly</H3>
                        <p class="DY">Design Plus Trasactions</p>
                    </div>

               
            
                    <div class="Cnt2hX">   
                        
                        @can('Transac-create')
                        <a  href="{{route('PrintPdfrWTRNS')}}" style="margin-right: 20px" class ="XYZ">  <i class="fa-solid fa-print"></i> <span> Print History Weekly </span></a> 
                        @endcan
                        
                        <a href="{{route('Transac.index')}}" class="XYZ"  id="lickus" style=" background-color: #008abc;" ><i class="fa-solid fa-file-circle-exclamation"></i></i> WEEKLY </a>                 
                        <a  href="{{route('monthlyindex')}}" class="XYZ" style=" background-color: #0080af;"><i class="fa-solid fa-file-circle-check"></i></i> MONTHLY </a>
                        <a  href="{{route('allhistoryindex')}}" class="XYZ" style=" background-color: #0080af;"><i class="fa-solid fa-file-circle-check"></i></i> ALL </a>    
                     
                    <!--Modal Button any -->
                    </div>
             
                </div>
    
                @can('Transac-view')
                <div class = " Table-Section">
                <table id="Design" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th>Tracking Code</th>              
                        <th>Payment ID</th>
                        <th>Client</th>
                        <th>Type</th>
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
                        <td>₱. {{number_format((float)$sus->paid, 2,".",",") }}</td>  
                        <td> <p class="slayers"> {{$sus->created_at->format('F j, Y')}} </p> </td>
                        <td>{{$sus->created_at->diffForHumans()}}</td> 
                    </tr>  
                    @endforeach
                    </tbody>
                  </table>


                </div>

        
        

                @else

                <div class="SAIBASA">
                    <H3 class="ORP">YOU HAVE NO ACCESS TO VIEW THIS DATA!!</H3>
                    <p class="DY">Reffer To Design Plus Admin to have an access to this History data.</p>
                </div>
  
                @endcan

    
            </div> <!--End Tabl01-->


         </div> <!--End M-Table-->

    </div> <!--End Main-->
 @endsection  

