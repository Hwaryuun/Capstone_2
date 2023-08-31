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
                        <H3 class="ORP">Products</H3>
                        <p class="DY">Design Plus Products</p>
                    </div>

                    <div class="Cnt2">  
                        
                        @can('Products-delete')
                        <div class = "A-DD">
                            <a  href="{{route('productsindex')}}" class ="ARCC">  <i class="fa-solid fa-box-archive"></i></a> 
                         </div>
                        @endcan
            
                         @can('Products-create')
                         <div class = "A-DD">
                                <a  href="{{route('Products.create')}}" class ="Add-P">  <i class="fa-solid fa-plus"></i> <span> New </span></a> <!--Modal Button any -->
                         </div>
                        @endcan  
                    </div> 

                </div>

                @can('Products-view')
                <div class = " Table-Section">
                 <table id="Products" class="display" style="width:100%">
                    <thead>
                      <tr>
                  
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>E-Production</th>   
                        <th>Status</th>
                        <th>Actions</th>

                      </tr>
                    </thead>
                    <tbody>

                      @foreach($products as $product)
                      <tr>
                        <td>{{$product->name}}</td>
                        <td><img class = "DisplayIM" src="/images/Product_img/{{$product->image}}" alt=""></td>
                        <td>{{$product->Category->name}}</td>                    
                        <td>{{$product->eproduction}} Working Days</td>
                        <td> 
                            @if($product->status == "Active")
                                <p class="Done">{{$product->status}}</p>
                            @endif
                            @if($product->status == "Inactive")
                                <p class="red">{{$product->status}}</p>
                            @endif 
                        </td>
                        <td class="BTNS-EDTY">

                            @can('Products-edit')
                           <a class="Edits" href ="{{Route('Products.edit', $product->id)}}" > <i class="fa-solid fa-pen-to-square"></i> <span> EDIT </span>  </a>  
                            @endcan

                            @can('Products-delete')
                           <button class="Dlts" onclick="deleteData({{$product->id}})" type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span> </button> 
                            <form id ="delete-form-{{$product->id}}" action="{{Route('Products.destroy', $product->id)}}" method = "POST">
                            @csrf
                            @method('DELETE')
                            </form>
                            @endcan

                        </td>                        
                        </tr>    
                      
                      @endforeach
                         
                    </tbody>
                  </table>
                </div>

                
                @else
                <div class="SAIBASA">
                    <H3 class="ORP">YOU HAVE NO ACCESS TO VIEW THIS DATA!!</H3>
                    <p class="DY">Reffer To Design Plus Admin to have an access to this Products data.</p>
                </div>
                @endcan

            </div>


        </div>


    </div>
    @endsection