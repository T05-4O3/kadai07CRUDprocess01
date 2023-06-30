// IndustryCategory
function updateIndustryCategory1() {
    var category1 = document.getElementById("industryCategory1").value;
    var category2 = document.getElementById("industryCategory2");
        // category2の選択肢をリセット
        category2.innerHTML = "";
        // category1に応じてcategory2の選択肢を生成
        if (category1 === "食品/飲料/アルコール") {
            var options = [
                "食品/加工食品",
                "菓子",
                "調味料",
                "お茶/珈琲/ジュース類",
                "アルコール",
                "その他"
            ];
        } else if (category1 === "家電/家庭用品") {
            var options = [
                "大型家電",
                "小型家電/PC/スマホ",
                "日用品/生活用品",
                "その他"
            ];
        } else if (category1 === "エンタメ/メディア") {
            var options = [
                "スポーツ/イベント",
                "ライブ/コンサート",
                "映画/舞台/演劇",
                "事業者/興行主/製作委員会",
                "映画/映像コンテンツ",
                "ゲーム/ハード・ソフト・アプリ",
                "その他"
            ];
        } else if (category1 === "自動車/交通") {
            var options = [
                "自動車メーカー",
                "2輪メーカー",
                "車両シリーズ",
                "車両単体",
                "その他"
            ];
        } else if (category1 === "旅行/観光") {
            var options = [
                "公共交通機関",
                "国内旅行/観光",
                "海外旅行/観光",
                "施設/建物",
                "予約/サービス",
                "その他"
            ];
        } else if (category1 === "ファッション/アパレル") {
            var options = [
                "ブランド",
                "衣料品",
                "靴・バッグ・財布",
                "時計・貴金属",
                "予約/サービス",
                "その他"
            ];
        } else if (category1 === "金融/保険") {
            var options = [
                "銀行",
                "クレジットカード",
                "投資/信託",
                "保険",
                "仮想通貨売買",
                "その他"
            ];
        } else if (category1 === "不動産/建築") {
            var options = [
                "不動産販売",
                "賃貸/仲介/管理",
                "建築/設計",
                "その他"
            ];
        } else if (category1 === "医療/美容/健康") {
            var options = [
                "病院/医院/クリニック",
                "医薬品メーカー/商品",
                "化粧品メーカー/ブランド",
                "健康食品関連",
                "美容関連器具/機器",
                "その他"
            ];
        } else if (category1 === "教育/キャリア") {
            var options = [
                "学校",
                "学習塾/予備校",
                "学習サービス",
                "その他"
            ];
        } else if (category1 === "採用/就職/転職") {
            var options = [
                "企業ブランド",
                "サービス名",
                "その他"
            ];
        } else if (category1 === "通信販売/ネットショップ") {
            var options = [
                "企業/サービス名",
                "イベント/キャンペーン",
                "その他"
            ];
        } else if (category1 === "エネルギー") {
            var options = [
                "電力/太陽光",
                "ガス",
                "水道",
                "風力",
                "その他"
            ];
        } else if (category1 === "通信事業") {
            var options = [
                "通信事業社",
                "その他"
            ];
        } else if (category1 === "ギャンブル") {
            var options = [
                "宝くじ/LOTO",
                "競馬",
                "競輪",
                "競艇",
                "オートレース",
                "サービス",
                "その他"
            ];
        } else if (category1 === "公益/環境/福祉") {
            var options = [
                "公益団体/特殊法人",
                "サービス",
                "その他"
            ];
        } else if (category1 === "その他") {
            var options = [
                "その他"
            ];
        }
        // 選択肢をoption要素として追加
        options.forEach(function(option) {
            var optionElement = document.createElement("option");
            optionElement.value = option;
            optionElement.textContent = option;
            category2.appendChild(optionElement);
        });
    }