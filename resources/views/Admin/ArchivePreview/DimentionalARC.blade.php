@extends('Admin.Layout.App')
@section('css')
<link rel="stylesheet" href="{{ asset('css/Dimentional.css')}}">
@endsection
@section('content')
@section('title','Models')
@section('navi','Models')

<div class="main">
    <div class="cards">
        <div class="card" >
            <div class="card-content">
                    <H3 class="ORPRED">3d Models : Archive</H3>
                    <p class="DY">Support Group</p>  
                  
            </div>

            <div class="Cnt2h">  
                    
                <div class = "A-DD">
                       <a  href="{{route('Dimentional.index')}}" class ="Add-P"> <i class="fa-solid fa-reply"></i> <span> Return </span></a> <!--Modal Button any -->
                </div>  
  
           </div>
       
        </div>

     </div>

     <div  class = "M-Table">


        @foreach($models as $model)
  
        <div class="Table-1" >

            <div class="Table-con">
                <div class="Cnt">
                    <H3 class="ORP"> <i class="fa-brands fa-unity"></i> {{$model->name}}</H3>
                    <p class="DY">{{$model->status}}</p>
                    
                </div>     
                
                
                
              

                <div class="BTNS-EDTY">

                    <button class="Dltsx" onclick="deleteDataPermanent({{$model->id}})" type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span> </button>
                    <form id ="deleteP-form-{{$model->id}}" action="{{Route('DMdestroy', $model->id)}}" method = "POST"> 
                        @csrf
                        @method('DELETE')                      
                     </form>

                     <button class="DltsI" onclick="resetData({{$model->id}})" type="submit"><i class="fa-solid fa-repeat"></i> <span> RESTORE </span> </button> 
                     <form id ="reset-form-{{$model->id}}" action="{{Route('DMstore', $model->id)}}" method = "POST"> 
                        @csrf
                        @method('PUT')                           
                      </form>
                </div>

                
            </div>


            <div class = "imagess">
                <model-viewer camera-controls touch-action="pan-y" autoplay ar shadow-intensity="1" src="/images/3DModels_GLB/{{$model->model}}" alt="An animated 3D model of a robot"></model-viewer> 
                {{-- <model-viewer src="/images/3DModels_GLB/{{$model->model}}" alt="" auto-rotate camera-controls ar ios-src=""></model-viewer> --}}
            </div>


            <div class="descripion">  <H3 class="ORP"> "{{$model->Category->name}}"</H3> <P> {{$model->Category->description}}</P></div>
         
        </div>



        @endforeach
    </div>

    
 <div>   

@endsection