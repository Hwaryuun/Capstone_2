@extends('Admin.Layout.App')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/Category.css')}}">
@endsection

@section('content')
@section('title','Printing')
@section('navi','Printing')


    <div class="main">

        <div  class = "M-Table">

            <div class="Table-1" >

                <div class="Table-con">

                    <div class="Cnt">
                        <H3 class="ORPRED">Category : Archive</H3>
                        <p class="DY">Support Group</p>
                    </div>

                    <div class="Cnt2h">  
                    
                         <div class = "A-DD">
                                <a  href="{{route('Category.index')}}" class ="Add-P"> <i class="fa-solid fa-reply"></i> <span> Return </span></a> <!--Modal Button any -->
                         </div>  
           
                    </div>

                </div>

                <div class = " Table-Section">
                 <table id="Category" class="display" style="width:100%">
                    <thead>
                      <tr>             
                        <th>Category</th>
                        <th>Service</th>
                        <th>image</th> 
                        <th>Deleted</th> 
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>


                    @foreach($category as $categories)
                      <tr>

                        <td>{{$categories->name}}</td>
                        <td>{{$categories->CategoryType->typename}}</td>
                        <td><img class = "DisplayIM" src="/images/Category_img/{{$categories->image}}" alt=""></td>
                        <td>{{$categories->deleted_at->diffForHumans()}}</td>
                        <td class="BTNS-EDTY">    

                            <button class="Dlts" onclick="deleteDataPermanent({{$categories->id}})" type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span> </button>
                            <form id ="deleteP-form-{{$categories->id}}" action="{{Route('destroycategory', $categories->id)}}" method = "POST"> 
                                @csrf
                                @method('DELETE')
                             </form>

                             <button class="EditsT" onclick="resetData({{$categories->id}})" type="submit"><i class="fa-solid fa-repeat"></i> <span> RESTORE </span> </button> 
                             <form id ="reset-form-{{$categories->id}}" action="{{Route('restorecategory', $categories->id)}}" method = "POST"> 
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

<!----------------------------------------------------category type------------------------------------------------------------->
       
    </div>
</div>

@endsection  
