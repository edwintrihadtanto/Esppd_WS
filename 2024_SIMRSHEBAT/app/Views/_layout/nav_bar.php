<!-- Left navbar links -->
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
  </li>
<!-- 
  <a href="#" class="navbar-brand" title="Nama User Akses SIM_RS" style="color: black; font-weight: 800; font-family: math;">    
    <span>User : </span><u><span id="module_username"></span></u>
  </a>  -->
  <div id="infopasienirna">
</ul>
<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
  <li class="nav-item">
    <a class="nav-link" onclick="showcaripasien();" role="button">
      <i class="fas fa-address-card" ></i>
    </a>
  </li>
  
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="far fa-bell"></i>
      <span class="badge badge-warning navbar-badge" id="notif_bagde">0</span>
    </a>

    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right" style="cursor: pointer;">
      <div id="notif_orderresep"></div>
      <div id="notif_info"></div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
      <i class="fas fa-expand-arrows-alt"></i>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button" id="toggle-button">
      <i class="fas fa-file"></i>
    </a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="" role="button" title="Keluar Aplikasi?" onclick="logout();">
      <i class="fas fa-sign-out-alt"></i></a>
  </li>
</ul>