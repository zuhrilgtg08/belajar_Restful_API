<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$response = $client->request('GET', 'http://www.omdbapi.com', [
    'query' => [
        'apikey' => '7ed2710b',
        's' => 'avengers'
    ],
]);

$result = json_decode($response->getBody()->getContents(), true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php foreach ($result['Search'] as $movie) : ?>
        <ul>
            <li>Title : <?= $movie['Title'] ?> </li>
            <li>Yesr : <?= $movie['Year'] ?> </li>
            <li>
                <img src="<?= $movie['Poster'] ?>" alt="Poster" width="80">
            </li>
        </ul>
    <?php endforeach; ?>
</body>

</html>