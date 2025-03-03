<section id="billboard" class="position-relative overflow-hidden bg-light-blue">
<div class='swiper main-swiper'>
<div class='swiper-wrapper'>
        <?php
            $result = $db->getdatabyid("slider", "enable",1," ORDER BY ssorder asc","all");
                foreach($result as $row){
                $title = $row["title"];
                $subtitle = $row["subtitle"];
                $link = $row["link"];
                $image = $row["image"];
                echo "
               
                 <div class='swiper-slide'>
                <div class='container'>
                  <div class='row d-flex flex-wrap align-items-center'>
                    <div class='col-md-6'>
                      <div class='banner-content'>
                        <h1 class='display-2 text-uppercase text-dark pb-2'>$title</h1>
                        <h3 class='display-2 text-uppercase text-dark pb-2'>$subtitle</h3>
                        <a href='$link' class='btn btn-medium btn-dark text-uppercase btn-rounded-none'>Shop Product</a>
                      </div>
                    </div>
                    <div class='col-md-5'>
                      <div class='image-holder'>
                        <img src='./admin/upload/$image' alt='banner' class='img-fluid w-100 h-100'>
                      </div>
                    </div>
                  </div>
                </div>
              </div>";
                }
              
               
            
       
        ?>
         
        </div>
      </div>
    
      <div class="swiper-icon swiper-arrow swiper-arrow-next ms-7">
        <svg class="chevron-right" style="width: 130px;">
          <use xlink:href="#chevron-right" />
        </svg>
      </div>
      <div class="swiper-icon swiper-arrow swiper-arrow-prev me-7">
        <svg class="chevron-left " style="width: 130px;">
          <use xlink:href="#chevron-left"  />
        </svg>
      </div>
    </section>
    <div class="swiper-pagination position-absolute text-center"></div>

    <section id="company-services" class="padding-large">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 pb-3">
            <div class="icon-box d-flex">
              <div class="icon-box-icon pe-3 pb-3">
                <svg class="cart-outline">
                  <use xlink:href="#cart-outline" />
                </svg>
              </div>
              <div class="icon-box-content">
                <h3 class="card-title text-uppercase text-dark">Free delivery</h3>
                <p>Consectetur adipi elit lorem ipsum dolor sit amet.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 pb-3">
            <div class="icon-box d-flex">
              <div class="icon-box-icon pe-3 pb-3">
                <svg class="quality">
                  <use xlink:href="#quality" />
                </svg>
              </div>
              <div class="icon-box-content">
                <h3 class="card-title text-uppercase text-dark">Quality guarantee</h3>
                <p>Dolor sit amet orem ipsu mcons ectetur adipi elit.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 pb-3">
            <div class="icon-box d-flex">
              <div class="icon-box-icon pe-3 pb-3">
                <svg class="price-tag">
                  <use xlink:href="#price-tag" />
                </svg>
              </div>
              <div class="icon-box-content">
                <h3 class="card-title text-uppercase text-dark">Daily offers</h3>
                <p>Amet consectetur adipi elit loreme ipsum dolor sit.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 pb-3">
            <div class="icon-box d-flex">
              <div class="icon-box-icon pe-3 pb-3">
                <svg class="shield-plus">
                  <use xlink:href="#shield-plus" />
                </svg>
              </div>
              <div class="icon-box-content">
                <h3 class="card-title text-uppercase text-dark">100% secure payment</h3>
                <p>Rem Lopsum dolor sit amet, consectetur adipi elit.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>