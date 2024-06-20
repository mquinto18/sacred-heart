<nav class="navbar bg-dark text-light fixed-top p-md-3 p-2">
	<div class="container-fluid">
		<button class="navbar-toggler d-flex bg-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
   
    <span class="btn btn-success" style="border-radius: 50%;"><?= $initials; ?></span>

  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title text-muted fw-bolder">Dashboard</h5>
        <button type="button" class="btn-close btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
         
  <li class="nav-item">
    <a class="nav-link active text-uppercase" aria-current="page" href="index">Home</a>
  </li>

   <li class="nav-item dropdown">
    <a href="#" class="nav-link text-uppercase dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-box-archive"></i> Archives</a>

    <ul class="dropdown-menu">
      <li class="nav-item">
        <a href="event-archives" class="nav-link ms-3">Event Archive Records</a>
      </li>
      <li class="nav-item">
        <a href="donate-archives" class="nav-link ms-3">Donate Archive Records</a>
      </li>
      <li class="nav-item">
        <a href="church-expenses-archives" class="nav-link ms-3">Church Expenses Archive Records</a>
      </li>
      <li class="nav-item">
        <a href="request-certificate-archives" class="nav-link ms-3">Certificate Request Archive</a>
      </li>
      <li class="nav-item">
        <a href="baptismal-archives" class="nav-link ms-3">Baptismal Archive</a>
      </li>
    </ul>

  </li>


  <li class="nav-item dropdown">
    <a href="#" type="button" class="nav-link text-uppercase dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded='false'><i class="fa-solid fa-file"></i> Track Records</a>


   <ul class="dropdown-menu">
     <li class="nav-item">
       <a href="donation" class="nav-link ms-3">Donation</a>
     </li>

     <li class="nav-item"> 
       <a href="church-expenses" class="nav-link ms-3">Church Expenses</a>
     </li>

     <li class="nav-item"> 
       <a href="certificate-request" class="nav-link ms-3">Certificate Request</a>
     </li>

      <li class="nav-item"> 
       <a href="baptismal" class="nav-link ms-3">Baptismal</a>
     </li>
   </ul> 
  </li>

  <div><a href="financial" type="button" class="nav-link text-uppercase" role="button"  aria-expanded='false'><i class="fa-solid fa-file"></i> Financial</a></div>

  <li class="nav-item">
    <a href="../logout" class="nav-link text-uppercase"><i class="fa-solid fa-right-to-bracket"></i> Signout</a>
  </li>

  </ul>
    </div>
  </div>
    
	</div>
</nav>