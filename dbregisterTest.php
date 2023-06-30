<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="format-detection" content="telephone=no">
        <meta name="description" content="AI-CD Project 2">
        <meta name="keywords" content="PRをしたい？クリエイティブディレクターがお手伝いをします">

        <meta property="og:type" content="website">
        <meta property="og:title" content="AI-CD Project 2">
        <meta property="og:description" content="PRをしたい？クリエイティブディレクターがお手伝いをします">
        <meta property="og:url" content="http://observation.jp/t05_4o3_m/aicd2/index.html">
        <meta property="og:image" content="http://observation.jp/t05_4o3_m/aicd2/img/common/ogimage.jpg">
        <meta property="og:site_name" content="AI-CD Project 2">

        <meta name="twitter:description" content="AI-CD Project 2" />
        <meta name="twitter:title" content="AI-CD Project 2" />
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:image" content="">

        <link rel="icon" href="http://observation.jp/t05_4o3_m/img/common/favicon.ico">
        <link href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/0a7c43b5fe.js" crossorigin="anonymous"></script>

        <title>こんな動画広告はどう？</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <!-- header -->
        <header class="header nav">
            <div class="wrapper header-wrapper">
                <p>CREATIVE GUENOME PROJECT 2 | DB Register</p>
                <input type="checkbox" name="navigation" id="navigation" class="nav-input">
                <label for="navigation" class="nav-bg"></label>
                <ul class="header-list nav-list">
                    <li class="header-list__item"><a href="#">YouTube Search</a></li>
                    <li class="header-list__item"><a href="#">DB Register</a></li>
                    <li class="header-list__item"><a href="#">DB Search</a></li>
                    <li class="header-list__item"><a href="#">Criative Concept</a></li>
                    <li class="header-list__item"><a href="#">Structure Plan</a></li>
                    <li class="header-list__item"><a href="selectTest.php">登録動画一覧</a></li>
                </ul>
                <label for="navigation" class="nav-button">
                    <span class="nav-button__mark"></span>
                    <span class="nav-button__mark"></span>
                    <span class="nav-button__mark"></span>
                </label>
            </div>
        </header>
        <!-- //header -->

        <!-- コンテンツ表示画面 -->
        <div class="register">
            <div id="urlForm">
                <h2 class="onlineMovieUrl">動画のURLを入力</h2>
                <input type="text" id="onlineMovieUrl" onblur="checkUrlValidity()" placeholder="YouTubeかVimeoのURLを入力">
                <button id="submitBtn">検索</button>
                <div class="urlView">
                    <div class="title" id="videoContainer"></div>
                </div>
                <div class="titleView">
                    <div class="title-label">
                        <label class="onlineMovieUrl">タイトル：</label>
                    </div>
                    <textarea id="titleInput" name="title" rows="3" style="resize: auto;"></textarea>
                </div>
            </div>

            <div class="industry-category">
                <h2>業態/商材</h2>
                <select id="industryCategory1" name="industryCategory1" onchange="updateIndustryCategory1()">
                    <option value="未選択" selected>大分類を選択</option>
                    <option value="食品/飲料/アルコール">食品/飲料/アルコール</option>
                    <option value="家電/家庭用品">家電/家庭用品</option>
                    <option value="エンタメ/メディア">エンタメ/メディア</option>
                    <option value="自動車/交通">自動車/交通</option>
                    <option value="旅行/観光">旅行/観光</option>
                    <option value="ファッション/アパレル">ファッション/アパレル</option>
                    <option value="金融/保険">金融/保険</option>
                    <option value="不動産/建築">不動産/建築</option>
                    <option value="医療/美容/健康">医療/美容/健康</option>
                    <option value="教育/キャリア">教育/キャリア</option>
                    <option value="採用/就職/転職">採用/就職/転職</option>
                    <option value="通信販売/ネットショップ">通信販売/ネットショップ</option>
                    <option value="エネルギー">エネルギー</option>
                    <option value="ギャンブル">ギャンブル</option>
                    <option value="公益/環境/福祉">公益/環境/福祉</option>
                    <option value="その他">その他</option>
                </select>
                <select id="industryCategory2" name="industryCategory2"></select>
                <input type="text" id="industryText" name="industryText" placeholder="さらに名称を記入する？">
            </div>

            <div class="campaign-goal">
                <h2>目的</h2>
                <select id="campaignGoal" name="campaignGoal"></select>
            </div>

            <!-- 送信ボタンと押した時の送り先 -->
            <form id="form" method="POST" action="./dbinsertTest.php">
                <div>
                    <input type="hidden" id="hiddenUrl" name="onlineMovieUrl">
                    <input type="hidden" id="hiddenTitle" name="title">
                    <input type="hidden" id="hiddenindustryCategory1" name="industryCategory1">
                    <input type="hidden" id="hiddenindustryCategory2" name="industryCategory2">
                    <input type="hidden" id="hiddenindustryText" name="industryText">
                    <input type="hidden" id="hiddencampaignGoal" name="campaignGoal">
                    <button type="submit" id="submitButton">送信</button>
                </div>
            </form>
        </div>

        <script src="main.js"></script>
        <script src="industryCategory.js"></script>
        <script src="campaignGoal.js"></script>
    </body>
</html>