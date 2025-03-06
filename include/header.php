<div class="search-popup">
        <div class="search-popup-container">

          <form role="search" method="get" class="search-form" action="">
            <input type="search" id="search-form" class="search-field" placeholder="Type and press enter" value="" name="s" />
            <button type="submit" class="search-submit"><svg class="search"><use xlink:href="#search"></use></svg></button>
          </form>

          <h5 class="cat-list-title">Browse Categories</h5>
          
          <ul class="cat-list">
            <li class="cat-list-item">
              <a href="#" title="Mobile Phones">Mobile Phones</a>
         
            </li>
           
          </ul>

        </div>
    </div>
    
    <header id="header" class="site-header header-scrolled position-fixed text-black bg-light">
    <nav id="header-nav" class="navbar navbar-expand-lg px-3 mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/main-logo.png" class="logo">
            </a>
            <button class="navbar-toggler d-flex d-lg-none order-3 p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <svg class="navbar-icon">
                    <use xlink:href="#navbar-icon"></use>
                </svg>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel">
                <div class="offcanvas-header px-4 pb-0">
                    <a class="navbar-brand" href="index.php">
                        <img src="images/main-logo.png" class="logo">
                    </a>
                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#bdNavbar"></button>
                </div>
                <div class="offcanvas-body">
                    <ul id="navbar" class="navbar-nav text-uppercase justify-content-end align-items-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a <?=($p=="home" ? "class='nav-link me-4 active'" : "class='nav-link me-4 '" ) ?> href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link me-4 dropdown-toggle link-dark" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="index.php?p=phone" <?=($p=="phone" ? "class='dropdown-item active'" : "class='dropdown-item'" ) ?> >Phone</a>
                                </li>
                                <li>
                                    <a href="index.php?p=watch" <?=($p=="watch" ? "class='dropdown-item active'" : "class='dropdown-item'" ) ?> >Watch</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?p=about" <?=($p=="about" ? "class='nav-link me-4 active'" : "class='nav-link me-4 '" ) ?>>About</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?p=contact" <?=($p=="contact" ? "class='nav-link me-4 active'" : "class='nav-link me-4 '" ) ?>>Contact</a>
                        </li>
                        
                        <?php 
if (!isset($_SESSION['cus_email']) && !isset($_SESSION['cus_pass'])) { ?>
    <li class="nav-item">
        <div class="user-items ps-5">
            <ul class="d-flex justify-content-end list-unstyled align-center">
                <li class="search-item pe-3 pt-2">
                    <a href="#" class="search-button">
                        <svg class="search">
                            <use xlink:href="#search"></use>
                        </svg>
                    </a>
                </li>
                <li class="nav-item dropdown pe-3">
                    <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg class="user">
                            <use xlink:href="#user"></use>
                        </svg>
                    </a>
                    <ul class="dropdown-menu" style="margin-left: -100px;" aria-labelledby="userDropdown">
                        <li><a <?=($p=="login" ? "class='dropdown-item active'" : "class='dropdown-item'" ) ?> href="index.php?p=login">Login</a></li>
                        <li><a <?=($p=="register" ? "class='dropdown-item active'" : "class='dropdown-item'" ) ?> href="index.php?p=register">Register</a></li>
                    </ul>
                </li>
                <li class="pt-2">
    <a href="index.php?p=cart" class="position-relative">
        <svg class="cart">
            <use xlink:href="#cart"></use>
        </svg>
        <span class="cart-count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

    
            0
        </span>
    </a>
</li>
            </ul>
        </div>
    </li>
<?php } else { ?>
    <li class="nav-item">
        <div class="user-items ps-5">
            <ul class="d-flex justify-content-end list-unstyled align-center">
                <li class="search-item pe-3 pt-2">
                    <a href="#" class="search-button">
                        <svg class="search">
                            <use xlink:href="#search"></use>
                        </svg>
                    </a>
                </li>
                <li class="nav-item dropdown pe-3">
                    <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg class="user">
                            <use xlink:href="#user"></use>
                        </svg>
                    </a>
                    <ul class="dropdown-menu me-5" style="margin-left: -100px;" aria-labelledby="userDropdown">
                        <!-- <li><a class="dropdown-item" href="profile.php">Profile</a></li> -->
                        <li><a class="dropdown-item" href="orders.php"><?php echo $_SESSION['cus_email'];   ?></a></li>
                        <li><a class="dropdown-item" href="code-logout.php">Logout</a></li>
                    </ul>
                </li>
                <li class="pt-2">
                    <a href="cart.php" class="position-relative">
                        <svg class="cart">
                            <use xlink:href="#cart"></use>
                        </svg>
                        <span class="cart-count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
<?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>