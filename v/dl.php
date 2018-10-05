<?php
error_reporting(1);
echo "hello world"
require "init.php";
$link = $_GET["inputLink"];
parse_str($link, $urlData);
$vid_id = array_values($urlData)[0];

$videoFetchURL = "http://www.youtube.com/get_video_info?&video_id=" . $vid_id . "&asv=3&el=detailpage&hl=en_US";
$videoData = get($videoFetchURL);
echo "hello world"
parse_str($videoData, $video_info);

$video_info = json_decode(json_encode($video_info));
if (!$video_info->status ===  "ok") {
    die("error in fetching youtube video data");
}
$videoTitle = $video_info->title;
$videoAuthor = $video_info->author;
$videoDurationSecs = $video_info->length_seconds;
$videoDuration = secToDuration($videoDurationSecs);
$videoViews = $video_info->view_count;
echo "hello world"

//change hqdefault.jpg to default.jpg for downgrading the thumbnail quality
$videoThumbURL = "http://i1.ytimg.com/vi/{$vid_id}/hqdefault.jpg";

if (!isset($video_info->url_encoded_fmt_stream_map)) {
    die('No data found');
}

$streamFormats = explode(",", $video_info->url_encoded_fmt_stream_map);

if (isset($video_info->adaptive_fmts)) {
    $streamSFormats = explode(",", $video_info->adaptive_fmts);
    $pStreams = parseStream($streamSFormats);
}
    $cStreams = parseStream($streamFormats);

?>
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
        <h2 class="container p-3">ur link is <?php echo $videoAuthor?></h2>
    </body>
    <footer class="footer"><div class="container" style="text-align: center;">
         &copy; Jayden Zhang 2018
    </div></footer>
</html>