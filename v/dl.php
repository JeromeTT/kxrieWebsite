<?php
error_reporting(1);
require "init.php";
//finding ID of video
$link = $_GET["inputLink"];
parse_str($link, $urlData);
$id = array_values($urlData)[0];
//finding api
$api = file_get_contents($_SERVER['DOCUMENT_ROOT']."/keys/ytapi");

$url = "https://www.googleapis.com/youtube/v3/videos?part=contentDetails,snippet,statistics&id=". $id ."&key=". $api;
$c = file_get_contents($url);
$s = json_decode($c);
if(!isset($s->items[0]->snippet->description))die('Invalid Link');

$video_title = $s->items[0]->snippet->title;
$publish_date = $s->items[0]->snippet->publishedAt;
$channel_link = $s->items[0]->snippet->channelId;
$channel_name =  $s->items[0]->snippet->channelTitle;
$tags =  $s->items[0]->snippet->tags;
$description = $s->items[0]->snippet->description;
$thumbnail = $s->items[0]->snippet->thumbnails->maxres->url;
$tags = print_r($tags)
echo <<<END
<!doctype HTMl>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="/main.css">
        <title>YT Stat</title>
    </head>
    <body>

        <nav class="navbar navbar-light bg-primary">
            <a class="navbar-brand" href="/">
                <h1>Kxrie.me</h1>
            </a>
        </nav>
        <h2 class="container p-3">Raw data xd ill work on it later </h2>
        <div class="container bg-light p-3">
                
                <ul>
                    <li>Title: $video_title</li>
					<li>Published Date: $publish_date</li>
                    <li>Channel URL: https://www.youtube.com/channel/$channel_link</li>
                    <li>Channel names: $channel_name</li>
                    <li>Tags: $tags)</li>
                    <li>Description: $description</li>
                    <li>Thumbnail URL: $thumbnail</li>
                </ul>

         </div>
    </body>
    <footer class="footer"><div class="container" style="text-align: center;">
         &copy; Jayden Zhang 2018
    </div></footer>
</html>
END;
?>