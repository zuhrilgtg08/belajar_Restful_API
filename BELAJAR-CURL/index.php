<?php

function get_CURL($url)
{
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  curl_close($curl);

  return json_decode($result, true);
  // var_dump($resultAll);
}

// youtube Eve
$resultAll = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCUXfRsEIJ9xO1DT7TbEWksw&key=AIzaSyCl-6s-tK1UIgJp8mB7Ft_RzrqGbGQ4rV0');

// get API Youtube Eve
$profilePicYoutube = $resultAll['items'][0]['snippet']['thumbnails']['medium']['url'];
$nameChanel = $resultAll['items'][0]['snippet']['title'];
$subscriber = $resultAll['items'][0]['statistics']['subscriberCount'];

// video update terakhir Eve
$urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyCl-6s-tK1UIgJp8mB7Ft_RzrqGbGQ4rV0&channelId=UCUXfRsEIJ9xO1DT7TbEWksw&maxResults=1&order=date&part=snippet';

$resultLatestVideo = get_CURL($urlLatestVideo);
// var_dump($resultLatestVideo);
$latestVideoId = $resultLatestVideo['items'][0]['id']['videoId'];

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <!-- My CSS -->
  <link rel="stylesheet" href="css/style.css">

  <title>My Portfolio</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#home">Zuhril</a>
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
        <h1 class="display-4">Ahmad Zuhril Fahrizal</h1>
        <h3 class="lead">Freelancer | Programmer | Content Creator</h3>
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
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, molestiae sunt doloribus error ullam expedita cumque blanditiis quas vero, qui, consectetur modi possimus. Consequuntur optio ad quae possimus, debitis earum.</p>
        </div>
        <div class="col-md-5">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, molestiae sunt doloribus error ullam expedita cumque blanditiis quas vero, qui, consectetur modi possimus. Consequuntur optio ad quae possimus, debitis earum.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Sosial-Media -->
  <section class="sosial bg-light" id="sosial">
    <div class="container">
      <div class="row pt-4 mb-4">
        <div class="col text-center">
          <h2>My Sosial Media</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-5">
          <div class="row">
            <div class="col-md-4">
              <img src="<?= $profilePicYoutube; ?>" alt="myChanels" width="200" class="rounded-circle img-thumbnail">
            </div>
            <div class="col-md-8">
              <h5><?= $nameChanel; ?></h5>
              <p><?= $subscriber; ?> Subscribers.</p>
              <div class="g-ytsubscribe" data-channelid="UCUXfRsEIJ9xO1DT7TbEWksw" data-layout="default" data-theme="dark" data-count="default"></div>
            </div>
          </div>
          <div class="row mt-3 pb-3">
            <div class="col">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $latestVideoId; ?>?rel=0" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>


  <!-- Portfolio -->
  <section class="portfolio" id="portfolio">
    <div class="container">
      <div class="row pt-4 mb-4">
        <div class="col text-center">
          <h2>Portfolio</h2>
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
  </section>


  <!-- Contact -->
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
            <li class="list-group-item">
              <h3>Location</h3>
            </li>
            <li class="list-group-item">My Office</li>
            <li class="list-group-item">Jl. Pahlawan No. 19, Surabaya</li>
            <li class="list-group-item">East Java, Indonesia</li>
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
          <p>Copyright &copy; 2022.</p>
        </div>
      </div>
    </div>
  </footer>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  <script src="https://apis.google.com/js/platform.js"></script>
</body>

</html>

<!-- history -->
<!-- // instagram
// $clientId = '5164888626879879';
// $accessToken = 'IGQVJVTGNVUkdnVEh2ZAWwxcU13OFJtRnczUGZAQVVN6WnViMF9VZA1FBV2NhbDVjRGJzdG1mSWdxT045ZATJiZA1NaVk9pcTNTYWhIam1OMWZAZAY203ZA0xoWlVTRnRUWTdTaTI1M3NTTFVEVTQzZAlByU1RPUwZDZD';

// $resultMediaInstagram = get_CURL('https://graph.instagram.com/v13.0/5164888626879879/media?fields=id,username,timestamp,caption,media_type,media_url,permalink,thumbnail_url&access_token=IGQVJVTGNVUkdnVEh2ZAWwxcU13OFJtRnczUGZAQVVN6WnViMF9VZA1FBV2NhbDVjRGJzdG1mSWdxT045ZATJiZA1NaVk9pcTNTYWhIam1OMWZAZAY203ZA0xoWlVTRnRUWTdTaTI1M3NTTFVEVTQzZAlByU1RPUwZDZD');
// $resultProfileInstagram = get_CURL('https://graph.instagram.com/v11.0/5164888626879879?&fields=account_type,id,username,media_count&access_token=IGQVJVTGNVUkdnVEh2ZAWwxcU13OFJtRnczUGZAQVVN6WnViMF9VZA1FBV2NhbDVjRGJzdG1mSWdxT045ZATJiZA1NaVk9pcTNTYWhIam1OMWZAZAY203ZA0xoWlVTRnRUWTdTaTI1M3NTTFVEVTQzZAlByU1RPUwZDZD');

// get API instagram
// $username = $resultProfileInstagram['username'];
// $profilePic = $resultMediaInstagram['data'][0]['media_url'];
// $photos = [];

// foreach ($resultMediaInstagram['data'][0] as $photo) {
// $photos[] = $photo['data'][0]['media_url'];
// } -->