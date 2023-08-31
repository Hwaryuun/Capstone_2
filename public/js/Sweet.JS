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
    }
    })
}

function resetData(id){
    Swal.fire({
    title: 'Are you sure?',
    text: "You Can Now Access the Data!",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Restore it!'
    }).then((result) => {
    if (result.isConfirmed) {
        document.getElementById('reset-form-' + id).submit();
    }
    })
}

function deleteDataPermanent(id){
    Swal.fire({
    title: 'Are you sure?',
    text: "It will deleted Permanently !",
    icon: 'info',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
    if (result.isConfirmed) {
        document.getElementById('deleteP-form-' + id).submit();
    }
    })
}

function terminate(id){
    Swal.fire({
    title: 'Are you sure?',
    text: "You Can view this on Ban Section!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Suspend it!'
    }).then((result) => {
    if (result.isConfirmed) {
        document.getElementById('terminate-form-' + id).submit();
    }
    })
}
function ban(id){
    Swal.fire({
    title: 'Are you sure?',
    text: "This User will ban permanently !",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Confirm'
    }).then((result) => {
    if (result.isConfirmed) {
        document.getElementById('ban-form-' + id).submit();
    }
    })
}
function revert(id){
    Swal.fire({
    title: 'Are you sure?',
    text: "The User Can Access the account again!",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Revert it!'
    }).then((result) => {
    if (result.isConfirmed) {
        document.getElementById('revert-form-' + id).submit();
    }
    })
}
function deletecart(id){
    Swal.fire({
    title: 'Are you sure?',
    text: "This item will remove to your cart!",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#FF8706',
    confirmButtonText: 'Yes, remove it!'
    }).then((result) => {
    if (result.isConfirmed) {
        document.getElementById('delete-form-' + id).submit();
    }
    })
}

function deleteorder(id){
    Swal.fire({
    title: 'Remove Order ?',
    text: "It will only remove to your Order.",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#FF8706',
    confirmButtonText: 'Yes, remove it!'
    }).then((result) => {
    if (result.isConfirmed) {
        document.getElementById('delete-form-' + id).submit();
    }
    })
}

function deletehisto(id){
    Swal.fire({
    title: 'Remove History ?',
    text: "Your Trasanction and Order History will Remove.",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#FF8706',
    confirmButtonText: 'Yes, remove it!'
    }).then((result) => {
    if (result.isConfirmed) {
        document.getElementById('delete-form-' + id).submit();
    }
    })
}
function deleteroles(id){
    Swal.fire({
    title: 'Remove Roles ?',
    text: "This role will remove Permanently",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Yes, remove it!'
    }).then((result) => {
    if (result.isConfirmed) {
        document.getElementById('delete-form-' + id).submit();
    }
    })
}


function showie(idm){  
    Swal.fire({
    title: 'Your Design !',
    imageUrl: '/images/Clientfile_img/'+ idm,
    imageWidth: 600,
    imageHeight: 400,
    width: 800,
    confirmButtonColor: '#FF8706',
    // imageAlt: 'Custom image',
    })

}



    //    function registerings(){
    //      Swal.fire({
    //      title: 'Are you sure?',
    //      text: "You can access Design Plus products !",
    //      icon: 'info',
    //      showCancelButton: true,
    //      confirmButtonColor: '#3085d6',
    //      cancelButtonColor: '#d33',
    //      confirmButtonText: 'Register !'
    //      }).then((result) => {
    //         if (result.isConfirmed) {
    //            document.getElementById('owkay').submit();
    //         }
    //         })
    //    }


{/* <button class="Dlts"  onclick="deleteDataPermanent({{$cattype->id}})" type="submit"><i class="fa-solid fa-trash"></i></button>
<form id  ="deleteP-form-{{$cattype->id}}" action="{{Route('printingTypedestroy', $cattype->id)}}" method = "POST"> 
  @csrf
  @method('DELETE')                             
</form>

<button class="EditsT" onclick="resetData({{$cattype->id}})" type="submit"><i class="fa-solid fa-repeat"></i></button> 
<form id  ="reset-form-{{$cattype->id}}" action="{{Route('printingTyperestore', $cattype->id)}}" method = "POST"> 
  @csrf
  @method('PUT')        
</form> */}