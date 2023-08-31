@extends('Admin.Layout.App')
@section('css')
<link rel="stylesheet" href="{{ asset('css/Specifications.css')}}">
@endsection
@section('content')
@section('title','Specs')
@section('navi','Specs')


    <div class="main"> 

         <!-- Primary end ------------------------------------------------------------------------------->

        <div  class = "M-Table">

          <div class="Table-1" >

            <div class="Table-con">

                <div class="Cnt">
                    <H3 class="ORPRED">Specs : Archive</H3>
                    <p class="DY">Support Group</p>
                </div>

                <div class="Cnt2h">  
                    
                    <div class = "A-DD">
                           <a  href="{{route('PaperSpecs.index')}}" class ="Add-P"> <i class="fa-solid fa-reply"></i> <span> Return </span></a> <!--Modal Button any -->
                    </div>  
      
               </div>

            </div>

            <div class = " Table-Section">
             <table id="PaperSpecs" class="display" style="width:100%">
                <thead>
                  <tr>
                    <th>Category Name</th>
                    <th>Paper</th>
                    <th>Type</th>
                    <th>LBS</th>
                    <th>Quantity</th>
                    <th>Deleted</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>

                @foreach($paperspecs as $specs)
                  <tr>
                    <td>{{$specs->Category->name}}</td>
                    <td>{{$specs->Papers->name}}</td>
                    <td>{{$specs->PaperTypes->name}}</td>
                    <td>{{$specs->lbs}} lbs</td>
                    <td>{{$specs->quantity}} pcs</td>
                    <td>{{$specs->deleted_at->diffForHumans()}}</td>
                    
                    
                    <td class="BTNS-EDTY">    

                        <button class="Dlts" onclick="deleteDataPermanent({{$specs->id}})" type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span> </button>
                        <form id ="deleteP-form-{{$specs->id}}" action="{{Route('spcdestroy', $specs->id)}}" method = "POST"> 
                            @csrf
                            @method('DELETE')
                         </form>

                         <button class="EditsT" onclick="resetData({{$specs->id}})" type="submit"><i class="fa-solid fa-repeat"></i> <span> RESTORE </span>  </button> 
                         <form id ="reset-form-{{$specs->id}}" action="{{Route('spcstore', $specs->id)}}" method = "POST"> 
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