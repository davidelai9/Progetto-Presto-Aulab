<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Presto.it</title>
  <!--CDN FONTAWSOME-->
  <script src="https://kit.fontawesome.com/e3cc6884a7.js" crossorigin="anonymous"></script>
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  {{-- Animate Css --}}
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  {{-- Google Fonts CDN --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital@1&family=Josefin+Slab:wght@600&display=swap" rel="stylesheet">

  {{-- Swiper.js --}}
  <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
  />


  {{-- Animate.css --}}
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
</head>
<body>
  <x-navbar/>      
  <section class="home-section">
    <div class="home-content">
      
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-6 d-flex pt-2">
            <i class='bx bx-menu' style='color:#ee7724' ></i>

            <label class="switch-darkmode ms-2" for="darkSwitch">
              <span class="sun"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill="#ffd43b"><circle r="5" cy="12" cx="12"></circle><path d="m21 13h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm-17 0h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm13.66-5.66a1 1 0 0 1 -.66-.29 1 1 0 0 1 0-1.41l.71-.71a1 1 0 1 1 1.41 1.41l-.71.71a1 1 0 0 1 -.75.29zm-12.02 12.02a1 1 0 0 1 -.71-.29 1 1 0 0 1 0-1.41l.71-.66a1 1 0 0 1 1.41 1.41l-.71.71a1 1 0 0 1 -.7.24zm6.36-14.36a1 1 0 0 1 -1-1v-1a1 1 0 0 1 2 0v1a1 1 0 0 1 -1 1zm0 17a1 1 0 0 1 -1-1v-1a1 1 0 0 1 2 0v1a1 1 0 0 1 -1 1zm-5.66-14.66a1 1 0 0 1 -.7-.29l-.71-.71a1 1 0 0 1 1.41-1.41l.71.71a1 1 0 0 1 0 1.41 1 1 0 0 1 -.71.29zm12.02 12.02a1 1 0 0 1 -.7-.29l-.66-.71a1 1 0 0 1 1.36-1.36l.71.71a1 1 0 0 1 0 1.41 1 1 0 0 1 -.71.24z"></path></g></svg></span>
              <span class="moon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="m223.5 32c-123.5 0-223.5 100.3-223.5 224s100 224 223.5 224c60.6 0 115.5-24.2 155.8-63.4 5-4.9 6.3-12.5 3.1-18.7s-10.1-9.7-17-8.5c-9.8 1.7-19.8 2.6-30.1 2.6-96.9 0-175.5-78.8-175.5-176 0-65.8 36-123.1 89.3-153.3 6.1-3.5 9.2-10.5 7.7-17.3s-7.3-11.9-14.3-12.5c-6.3-.5-12.6-.8-19-.8z"></path></svg></span>   
              <input type="checkbox" class="input" id="darkSwitch">
              <span class="slider-darkmode"></span>
            </label>

          </div>
          
          <div class="col-6 d-flex justify-content-end">
            
            <form action="{{route('products.search')}}" method="GET" class="d-flex">
              <div class="container-search d-flex justify-content-end">
                <input placeholder="{{__('ui.Cerca2')}}" required="" class="input-search" name="searched" type="search">
                <div class="icon-search">
                  <button class="btn-custom-search" type="submit">
                    <svg viewBox="0 0 512 512" class="ionicon" xmlns="http://www.w3.org/2000/svg">
                      <title>{{__('ui.Cerca1')}}</title>
                      <path stroke-width="32" stroke-miterlimit="10" stroke="currentColor" fill="none" d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"></path>
                      <path d="M338.29 338.29L448 448" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke="currentColor" fill="none"></path>
                    </svg>
                  </button> 
                </div>
              </div>
            </form>
            
          </div>
          
        </div>
      </div>
    </div>
    @if (session('message'))
    <div class="alert alert-success mt-1">
      <p class="my-0">{{session('message')}}</p>
    </div>
    @endif
    @if (session('access.denied'))
    <div class="alert alert-danger mt-1">
      <p class="my-0">{{session('access.denied')}}</p>
    </div>
    @endif
    @if (session('revisor.denied'))
    <div class="alert alert-danger mt-1">
      <p class="my-0">{{session('revisor.denied')}}</p>
    </div>
    @endif
    <div class="min-vh-100 d-flex justify-content-center align-items-center flex-column">          
      {{$slot}}
    </div>
  </section>
  <x-footer />
  
  {{-- Typed.js --}}
  <script src="https://unpkg.com/typed.js@2.0.15/dist/typed.umd.js"></script>
  <script>
    var typed = new Typed('#slogan', {
      strings: ['‎  {{__('ui.Cerca1')}}  ^500', '‎  {{__('ui.Compra')}}  ^500','‎  {{__('ui.Vendi')}}  ^500', '‎  {{__('ui.Facile')}}  ^500'],
      typeSpeed: 60,
      loop: false,
      backSpeed: 50,
    });
  </script>
  
  {{-- IONICON CDN --}}
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  {{-- Swiper.js --}}
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

  {{-- AoS --}}
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  
  @livewireScripts
</body>

</html>