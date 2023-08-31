@extends('Admin.Layout.App')
@section('css')
<link rel="stylesheet" href="{{ asset('css/Users.css')}}">
@endsection
@section('content')
@section('title','Users')
@section('navi','Users')

    <div class="main">
        <div class="cards">
            <div class="card" >
                <div class="card-content">
                    <div class="number">{{$customercount }}</div>
                    <div class="card-name">Active User</div>
                </div>
                <div class="icon-box">
                    <i class="fa-solid fa-user-group"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="number">{{$customercount2 }}</div>
                    <div class="card-name"> Suspended Client</div>
                </div>
                <div class="icon-box">
                    <i class="fa-solid fa-user-tie"></i>
                </div>
            </div>
         </div>

         <div  class = "M-Table">
            <div class="Table-1" >

                <div class="Table-con">
                    <div class="Cnt">
                        <H3 class="ORP">Clients</H3>
                        <p class="DY">Design Plus Clients</p>
                    </div>

                    @can('Account-delete')
                    <div class="Cnt2h">            
                         <div class = "A-DD">
                            <a  href="{{route('Usrindex')}}" class ="ARCCS">  <i class="fa-solid fa-user-slash"></i></a> 
                         </div>  
                    </div> 
                    @endcan
                </div>

      
                @can('Account-view')
                <div class = " Table-Section">
                <table id="Users" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>User Email</th>
                        <th>Contact Number</th>
                        <th>Status</th>
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
                        <td>
                            @if ($ctr->email_verified_at)
                            <p class="Done">Verified</p>
                            @else
                            <p class="red">Not-Verified</p>
                            @endif</td>
                        <td class="BTNS-EDTY"> <a class="EditsT" href ="{{Route('Users.show', $ctr->id)}}" > <i class="fa-solid fa-eye"></i> <span> VIEW </span> </a>
                              
                        @can('Account-delete')
                        <button class="TERMINATE" onclick="terminate({{$ctr->id}})" ><i class="fa-solid fa-ban"></i> SUSPEND </button>  </td>
                        <form id ="terminate-form-{{$ctr->id}}" action="{{Route('Users.destroy', $ctr->id)}}" method = "POST">
                            @csrf
                            @method('DELETE')
                        </form>
                        @endcan
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