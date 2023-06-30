// campaignGoal
function updateCampaignGoal() {
    var campaignGoal = document.getElementById("campaignGoal").value;
    var options = [
        "認知向上/価値観醸成",
        "エンゲージメント/関与",
        "購買/登録/問合せ向上"
    ];
    // campaignGoalの要素を取得
    var campaignGoalElement = document.getElementById("campaignGoal");
    // campaignGoalの要素をクリア
    campaignGoalElement.innerHTML = ''; // campaignGoalElementの中身をクリアする
    // 選択肢をoption要素として追加
    var defaultOption = document.createElement("option"); // デフォルトのオプション要素を作成
    defaultOption.value = ""; // デフォルトの値を空に設定
    defaultOption.textContent = "目的を選択"; // デフォルトのテキストを設定
    campaignGoalElement.appendChild(defaultOption); // デフォルトのオプション要素を追加
    options.forEach(function(option) {
        var optionElement = document.createElement("option");
        optionElement.value = option;
        optionElement.textContent = option;
        campaignGoalElement.appendChild(optionElement);
    });
    
    // 選択した値を再度選択する
    campaignGoalElement.value = campaignGoal;
}
// 初期表示時に呼び出す
updateCampaignGoal();