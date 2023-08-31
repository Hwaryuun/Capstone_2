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
                    <H3 class="ORP">3d Models</H3>
                    <p class="DY">Design Plus 3D </p>  
                  
            </div>

            <div class="Cnt2">  
                      
                @can('Models-delete')
                <div class = "A-DD">
                    <a  href="{{route ('DMindex')}}" class ="ARCC">  <i class="fa-solid fa-box-archive"></i></a> 
                 </div>  
                @endcan

                @can('Models-create')
                 <div class = "A-DD">
                    <a  href="{{route ('Dimentional.create')}}" class ="Add-P">  <i class="fa-solid fa-plus"></i> <span> New </span></a> <!--Modal Button any -->
                 </div>
                @endcan  
   
            </div>
       
        </div>

     </div>

     
     @can('Models-view')
     <div  class = "M-Table">
        @foreach($models as $model)
  
        <div class="Table-1" >

            <div class="Table-con">
              
                <div class="Cnt">
                    <H3 class="ORP"> <i class="fa-brands fa-unity"></i> {{$model->name}}</H3>
                    <p class="DY">{{$model->status}}</p>                  
                </div>     

                <div class="BTNS-EDTx">
                     @can('Models-edit')
                     <a class="Editsx" href ="{{Route('Dimentional.edit', $model->id)}}"> <i class="fa-solid fa-pen-to-square"></i> <span> EDIT </span> </a>                 
                     @endcan
                     @can('Models-delete')
                     <button class="Dltsx" onclick="deleteData({{$model->id}})" type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span> </button>
                     <form id ="delete-form-{{$model->id}}" action="{{Route('Dimentional.destroy', $model->id)}}" method = "POST">
                     @csrf
                     @method('DELETE')   
                    </form>
                     @endcan
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

    @else
    <div class="SAIBASA">
        <H3 class="ORP">YOU HAVE NO ACCESS TO VIEW THIS DATA!!</H3>
        <p class="DY">Reffer To Design Plus Admin to have an access to this Model data.</p>
    </div>
    @endcan


 <div>   
@endsection