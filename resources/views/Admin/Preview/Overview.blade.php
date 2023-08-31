@extends('Admin.Layout.App')

@section('css')

{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script> --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css">
<link rel="stylesheet" href="{{ asset('css/Overview.css')}}">
@endsection
@section('content')
@section('title','Overview')
@section('navi','Overview')

    <div class="main">                                              <!-- Main div was needed ------------------------------------------------------------------------------->
        <div class="cards">
            <div class="card" >
                <div class="card-content">
                    <div class="number">₱ {{ number_format((float)($orders->sum('price') + $orders2->sum('price')), 2, ".",",") }} </div>
                    <div class="card-name">Total Products Sales</div>
                </div>
                <div class="icon-box">
                    <i class="fa-brands fa-sellsy"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="number">₱  {{ number_format((float)($orders->sum('price') + $orders2->sum('price')) * .30, 2,".",",") }} </div>
                    <div class="card-name"> Revenue</div>
                </div>
                <div class="icon-box">
                    <i class="fa-solid fa-sack-dollar"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="number">{{count($customer)}}</div>
                    <div class="card-name">Users</div>
                </div>
                <div class="icon-box">
                    <i class="fas fa-users"></i>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="number">{{count($orders) + count($orders2)}}</div>
                    <div class="card-name">Total Orders</div>
                </div>
                <div class="icon-box">
                    <i class="fa-solid fa-cash-register"></i>
                </div>
            </div>
        </div>
        

          {{--   <div id="curve_chart" style="width: 900px; height: 500px"></div>  --}}
      
           <div class="charts">
                <div class="chart">
                  <h2>Sales Preview Daily</h2>
                  <div>
                    <canvas id="myChart" ></canvas>
                  </div>
                
              </div>
              <div class="chart doughnut-chartc" id="shart">
                  <h2>Orders Status</h2>
                  <canvas id="myCharts" ></canvas>
              </div>
          </div>
         


      {{-- <div class="charts">
            <div class="chart">
                <h2>Revenue Preview</h2>
                <canvas id="lineChart"></canvas>
            </div>
            <div class="chart doughnut-chart">
                <h2>Products</h2>
                <canvas id="doughnut"></canvas>
            </div>
        </div> --}}

        <div  class = "tablexxx">
        <div class="upcommingurdirs">
          <div id='calendar' ></div>
        </div>

        <div class="upcommingurdirs">
          <div id='calendaryo' ></div>
        </div>
      </div>
       
{{-- 
        <div  class = "M-Table">
            <div class="Table-1" >

                <div class="Table-con">
                    <div class="Cnt">
                        <H3 class="ORP"> Unclaimed Order</H3>
                        <p class="DY">Support Group</p>
                    </div>
                    <div class="Cnt2">  
                        <a href="#" class="ORPS">View More</a>
                    </div>
                </div>

                <div class = " Table-Section">
                <table id="ORDERUNC" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Order Name</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Domenic</td>
                        <td><p class="Quantity-2">25,000</p></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Sally</td>
                        <td><p class="Quantity-2">25,000</p></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Nick</td>
                        <td><p class="Quantity-2">25,000</p></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Nick</td>
                        <td><p class="Quantity-2">25,000</p></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Nick</td>
                        <td> <p class="Quantity-2">25,000</p> </td>
                      </tr>
                         <tr>
                        <td>3</td>
                        <td>Nick</td>
                        <td> <p class="Quantity-2">25,000</p> </td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
            </div>

            <div class="Table-2">

                <div class="Table-con">
                    <div class="Cnt">
                        <H3 class="ORP">Order Pending</H3>
                        <p class="DY">Today</p>
                    </div>
                    <div class="Cnt2">
                        <a href="#" class="ORPS">View More</a>
                    </div>
                </div>

            <div class = " Table-Section">
                <table id="ORDERPEN" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Order Name</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Domenic</td>
                        <td>  <p class="Process">In Process</p> </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Sally</td>
                        <td> <p class="Process">In Process</p></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Nick</td>
                        <td> <p class="New">New</p></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Nick</td>
                        <td> <p class="New">New</p></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Nick</td>
                        <td> <p class="Done">Done</p></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Nick</td>
                        <td> <p class="Done">Done</p></td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
            </div>
      </div> --}}

     
  
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

    <script>
//->format('Y-m-d')
      document.addEventListener('DOMContentLoaded', function() {
      
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          dayMaxEvents: true,  
          
          headerToolbar: { 
          center: 'title',
          left: 'dayGridMonth,timeGridWeek,listWeek'
        },
          events: [
            @foreach ($orders as $order)
            {
              id: '{{$order->id}}', 
              title: '{{$order->Orders->ClientAcc->firstname}}', 
              start: '{{$order->created_at->addDay($order->Products->eproduction)}}', 
              url:'{{route('OrdersUpdate', $order->id)}}'
            },
            @endforeach

            @foreach ($orders2 as $order2)
            {
              id: '{{$order2->id}}', 
              title: '{{$order2->Orders->ClientAcc->firstname}}', 
              start: '{{$order2->created_at->addDay($order2->Carts->ProductPricing->Products->eproduction)}}', 
              url:'{{route('PartialUpdate', $order2->id)}}'
            },
            @endforeach

            @foreach ($coset2 as $order2)
                {
                  id: '{{$order2->id}}', 
                  title: '{{$order2->statusODR}}', 
                  start: '{{$order2->created_at->addDay($order2->Carts->ProductPricing->Products->eproduction)->format('Y-m-d')}}', 
                  url:'{{route('PartialUpdate', $order2->id)}}'
                },
            @endforeach

            @foreach ($coset as $order)  
            {
              id: '{{$order->id}}', 
              title: '{{$order->status}}', 
              start: '{{$order->created_at->addDay($order->Products->eproduction)->format('Y-m-d')}}', 
              url:'{{route('OrdersUpdate', $order->id)}}'
            },
            @endforeach

            
            ]
            
        });
        calendar.render();
      });

    </script>

