@extends('Admin.Layout.App')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/Category.css')}}">
@endsection

@section('content')
@section('title','Category')
@section('navi','Category')


    <div class="main">

        <div  class = "M-Table">

            <div class="Table-1" >

                <div class="Table-con">

                    <div class="Cnt">
                        <H3 class="ORP">Categories</H3>
                        <p class="DY">Design Plus Category</p>
                    </div>

                    <div class="Cnt2">  
                        
                        @can('Category-delete')
                        <div class = "A-DD">
                            <a  href="{{route('archiveindex')}}" class ="ARCC">  <i class="fa-solid fa-box-archive"></i></a> 
                         </div>  
                        @endcan

                        @can('Category-create')
                         <div class = "A-DD">
                                <a  href="{{route('Category.create')}}" class ="Add-P">  <i class="fa-solid fa-plus"></i> <span> New </span></a> <!--Modal Button any -->
                         </div>  
                        @endcan
                    </div>

                </div>

                @can('Category-view')
                <div class = " Table-Section">
                 <table id="Category" class="display" style="width:100%">
                    <thead>
                      <tr>             
                        <th>Category</th>
                        <th>Service</th>
                        <th>Image</th>
                        <th>Status</th>  
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>


                    @foreach($category as $categories)
                      <tr>

                        <td>{{$categories->name}}</td>
                        <td>{{$categories->CategoryType->typename}}</td>
                        <td><img class = "DisplayIM" src="/images/Category_img/{{$categories->image}}" alt=""></td>
                        <td> 
                            @if($categories->status == "Active")
                                <p class="Done">{{$categories->status}}</p>
                            @endif
                            @if($categories->status == "Inactive")
                                <p class="red">{{$categories->status}}</p>
                            @endif                                                             
                        </td>
                     

                        <td class="BTNS-EDTY">                 
                             {{-- <a class="EditsP" href ="{{Route('PaperAdd.show', $categories->id)}}" > <i class="fa-solid fa-scroll"></i> </a> 
                             <a class="EditsT" href ="{{Route('Category.show', $categories->id)}}" > <i class="fa-solid fa-eye"></i> </a>  --}}
                             @can('Category-edit')
                             <a class="Edits" href ="{{Route('Category.edit', $categories->id)}}" > <i class="fa-solid fa-pen-to-square"></i> <span> EDIT </span>  </a> 
                             @endcan

                             @can('Category-delete')
                             <button class="Dlts" onclick="deleteData({{$categories->id}})" type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span> </button>
                             <form id ="delete-form-{{$categories->id}}" action="{{Route('Category.destroy', $categories->id)}}" method = "POST">     
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
                    <p class="DY">Reffer To Design Plus Admin to have an access to this Category data.</p>
                </div>
  
                @endcan

            </div>
<!---------------------------------------------------category type-------------------------------------------------------------> 
    </div>
</div>

@endsection  
