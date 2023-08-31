@extends('Admin.Layout.App')
@section('css')
<link rel="stylesheet" href="{{ asset('css/Permision.css')}}">
@endsection
@section('content')
@section('title','Permission')
@section('navi','Permission')


    <!-- Primary end ------------------------------------------------------------------------------->

    <div class="main">

      <div  class = "M-Table">
        <!--  <div class="Table-1" >


          </div>-->

            <div class="Table-1" >

                <div class="Table-con">
                    <div class="Cnt">
                        <H3 class="ORP">User Level</H3>
                        <p class="DY">Roles and Permission</p>
                    </div>

                    <div class="Cnt2h">  

                      
                      @can('RolesAccess-create')
                      <div class = "A-DD">
                             <a  href="{{Route('UserLevel.create')}}" class ="Add-P">  <i class="fa-solid fa-plus"></i> <span> New </span></a> <!--Modal Button any -->
                      </div>
                      @endcan  
        
                 </div>
                </div>

                @can('RolesAccess-view')
                <div class = " Table-Section">
                <table id="Users" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th>Roles</th>
                        <th>Permission</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
 
                    <tbody>
                      @foreach ($roles as $role)
                      <tr>
                        <td>{{$role->name}}</td>       
                        <td> @if ($role->name == "admin")
                              <span style="background: rgb(255, 170, 0)" class="slas"> All Role Granted </span>
                        @else
                             @foreach ($role->permissions as $permissions) <span class="slas"> {{$permissions->name}} </span> @endforeach
                        @endif </td>   

                        <td class="BTNS-EDTYS">        

                          @if ($role->name != "admin")
                          
                          @can('RolesAccess-edit')
                          <a class="Edits" href ="{{Route('UserLevel.edit', $role->id)}}" > <i class="fa-solid fa-pen-to-square"></i> <span> EDIT </span> </a> 
                          @endcan
                          @can('RolesAccess-delete')
                          <button class="Dlts" onclick="deleteroles({{$role->id}})" type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span> </button> 
                          <form id ="delete-form-{{$role->id}}" action="{{Route('UserLevel.destroy', $role->id)}}" method = "POST">
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
                    <p class="DY">Reffer To Design Plus Admin to have an access to this Permissions data.</p>
                </div>
  
                @endcan

            </div>
  
        
{{-- 
        <div class="Table-2" >

            <div class="Table-con">
                <div class="Cnt">
                    <H3 class="ORP">Roles</H3>
                    <p class="DY">Support Group</p>
                </div>
                <div class="Cnt3">  


                    <div class="Addrole"> <!--Modal container -->
                       
                      <a  href="" class ="Add-P">  <i class="fa-solid fa-plus"></i> <span> New </span></a> <!--Modal Button any -->
                        
                       
                        <div id="demo-modal-F" class="modal"> <!--Modal Start-->
                            <div class="modal__content">
                               
                                <div class ="Top-Form">
                                    <h1 class = "M-TITTL">New Role</h1>      
                                </div>

                                <div class ="Mid-Form">
                                     <div class="field">
                                        <label>Role Name</label>
                                        <input type="text" placeholder="Example: Manager">
                                     </div>  
                
                                     <div class="field">
                                        <label>Status</label>
                                        <input type="text" placeholder="Active">
                                     </div>  

                                     <div class="BUTNS-AD">
                                        <button class ="Add-ITM-C"> <i class="fa-solid fa-circle-xmark"></i> <span> Cancel </span></button>
                                        <button class ="Add-ITM"> <i class="fa-solid fa-circle-plus"></i> <span> Add </span></button>
                                     </div>  

                                </div>               
                         
                            </div>
                        </div>
                    </div>        
                     
                    
                </div>
                  </div>

                  <div class = " Table-Section">
                    <table id="Permision" class="display" style="width:100%">
                        <thead>
                          <tr>
                            <th>Access Name</th>
                            <th>Add</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Users</td>
                            <td>  <input type="checkbox" value="None" class = "For-S" name="check" checked /> </td>
                            <td>  <input type="checkbox" value="None" class = "For-S" name="check" checked /> </td>
                            <td>  <input type="checkbox" value="None" class = "For-S" name="check" checked /> </td> 
                            <td class="BTNS-EDT"> <button class="Edits"><i class="fa-solid fa-pen-to-square"></i></button> </td>
                          </tr>
                          <tr>
                            <td>Users</td>
                            <td>  <input type="checkbox" value="None" class = "For-S" name="check" checked /> </td>
                            <td>  <input type="checkbox" value="None" class = "For-S" name="check" checked /> </td>
                            <td>  <input type="checkbox" value="None" class = "For-S" name="check" checked /> </td> 
                            <td class="BTNS-EDT"> <button class="Edits"><i class="fa-solid fa-pen-to-square"></i></button> </td>
    
                          </tr>
                          <tr>
                            <td>Users</td>
                            <td>  <input type="checkbox" value="None" class = "For-S" name="check" checked /> </td>
                            <td>  <input type="checkbox" value="None" class = "For-S" name="check" checked /> </td>
                            <td>  <input type="checkbox" value="None" class = "For-S" name="check" checked /> </td> 
                            <td class="BTNS-EDT"> <button class="Edits"><i class="fa-solid fa-pen-to-square"></i></button> </td>
    
                          </tr>
                          <tr>
                            <td>Users</td>
                            <td>  <input type="checkbox" value="None" class = "For-S" name="check" checked /> </td>
                            <td>  <input type="checkbox" value="None" class = "For-S" name="check" checked /> </td>
                            <td>  <input type="checkbox" value="None" class = "For-S" name="check" checked /> </td> 
                            <td class="BTNS-EDT"> <button class="Edits"><i class="fa-solid fa-pen-to-square"></i></button> </td>
    
                          </tr>
                          <tr>
                            <td>Users</td>
                            <td>  <input type="checkbox" value="None" class = "For-S" name="check" checked /> </td>
                            <td>  <input type="checkbox" value="None" class = "For-S" name="check" checked /> </td>
                            <td>  <input type="checkbox" value="None" class = "For-S" name="check" checked /> </td> 
                            <td class="BTNS-EDT"> <button class="Edits"><i class="fa-solid fa-pen-to-square"></i></button> </td>
    
                          </tr>
                          <tr>
                            <td>Users</td>
                            <td>  <input type="checkbox" value="None" class = "For-S" name="check" checked /> </td>
                            <td>  <input type="checkbox" value="None" class = "For-S" name="check" checked /> </td>
                            <td>  <input type="checkbox" value="None" class = "For-S" name="check" checked /> </td> 
                            <td class="BTNS-EDT"> <button class="Edits"><i class="fa-solid fa-pen-to-square"></i></button> </td>
    
                          </tr>
                          <tr>
                            <td>Users</td>
                            <td>  <input type="checkbox" value="None" class = "For-S" name="check" checked /> </td>
                            <td>  <input type="checkbox" value="None" class = "For-S" name="check" checked /> </td>
                            <td>  <input type="checkbox" value="None" class = "For-S" name="check" checked /> </td> 
                            <td class="BTNS-EDT"> <button class="Edits"><i class="fa-solid fa-pen-to-square"></i></button> </td>
    
                          </tr>
                          <tr>
                            <td>Users</td>
                            <td>  <input type="checkbox" value="None" class = "For-S" name="check" checked /> </td>
                            <td>  <input type="checkbox" value="None" class = "For-S" name="check" checked /> </td>
                            <td>  <input type="checkbox" value="None" class = "For-S" name="check" checked /> </td> 
                            <td class="BTNS-EDT"> <button class="Edits"><i class="fa-solid fa-pen-to-square"></i></button> </td>
    
                          </tr>
                          
                          
                        </tbody>
                      </table>
                    </div>

        </div> <!--End TB2--> --}}

        
      </div> <!--End MTBL-->


    </div> <!--End Main-->


@endsection