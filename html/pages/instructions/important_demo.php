
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<style>
 .swiper-container {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
  </style>


<div class="row">
  <div class="col">
    <h2>Important information</h2>
    <div class="swiper-container">
            <div class="swiper-wrapper">
              <div class="swiper-slide">Slide 1</div>
              <div class="swiper-slide">Slide 2</div>
              <div class="swiper-slide">Slide 3</div>
              <div class="swiper-slide">Slide 4</div>
              <div class="swiper-slide">Slide 5</div>
              <div class="swiper-slide">Slide 6</div>
              <div class="swiper-slide">Slide 7</div>
              <div class="swiper-slide">Slide 8</div>
              <div class="swiper-slide">Slide 9</div>
              <div class="swiper-slide">Slide 10</div>
            </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <!-- <div class="swiper-button-next"></div> -->
        <!-- <div class="swiper-button-prev"></div> -->
    </div>
    <!-- <ol>
      <li>You cannot navigate back to previous pages</li>
      <li>You will not be paid if you fail an attention check or reload the page after having accepted the informed consent</li>
      <li>Instructions be dependend on conditions</li>
    </ol> -->

    <p>Click "Next" to proceed to the informed consent.</p>
    <button type="button" class="btn btn-primary swiper-button-next">Primary</button>
  </div>
</div>


<script>
    var swiper = new Swiper('.swiper-container', {
      pagination: {
        el: '.swiper-pagination',
        type: 'fraction',
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>

   <!-- <div class="first visible">
            <div class="col-md-4 mt-4">
                    <div class="card profile-card-5">
                        <div class="card-img-block">
                            <img class="card-img-top" src="https://images.unsplash.com/photo-1517832207067-4db24a2ae47c" alt="Card image cap">
                        </div>
                        <div class="card-body">
                        <h5 class="card-title">Florence Garza</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a class="btn btn-primary next">NEXT</a>
                    </div>
                    </div>
                    <p class="mt-3 w-100 float-left text-center"><strong>Card with Floting Picture</strong></p>
                </div>
                
            </div>
        </div> -->


        //Find the element that's currently showing
            // $(this).children('.blurb').show();
            // $showing = $('.content').children('.first.visible')
            // $showing = $('.content').find('.first.visible').html();
            //Find the element that's currently showing
