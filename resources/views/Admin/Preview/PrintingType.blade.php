@extends('Admin.Layout.App')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/Category.css')}}">
    
@endsection

@section('content')
@section('title','Service')
@section('navi','Service')


    <div class="main">

        <div  class = "M-Table">

            <div class="Table-2" >
    

                <div class="Table-con">
    
                    <div class="Cnt">
                        <H3 class="ORP">Service </H3>
                        <p class="DY">Design Plus Service</p>
                    </div>
    
                    <div class="Cnt2">  

                        @can('Service-delete')
                        <div class = "A-DD">
                            <a  href="{{route ('printingTypeindex')}}" class ="ARCC">  <i class="fa-solid fa-box-archive"></i></a> 
                         </div>  
                         @endcan
                         @can('Service-create')
                         <div class = "A-DD">
                            <a  href=" {{route ('CategoryType.create')}}"  class ="Add-P">  <i class="fa-solid fa-plus"></i> <span> New </span></a> <!--Modal Button any -->
                        </div>  
                        @endcan
                    </div>
    
                </div>
    
                @can('Service-view')
                <div class = " Table-Section">
                 <table id="CategoryType" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th>Service</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                       
                    @foreach($categorytype as $cattype)
                      <tr>
                            <td>{{$cattype->typename}}</td>
                            <td> 
                                @if($cattype->status == "Active")
                                    <p class="Done">{{$cattype->status}}</p>
                                @endif
                                @if($cattype->status == "Inactive")
                                    <p class="red">{{$cattype->status}}</p>
                                @endif           
                            </td>  

                      
                            <td class="BTNS-EDTY">        

                                    @can('Service-edit')
                                    <a class="Edits" href ="{{Route('CategoryType.edit',$cattype->id)}}" > <i class="fa-solid fa-pen-to-square"></i> <span> EDIT </span>  </a>                                                                                                                                                          
                                    @endcan  
                                    @can('Service-delete')
                                    <button class="Dlts" onclick="deleteData({{$cattype->id}})" ><i class="fa-solid fa-trash"></i> <span> DELETE </span>  </button> 
                                    {{-- onclick="return confirm('U Sure?')" --}}
                                    <form id  ="delete-form-{{$cattype->id}}"action="{{Route('CategoryType.destroy', $cattype->id)}}" method = "POST">
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
                    <p class="DY">Reffer To Design Plus Admin to have an access to this Sevices data.</p>
                </div>
                @endcan

        </div>
       
    </div>
</div>
{{-- 

<script>

    function deleteData(id){
        Swal.fire({
        title: 'Are you sure?',
        text: "You Can view this on Archives!",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
            // Swal.fire(
            // 'Deleted!',
            // 'Your file has been deleted.',
            // 'success'
            // )
        }
        })
    }

</script>  --}}

{{-- 
  <script>

    $(document).ready( function (){
        $(.Dlts).click(function (e) {
            e.preventDefault();

            var printing_id = $(this).val();
            $().mode
        }); 
    });

  </script> --}}
@endsection  