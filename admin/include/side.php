<div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
              <img
                src="assets/img/kaiadmin/logo_light.svg"
                alt="navbar brand"
                class="navbar-brand"
                height="20"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li <?= ($p=="dashboard" ?"class='nav-item  active'":"class='nav-item'") ?>>
                <a
                  href="index.php"
                  class="collapsed"
                  aria-expanded="false"
                >
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              
              </li>
             
           
            
           
           
              <li <?= ($p=="listproduct" ?"class='nav-item  active'":"class='nav-item'") ?>>
                <a href="index.php?p=listproduct">
                  <i class="far fa-chart-bar"></i>
                  <p>Product</p>
                </a>
             
              </li>
         
              <li <?= ($p=="listcategory" ?"class='nav-item  active'":"class='nav-item'") ?>>
                <a href="index.php?p=listcategory">
                  <i class="fas fa-desktop"></i>
                  <p>category</p>
                </a>
              </li>
             
              <li <?= ($p=="listbrand" ?"class='nav-item  active'":"class='nav-item'") ?>>
                <a href="index.php?p=listbrand">
                  <i class="fas fa-desktop"></i>
                  <p>brands</p>
                </a>
              </li>
              <li <?= ($p=="listslideshow" ?"class='nav-item  active'":"class='nav-item'") ?>>
                <a href="index.php?p=listslideshow">
                  <i class="fas fa-desktop"></i>
                  <p>Slideshow</p>
                </a>
              </li>

            
            
           
              </li>
            </ul>
          </div>
        </div>
      </div>