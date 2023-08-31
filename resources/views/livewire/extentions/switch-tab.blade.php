
<div class="sekai">

    <div class="radio-tile-group">

        <div class="input-container">
          <input id="walk" type="radio" name="radiox"   wire:model = "PTR" value="0">
          <div class="radio-tile">
            <i class="fa-solid fa-cart-flatbed"></i>
            <label for="walk">Orders</label>
          </div>
        </div>

        <div class="input-container">
          <input id="bike" type="radio" name="radiox"   wire:model = "PTR" value="1" >
          <div class="radio-tile">
            <i class="fa-solid fa-file-lines"></i>
            <label for="bike">Partial Orders</label>
          </div>
        </div>
    </div>

    @if ($this->PTR == 0)
         @livewire('extentions.my-orders2')
    @endif  

    @if ($this->PTR == 1)
       @livewire('extentions.my-orders')
    @endif  
    
  </div>

