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
                        <H3 class="ORPRED">Suspended : Employee</H3>
                        <p class="DY">Employee Archive</p>
                    </div>

                    <div class="Cnt2h">  
                        <div class = "A-DD">
                               <a  href="{{route('Permision.index')}}" class ="Add-P"> <i class="fa-solid fa-reply"></i> <span> Return </span></a> <!--Modal Button any -->
                        </div>  
                   </div>
                </div>

      

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
                            
                          @foreach($oreki as $user)
                          <tr>
                           
                            <td>{{ $user->name }}</td>
                            <td>  @foreach($user->roles as $role)
                                  <span   @if ($role->name == "admin") style="background: rgb(255, 170, 0)"   @endif class="slas">  {{ $role->name }} </span>                 
                                  @endforeach</td>
                            <td>{{ $user->email }}</td>
                     
                            <td>{{$user->deleted_at->diffForHumans()}}</td>
                            <td class="BTNS-EDTY"> <button class="Dlts" onclick="ban({{$user->id}})"> <i class="fa-solid fa-user-slash"></i>  <span> DELETE </span> </button>
                                                        <form id ="ban-form-{{$user->id}}" action="{{Route('EMdestroy', $user->id)}}" method = "POST"> 
                                                        @csrf
                                                        @method('DELETE')
                                                       </form>
                                                       <button class="TERMINATES" onclick="revert({{$user->id}})" ><i class="fa-solid fa-users-rays"></i> REVERT USER </button> </td>
                                                       <form id ="revert-form-{{$user->id}}" action="{{Route('EMstore', $user->id)}}" method = "POST"> 
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
     <div>   


@endsection