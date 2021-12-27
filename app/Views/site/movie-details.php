<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/movie-detail.css">
    <link rel="stylesheet" href="/css/director.css">

    <title>Document</title>
    <style>
      .star{
        color: goldenrod;
        font-size: 2.0rem;
        padding: 0 1rem; /* space out the stars */
      }

      .star::before{
        content: url('<?= base_url('blackwhite.png')?>');    /* star outline */
        cursor: pointer;
      }

      .star.rated::before{
        /* the style for a selected star */
        content: url('<?= base_url('org.png')?>');  /* filled star */
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


<section class="my-5">

        <!-- row start -->
        <div class="row">
          <!-- left start -->
          <div class="col-md-6">
              <img src="<?= $movie["movie_poster"]?>" class="d-block w-50 mx-auto" style="" alt="...">
              <div class="text-center">
                  <p class="my-4"><?= $movie["movie_summary"]?></p>
                  <button class="d-block btn btn-outline-danger btn-lg mx-auto">
                      <i class="far fa-plus-square fa-lg"></i>
                      Add to Watchlist
                  </button>
              </div>
          </div>
          <!-- left end -->
          <!-- right start -->
          <div class="col-md-4">
              <h3><?= $movie["movie_name"] ?></h3>
                <span class="font-weight-bold">Category: </span>
                <?php foreach ($categories as $row) : ?>                  
                        <span><?=$row['category_name']?></span>
                <?php endforeach; ?> 
                <span class="font-weight-bold">Warning: </span>
                <?php foreach ($warnings as $row) : ?>                  
                        <span><?=$row['warning_name']?></span>
                <?php endforeach; ?> 
              <hr>
              <h4>Rate Movie</h4>
                <div class="stars" data-rating="3">
                    <img src="<?= base_url('blackwhite.png')?>" style="width: 80px; height: 80px" alt="">
                    <img src="<?= base_url('blackwhite.png')?>" style="width: 80px; height: 80px" alt="">
                    <img src="<?= base_url('blackwhite.png')?>" style="width: 80px; height: 80px" alt="">
                    <img src="<?= base_url('blackwhite.png')?>" style="width: 80px; height: 80px" alt="">
                    <img src="<?= base_url('org.png')?>" style="width: 80px; height: 80px" alt="">
                </div>
              <table class="table table-hover mt-5">
                  <thead>
                      <tr>
                          <th scope="col">Website</th>
                          <th scope="col">Score</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5b/Rotten_Tomatoes.svg/1009px-Rotten_Tomatoes.svg.png" alt="tomato_logo" style="width:50px;height:50px"><span class="rating-font"> Rotten Tomatoes</span></td>
                          <td><?= $movie["rottentomatoes_rating"]?></td>
                      </tr>
                      <tr>
                          <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cc/IMDb_Logo_Square.svg/2048px-IMDb_Logo_Square.svg.png" alt="imdb_logo" style="width:50px;height:50px"><span class="rating-font"> Imdb</span></td>
                          <td><?= $movie["imdb_rating"]?></td>
                      </tr>
                      <tr>
                          <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/Metacritic.svg/1024px-Metacritic.svg.png" alt="meta_logo" style="width:50px;height:50px"><span class="rating-font"> Meta Critic</span></td>
                          <td><?= $movie["metacritic_rating"]?></td>
                      </tr>
                      <tr>
                          <td><img src="<?= base_url('org.png')?>" alt="imdb_logo" style="width:50px;height:60px"><span class="rating-font">Golden Popcorn</span></td>
                          <td>10</td>
                      </tr>
                  </tbody>
              </table>
          </div>
          <!-- right end -->
        </div>
        <!-- row end -->

        <!-- row start -->
        <div class="row mt-4 container">
          <nav class="w-100">
            <div class="nav nav-tabs" id="product-tab" role="tablist">
              <a class="nav-item nav-link active" id="movie-actors-tab" data-toggle="tab" href="#movie-actors" role="tab" aria-controls="movie-actors" aria-selected="true">Actors</a>
              <a class="nav-item nav-link" id="movie-directors-tab" data-toggle="tab" href="#movie-directors" role="tab" aria-controls="movie-directors" aria-selected="false">Directors</a>
              <a class="nav-item nav-link" id="movie-informations-tab" data-toggle="tab" href="#movie-informations" role="tab" aria-controls="movie-informations" aria-selected="false">Movie Details</a>
              <a class="nav-item nav-link" id="movie-pictures-tab" data-toggle="tab" href="#movie-pictures" role="tab" aria-controls="movie-pictures" aria-selected="false">Movie Pictures</a>
              <a class="nav-item nav-link" id="movie-comments-tab" data-toggle="tab" href="#movie-comments" role="tab" aria-controls="movie-comments" aria-selected="false">Comments</a>
              <a class="nav-item nav-link" id="movie-rating-tab" data-toggle="tab" href="#movie-rating" role="tab" aria-controls="movie-rating" aria-selected="false">Rating</a>
              <a class="nav-item nav-link" id="movie-trailer-tab" data-toggle="tab" href="#movie-trailer" role="tab" aria-controls="movie-trailer" aria-selected="false">Trailer</a>
          </nav>
          <div class="tab-content p-3" id="nav-tabContent">
            <!-- actors tab -->
            <div class="tab-pane fade show active" id="movie-actors" role="tabpanel" aria-labelledby="movie-actors-tab">
                <table class="table table-hover">
                      <thead>
                          <tr>
                              <th class="px-5" scope="col">Picture</th>
                              <th class="px-5" scope="col">Actor/Actress</th>
                              <th class="px-5" scope="col">Role</th>
                          </tr>
                      </thead>
                      <?php foreach ($role as $row) : ?>
                              <tbody class="text-center">

                                  <td>
                                      <img src="<?=$row['actor_picture']?>" width="80px" height="100px" alt="">
                                  </td>
                                  <td style="vertical-align:middle">
                                        <a href="<?= base_url('ActorController/actorDetails/'.$row['actor_id'] ) ?>"><?=$row['actor_firstname']." ".$row['actor_lastname']?></a>
                                  </td>
                                  <td style="vertical-align:middle">
                                      <?=$row['role_name']?>
                                  </td>
                              </tbody>
                      <?php endforeach; ?>
                </table>
            </div>

            <!-- directors tab -->
            <div class="tab-pane fade" id="movie-directors" role="tabpanel" aria-labelledby="movie-directors-tab">
                <?php foreach ($director as $row) : ?>
                        <div class="col-md-4">
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front director-img-height">
                                        <img src="<?=$row['director_picture']?>" alt="Avatar"
                                             class="director-img-height">
                                    </div>
                                    <div class="flip-card-back">
                                        <h1><?=$row['director_name']?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php endforeach; ?>
            </div>

            <!-- movie details tab -->
            <div class="tab-pane fade" id="movie-informations" role="tabpanel" aria-labelledby="movie-informations-tab">
                  <p> <b> Duration </b>:<?= $movie["movie_duration"]?></p>
                  <p> <b> Release Date </b>: <?= $movie["movie_releasedate"]?></p>
                  <p> <b> Country </b>: <?= $country["country_name"]?></p>
                  <p> <b> Language </b>: <?= $language["language_name"]?></p>
                  <p> <b> Movie Gross </b>: <?= $movie["movie_gross"]?></p>
            </div>

            <!-- movie pictures tab -->
            <div class="tab-pane fade" id="movie-pictures" role="tabpanel" aria-labelledby="movie-pictures-tab">
               
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                
                    <div class="carousel-inner carousel-height">
                    
                        <div class="carousel-item active">
                                <img src=" <?= $picture[0]['picture_link']?>" class="d-block w-100" alt="...">
                        </div>
                        <?php  $i=0; foreach ($picture as $row) : ?>
                        { 
                            <?php if($i==0){ ?><div class="carousel-item active">
                                                <img src=" <?= $row['picture_link']?>" class="d-block w-100" alt="...">
                                                </div>
                            <?php  }$i++?>
                            <?php if($i!=0){ ?><div class="carousel-item">
                                                <img src=" <?= $row['picture_link']?>" class="d-block w-100" alt="...">
                                                </div>
                            <?php }?>
                        } <?php endforeach; ?>
                    
                    </div>
                
                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleFade" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carouselExampleFade" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </button>
                    </div>
            </div>
            <!-- comments tab -->
            <div class="tab-pane fade" id="movie-comments" role="tabpanel" aria-labelledby="movie-comments-tab">
                Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum.
            </div>
            <!-- rating tab -->
            <div class="tab-pane fade" id="movie-rating" role="tabpanel" aria-labelledby="movie-rating-tab">

            </div>
            <!-- trailer tab -->
              <div class="tab-pane fade" id="movie-trailer" style="width:100vw " role="tabpanel" aria-labelledby="movie-trailer-tab" >
                  <div class="trailer-tab-center " style="display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 100vW;">
                      <iframe width="1000" height="600" class=""
                              src=<?php echo $movie["movie_trailer"]?> type="video/mp4">
                      </iframe>
                  </div>
              </div>
          </div>
        </div>
        <!-- row end -->
</section>


<?= $this->include('site/mainpage-footer.php') ?>

    <script>
        $(document).ready(function() {

    // Gets the video src from the data-src on each button

    var $videoSrc;
    $('.video-btn').click(function() {
        $videoSrc = $(this).data( "src" );
    });
    console.log($videoSrc);

    // when the modal is opened autoplay it
    $('#myModal').on('shown.bs.modal', function (e) {

    // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
    $("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" );
    })


    // stop playing the youtube video when I close the modal
    $('#myModal').on('hide.bs.modal', function (e) {
        // a poor man's stop video
        $("#video").attr('src',$videoSrc);
    })
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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

</body>
</html>