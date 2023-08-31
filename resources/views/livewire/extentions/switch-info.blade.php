<div>
    <div class="sekai">

        <div class="radio-tile-group" id="raids">

          <div class="input-container">
            <input id="bike" type="radio" name="radio"  wire:model = "status" value="0">
            <div class="radio-tile">
              <i class="fa-solid fa-file-circle-exclamation"></i>
              <label for="bike"> TERMS AND CONDITION </label>
            </div>
          </div>
    
            <div class="input-container">
              <input id="walk" type="radio" name="radio"  wire:model = "status" value="1">
              <div class="radio-tile">
                <i class="fa-solid fa-circle-info"></i>
                <label for="walk"> ABOUT US </label>
              </div>
            </div>
    
            <div class="input-container">
                <input id="bike" type="radio" name="radio" wire:model = "status" value="2">
                <div class="radio-tile">
                    <i class="fa-solid fa-comments"></i>
                  <label for="bike"> FAQS </label>
                </div>
              </div>

              <div class="input-container">
                <input id="bike" type="radio" name="radio" wire:model = "status" value="3">
                <div class="radio-tile">
                    <i class="fa-solid fa-toolbox"></i>
                  <label for="bike"> EQUIPMENT </label>
                </div>
              </div>

        </div>
    
        @if ($this->status == 1)
             @livewire('extentions.ab-u-s')
        @endif 
        @if ($this->status == 0)
           @livewire('extentions.terms-con')
        @endif
        @if ($this->status == 2)
              @livewire('extentions.fa-q')
        @endif 
        @if ($this->status == 3)
              @livewire('extentions.equip')
        @endif   
        
      </div>
</div>
