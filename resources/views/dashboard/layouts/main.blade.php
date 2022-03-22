<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMPN 1 Cilamaya Wetan | Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    <link href="/css/sidebars.css" rel="stylesheet">

    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">

    {{-- logo title --}}
    <link rel="icon" href="/assets/favicon-16x16.png" type="image/x-icon">


    <style>
      trix-toolbar [data-trix-button-group="file-tools"] {
        display:none;
      }

    </style>
  </head>
  <body>
    
    @include('dashboard.layouts.header')

{{-- <div class="container-fluid">
  <div class="row">
    <i class='bx bx-menu' ></i>
    
    @include('dashboard.layouts.sidebar')
    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-5">
        <span class="text">@yield('container')</span>
    </main>
  </div>
</div> --}}

@include('dashboard.layouts.sidebar')

<section class="home-section">
  <div class="home-content">
      <i class='bx bx-menu' ></i>
  </div>
  <div class="container">
    <span class="text"><p>@yield('container')</p></span>
  </div>

</section> 
<script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
  let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
    arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
</script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>

      <script src="/js/dashboard.js"></script>

      <script type="text/javascript" src="/js/trix.js"></script>


      
      



  </body>
</html>
