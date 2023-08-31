@extends('Admin.Layout.App')
@section('css')
<link rel="stylesheet" href="{{ asset('css/Users.css')}}">
@endsection
@section('content')
@section('title','Users')
@section('navi','Users')

    <div class="main">

         <div  class = "M-Table">
            <div class="Table-1" >

                <div class="Table-con">
                    <div class="Cnt">
                        <H3 class="ORPRED">Suspended : Client Account</H3>
                        <p class="DY">Support Group</p>
                    </div>

                    <div class="Cnt2h">  
                        <div class = "A-DD">
                               <a  href="{{route('Users.index')}}" class ="Add-P"> <i class="fa-solid fa-reply"></i> <span> Return </span></a> <!--Modal Button any -->
                        </div>  
                   </div>
                </div>

      

                <div class = " Table-Section">
                <table id="Users" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>User Email</th>
                        <th>Contact Number</th>
                        <th>Ban</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                    @foreach($customer as $ctr)
                      <tr>
                        <td>{{$ctr->id}}</td>
                        <td>{{$ctr->firstname}} {{$ctr->lastname}}</td>
                        <td>{{$ctr->email}}</td>
                        <td>{{$ctr->contactnumber}}</td>
                        <td>{{$ctr->deleted_at->diffForHumans()}}</td>
                        <td class="BTNS-EDTY"> <button class="Dlts" onclick="ban({{$ctr->id}})"> <i class="fa-solid fa-user-slash"></i> <span> DELETE </span>  </button>
                                                    <form id ="ban-form-{{$ctr->id}}" action="{{Route('Usrdestroy', $ctr->id)}}" method = "POST"> 
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                   <button class="TERMINATES" onclick="revert({{$ctr->id}})" ><i class="fa-solid fa-users-rays"></i> REVERT USER </button> </td>
                                                   <form id ="revert-form-{{$ctr->id}}" action="{{Route('Usrstore', $ctr->id)}}" method = "POST"> 
                                                    @csrf
                                                    @method('PUT')       
                                                    </form>                 
                      </tr>
                      @endforeach
              
                      
                      
                    </tbody>
                  </table>
                </div>

            </div>


        </div>
     <div>   


@endsection