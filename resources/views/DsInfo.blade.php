
@extends('Customer.Layout.CustomerApp')

@section('contentFE')
@section('TopTTL','CheckOut')

    
    <section class="homes" id="home"> </section>


    <div class="specs">
    
    </div>

    <div class="specsxa">
        <span> COMPANNY PROFILE </span>
    </div>   

    <section class="packagesd" id="package">   
            @livewire('extentions.switch-info')
    </section>
@endsection  


