@extends('Admin.Layout.App')
@section('css')
<link rel="stylesheet" href="{{ asset('css/Users.css')}}">
@endsection
@section('content')
@section('title','Employee')
@section('navi','Employee')

    <div class="main">
   
         <div  class = "M-Table">
            <div class="Table-1" >

                <div class="Table-con">
                    <div class="Cnt">
                        <H3 class="ORP">Employee</H3>
                        <p class="DY">Employee Roles</p>
                    </div>


                    <div class="Cnt2">  
                        
                      @can('Account-delete')
                        <div class = "A-DD">
                          <a  href="{{route('EMindex')}}" class ="ARCCS">  <i class="fa-solid fa-user-slash"></i></a> 
                      </div>   
                      @endcan

                      @can('Account-create')
                       <div class = "A-DD">
                              <a  href="{{route('Permision.create')}}" class ="Add-P">  <i class="fa-solid fa-plus"></i> <span> New </span></a> <!--Modal Button any -->
                       </div>  
                       @endcan
         
                  </div>
              
                </div>

      
                @can('Account-view')
                <div class = " Table-Section">
                <table id="Users" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Roles</th>
                        <th>Email</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                      @foreach($users as $user)
                      <tr>
                       
                        <td>{{ $user->name }}</td>
                        <td>  @foreach($user->roles as $role)
                              <span   @if ($role->name == "admin") style="background: rgb(255, 170, 0)"   @endif class="slas">  {{ $role->name }} </span>                 
                              @endforeach</td>
                        <td>{{ $user->email }}</td>
                 
                        <td class="BTNS-EDTY"> 
                           
                          @if ($role->name != "admin" )

                          @can('Account-edit')
                          <a class="Edits" href ="{{Route('Permision.edit', $user->id)}}" > <i class="fa-solid fa-pen-to-square"></i> <span> EDIT </span> </a> 
                          @endcan
                          @can('Account-delete')
                          <button class="TERMINATE" onclick="terminate({{$user->id}})" ><i class="fa-solid fa-ban"></i> SUSPEND </button> 
                          <form id ="terminate-form-{{$user->id}}" action="{{Route('Permision.destroy', $user->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                          </form>    
                          @endcan     
                          @endif
                         </td>

                     
                     
                      </tr>
                      @endforeach
                                
                    </tbody>
                  </table>
                </div>

                @else

                <div class="SAIBASA">
                    <H3 class="ORP">YOU HAVE NO ACCESS TO VIEW THIS DATA!!</H3>
                    <p class="DY">Reffer To Design Plus Admin to have an access to this Employee data.</p>
                </div>
  
                @endcan

            </div>


        </div>
     <div>   


@endsection