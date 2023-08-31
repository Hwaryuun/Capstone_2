<div>
    <div class="sheishi">
        <div class="seisi">

            <div class="saika">
            <H5> CATEGORY :</H5>
            <span class="tilesi">
                <input type="radio" id="sport1" name="radio"  wire:click ="OrderAll" checked> 
                <label class="forx2" for="sport1"> Show All </label>
            </span>    
            
            @foreach ($category as $cat)
            <span class="tilesi">
                <input type="radio" id="sport1{{$cat->id}}" name="radio"  wire:click ="Orderby({{$cat->id}})"> 
                <label class="forx2" for="sport1{{$cat->id}}"> {{$cat->name}} </label>
            </span>           
            @endforeach

   
            </div>
        </div>


        <div class="nayuta">   
   
        <div class="destination-content">
            @foreach ($products as $produds)
                <div class="col-content2">   <!-- it can be href -->
                    <img src="/images/Product_img/{{$produds->image}}">
                    <h5>{{$produds->name}}</h5>
                    <p>{{$produds->Category->name}}</p>
                    <a title="To Specification" href="{{Route('DSProducts', $produds->id )}}"> <i class="fa-solid fa-tag"></i> </a>
                </div>
            @endforeach
        
        </div>  
                 <div class="pagi">{{$products->links('chai')}}</div> 
         </div>
 
    </div>

</div>


