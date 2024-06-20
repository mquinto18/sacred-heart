<!-- Inside Navbar -->
<nav class="navbar navbar-light p-0 navbar-expand-lg d-md-none d-lg-none d-block fixed-top">
  
<div class="container-fluid bg-dark">
  <a href="#" class="navbar-brand fs-2 text-warning">
    <img width="200" height="80" src="img/logo/logo.png" class="img-responsive d-md-block d-none">
    <img src="img/logo/logo-footer.png" class="img-responsive d-md-none d-block" height="50" width="60">
  </a>
  <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
    <span class="navbar-toggler-icon"></span>
  </button>
</div>
</nav>


<!-- Home Navbar -->
<style>
      ::-webkit-scrollbar {
        width: 10px;
      }
      ::-webkit-scrollbar-track {
          background: #f1f1f1;
      }
      ::-webkit-scrollbar-thumb {
          background: #212529;
      }
      ::-webkit-scrollbar-thumb:hover {
          background: #555;
      }
        li{
          margin-left:20px;
        }
       
        li:hover::before {
          transform: scaleX(1);
        }
        button:hover{
          transform: translateY(-3px);
          box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .nav-item a {
  text-decoration: none;
  position: relative;
}

.nav-item a::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 2px;
  bottom: 0;
  left: 0;
  background-color: yellow; /* Set the color you want for the underline */
  visibility: hidden;
  transform: scaleX(0);
  transition: all 0.3s ease-in-out;
}

.nav-item a:hover::before {
  visibility: visible;
  transform: scaleX(1);
}
  </style>

<nav class="navbar navbar-light p-0 navbar-expand-lg d-md-block d-none" id="navbar">
  
<!-- Beginning of navbar container -->
<div class="container-fluid bg-dark">
  <div class="d-flex justify-content-between align-items-center">
    <!-- Navbar Brand (Image on Left) -->
    <a href="index.php" class="navbar-brand text-warning pt-4 pb-4" style="position: relative; left:90px;">
      <img width="150" src="img/logo/logo.png" class="img-responsive d-md-block d-none">
      <img src="img/logo/logo-footer.png" class="img-responsive d-md-none d-block" height="50" width="60">
    </a>

    <!-- Navbar Toggler -->
    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>

  <!-- Navbar Collapse Section -->
  <div class="collapse navbar-collapse" id="mainNav">
    <!-- Navbar Links -->
    <ul class="navbar-nav d-flex justify-content-center" style="width:85%;">
      <!-- Home Link -->
      <li class="nav-item">
        <a href="index.php" class="homebutton nav-link text-light fs-7" style="font-family: Poppins;">Home</a>
      </li>
      <!-- Offers Dropdown -->
      <li class="nav-item dropdown">
        <a href="#" class="nav-link text-light fs-7 dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-family: Poppins;">Offers</a>
        <ul class="dropdown-menu"> 
          <a href="wedding-package" class=" dropdown-item">Wedding Package</a>  
          <a href="others-package" class=" dropdown-item">Other Package</a>  
        </ul>
      </li>
      <!-- About Link -->
      <li class="nav-item">
        <a href="#aboutscroll" class="aboutbutton nav-link text-light fs-7" style="font-family: Poppins;">About</a>
      </li>
      <!-- Contact Link -->
      <li class="nav-item">
        <a href="#contactside" class="nav-link text-light fs-7" style="font-family: Poppins;">Contact</a>
      </li>
      <!-- Announcement -->
      <li class="nav-item">
        <a href="announcement" class="nav-link text-light fs-7" style="font-family: Poppins;">Announcement</a>
      </li>
    </ul>
  </div>

</div>
<!-- End of navbar container -->
</nav>
