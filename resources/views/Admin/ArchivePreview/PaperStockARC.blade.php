@extends('Admin.Layout.App')
@section('css')
<link rel="stylesheet" href="{{ asset('css/Specifications.css')}}">
@endsection
@section('content')
@section('title','Papers')
@section('navi','Papers')


    <div class="main"> 

         <!-- Primary end ------------------------------------------------------------------------------->    
        <div  class = "M-Table">

            <div class="Table-1" >

                <div class="Table-con">

                    <div class="Cnt">
                        <H3 class="ORPRED">Paper Stock : Archive</H3>
                        <p class="DY">Support Group</p>
                    </div>

                    <div class="Cnt2h">  
                        
                        <div class = "A-DD">
                            <a  href="{{route('Papers.index')}}" class ="Add-P"> <i class="fa-solid fa-reply"></i> <span> Return </span></a> <!--Modal Button any -->
                        </div>  
       
                    </div> 
            

                </div>

                <div class = " Table-Section">
                 <table id="Papers" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th>Paper Name</th>
                        <th>Deleted</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach($papers as $paper)
                      <tr>
                        <td>{{$paper->name}}</td>
                        <td>{{$paper->deleted_at->diffForHumans()}}</td>    
             
                       
                        <td class="BTNS-EDTY">    

                            <button class="Dlts" onclick="deleteDataPermanent({{$paper->id}})"  type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span> </button>
                            <form id ="deleteP-form-{{$paper->id}}" action="{{Route('paperdestroy', $paper->id)}}" method = "POST"> 
                                @csrf
                                @method('DELETE')                                
                            </form>

                            <button class="EditsT" onclick="resetData({{$paper->id}})" type="submit"><i class="fa-solid fa-repeat"></i> <span> RESTORE </span> </button> 
                            <form id ="reset-form-{{$paper->id}}" action="{{Route('paperstore', $paper->id)}}" method = "POST"> 
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