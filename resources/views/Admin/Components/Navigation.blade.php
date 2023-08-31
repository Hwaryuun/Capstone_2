
   <div class="TOP-NAV">
        <div class="logo">
            <img src="/images/Asset_img/DW.png" alt="">
            <h3>Design Plus</h3>  
        </div>

        {{-- <div class="Navigation">
            <h2 class = navigate>@yield('navi')</h2>
        </div> --}}
     
        <!--
        <div class="search">
            <input type="text" name="search" placeholder="search here">
            <label for="search"><i class="fas fa-search"></i></label>
        </div>

        <a href="" class="Notification">
            <span class="Notif"> <i class="fas fa-bell"></i> </span>
        </a>
     -->
     
        <div class="dd_main">
            <span class="Name"> {{auth()->user()->name}}</span>
            <i class="fa-solid fa-user"></i></span>   
       
            <div class="dd_menu">
                <div class="dd_left">
                    <ul>               
                        <li> <i class="fas fa-sign-out-alt"></i></li>
                    </ul>
                </div>
                <div class="dd_right">
                    <ul>          
                        <li> <a href="{{Route('logout')}}"> Logout</a> </li>
                    </ul>
                </div>
            </div>

        </div>

   </div>
        
    <div class = "Side-NAV">

        <ul class = "Menu">                                                              <!-- Menu sa gilid-->

            <li class="{{ Request::is('admin/Overview') ? 'active' : ''}}">
                <a href="{{route('Overview.index')}}">                                                           
                    <span class="Icon"><i class="fa-solid fa-chart-pie"></i></span>
                    <span class="Text"> Overview </span>
                </a>
            </li>

            @if(auth()->user()->can('Account-view') || auth()->user()->can('Account-edit') || auth()->user()->can('Account-create') || auth()->user()->can('Account-delete'))
            <li>                                                                   
                <a href="#" class="dropdown-Account"> 
                    <span class="Icon"><i class="fa-solid fa-user"></i></span>
                    <span class="Text"> Account </span>
                    <span class="Arrow"><i class="fa-solid fa-sort-down"></i></span>
                </a>

                <ul class="submenu-Account {{ Request::is('admin/Users') || Request::is('admin/Permision')  ? 'show' : ''}}">
                    <li class="{{ Request::is('admin/Users') ? 'active' : ''}}"> 
                        <a href="{{route('Users.index')}}">                                                           
                            <span class="Icon"><i class="fa-solid fa-id-card"></i></span>
                            <span class="Text"> Client </span>
                        </a>
                    </li>  
                    <li class="{{ Request::is('admin/Permision') ? 'active' : ''}}">  
                        <a href="{{route('Permision.index')}}">                                                           
                            <span class="Icon"> <i class="fa-solid fa-id-card-clip"></i></span>
                            <span class="Text"> Employee </span>
                        </a>  
                    </li>             
                </ul>

            </li>
            @endif


         <!---->   @if(auth()->user()->can('RolesAccess-view') || auth()->user()->can('RolesAccess-edit') || auth()->user()->can('RolesAccess-create') || auth()->user()->can('RolesAccess-delete'))
            <li class="{{ Request::is('admin/UserLevel') ? 'active' : ''}}">  
                <a href="{{route('UserLevel.index')}}">                                                           
                    <span class="Icon"><i class="fa-solid fa-universal-access"></i></span>
                    <span class="Text"> Roles And Permission </span>
                </a>    
            </li>
            @endif
    

            @if(auth()->user()->can('Orders-view') || auth()->user()->can('Orders-edit') || auth()->user()->can('Orders-create') || auth()->user()->can('Orders-delete'))
            <li>                                                                   
                <a href="#" class="dropdown-Order"> 
                    <span class="Icon"><i class="fa-solid fa-money-check"></i></span>
                    <span class="Text"> Orders </span>
                    <span class="Arrow"><i class="fa-solid fa-sort-down"></i></span>
                </a>

                <ul class="submenu-Order {{ Request::is('admin/Orders') || Request::is('admin/OrdersProgress') || Request::is('admin/OrdersFinished') || Request::is('admin/Partial') || Request::is('admin/PartialProgress') || Request::is('admin/PartialFinished') ? 'show' : ''}}" >
                    <li class="{{ Request::is('admin/Orders') || Request::is('admin/OrdersProgress') || Request::is('admin/OrdersFinished') ? 'active' : ''}}"> 
                        <a href="{{route('Orders.index')}}">                                                           
                            <span class="Icon"><i class="fa-solid fa-money-bill"></i></span>
                            <span class="Text"> Fully-Paid </span>
                        </a>
                    </li>   
                    <li class="{{ Request::is('admin/Partial') || Request::is('admin/PartialProgress') || Request::is('admin/PartialFinished') ? 'active' : ''}}">  
                        <a href="{{route('Partial.index')}}">                                                         
                            <span class="Icon"><i class="fa-solid fa-coins"></i></span>
                            <span class="Text"> Partially-Paid </span>
                        </a>  
                    </li>  
                  
                </ul>

            </li> 
          
            @endif

         
          
            @if(auth()->user()->can('Service-view') || auth()->user()->can('Service-edit') || auth()->user()->can('Service-create') || auth()->user()->can('Service-delete'))
          
            <hr>  <!----------------------------------------------------->      

            <li class="{{ Request::is('admin/CategoryType') ? 'active' : ''}}">  
                <a href="{{route('CategoryType.index')}}">                                                           
                    <span class="Icon"><i class="fa-solid fa-print"></i></span>
                    <span class="Text"> Services </span>
                </a>  
            </li>
            @endif

            @if(auth()->user()->can('Category-view') || auth()->user()->can('Category-edit') || auth()->user()->can('Category-create') || auth()->user()->can('Category-delete'))
            {{-- @if('Category-view', 'Category-edit', 'Category-create', 'Category-delete') --}}
            <li class="{{ Request::is('admin/Category') ? 'active' : ''}}">  
                <a href="{{route('Category.index')}}">                                                           
                    <span class="Icon"><i class="fa-solid fa-layer-group"></i></span>
                    <span class="Text"> Categories </span>
                </a>  
            </li>
            @endif
            {{-- @endcan   --}}
                                 
            @if(auth()->user()->can('Products-view') || auth()->user()->can('Products-edit') || auth()->user()->can('Products-create') || auth()->user()->can('Products-delete'))
            <li class="{{ Request::is('admin/Products') ? 'active' : ''}}"> 
                <a href="{{route('Products.index')}}">                                                           
                    <span class="Icon"><i class="fa-solid fa-tags"></i></span>
                    <span class="Text"> Products </span>
                </a>
            </li> 
       
            <hr>  <!----------------------------------------------------->
            @endif  

            @if(auth()->user()->can('Specs-view') || auth()->user()->can('Specs-edit') || auth()->user()->can('Specs-create') || auth()->user()->can('Specs-delete'))
            <li>                                                                        
                <a href="#" class="dropdown-Inventory"> 
                    <span class="Icon"><i class="fa-solid fa-sliders"></i></i></span>
                    <span class="Text"> Specifications </span>
                    <span class="Arrow"><i class="fa-solid fa-sort-down"></i></span>
                </a>

                <ul class="submenu-Inventory {{ Request::is('admin/Papers') || Request::is('admin/PaperTypes')  || Request::is('admin/Quantity')  || Request::is('admin/Leaf')  || Request::is('admin/Size') || Request::is('admin/PricingType') || Request::is('admin/Pricing') || Request::is('admin/PaperSpecs') ? 'show' : ''}}">
                    
                    <li>                                                                        
                        <a href="#" class="dropdown-PT"> 
                            <span class="Icon"><i class="fa-solid fa-paste"></i></span>
                            <span class="Text"> Papers </span>
                            <span class="Arrow"><i class="fa-solid fa-sort-down"></i></span>
                        </a>
        
                        <ul class="submenu-PT  {{ Request::is('admin/Papers') || Request::is('admin/PaperTypes') ||  Request::is('admin/PaperSpecs')  ? 'show' : ''}}">                  
                            
                            <li class="{{ Request::is('admin/Papers') ? 'active' : ''}}"> 
                                <a href="{{route('Papers.index')}}">                                                           
                                    <span class="Icon"><i class="fa-solid fa-scroll"></i></span>
                                    <span class="Text"> Stock </span>
                                </a>
                            </li>   
                            <li class="{{ Request::is('admin/PaperTypes') ? 'active' : ''}}">  
                                <a href="{{route('PaperTypes.index')}}">                                                           
                                    <span class="Icon"><i class="fa-solid fa-book-open"></i></span>
                                    <span class="Text"> Type </span>
                                </a>  
                            </li>  
                            
                            <li class="{{ Request::is('admin/PaperSpecs') ? 'active' : ''}}">  
                                <a href="{{route('PaperSpecs.index')}}">                                                           
                                    <span class="Icon"><i class="fa-solid fa-tarp"></i></span>
                                    <span class="Text"> Adjustments  </span>
                                </a>  
                            </li>  

                        </ul>
        
                    </li>

              
                    <li class="{{ Request::is('admin/Size') ? 'active' : ''}}">  
                        <a href="{{route('Size.index')}}">                                                           
                            <span class="Icon"><i class="fa-solid fa-maximize"></i></span>
                            <span class="Text"> Size </span>
                        </a>  
                    </li>  

                    <li>                                                                        
                        <a href="#" class="dropdown-PRSC"> 
                            <span class="Icon"><i class="fa-solid fa-money-check-dollar"></i></span>
                            <span class="Text"> Prices </span>
                            <span class="Arrow"><i class="fa-solid fa-sort-down"></i></span>
                        </a>
        
                        <ul class="submenu-PRSC  {{ Request::is('admin/PricingType') || Request::is('admin/Pricing')  ? 'show' : ''}}">
                            
                            
                            <li class="{{ Request::is('admin/PricingType') ? 'active' : ''}}"> 
                                <a href="{{route('PricingType.index')}}">                                                           
                                    <span class="Icon"><i class="fa-solid fa-tags"></i></span>
                                    <span class="Text"> Pricing By </span>
                                </a>
                            </li>   
                            <li class="{{ Request::is('admin/Pricing') ? 'active' : ''}}">  
                                <a href="{{route('Pricing.index')}}">                                                           
                                    <span class="Icon"><i class="fa-solid fa-barcode"></i></span>
                                    <span class="Text"> Retail Price </span>
                                </a>  
                            </li>  
        
                        </ul>
        
                    </li>

               
                    <li>                                                                        
                        <a href="#" class="dropdown-QT"> 
                            <span class="Icon"><i class="fa-solid fa-layer-group"></i></span>
                            <span class="Text"> Quantities </span>
                            <span class="Arrow"><i class="fa-solid fa-sort-down"></i></span>
                        </a>
        
                        <ul class="submenu-QT  {{Request::is('admin/Quantity') || Request::is('admin/Leaf')  ? 'show' : ''}}">
                            
                            
                            <li class="{{ Request::is('admin/Quantity') ? 'active' : ''}}"> 
                                <a href="{{route('Quantity.index')}}">                                                           
                                    <span class="Icon"><i class="fa-solid fa-boxes-stacked"></i></span>
                                    <span class="Text"> Quantity </span>
                                </a>
                            </li>   
                            <li class="{{ Request::is('admin/Leaf') ? 'active' : ''}}">  
                                <a href="{{route('Leaf.index')}}">                                                           
                                    <span class="Icon"><i class="fa-solid fa-book"></i></span>
                                    <span class="Text"> Pages </span>
                                </a>  
                            </li>  
        
                        </ul>
        
                    </li>

                </ul>

            </li>
            @endif 

               
      <!--      <li>                                                                       
                <a href="#" class="dropdown-SPC"> 
                    <span class="Icon"><i class="fa-solid fa-sliders"></i></span>
                    <span class="Text"> Component </span>
                    <span class="Arrow"><i class="fa-solid fa-sort-down"></i></span>
                </a>

                <ul class="submenu-SPC  ? 'show' : ''}}">

              
                           
                </ul>

            </li>-->

            @if(auth()->user()->can('Designs-view') || auth()->user()->can('Designs-edit') || auth()->user()->can('Designs-create') || auth()->user()->can('Designs-delete'))
           <li>
                <a href="#" class="dropdown-FT"> 
                    <span class="Icon"><i class="fa-solid fa-pen-nib"></i></span>
                    <span class="Text"> Designs </span>
                    <span class="Arrow"><i class="fa-solid fa-sort-down"></i></span>
                </a>
   
                <ul class="submenu-FT  {{ Request::is('admin/Design') || Request::is('admin/FeaturedNTemplates')  || Request::is('admin/Templates')  ? 'show' : ''}}" >
                    <li class="{{ Request::is('admin/Design') ? 'active' : ''}}"> 
                        <a href="{{route('Design.index')}}">                                                           
                            <span class="Icon"><i class="fa-solid fa-brush"></i></span>
                            <span class="Text"> Design </span>
                        </a>
                    </li>   
                    <li class="{{ Request::is('admin/FeaturedNTemplates') ? 'active' : ''}}">  
                        <a href="{{route('FeaturedNTemplates.index')}}">                                                         
                            <span class="Icon"> <i class="fa-solid fa-star"></i></span>
                            <span class="Text"> Featured </span>
                        </a>  
                    </li>  
                    <li class="{{ Request::is('admin/Templates') ? 'active' : ''}}">  
                        <a href="{{route('Templates.index')}}">                                                           
                            <span class="Icon"><i class="fa-solid fa-toggle-on"></i></span>
                            <span class="Text"> Templates </span>
                        </a>  
                    </li>                    
                </ul>
            </li>
            @endif

            @if(auth()->user()->can('Models-view') || auth()->user()->can('Models-edit') || auth()->user()->can('Models-create') || auth()->user()->can('Models-delete'))

            <li class="{{ Request::is('admin/Dimentional') ? 'active' : ''}}">                                                                      
                <a href="{{route('Dimentional.index')}}"> 
                    <span class="Icon"><i class="fa-brands fa-unity"></i></span>
                    <span class="Text"> Models </span>
                </a>
            </li>

            <hr> 
            @endif

            @if(auth()->user()->can('Reports-view') || auth()->user()->can('Reports-edit') || auth()->user()->can('Reports-create') || auth()->user()->can('Reports-delete'))
            <li class="{{ Request::is('admin/Reports') ? 'active' : ''}}"> 
                <a href="{{route('Reports.index')}}">                                                           
                    <span class="Icon"><i class="fa-solid fa-file-contract"></i></span>
                    <span class="Text"> Reports </span>
                </a>
            </li>   
            @endif
 

            @if(auth()->user()->can('Transac-view') || auth()->user()->can('Transac-edit') || auth()->user()->can('Transac-create') || auth()->user()->can('Transac-delete'))
            <li class="{{ Request::is('admin/Transac') || Request::is('admin/Transac/allhistory') || Request::is('admin/Transac/monthly') ? 'active' : ''}}">  
                <a href="{{route('Transac.index')}}">                                                           
                    <span class="Icon"><i class="fa-solid fa-file-waveform"></i></span>
                    <span class="Text"> Transaction History </span>
                </a>  
            </li>      
            @endif

                       
            @if(auth()->user()->can('Audit-view') || auth()->user()->can('Audit-edit') || auth()->user()->can('Audit-create') || auth()->user()->can('Audit-delete'))
            <li class="{{ Request::is('admin/Audit') ? 'active' : ''}}">
                <a href="{{route('Audit.index')}}"> 
                    <span class="Icon"><i class="fa-solid fa-business-time"></i></span>
                    <span class="Text"> Audit Log </span>
                </a>
            </li>
            @endif
            


           <!-- <li>
                <a href="#" class="dropdown-Transactions"> 
                    <span class="Icon"><i class="fa-solid fa-money-check-dollar"></i></span>
                    <span class="Text"> Transactions </span>
                    <span class="Arrow"><i class="fa-solid fa-sort-down"></i></span>
                </a>
   
                <ul class="submenu-Transactions">
                    <li> 
                        <a href="#">                                                           
                            <span class="Icon"><i class="fa-solid fa-file-contract"></i></span>
                            <span class="Text"> Reports </span>
                        </a>
                    </li>   
                    <li>  
                        <a href="#">                                                           
                            <span class="Icon"><i class="fa-solid fa-file-waveform"></i></span>
                            <span class="Text"> Transaction History </span>
                        </a>  
                    </li>                    
                </ul>
            </li>s-->

 
        <!--

            <li class="Out">
                <a href="{{Route('logout')}}"> 
                    <span class="Icon"><i class="fa-solid fa-right-from-bracket"></i></span>
                    <span class="Text"> Log Out</span>
                </a>
            </li> 
        -->

        </ul>
    </div>

