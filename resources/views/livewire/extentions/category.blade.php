
 <div class="sheishi">
        <div class="seisi">

            <div class="saika">
            <H5> SERVICES :</H5>
            <span class="tilesi">
                <input type="radio" id="sport1" name="radio"  wire:click ="OrderAll" checked> 
                <label class="forx2" for="sport1"> Show All </label>
            </span>    
            
          
            @foreach ($categorytype as $cattype)
                <span class="tilesi">
                    <input type="radio" id="sport1{{$cattype->id}}" name="radio"  wire:click ="Orderby({{$cattype->id}})"> 
                    <label class="forx2" for="sport1{{$cattype->id}}"> {{$cattype->typename}} </label>
                </span>                     
            @endforeach


            </div>
        </div>
   

   <div class="nayuta">   
        <div class="destination-content">

                @foreach($category as $categories)

                <div class="col-content-c"> 
                    <img src="/images/Category_img/{{$categories->image}}">

                    <a href="{{Route('SProducts', $categories->id)}}"> 
                        <div class="half">
                            <h5>{{$categories->name}}</h5>
                            <p>{{$categories->CategoryType->typename}}</p>
                        </div>
                        <i class="fa-solid fa-eye"></i>
                    </a>
            
                </div>

                @endforeach

            </div>
            <div class="pagi">{{$category->links('chai')}}</div> 
    </div>
   
</div>   

