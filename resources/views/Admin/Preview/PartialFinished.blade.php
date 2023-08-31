@extends('Admin.Layout.App')

@section('css')
{{-- <link rel="stylesheet" href="{{ asset('css/Orders.css')}}"> --}}
<link rel="stylesheet" href="{{ asset('css/Products.css')}}">
@endsection
@section('content')
@section('title','Orders')
@section('navi','Orders')


    <div class="main">

        <div class="cards">
            <div class="card" >
                <div class="card-content">
                    <div class="number">{{$d1}}</div>
                    <div class="card-name">Total Orders</div>
                </div>
                <div class="icon-box">
                    <i class="fa-solid fa-bag-shopping"></i>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="number">{{$d2}}</div>
                    <div class="card-name"> In-Progress </div>
                </div>
                <div class="icon-box">
                    <i class="fa-solid fa-user-clock"></i>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="number">{{$d3}}</div>
                    <div class="card-name"> Finished </div>
                </div>
                <div class="icon-box">
                    <i class="fa-solid fa-clipboard-check"></i>
                </div>
            </div>

         </div> <!--End Card-->

         <div  class = "M-Table">

          <div class="Table-1" >
  
              <div class="Table-con">
                  <div class="Cnt">
                      <H3 class="ORP">Partial - Orders</H3>
                      <p class="DY">Finished-Orders</p>
                  </div>
                  <div class="Cnt2hX">   
                    <a href="{{route('Partial.index')}}" class="XYZ"   ><i class="fa-solid fa-file-circle-exclamation"></i></i> New-Order</a> 
                    <a  href="{{route('PartialProgress')}}" class="XYZ" style=" background-color: #f6b14b;"><i class="fa-solid fa-file-circle-minus"></i> In-Progess</a> 
                    <a  href="{{route('PartialFinished')}}" class="XYZ"  id="lickus" style=" background-color: #0ce150;"><i class="fa-solid fa-file-circle-check"></i></i> Finished </a>   
                  </div>
  
              </div>
  
            @can('Orders-view')
            <div class = " Table-Section-Main">
              <table id="Orders" class="display" style="width:100%">
                  <thead>           
                    <tr>
                      <th>JOB ID</th>
                      <th>Product</th>
                      <th>Client Name</th>
                      <th>Order Status</th>
                      <th>Price</th>
                      <th>Date</th>
                      <th>Actions</th>
                    </tr>        
                  </thead>
                  <tbody>
                      @foreach ($sumeru as  $sumer)    
                    <tr>
                     
                      <td>{{$sumer->Orders->tracking_no}}</td>                 
                      <td>{{$sumer->Carts->ProductPricing->Products->name}}</td>
                      <td>{{$sumer->Orders->ClientAcc->firstname}} {{$sumer->Orders->ClientAcc->lastname}}</td>
                 
                      <td> 
                        @if ($sumer->statusODR == 'In-Progress')
                          <p  class="sibewibe" style=" background-color: #f6b14b;"> {{$sumer->statusODR}} </p>
                        @elseif ($sumer->statusODR == 'Finished')
                          <p  class="sibewibe" style=" background-color: #0ce150;"> {{$sumer->statusODR}} </p>
                        @else
                          <p  class="sibewibe"> {{$sumer->statusODR}} </p>
                        @endif
                        </td>
                      <td> ₱ {{ number_format((float)$sumer->price, 2,".",",") }}</td>
                      <td>{{$sumer->created_at->diffForHumans()}} </td>
                      <td class="BTNS-EDTY"> 
                        @can('Orders-edit')       
                          <a class="Edits" href ="{{route('PartialUpdate', $sumer->id)}}" > <i class="fa-solid fa-pen-to-square"> </i> <span> MANAGE </span> </a>  
                        @endcan
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

              @else
              <div class="SAIBASA">
                <H3 class="ORP">YOU HAVE NO ACCESS TO VIEW THIS DATA!!</H3>
                <p class="DY">Reffer To Design Plus Admin to have an access to this Orders data.</p>
              </div>        
              @endcan

          </div>
        </div><!--End M-Table-->

  </div> <!--End Main-->

 @endsection