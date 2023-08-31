@extends('Admin.Layout.App')

@section('css')
<link rel="stylesheet" href="{{ asset('css/Products.css')}}">
<link rel="stylesheet" href="{{ asset('css/FeaturedNTemplates.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css">
@endsection
@section('content')
@section('title','Reports')
@section('navi','Reports')



<div class="main">

    <div class="cards">

        <div class = "card-08">

    
          
   
            <div class="card" >
                <div class="card-content">
                    <div class="number">₱ {{ number_format((float)($orders->sum('price') + $orders2->sum('price')), 2,".",",") }} </div>
                    <div class="card-name">Total Sales</div>
                </div>
                <div class="icon-box">
                    <i class="fa-brands fa-sellsy"></i>
                </div>
            </div>


            <div class="card">
                <div class="card-content">
                    <div class="number">₱  {{ number_format((float)($orders->sum('price') + $orders2->sum('price')) * .30, 2, ".",",") }} </div>
                    <div class="card-name"> Revenue</div>
                </div>
                <div class="icon-box">
                    <i class="fa-solid fa-sack-dollar"></i>
                </div>
            </div>


        </div>

      </div> 


      @can('Reports-view')
      <div class="charts">
        <div class="chart">
          <h2>Weeky Product Sales </h2>
          <div>
            <canvas id="myChart" ></canvas>
          </div>
        
      </div>
      <div class="chart doughnut-chartc" id="shart">
          <h2>Services Sales Monthly</h2>
          <canvas id="myCharts" ></canvas>
      </div>
     </div>
     @endcan

    <div  class = "M-Table">

      <div class="Table-2" >


          <div class="Table-con">

              <div class="Cnt">
                  <H3 class="ORP">Reports </H3>
                  <p class="DY"> Design Plus Reports</p>
              </div>

              @can('Reports-create')
              <div class="Cnt2">  
                        
             
                <div class = "A-DD">
                  <a  href="{{route('PrintPdfrREPO')}}" class ="Add-P">  <i class="fa-solid fa-print"></i> <span> Print  Reports / Weekly </span></a>
                 </div>

                 <div class = "A-DD">
                  <a  href="{{route('PrintPdfrSRVCS')}}" class ="Add-P">  <i class="fa-solid fa-print"></i> <span> Print Reports / Services </span></a> <!--Modal Button any -->
                </div>
            
                 
                 <div class = "A-DD">
                        <a  href="{{route('PrintPdfrPROD')}}" class ="Add-P">  <i class="fa-solid fa-print"></i> <span> Print Master list </span></a> <!--Modal Button any -->
                 </div>
                 
            </div> 
            @endcan
            
          </div>

          @can('Reports-view')
          <div class = " Table-Section">
          <table id="CategoryType" class="display" style="width:100%">
              <thead>
                <tr>
                  <th>Products</th>
                  <th>Sales</th>
                  <th>Revenue</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                
                @foreach ($daiki2 as  $dai)
                <tr>
                     <td>{{$dai->prodname}}</td>
                     <td>₱  {{ number_format((float)($dai->sales), 2, ".",",") }} </td>
                     <td>₱  {{ number_format((float)($dai->sales)  * .30 , 2, ".",",") }}</td>
                     <td>{{$dai->dateb}}</td>                         
                </tr>
                @endforeach
                
              </tbody>
            </table>         
          </div>

          @else
          <div class="SAIBASA">
              <H3 class="ORP">YOU HAVE NO ACCESS TO VIEW THIS DATA!!</H3>
              <p class="DY">Reffer To Design Plus Admin to have an access to this Products data.</p>
          </div>
          @endcan

    

     </div>

  </div>
  
</div> <!--End Main-->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
      
        new Chart(ctx, {
          type: 'bar',
     
          data: {
            labels: [
                @foreach ($daiki2 as  $dai)
                    '{{$dai->prodname}}',
                @endforeach
            ],
            datasets: [{
              label: 'Full',
              data:  [
                @foreach ($daiki2 as  $dai)
                    {{$dai->sales}},
                @endforeach
              ],
              borderWidth: 1
            },
            {
            label: 'Partial',
              data:  
              [   @foreach ($daiki23 as  $dai)
                    {{$dai->salesw}},
                  @endforeach],
              borderWidth: 1
          }]
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
  const ctx2 = document.getElementById('myCharts');

  new Chart(ctx2, {
    type: 'polarArea',
    data: {
      labels: [
        @foreach ($daiki3 as $manshine)
          '{{$manshine->typename}}',
        @endforeach 
        
  ],
  datasets: [{
    label: 'Product Sales',
    data: [
      @foreach ($daiki3 as $manshine)
          {{$manshine->sales}},
      @endforeach          
      
      ],
    backgroundColor: [
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(201, 203, 207)',
      'rgb(255, 99, 132)',  
    ]
  }]
    }
  });

</script>





 @endsection  

