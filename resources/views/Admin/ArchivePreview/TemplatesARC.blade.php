@extends('Admin.Layout.App')

@section('css')
<link rel="stylesheet" href="{{ asset('css/FeaturedNTemplates.css')}}">
@endsection
@section('content')
@section('title','Templates')
@section('navi','Templates')

    <div class="main">
    
        <div  class = "M-Table">

            <div class="Table-3" >

                <div class="Table-con">
                    <div class="Cnt">
                        <H3 class="ORPRED">Templates : Archive</H3>
                        <p class="DY">Support Group</p>
                    </div>

                    <div class="Cnt2h">  
                        <div class = "A-DD">
                               <a  href="{{route('Templates.index')}}" class ="Add-P"> <i class="fa-solid fa-reply"></i> <span> Return </span></a> <!--Modal Button any -->
                        </div>  
          
                   </div>
                </div>
    
                <div class = " Table-Section">
                <table id="Template" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th>Template Name</th>
                        <th>Tag</th>
                        <th>Product</th>           
                        <th>Design Name</th>
                        <th>Deleted</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
               <tbody>
                      @foreach($templates as $tempt)
                      <tr>
                        <td>{{$tempt->name}}</td>
                        <td>{{$tempt->tag}}</td>
                        <td>{{$tempt->Products->name}}</td>
                        <td>{{$tempt->Design->name}}</td>
                        <td>{{$tempt->deleted_at->diffForHumans()}}</td>

                        <td class="BTNS-EDTY">    

                          <button class="Dlts" onclick="deleteDataPermanent({{$tempt->id}})" type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span> </button>
                            <form id ="deleteP-form-{{$tempt->id}}" action="{{Route('TPLdestroy', $tempt->id)}}" method = "POST"> 
                                @csrf
                                @method('DELETE')
                             </form>
    
                             <button class="EditsT" onclick="resetData({{$tempt->id}})" type="submit"><i class="fa-solid fa-repeat"></i> <span> RESTORE </span> </button> 
                             <form id ="reset-form-{{$tempt->id}}" action="{{Route('TPLstore', $tempt->id)}}" method = "POST"> 
                                @csrf
                                @method('PUT')                                 
                              </form>
                        </td> 
                      </tr>

                    @endforeach       
                    </tbody>
                  </table>
                </div>

            </div> <!--End Tabl03-->

         </div> <!--End M-Table-->

    </div> <!--End Main-->
 @endsection  
