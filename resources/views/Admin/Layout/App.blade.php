
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('css')

    <link rel="icon" href="{{asset('/images/Asset_img/PS.png')}}" type="image/x-icon">
   
    <link rel="stylesheet" href="{{ asset('css/SIDE_TOP.css')}}">
    <link rel="stylesheet" href="{{ asset('css/TableM.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/Preview.css')}}">
    {{-- <link rel="stylesheet" href="{{ asset('css/ModalCss.css')}}"> --}}
    <script type="module" src="{{asset('js/DimentionalModel.JS')}}"></script>

    <link rel="stylesheet" href="{{ asset('css/Toasted.css')}}">

    @livewireStyles
  </head>
<body>

   
   
    @include('Admin.Components.Navigation')
    @yield('content')

    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script> --}}
    <script src="{{asset('js/SweetAlert.JS')}}"></script>
    {{-- <script src="{{asset('js/Modal.JS')}}"></script> --}}
    <script src="{{asset('js/Models.JS')}}"></script>
    <script src="{{asset('js/Side_Top.JS')}}"></script>
    <script src="{{asset('js/DropDwn.JS')}}"></script>
    <script src="{{asset('js/TBLS.JS')}}"></script>
    <script src="{{asset('js/TBLM.JS')}}"></script>
    <script src="{{asset('js/Connection.JS')}}"></script>
    <script src="{{asset('js/Preview.JS')}}"></script>
    <script src="{{asset('js/Toasted.JS')}}"></script>
    <script src="{{asset('js/Sweet.JS')}}"></script>
   
   

    @livewireScripts

        <script>
                const dropdownBtn = document.querySelector('.dropdown-Account')
                const submenu = document.querySelector('.submenu-Account')

                dropdownBtn.addEventListener('click', function(e){
                e.preventDefault();
                submenu.classList.toggle('Show');
                })
        </script>

         <script>
                const dropdownBtn111 = document.querySelector('.dropdown-Order')
                const submenu12 = document.querySelector('.submenu-Order')

                dropdownBtn111.addEventListener('click', function(e){
                e.preventDefault();
                submenu12.classList.toggle('Show');
                })
        </script>

        <script>
                const dropdownBtn2 = document.querySelector('.dropdown-Inventory')
                const submenu2 = document.querySelector('.submenu-Inventory')

                dropdownBtn2.addEventListener('click', function(e){
                e.preventDefault();
                submenu2.classList.toggle('Show');
                })
        </script>

        <script>
                const dropdownBtnPT = document.querySelector('.dropdown-PT')
                const submenuPT = document.querySelector('.submenu-PT')

                dropdownBtnPT.addEventListener('click', function(e){
                e.preventDefault();
                submenuPT.classList.toggle('Show');
                })
        </script>

        <script>        
                const dropdownBtnQT = document.querySelector('.dropdown-QT')
                const submenuQT = document.querySelector('.submenu-QT')

                dropdownBtnQT.addEventListener('click', function(e){
                e.preventDefault();
                submenuQT.classList.toggle('Show');
                })
        </script>

        <script>        
                const PRSC = document.querySelector('.dropdown-PRSC')
                const PRS = document.querySelector('.submenu-PRSC')

                PRSC.addEventListener('click', function(e){
                e.preventDefault();
                PRS.classList.toggle('Show');
                })
        </script>

        <script>        
                const dropdownBtn4 = document.querySelector('.dropdown-FT')
                const submenu4 = document.querySelector('.submenu-FT')

                dropdownBtn4.addEventListener('click', function(e){
                e.preventDefault();
                submenu4.classList.toggle('Show');

                })       
        </script>




    <script>

        const Toast = Swal.mixin({           
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                width: 350,
                showCloseButton: true,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
        })
      
      @if(Session::has('successAdd'))     
              
                Toast.fire({
                icon: 'success',
                title: '{{session('successAdd')}}'
        })
            
      @endif
      @if(Session::has('successdel'))  


//        Swal.fire({
//          title: 'Deleted, Successfully.',
//          width: 600,
//          padding: '3em',
//          color: '#716add',
//          background: '#fff url(/images/trees.png)',
//          backdrop: `
//          rgba(0,0,123,0.4)
//          url("/images/Asset_img/nyan.gif")
//          left top
//          no-repeat
//         `
//          })
                Swal.fire(
                   'Deleted!',
                   '{{session('successdel')}}',
                   'success'
                )
      
        //       toastr.warning("{{session('successdel')}}","Deleted");
      @endif

      @if(Session::has('herror')) 
      
      Toast.fire({
              icon: 'error',
              title: '{{session('herror')}}'
      })
      @endif


      @if(Session::has('successban')) 
      
      Swal.fire(
              'Suspended !',
              '{{session('successban')}}',
              'success'
      ) 
      @endif

      @if(Session::has('successupd')) 
      
                Swal.fire(
                        'Upadated !',
                        '{{session('successupd')}}',
                        'success'
                ) 
      @endif

      @if(Session::has('restor')) 
      
                Swal.fire(
                        'Restored !',
                        '{{session('restor')}}',
                        'success'
                ) 
      @endif

      @if($errors->any())     
                Toast.fire({
                        icon: 'error',
                        title: 'Some Fields Are Empty !'
                })
      @endif
      
      
      @if(Session::has('errorss')) 
      
      Toast.fire({
              icon: 'warning',
              title: '{{session('errorss')}}'
      })

      @endif
      

        @if(Session::has('Log')) 
      
        Toast.fire({
                icon: 'success',
                title: '{{session('Log')}}'
        })

        @endif
    
        @if(Session::has('Cannot')) 

   
         Swal.fire({
          icon: 'error',
          title: 'Cannot Be Deleted',
          html: '{{session('Cannot')}}',
          backdrop: `
                rgba(0,0,123,0.4)
                url("/images/Asset_img/anya.gif")
                center top
                no-repeat
                 `
          })
      

        @endif
  
      </script>
   

</body>
</html>
