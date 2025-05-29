<?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UC6-vWJhVwNJ_iLVBvNEyKGg&key=AIzaSyBE8P3JBOmbt56YSi8vWw_JZPmxRUWpjIM');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl); // <== Perbaikan di sini

$result = json_decode($result, true);
var_dump($result);
?>

$youtubrProfilePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>My Portfolio</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#home">Sandhika Galih</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#portfolio">Portfolio</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="jumbotron" id="home">
      <div class="container">
        <div class="text-center">
          <img src="img/profile1.png" class="rounded-circle img-thumbnail">
          <h1 class="display-4">Sandhika Galih</h1>
          <h3 class="lead">Lecturer | Programmer | Youtuber</h3>
        </div>
      </div>
    </div>


    <!-- About -->

    <section class="about" id="about">
      <div class="container">
        <div class="row mb-4">
          <div class="col text-center">
            <h2>About</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-5">
            <div class="row"></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, molestiae sunt doloribus error ullam expedita cumque blanditiis quas vero, qui, consectetur modi possimus. Consequuntur optio ad quae possimus, debitis earum.</p>
          </div>
          <div class="col-md-5">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, molestiae sunt doloribus error ullam expedita cumque blanditiis quas vero, qui, consectetur modi possimus. Consequuntur optio ad quae possimus, debitis earum.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Youtube & IG -->
<section class="social bg-light" id="social">
  <div class="container">
    <div class="row pt-4 mb-4">
      <div class="col text-center">
        <h2>Social Media</h2>
      </div>
    </div>

    <div class="row justify-content-center">
      <!-- YouTube -->
      <div class="col-md-5">
        <div class="row mb-3">
          <div class="col-md-4">
            <img src="<?= $youtubeProfilePi;?>" width="200" class="rounded-circle img-thumbnail">
          </div>
          <div class="col-md-8">
            <h5>WebProgrammingUIN</h5>
            <p>1000 Subscriber.</p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" 
                      src="https://www.youtube.com/embed/wqx47Z129d4?rel=0" 
                      allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>

      <!-- Instagram -->
      <div class="col-md-5">
        <div class="row mb-3">
          <div class="col-md-4">
            <img src="img/profile1.png" width="200" class="rounded-circle img-thumbnail">
          </div>
          <div class="col-md-8">
            <h5>@cookiey_daughh</h5>
            <p>202 Followers.</p>
          </div>
        </div>
        <div class="row">
          <div class="col d-flex justify-content-between">
            <div class="ig-thumbnail">
              <img src="img/thumbs/1.png" width="100">
            </div>
            <div class="ig-thumbnail">
              <img src="img/thumbs/2.png" width="100">
            </div>
            <div class="ig-thumbnail">
              <img src="img/thumbs/3.png" width="100">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Portfolio -->
    <!-- Portfolio -->
<section class="portfolio bg-dark" id="portfolio">
  <div class="container">
    <div class="row pt-4 mb-4">
      <div class="col text-center">
        <h2 class="text-light">Portfolio</h2> <!-- Tambahkan class text-light -->
      </div>
    </div>
    <div class="row">
      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="img/thumbs/1.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>

      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="img/thumbs/2.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>

      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="img/thumbs/3.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>   
    </div>

    <div class="row">
      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="img/thumbs/4.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div> 
      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="img/thumbs/5.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.
            </p>
          </div>
        </div>
      </div>

      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="img/thumbs/6.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- footer -->
    <footer class="bg-dark text-white mt-5">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <p>Copyright &copy; 2018.</p>
          </div>
        </div>
      </div>
    </footer>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>