@extends('Admin.Layout.App')
@section('css')
<link rel="stylesheet" href="{{ asset('css/Products.css')}}">
@endsection
@section('content')
@section('title','Products')
@section('navi','Products')

    <div class="main">
       
        <div  class = "M-Table">

            <div class="Table-1" >

                <div class="Table-con">

                    <div class="Cnt">
                        <H3 class="ORPRED">Products : Archive</H3>
                        <p class="DY">Support Group</p>
                    </div>

                    <div class="Cnt2d">           
                         <div class = "A-DD">
                                <a  href="{{route('Products.index')}}" class ="Add-P">   <i class="fa-solid fa-reply"></i>  <span> Back </span></a> <!--Modal Button any -->
                         </div>  
                    </div> 

                </div>

                <div class = " Table-Section">
                 <table id="Products" class="display" style="width:100%">
                    <thead>
                      <tr>
                  
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>E-Production</th>  
                        <th>Deleted</th> 
                        <th>Actions</th>

                      </tr>
                    </thead>
                    <tbody>

                      @foreach($products as $product)
                      <tr>
                        <td>{{$product->name}}</td>
                        <td><img class = "DisplayIM" src="/images/Product_img/{{$product->image}}" alt=""></td>
                        <td>{{$product->Category->name}}</td>                    
                        <td>{{$product->eproduction}}</td>
                        <td>{{$product->deleted_at->diffForHumans()}}</td>    
                        <td class="BTNS-EDTY">  

                            <button class="Dlts" onclick="deleteDataPermanent({{$product->id}})" type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span> </button>
                            <form id ="deleteP-form-{{$product->id}}" action="{{Route('productsdestroy', $product->id)}}" method = "POST"> 
                                @csrf
                                @method('DELETE')                         
                             </form>

                             <button class="EditsT" onclick="resetData({{$product->id}})"  type="submit"><i class="fa-solid fa-repeat"></i> <span> RESTORE </span> </button> 
                             <form id ="reset-form-{{$product->id}}" action="{{Route('productsstore', $product->id)}}" method = "POST"> 
                                @csrf
                                @method('PUT')                               
                              </form>

                        </td>

                        </tr>    
                      
                      @endforeach
                         
                    </tbody>
                  </table>
             
                </div>
            </div>


        </div>


    </div>
    @endsection