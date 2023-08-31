@extends('Admin.Layout.App')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/Category.css')}}">
    
@endsection

@section('content')
@section('title','Audit Log')
@section('navi','Audit Log')

    <div class="main">

        <div  class = "M-Table">

            <div class="Table-2" >
    

                <div class="Table-con">
    
                    <div class="Cnt">
                        <H3 class="ORP">Audit Log </H3>
                        <p class="DY">Support Group</p>
                    </div>
                </div>
    
                @can('Audit-view')
                <div class = " Table-Section">
                 <table id="CategoryType" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th>Employee</th>
                        <th>Activity</th>
                        <th>Description</th>
                        <th>Occurred</th>
                      </tr>
                    </thead>
                    <tbody>
                       
                        @foreach($audit as $aud)
                      <tr>
                        
                            <td>{{$aud->UserLog->name}} </td>
                            <td>{{$aud->activity}}  </td>      
                            <td>{{$aud->description}}  </td>     
                            <td>{{$aud->created_at->diffForHumans()}}  </td>                                    
                      </tr>
                        @endforeach
                      
                    </tbody>
                  </table>         
                </div>
                
                @else

                <div class="SAIBASA">
                    <H3 class="ORP">YOU HAVE NO ACCESS TO VIEW THIS DATA!!</H3>
                    <p class="DY">Reffer To Design Plus Admin to have an access to this AuditLogs data.</p>
                </div>
  
                @endcan


        </div>
       
    </div>
</div>
@endsection  
