@extends('Customer.Layout.CustomerApp')

@section('contentFE')
@section('TopTTL','Dashboard')

    <section class="home" id="home"> </section>

        <!--container--->
        <section class="container">
            <div class="text">
                <h2>Our Services !</h2>
            </div>
            
            <div class="row-items">
                <div class="container-box">
                    <div class="container-img">
                        <img src="/images/Asset_img/printer.png">
                    </div>
                    <h4>Printing</h4>
                    <p>Digital and Offset</p>
                </div>

                <div class="container-box">
                    <div class="container-img">
                        <img src="/images/Asset_img/uploads.png">
                    </div>
                    <h4>Upload File</h4>
                    <p> Img or Document</p>
                </div>

                <div class="container-box">
                    <div class="container-img">
                        <img src="/images/Asset_img/image-editing.png">
                    </div>
                    <h4>Templates</h4>
                    <p>Edit Your own template</p>
                </div>
            </div>
        </section>


        <!--destination section--->
    <section class="destination" id="destination">
        <div class="core">
            <div class="title">
                <h2>Our Most Popular <br> Product!</h2>
            </div>

            <div class="destination-content">

            @foreach($featured as $ftr)

                <div class="col-content">   <!-- it can be href -->
                    <img src="/images/Clientfile_img/{{$ftr->Design->imagef}}">
                   
                    <a href=""> 
                        <div class="half">
                            <h5>{{$ftr->name}}</h5>
                            <p>{{$ftr->Products->name}}</p>
                        </div>
                        <i class="fa-solid fa-star"></i>
                    </a>
                </div>

            @endforeach  

            </div>
        </div>
    </section>


    <section class="newsletter" style="background-color:#ECECEC;">
        <div class="sirii">
            <h5> Order Calendar </h5>
            <div id='calendar' ></div>
        </div> 
        
        <div class="sirii">
            <h5> Order Calendar </h5>
            <div id='calendaryo' ></div>
        </div>  
         

     
    </section>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

    <script>
        //->format('Y-m-d')
              document.addEventListener('DOMContentLoaded', function() {
              
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                  initialView: 'dayGridMonth',
                  dayMaxEvents: true,  
                  
                //   headerToolbar: { 
                //   center: 'title',
                //   left: 'dayGridMonth,timeGridWeek,listWeek'
                // },
                  events: [
                 
                     @foreach ($sumeru as $order)
                        {
                        id: '{{$order->id}}', 
                        title: '{{$order->Products->name}}', 
                        start: '{{$order->created_at->addDay($order->Products->eproduction)->format('Y-m-d')}}', 
                        url:'{{route('MyOrders')}}'
                        },
                    @endforeach
                       
                    @foreach ($partial as $order)
                        {
                        id: '{{$order->id}}', 
                        title: '{{$order->Carts->ProductPricing->Products->name}}', 
                        start: '{{$order->created_at->addDay($order->Carts->ProductPricing->Products->eproduction)->format('Y-m-d')}}', 
                        url:'{{route('MyOrders')}}'
                        },
                    @endforeach
              
        
                    ]
                    
                });
                calendar.render();
              });    
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEls = document.getElementById('calendaryo');

        var calendar = new FullCalendar.Calendar(calendarEls, {
          timeZone: 'UTC',
          initialView: 'listWeek',

          // customize the button names,
          // otherwise they'd all just say "list"
          views: {
            listDay: { buttonText: 'DAY' },
            listWeek: { buttonText: 'WEEK' },
            listMonth: { buttonText: 'list month' }
          },

          headerToolbar: {
            left: 'title',
           
            right: 'listDay,listWeek'
          },
          events: [

            @foreach ($sumeru as $order)
                        {
                        id: '{{$order->id}}', 
                        title: 'Item : {{$order->Products->name}} -- {{$order->status}}', 
                        start: '{{$order->created_at->addDay($order->Products->eproduction)}}', 
                        url:'{{route('MyOrders')}}'
                        },
            @endforeach

            @foreach ($partial as $order)
                        {
                        id: '{{$order->id}}', 
                        title: 'Item : {{$order->Carts->ProductPricing->Products->name}} -- {{$order->statusODR}} ', 
                        start: '{{$order->created_at->addDay($order->Carts->ProductPricing->Products->eproduction)}}', 
                        url:'{{route('MyOrders')}}'
                        },
            @endforeach
        

      
          
          ]
        });

        calendar.render();
      });
  </script>



@endsection  
