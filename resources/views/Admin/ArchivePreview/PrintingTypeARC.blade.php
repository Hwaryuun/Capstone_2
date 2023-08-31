@extends('Admin.Layout.App')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/Category.css')}}">
@endsection

@section('content')
@section('title','Service : Archives')
@section('navi','Service')


    <div class="main">

        <div  class = "M-Table">

            <div class="Table-2" >
    

                <div class="Table-con">
    
                    <div class="Cnt">
                        <H3 class="ORPRED">Service : Archive</H3>
                        <p class="DY">Support Group</p>
                    </div>
    
                    <div class="Cnt2h">           
                         <div class = "A-DD">
                            <a  href=" {{route ('CategoryType.index')}}"  class ="Add-P"> <i class="fa-solid fa-reply"></i> <span> Return </span></a> <!--Modal Button any -->
                        </div>  
           
                    </div>
    
                </div>
    
                <div class = " Table-Section">
                 <table id="CategoryType" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th>Service</th>   
                        <th>Deleted</th>         
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                       
                    @foreach($categorytype as $cattype)
                      <tr>
                            <td>{{$cattype->typename}}</td>
                            <td>{{$cattype->deleted_at->diffForHumans()}}</td>    

                            <td class="BTNS-EDTY">    

                                  <button class="Dlts"  onclick="deleteDataPermanent({{$cattype->id}})" type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span> </button>
                                  <form id  ="deleteP-form-{{$cattype->id}}" action="{{Route('printingTypedestroy', $cattype->id)}}" method = "POST"> 
                                    @csrf
                                    @method('DELETE')                             
                                 </form>
    
                                 <button class="EditsT" onclick="resetData({{$cattype->id}})" type="submit"><i class="fa-solid fa-repeat"></i>  <span> RESTORE </span> </button> 
                                 <form id  ="reset-form-{{$cattype->id}}" action="{{Route('printingTyperestore', $cattype->id)}}" method = "POST"> 
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
</div>

{{-- <script>


</script>  --}}

@endsection  