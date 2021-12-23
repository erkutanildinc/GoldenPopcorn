<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="site/css/movie-detail.css">
    <title>Document</title>
    <style>
      .star{
        color: goldenrod;
        font-size: 2.0rem;
        padding: 0 1rem; /* space out the stars */
      }
      .star::before{
        content: url('C:/Users/dervis/Desktop/blackwhite.png');    /* star outline */
        cursor: pointer;
      }
      .star.rated::before{
        /* the style for a selected star */
        content: url('C:/Users/dervis/Desktop/org.png');  /* filled star */
      }
      
      .stars{
          counter-reset: rateme 0;   
          font-size: 2.0rem;
          font-weight: 900;
      }
      .star.rated{
          counter-increment: rateme 1;
      }
      .stars::after{
          content: counter(rateme) '/5';
      }
  </style>
</head>
<body>

<?= $this->include('site/mainpage-header.php') ?>


<section class="content">

<div class="card card-solid">
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
            <img src=<?php echo $movie["movie_poster"]?> class="d-block w-50 mx-auto " style="" alt="...">
           
      </div>

      <div class="col-md-4">
        <h3 class="my-3"><?php echo $movie["movie_name"]?></h3>
        <p><?php echo $movie["movie_summary"]?></p>

        <hr>
        <h4>Rate Movie</h4>

        <div class="stars" data-rating="3">
          <span class="star">&nbsp;</span>
          <span class="star">&nbsp;</span>
          <span class="star">&nbsp;</span>
          <span class="star">&nbsp;</span>
          <span class="star">&nbsp;</span>
      </div>
      <div class="col-md-4"></div>
      <script>
        
        //initial setup
        document.addEventListener('DOMContentLoaded', function(){
            let stars = document.querySelectorAll('.star');
            stars.forEach(function(star){
                star.addEventListener('click', setRating); 
            });
            
            let rating = parseInt(document.querySelector('.stars').getAttribute('data-rating'));
            let target = stars[rating - 1];
            target.dispatchEvent(new MouseEvent('click'));
        });

        function setRating(ev){
            let span = ev.currentTarget;
            let stars = document.querySelectorAll('.star');
            let match = false;
            let num = 0;
            stars.forEach(function(star, index){
                if(match){
                    star.classList.remove('rated');
                }else{
                    star.classList.add('rated');
                }
                //are we currently looking at the span that was clicked
                if(star === span){
                    match = true;
                    num = index + 1;
                }
            });
            document.querySelector('.stars').setAttribute('data-rating', num);
        }
        
    </script>
        <div class="bg-gray py-2 px-3 mt-4">
          <h2 class="mb-0">
            Category
          </h2>
          <h5 class="mt-0">
            Action Horror Comedy
          </h5>
        </div>
        
        <div class="mt-4">
          <div class="btn btn-primary btn-lg btn-flat">
            <i class="fas fa-cart-plus fa-lg mr-2"></i>
            Add to Watched
          </div>
        </div>

        <div class="mt-4 product-share">
          <a href="#" class="text-gray">
            <i class="fab fa-facebook-square fa-2x"></i>
          </a>
          <a href="#" class="text-gray">
            <i class="fab fa-twitter-square fa-2x"></i>
          </a>
          <a href="#" class="text-gray">
            <i class="fas fa-envelope-square fa-2x"></i>
          </a>
          <a href="#" class="text-gray">
            <i class="fas fa-rss-square fa-2x"></i>
          </a>
        </div>

      </div>
    </div>
    <div class="row mt-4">
      <nav class="w-100">
        <div class="nav nav-tabs" id="product-tab" role="tablist">
          <a class="nav-item nav-link active" id="movie-actors-tab" data-toggle="tab" href="#movie-actors" role="tab" aria-controls="movie-actors" aria-selected="true">Oyuncular</a>
          <a class="nav-item nav-link" id="movie-informations-tab" data-toggle="tab" href="#movie-informations" role="tab" aria-controls="movie-informations" aria-selected="true">Movie Details</a>
          <a class="nav-item nav-link" id="movie-comments-tab" data-toggle="tab" href="#movie-comments" role="tab" aria-controls="movie-comments" aria-selected="false">Comments</a>
          <a class="nav-item nav-link" id="movie-rating-tab" data-toggle="tab" href="#movie-rating" role="tab" aria-controls="movie-rating" aria-selected="false">Rating</a>
        </div>
      </nav>
      <div class="tab-content p-3" id="nav-tabContent">
        <div class="tab-pane fade show active" id="movie-actors" role="tabpanel" aria-labelledby="movie-actors-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus. </div>
        <div class="tab-pane fade" id="movie-informations" role="tabpanel" aria-labelledby="movie-informations-tab">
              <div>
                <p>Duration:<?php echo $movie["movie_duration"]?></p>
              </div>
              <div>
                <p>Release Date: <?php echo $movie["movie_releasedate"]?></p>
              </div>
              <div>
                <p>Country: <?php echo $movie["country_id"]?></p>
              </div>
              <div>
                <p>Language: <?php echo $movie["language_id"]?></p>
              </div>
              <div>
                <p>Movie Gross: <?php echo $movie["movie_gross"]?></p>
              </div>
        </div>
        <div class="tab-pane fade" id="movie-comments" role="tabpanel" aria-labelledby="movie-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
        <div class="tab-pane fade" id="movie-rating" role="tabpanel" aria-labelledby="movie-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
      </div>
    </div>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

</section>
<!-- /.content -->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>