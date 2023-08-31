
 @if ($paginator->hasPages())
<div class="containers">
    <ul class="pagination">

        @if ($paginator->onFirstPage())
        <li >  
             <div class="input-containes">
                    <input id="walks" type="button"  wire:click ='previousPage'  >
                    <div class="radio-tiles">
                    <label for="walks"><i class="fa-solid fa-caret-left"></i></label>
                    </div>
             </div>
        </li>
        @else
        <li >  
            <div class="input-containes">
                   <input id="walks" type="button"  wire:click ='previousPage' >
                   <div class="radio-tiles">
                   <label for="walks"><i class="fa-solid fa-caret-left"></i></label>
                   </div>
            </div>
       </li>
        @endif
        {{--  --}}
        @foreach ($elements as $element)
        @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ( $page == $paginator->currentPage())

                    <li >  
                        <div class="input-containes">
                               <input id="walks" type="radio" name="radios"  @checked(true)  wire:click = 'gotoPage({{$page}})'  >
                               <div class="radio-tiles">
                               <label for="walks">{{$page}}</label>
                               </div>
                        </div>
                   </li>

                    @else

                    <li >  
                        <div class="input-containes">
                               <input id="walks" type="radio" name="radios" @if($page == $paginator->currentPage()) @checked(true) @else wire:click = 'gotoPage({{$page}})' @endif >
                               <div class="radio-tiles">
                               <label for="walks">{{$page}}</label>
                               </div>
                        </div>
                   </li>
                    @endif
                @endforeach
        @endif
        @endforeach
    
        @if ($paginator->hasMorePages())
        <li>
            <div class="input-containes">
                <input id="walks" type="buttons" wire:click = 'nextPage' >
                <div class="radio-tiles">
                <label for="walks"><i class="fa-solid fa-caret-right"></i></label>
                </div>
            </div>
        </li>
        @else
        <li> 
            <div class="input-containes">
                <input id="walks" type="buttons">
                <div class="radio-tiles">
                <label for="walks"><i class="fa-solid fa-caret-right"></i></label>
                </div>
            </div>
        </li>
        @endif

    </ul>
</div>
@endif