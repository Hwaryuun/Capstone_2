<!--
<div class="container" id="CONTAINER">
    <div id="modal">

      <div class ="Top-Form">
        <h1 class = "M-TITTL">New Category Type</h1>      
      </div>

      <div class ="Mid-Form">

        <form action="{{Route('CategoryType.store')}}" method="POST" enctype="multipart/form-data" id = "ctadd">
        @csrf 

        <div class="field">
            <label>CategoryType Name</label>
            <input type="text" name="typename" placeholder="Example: Card" value="{{old('typename') ?? $categorytype->typename}}" style="@error('typename') border: 1px solid red; @enderror" >
            <span style="color: red;">@error('typename') {{$message}} @enderror </span>
         </div>  

         <div class="field">
            <label>status</label>
            <select class ="selects" name="status" id="" value="{{old('status')}}" style="@error('status') border: 1px solid red; @enderror">
            @if($categorytype->status == "Active")
                <option value="Active" selected>Active</option>
                <option value="Deactive">Deactive</option>
            @endif
            @if($categorytype->status == "Deactive")
                <option value="Deactive" selected>Deactive</option>
                <option value="Active" >Active</option>
            @endif
            </select>
            <span style="color: red;">@error('status') {{$message}} @enderror </span>
            
         </div>  

          <div class="BUTNS-ADX">
            <button id="close" class ="Add-ITM-C"> <i class="fa-solid fa-circle-xmark"></i> <span> Cancel </span></button>
            <button class ="Add-ITM" type="submit" > <i class="fa-solid fa-circle-plus"></i> <span> Add </span></button>
        </div>


        </form>

      </div>

    </div>
  </div>


 --->
