<?php

/**
 * 1. dbregisterTest.phpのフォームの部分がおかしいので、ここを書き換えて、dbinsertTest.phpにPOSTでデータが飛ぶようにしてください。
 * 2. dbinsertTest.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. dbregisterTest.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

var_dump($_POST);

// 1. POSTデータ取得
$onlineMovieUrl = $_POST['onlineMovieUrl'];
$title = $_POST['title'];
$industryCategory1 = $_POST['industryCategory1'];
$industryCategory2 = $_POST['industryCategory2'];
$industryText = $_POST['industryText'];
$campaignGoal = $_POST['campaignGoal'];

// 2. DB接続します
try {
    $pdo = new PDO('mysql:dbname=cgp2_movie_db;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}

// 3. データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO 
    cgp2_movie_table(id, onlineMovieUrl, title, industryCategory1, industryCategory2, industryText, campaignGoal
    ) VALUES(
        NULL, :onlineMovieUrl, :title, :industryCategory1, :industryCategory2, :industryText, :campaignGoal
    )"
);

// 4. バインド変数を用意
$stmt->bindValue(':onlineMovieUrl', $onlineMovieUrl, PDO::PARAM_STR);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':industryCategory1', $industryCategory1, PDO::PARAM_STR);
$stmt->bindValue(':industryCategory2', $industryCategory2, PDO::PARAM_STR);
$stmt->bindValue(':industryText', $industryText, PDO::PARAM_STR);
$stmt->bindValue(':campaignGoal', $campaignGoal, PDO::PARAM_STR);

// 5. 実行
$status = $stmt->execute();

//6．データ登録処理後
if($status === false){
        //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
        $error = $stmt->errorInfo();
        exit('ErrorMessage:'.$error[2]);
    }else{
        //7．dbregisterTest.phpへリダイレクト
        header('Location: dbregisterTest.php');
    }
?>