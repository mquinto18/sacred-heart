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
  nav {
    background-color: #212529;
    height: 12vh;
    font-family: Poppins;
    position: relative;
    top: -31px;
  }
  .namenav{
    text-decoration: none;
    font-family: poppins;
    position: relative;
    top: 3px;
    left: -5%;
    font-weight: 550;
    color: white;
    font-size: 20px;  
  }
  button:hover{
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
  }
  
</style>

<nav class="navbar">
	<div class="container-fluid">

		<button class="navbar-toggler d-flex bg-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="w-100%">
      <a href="#" class="namenav" style="border-radius: 50%;">Hi, <?= $first_name; ?></a>
      <a href="../logout"><button class="btn btn-primary" style="width: 120px;">Logout</button></a>
    </div>
    <!-- <span class="btn btn-dark" style="border-radius: 50%;"><?= $first_name; ?></span> -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
        <h5 class="offcanvas-title text-muted fw-bolder">Sacred Heart Parish-Shrine</h5>
        <button type="button" class="btn-close btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div><hr class="border border-2 border-primary">
  
  <div class="offcanvas-body">
      <div class="text-dark">Dashboard</div><hr class="border border-1 border-dark">
  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
         
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="index"><i class="fa-solid fa-house"></i>  Home</a>
  </li>

  <li class="nav-item">
    <a href="events" class="nav-link"><i class="fa-solid fa-calendar-days"></i> Events</a>
  </li>

  <li class="nav-item">
    <a href="baptismal" class="nav-link"><i class="fa-solid fa-church"></i> Baptismal</a>
  </li>

  <li class="nav-item">
    <a href="mass-intention" class="nav-link"><i class="fas fa-user"></i> Mass Intention</a>
  </li>

  <li class="nav-item">
    <a href="wedding" class="nav-link"><i class="fa-solid fa-ring"></i> Wedding</a>
  </li>

  </ul>
    </div> <!-- end of offcanvas-body -->
  </div> <!-- end of offcanvas -->
    
	</div> <!-- end of container-fluid -->
</nav>