{{-- 
<script>
  //->format('Y-m-d')
        document.addEventListener('DOMContentLoaded', function() {
        
          var calendarEl = document.getElementById('calendar');
          var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            dayMaxEvents: true,  
            
            headerToolbar: { 
            center: 'title',
            left: 'dayGridMonth,timeGridWeek'
          },
            events: [
              @foreach ($orders as $order)
              {
                id: '{{$order->id}}', 
                title: '{{$order->Orders->ClientAcc->firstname}}', 
                start: '{{$order->created_at->addDay($order->Products->eproduction)}}', 
                url:'{{route('OrdersUpdate', $order->id)}}'
              },
              @endforeach
  
              @foreach ($orders2 as $order2)
              {
                id: '{{$order2->id}}', 
                title: '{{$order2->Orders->ClientAcc->firstname}}', 
                start: '{{$order2->created_at->addDay($order2->Carts->ProductPricing->Products->eproduction)}}', 
                url:'{{route('PartialUpdate', $order2->id)}}'
              },
              @endforeach
  
              
              ]
              
          });
          calendar.render();
        });
  
      </script> --}}

        <script>
          document.addEventListener('DOMContentLoaded', function() {
              var calendarEls = document.getElementById('calendaryo');

              var calendar = new FullCalendar.Calendar(calendarEls, {
                timeZone: 'UTC',
                initialView: 'listWeek',

                // customize the button names,
                // otherwise they'd all just say "list"
                views: {
                  listDay: { buttonText: 'list day' },
                  listWeek: { buttonText: 'list week' },
                  listMonth: { buttonText: 'list month' }
                },

                headerToolbar: {
                  left: 'title',
                 
                  right: 'listDay,listWeek'
                },
                events: [
                @foreach ($orders as $order)  
                {
                  id: '{{$order->id}}', 
                  title: 'JOB ID : {{$order->Orders->tracking_no}}', 
                  start: '{{$order->created_at->addDay($order->Products->eproduction)}}', 
                  url:'{{route('OrdersUpdate', $order->id)}}'
                },
                @endforeach

                @foreach ($orders2 as $order2)
                {
                  id: '{{$order2->id}}', 
                  title: 'JOB ID : {{$order2->Orders->tracking_no}}', 
                  start: '{{$order2->created_at->addDay($order2->Carts->ProductPricing->Products->eproduction)}}', 
                  url:'{{route('PartialUpdate', $order2->id)}}'
                },
                @endforeach

                @foreach ($coset2 as $order2)
                {
                  id: '{{$order2->id}}', 
                  title: '{{$order2->statusODR}} -- {{$order2->Orders->tracking_no}}', 
                  start: '{{$order2->created_at->addDay($order2->Carts->ProductPricing->Products->eproduction)->format('Y-m-d')}}', 
                  url:'{{route('PartialUpdate', $order2->id)}}'
                },
                 @endforeach

                @foreach ($coset as $order)  
                {
                  id: '{{$order->id}}', 
                  title: '{{$order->status}} -- {{$order->Orders->tracking_no}}', 
                  start: '{{$order->created_at->addDay($order->Products->eproduction)->format('Y-m-d')}}', 
                  url:'{{route('OrdersUpdate', $order->id)}}'
                },
                @endforeach

           

                

                
                ]
              });

              calendar.render();
            });
        </script>

      <script>
        const ctx = document.getElementById('myChart');
      
        new Chart(ctx, {
          type: 'line',
          data: {
            labels: [
              @foreach ($daiki as $manshines)
                '{{$manshines->created_at->format('F j ')}}', 
              @endforeach 
              
              ],
            datasets: [{
              label: 'Full Payment Order',
              data: [

                @foreach ($daiki as $manshine)
                {{$manshine->sales}},
                @endforeach 
              ],
              borderWidth: 1
            },
            {
              label: 'Partial Payment Order',
              data: [
                @foreach ($daiki2 as $manshine)
                {{$manshine->sales}},
                @endforeach   
              ],
              borderWidth: 1
            }
            ]
          },
          
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            },
      
       
          }
        });
      </script>

          

    <script>
      const ctxs = document.getElementById('myCharts');

      new Chart(ctxs, {
        type: 'doughnut',
        data: {
          labels: [
              'New-Order', 'In-Progress', 'Finished',
          ],
          datasets: [{
            label: 'Number Of Orders',
            data:  [
              {{$stats12}},  
              {{$stats2}},  
              {{$stats3}},
            ],
            borderWidth: 1
          },
        ]
        }
      });
    </script>
@endsection



        
 





