// ターゲットとなるノードを取得
var targetNode = document.getElementById("videoContainer");

// MutationObserverを作成し、コールバック関数を定義
var observer = new MutationObserver(function (mutations) {
  // 変更があった場合の処理
});

// オプションを設定して監視を開始
observer.observe(targetNode, { subtree: true, childList: true });

// 検索ボタンがクリックされたときにcheckUrlValidity()関数を呼び出す
document.getElementById('submitBtn').addEventListener('click', checkUrlValidity, { passive: true });

// showVideo関数の中身を修正
function showVideo(embedCode, title) {
    var videoContainer = document.getElementById("videoContainer");
    videoContainer.innerHTML = embedCode;

    var titleInput = document.getElementById("titleInput");
    titleInput.value = title;

    // 送信ボタンの表示
    var form = document.getElementById("form");
    form.style.display = "block";
}

// isValidUrl関数の中身を修正
function isValidUrl(url) {
    var youtubeRegex = /^(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)/;
    var vimeoRegex = /^(https?:\/\/)?(www\.)?(vimeo\.com\/)/;
    return youtubeRegex.test(url) || vimeoRegex.test(url);
}

// YouTubeやVimeoのURLが有効かどうかを確認
function checkUrlValidity() {
    var urlInput = document.getElementById("onlineMovieUrl");
    var url = urlInput.value;
    if (isValidUrl(url)) {
        if (isYouTubeUrl(url)) {
            var embedCode = getYouTubeEmbedCode(url);
            showVideo(embedCode, "");
        } else if (isVimeoUrl(url)) {
            var embedCode = getVimeoEmbedCode(url);
            showVideo(embedCode, "");
        }
    } else {
        alert("YouTubeまたはVimeoのURLを入力してください。");
    }
}

// YouTubeのURLかどうかを判定する関数
function isYouTubeUrl(url) {
    return url.includes('youtube.com') || url.includes('youtu.be') || url.includes('youtube-nocookie.com');
}

// VimeoのURLかどうかを判定する関数
function isVimeoUrl(url) {
    return url.includes('vimeo.com');
}

// YouTubeのURLから埋め込みコードを取得する関数
function getYouTubeEmbedCode(url) {
    var videoId = getYouTubeVideoId(url);
    if (videoId) {
        // YouTube APIを使用して埋め込みコードを取得
        getYouTubeEmbedCodeWithAPI(videoId);
    } else {
        alert('指定されたYouTube動画のURLが無効です。');
    }
}

// Get the YouTube video ID
function getYouTubeVideoId(url) {
    var regex = /(?:\?v=|&v=|youtu.be\/|\/embed\/|\/v\/|\/watch\?v=)([^#\&\?]{11})/;
    var match = url.match(regex);
    if (match && match[1]) {
        return match[1];
    } else {
        return null;
    }
}

// Get the YouTube embed code using YouTube Data API
function getYouTubeEmbedCodeWithAPI(videoId) {
    var apiKey = 'KEY'; // APIキー
    var apiUrl = 'https://www.googleapis.com/youtube/v3/videos?part=snippet&id=' + videoId + '&key=' + apiKey;

    // YouTube APIを使用して埋め込みコードを取得
    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            if (data.items && data.items.length > 0) {
                var embedCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' + videoId + '" frameborder="0" allowfullscreen></iframe>';
                var title = data.items[0].snippet.title;
                showVideo(embedCode, title);
            } else {
                alert('指定されたYouTube動画が見つかりませんでした。');
            }
        })
        .catch(error => {
            console.error('YouTube APIエラー:', error);
        });
}

// VimeoのURLから埋め込みコードを取得する関数
function getVimeoEmbedCode(url) {
    var videoId = getVimeoVideoId(url);
    // Vimeo APIを使用して埋め込みコードとタイトルを取得
    // リクエストの方法はVimeo APIのドキュメントに従って実装してください
}

// Get the Vimeo video ID
function getVimeoVideoId(url) {
    var regex = /https?:\/\/(?:www\.)?vimeo\.com\/(?:video\/)?([0-9]+)/;
    var match = url.match(regex);
    if (match && match[1]) {
        return match[1];
    } else {
        return null;
    }
}

// 送信ボタンがクリックされたときにデータをフォームに設定
document.getElementById('submitButton').addEventListener('click', function () {
    var urlInput = document.getElementById("onlineMovieUrl");
    var titleInput = document.getElementById("titleInput");
    var industryCat1Input = document.getElementById("industryCategory1");
    var industryCat2Input = document.getElementById("industryCategory2");
    var industryTxtInput = document.getElementById("industryText");
    var campaignGoalInput = document.getElementById("campaignGoal");

    // フォームにURLとタイトルを設定
    document.getElementById('hiddenUrl').value = urlInput.value;
    document.getElementById('hiddenTitle').value = titleInput.value;
    document.getElementById("hiddenindustryCategory1").value = industryCat1Input.value;
    document.getElementById("hiddenindustryCategory2").value = industryCat2Input.value;
    document.getElementById("hiddenindustryText").value = industryTxtInput.value;
    document.getElementById("hiddencampaignGoal").value = campaignGoalInput.value;

    // フォームの送信
    document.getElementById("form").submit();
});