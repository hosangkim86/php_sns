<?php

require_once "../env.php";
require_once "../app/models/Like.php";
require_once "../app/controllers/TweetController.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tweetController = new TweetController();

    $tweetController->like();
} else {
    Route::redirect('../');
}