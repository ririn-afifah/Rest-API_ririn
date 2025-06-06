<?php
function get_CURL($url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $results = curl_exec($curl);
    curl_close($curl);

    return json_decode($results, true);
}

// API key dan channel ID
$apiKey = 'AIzaSyBE8P3JBOmbt56YSi8vWw_JZPmxRUWpjIM';
$channelId = 'UC6-vWJhVwNJ_iLVBvNEyKGg';

// Ambil data profil channel
$channelURL = "https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=$channelId&key=$apiKey";
$channelResult = get_CURL($channelURL);

if (isset($channelResult['items'][0])) {
    $youtubeProfilePic = $channelResult['items'][0]['snippet']['thumbnails']['medium']['url'];
    $channelName = $channelResult['items'][0]['snippet']['title'];
    $subscriber = $channelResult['items'][0]['statistics']['subscriberCount'] . ' Subscribers';
} else {
    $youtubeProfilePic = 'img/default-profile.png';
    $channelName = 'Channel not found';
    $subscriber = 'No subscriber data';
}

// Ambil video terbaru
$videoURL = "https://www.googleapis.com/youtube/v3/search?key=$apiKey&channelId=$channelId&maxResults=1&order=date&part=snippet";
$videoResult = get_CURL($videoURL);

$latestVideoId = isset($videoResult['items'][0]['id']['videoId']) ? $videoResult['items'][0]['id']['videoId'] : null;

// Instagram Access Token (ganti jika sudah bocor)
$accessToken = 'IGAAXhgawiBOJBZAE1ZAS1dFMndiY2dRRFJCM0JRdzgwWDAwWlZAnLVFVSjl6aGdGQk1mcDVhT0JQNUFFLXdqMDE5NVhrLW14NG56SkpaZAnhhZAUFmRElIYTlXU2NRc0V3QUpsam80U1c3UENQeW81NEVIOHJJNTVmTGlmTVllbUo5WQZDZD'; // GANTI DENGAN TOKEN YANG BARU!

// Ambil profil Instagram
$instagramURL = "https://graph.instagram.com/me?fields=username,profile_picture_url,followers_count&access_token=$accessToken";
$instaResult = get_CURL($instagramURL);

$usernameIG = $instaResult['username'] ?? 'Unknown';
$profilePictureIG = $instaResult['profile_picture_url'] ?? 'img/default-profile.png';
$followersIG = $instaResult['followers_count'] ?? 'No data';

// Ambil media Instagram
$mediaURL = "https://graph.instagram.com/me/media?fields=id,media_type,media_url,permalink,timestamp&access_token=$accessToken";
$mediaResult = get_CURL($mediaURL);

$photos = [];
if (isset($mediaResult['data']) && is_array($mediaResult['data'])) {
    foreach ($mediaResult['data'] as $media) {
        if (($media['media_type'] === 'IMAGE' || $media['media_type'] === 'CAROUSEL_ALBUM') && isset($media['media_url'])) {
            $photos[] = $media;
        }
    }
}
?>


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
        <a class="navbar-brand" href="#home">Ririn Afifah</a>
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
          <h1 class="display-4">Ririn Afifah</h1>
          <h3 class="lead">Student | Programmer | Youtuber</h3>
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
            <img src="<?= $youtubeProfilePic;?>" width="200" class="rounded-circle img-thumbnail">
          </div>
          <div class="col-md-8">
            <h5><?= $channelName; ?></h5>
            <p><?= $subscriber; ?></p>
            <div class="g-ytsubscribe" data-channelid="<?= $channelId; ?>" data-layout="default" data-theme="dark" data-count="default"></div>
        </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" 
                      src="https://www.youtube.com/embed/<?= $latestVideoId; ?>?rel=0" 
                      allowfullscreen></iframe>
                 </div>
                </div>
              </div>
            </div>

      <!-- Instagram -->
<div class="col-md-5">
  <div class="row mb-3">
    <div class="col-md-4">
      <img src="<?= $profilePictureIG; ?>" alt="<?= $usernameIG; ?>" class="rounded-circle img-thumbnail" width="200">
    </div>
    <div class="col-md-8">
      <h5><?= $usernameIG; ?></h5>
      <p><?= $followersIG; ?> Followers</p>
    </div>
  </div>
  <div class="row">
    <?php if (!empty($photos)): ?>
      <?php foreach (array_slice($photos, 0, 3) as $photo): ?>
        <div class="col-4 mb-3">
          <a href="<?= $photo['permalink']; ?>" target="_blank">
            <img src="<?= $photo['media_url']; ?>" class="img-fluid rounded" alt="Instagram photo">
          </a>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="col">
        <p>No Instagram photos found.</p>
      </div>
    <?php endif; ?>
  </div>
</div>



<!-- Portfolio -->
<section class="portfolio bg-dark" id="portfolio">
  <div class="container">
    <div class="row pt-4 mb-4">
      <div class="col text-center">
        <h2 class="text-light">Portfolio</h2> 
        
<!-- Tambahkan class text-light -->
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

   <!--Contact-->
    <section class="contact bg-light" id="contact">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Contact</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="card bg-primary text-white mb-4 text-center">
              <div class="card-body">
                <h5 class="card-title">Contact Me</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
            
            <ul class="list-group mb-4">
              <li class="list-group-item"><h3>Location</h3></li>
              <li class="list-group-item">My Office</li>
              <li class="list-group-item">Jl. Setiabudhi No. 193, Bandung</li>
              <li class="list-group-item">West Java, Indonesia</li>
            </ul>
          </div>

          <div class="col-lg-6">
            
            <form>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone">
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3"></textarea>
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-primary">Send Message</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>


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
    <script src="https://apis.google.com/js/platform.js"></script>

  </body>
</html>