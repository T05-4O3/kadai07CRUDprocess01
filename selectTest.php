<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// funcs.phpを読み込む
require_once('funcs.php');

//1. DB接続します

use LDAP\Result;

try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:host=localhost;dbname=cgp2_movie_db;charset=utf8', 'root', '');
} catch (PDOException $e) {
    exit('DBConnectError' . $e->getMessage());
}

//２．データ取得SQL作成
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
$orderBy = $sort === 'asc' ? 'ASC' : 'DESC';
$stmt = $pdo->prepare("SELECT * FROM cgp2_movie_table ORDER BY id $orderBy");
$status = $stmt->execute();

//３．データ表示
$view = "";
// ==は2つでもOK
if ($status === false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:" . $error[2]);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // １）タイトルを表示
        $title = h($result['title']);
        
        // ２）動画の表示
        $onlineMovieUrl = h($result['onlineMovieUrl']);
        $embedCode = getEmbedCode($onlineMovieUrl);
        $videoContainer = "<div class='videoContainer'>$embedCode</div>";
        
        // ３）1行分のデータを表示
        $view .= "<div class='dataContainer'>";
        $view .= "<p class='title'>$title</p>";
        $view .= $videoContainer;

        // ４）industryCategory1とindustryCategory2とindustryTextのデータを表示
        $industryCategory1 = h($result['industryCategory1']);
        $industryCategory2 = h($result['industryCategory2']);
        $industryText = h($result['industryText']);
        $campaignGoal = h($result['campaignGoal']);
        $view .= "<p class='industry'>$industryCategory1 $industryCategory2 $industryText</p>\n";
        $view .= "<p class='campaignGoal'>$campaignGoal</p>\n";

        $view .= "</div>";
    }
}

// 埋め込みコードを取得する関数
function getEmbedCode($url) {
    if (isYouTubeUrl($url)) {
        $videoId = getYouTubeVideoId($url);
        if ($videoId) {
            return getYouTubeEmbedCodeWithAPI($videoId);
        } else {
            return '<p class="error">指定されたYouTube動画のURLが無効です。</p>';
        }
    } else if (isVimeoUrl($url)) {
        $videoId = getVimeoVideoId($url);
        if ($videoId) {
            return getVimeoEmbedCode($videoId);
        } else {
            return '<p class="error">指定されたVimeo動画のURLが無効です。</p>';
        }
    } else {
        return '<p class="error">YouTubeまたはVimeoのURLを入力してください。</p>';
    }
}

// YouTubeのURLかどうかを判定する関数
function isYouTubeUrl($url) {
    return strpos($url, 'youtube.com') !== false || strpos($url, 'youtu.be') !== false || strpos($url, 'youtube-nocookie.com') !== false;
}

// VimeoのURLかどうかを判定する関数
function isVimeoUrl($url) {
    return strpos($url, 'vimeo.com') !== false;
}

// YouTubeのURLから動画IDを取得する関数
function getYouTubeVideoId($url) {
    $regex = '/(?:\?v=|&v=|youtu.be\/|\/embed\/|\/v\/|\/watch\?v=)([^#\&\?]{11})/';
    preg_match($regex, $url, $matches);
    if (isset($matches[1])) {
        return $matches[1];
    } else {
        return null;
    }
}

// YouTubeの埋め込みコードを取得する関数
function getYouTubeEmbedCodeWithAPI($videoId) {
    $apiKey = 'KEY'; // APIキー
    $apiUrl = 'https://www.googleapis.com/youtube/v3/videos?part=snippet&id=' . $videoId . '&key=' . $apiKey;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);

    if (isset($data['items']) && count($data['items']) > 0) {
        $embedCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $videoId . '" frameborder="0" allowfullscreen></iframe>';
        $title = $data['items'][0]['snippet']['title'];
        return "<div class='embedCode'>$embedCode</div>";
    } else {
        return '<p class="error">指定されたYouTube動画が見つかりませんでした。</p>';
    }
}

// VimeoのURLから埋め込みコードを取得する関数
function getVimeoEmbedCode($videoId) {
    $apiUrl = 'https://vimeo.com/api/v2/video/' . $videoId . '.json';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);

    if (isset($data[0])) {
        $embedCode = $data[0]['html'];
        $title = $data[0]['title'];
        return "<div class='embedCode'>$embedCode</div><p class='videoTitle'>$title</p>";
    } else {
        return '<p class="error">指定されたVimeo動画が見つかりませんでした。</p>';
    }
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGP2 動画データベース</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="dbregisterTest.php">登録画面へ</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" id="sortAscending">昇順</a></li>
                    <li><a href="#" id="sortDescending">降順</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron" id="movieContainer"><?= $view ?></div>
    </div>
    <!-- Main[End] -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(function() {
            var sort = getParameterByName('sort');
            if (sort === 'asc') {
                $('#sortAscending').addClass('active');
            } else if (sort === 'desc') {
                $('#sortDescending').addClass('active');
            }

            $('#sortAscending').click(function(e) {
                e.preventDefault();
                if (sort !== 'asc') {
                    window.location.search = '?sort=asc';
                }
            });

            $('#sortDescending').click(function(e) {
                e.preventDefault();
                if (sort !== 'desc') {
                    window.location.search = '?sort=desc';
                }
            });

            function getParameterByName(name) {
                var url = window.location.href;
                name = name.replace(/[\[\]]/g, '\\$&');
                var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                    results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, ' '));
            }
        });
    </script>
</body>

</html>