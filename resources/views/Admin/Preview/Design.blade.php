@extends('Admin.Layout.App')

@section('css')
<link rel="stylesheet" href="{{ asset('css/FeaturedNTemplates.css')}}">
@endsection
@section('content')
@section('title','Design')
@section('navi','Design')



<div class="main">

    <div class="cards">

        <div class = "card-01">
            <div class="card" >
                <div class="card-content">
                    <div class="number"> {{$countf}} </div>
                    <div class="card-name"> Featured</div>
                </div>
                <div class="icon-box">
                    <i class="fa-solid fa-star"></i>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="number"> {{$countd}} </div>
                    <div class="card-name"> Design </div>
                </div>
                <div class="icon-box">
                    <i class="fa-solid fa-scroll"></i>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="number"> {{$countt}} </div>
                    <div class="card-name"> Templates </div>
                </div>
                <div class="icon-box">
                    <i class="fa-solid fa-cubes"></i>
                </div>
            </div>

        </div>

      </div> <!--End Card-->


         <div  class = "M-Table">

            <div class="Table-1" >

                <div class="Table-con">
                    <div class="Cnt">
                        <H3 class="ORP">Design</H3>
                        <p class="DY">Design Plus Designer </p>
                    </div>

                    
                    <div class="Cnt2">  
                 
                        @can('Designs-delete')
                        <div class = "A-DD">
                            <a  href="{{route('DSarchive')}}" class ="ARCC">  <i class="fa-solid fa-box-archive"></i></a> 
                         </div>  
                         @endcan

                        @can('Designs-create')
                         <div class = "A-DD">
                                <a  href="{{route('Design.create')}}" class ="Add-P">  <i class="fa-solid fa-plus"></i> <span> New </span></a> <!--Modal Button any -->
                         </div>  
                        @endcan
           
                    </div>  
                </div>
    
                @can('Designs-view')
                <div class = " Table-Section">
                <table id="Design" class="display" style="width:100%">
                    <thead>
                      <tr>
          
                        <th>Name</th>              
                        <th>Image-F</th>
                        <th>Image-B</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($designs as $design)
                      <tr>
                        <td>{{$design->name}}</td>
                        <td><img class = "DisplayIM" src="/images/Clientfile_img/{{$design->imagef}}" alt=""></td>
                        <td><img class = "DisplayIM" src="/images/Clientfile_img/{{$design->imageb}}" alt=""></td>
                        <td>
                            @if($design->status == "Active")
                                <p class="Done">{{$design->status}}</p>
                            @endif
                            @if($design->status == "Inactive")
                                <p class="red">{{$design->status}}</p>
                            @endif                            
                        </td>
                     

                        <td class="BTNS-EDTY">    

                       
                             {{-- <a class="EditsY" href ="{{Route('Templates.show', $design->id)}}" > <i class="fa-solid fa-pen-ruler"></i></i> </a>  
                             <a class="EditsZ" href ="{{Route('FeaturedNTemplates.show', $design->id)}}" ><i class="fa-solid fa-photo-film"></i></i> </a> --}}

                             @can('Designs-edit')
                             <a class="Edits" href ="{{Route('Design.edit', $design->id)}}" > <i class="fa-solid fa-pen-to-square"></i> <span> EDIT </span> </a>  
                             @endcan

                             @can('Designs-delete')
                             <button class="Dlts" onclick="deleteData({{$design->id}})" type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span> </button> 
                             <form id ="delete-form-{{$design->id}}" action="{{Route('Design.destroy', $design->id)}}" method = "POST">
                             @csrf
                             @method('DELETE')
                             @endcan

                            </form>   

                          </td>
                       
                      </tr>

                    @endforeach
                    </tbody>
                  </table>
                </div>

                @else

                <div class="SAIBASA">
                    <H3 class="ORP">YOU HAVE NO ACCESS TO VIEW THIS DATA!!</H3>
                    <p class="DY">Reffer To Design Plus Admin to have an access to this Designs data.</p>
                </div>
  
                @endcan

    
            </div> <!--End Tabl01-->

         </div> <!--End M-Table-->

    </div> <!--End Main-->
 @endsection  

