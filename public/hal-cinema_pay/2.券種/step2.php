<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../common.css" />
    <link rel="stylesheet" href="./kenshu.css" />
    <title>2.券種選択</title>
    <style>

    .seat-container {
      margin-bottom: 15px; /* 座席コンテナの間隔を調整 */
      border: 1px solid #ddd; /* 軽微な境界線を追加 */
      border-radius: 5px; /* 角を丸める */
      padding: 15px; /* 内側の余白を追加 */
      background-color: #f9f9f9; /* 背景色を追加 */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* 影を追加 */
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    /* 座席名に対するスタイル */
    .seat-name {
      font-weight: bold; /* 座席名を太字にする */
      font-size: 18px; /* フォントサイズを調整 */
      flex-grow: 1; /* 座席名を伸縮可能にする */
    }

    /* ドロップダウンメニューに対するスタイル */
    select {
      padding: 10px; /* ドロップダウンメニューの内側の余白を追加 */
      border: 1px solid #007bff; /* ボーダーを追加 */
      border-radius: 5px; /* 角を丸める */
      background-color: #fff; /* 背景色を追加 */
      color: #333; /* テキストの色を設定 */
      font-size: 16px; /* フォントサイズを調整 */
      cursor: pointer;
      transition: border-color 0.3s, box-shadow 0.3s;
    }

    /* ドロップダウンメニューのホバースタイル */
    select:hover {
      border-color: #0056b3; /* ホバー時のボーダーカラーを変更 */
    }

    /* ドロップダウンメニューのアクティブスタイル */
    select:focus {
      border-color: #007bff; /* アクティブ時のボーダーカラーを変更 */
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* アクティブ時の影を追加 */
    }

    </style>
  </head>

  <body>
    <header>
      <img src="../images/logo.png" class="logo" />
      <div class="stepbar-row">
        <ol class="stepbar">
            <li class="done"><span></span><br />座席選択</li>
            <li class="done"><span></span><br />券種選択</li>
            <li><span></span><br />情報入力</li>
            <li><span></span><br />確認画面</li>
            <li><span></span><br />購入完了</li>
        </ol>
    </div>
    </header>

    <main>

      <h1>チケット選択</h1>
      <div id="seatList"></div>

      <form action="../3.情報入力/step3.php" method="post">
        <!-- オブジェクトをJSON文字列に変換してフォームに設定 -->
        <input type="hidden" id="seatTicketMapping" name="seatTicketMapping" value="">
        <div class="next">
          <input type="submit" value="次へ" />
        </div>
      </form>
      <div>
        <a href="#" class="moda">◀戻る</a>
      </div>

    </main>

    <script>
      // オブジェクトを初期化
      var seatTicketMapping = {};

      // 選択された座席情報を取得
      var selectedSeatsString = localStorage.getItem('selectedSeats');
      var selectedSeats = JSON.parse(selectedSeatsString);

      // 選択された座席に対してチケットの種類を紐づける
      for (var i = 0; i < selectedSeats.length; i++) {
        var seat = selectedSeats[i];
        seatTicketMapping[seat] = ''; // 初期値として空の種類を設定
      }

      // ドロップダウンメニューの生成と表示
      var seatList = document.getElementById('seatList');
      for (var i = 0; i < selectedSeats.length; i++) {
        var seat = selectedSeats[i];
        var ticketTypeSelect = document.createElement('select');
        ticketTypeSelect.name = 'ticketType-' + seat;

        // チケットの種類を追加
        var ticketTypes = ['選択してください', '一般', '大学生等', '中学、高校', '小学生、幼児'];

        for (var j = 0; j < ticketTypes.length; j++) {
          var option = document.createElement('option');
          option.value = ticketTypes[j];
          option.text = ticketTypes[j];
          ticketTypeSelect.appendChild(option);
        }

        // ドロップダウンメニューの変更時にオブジェクトに値を設定
        ticketTypeSelect.addEventListener('change', function(event) {
          var selectedTicketType = event.target.value;
          var seatNumber = event.target.name.replace('ticketType-', ''); // 座席番号を取得
          seatTicketMapping[seatNumber] = selectedTicketType; // オブジェクトに値を設定
          console.log(seatTicketMapping); // オブジェクトの内容をコンソールで確認
          var seatJs = document.getElementById("seatTicketMapping");//HTML要素内の id 属性が "seatTicketMapping" である要素をJavaScriptの変数 seatJs に取得しています
          seatJs.value = JSON.stringify(seatTicketMapping);//変数 seatTicketMapping に格納されているJavaScriptオブジェクトをJSON文字列に変換
        });

        var seatContainer = document.createElement('div');
        seatContainer.classList.add('seat-container'); // seat-container クラスを追加
        
    var seatName = document.createElement('span');
    seatName.classList.add('seat-name'); // seat-name クラスを追加
        seatContainer.innerHTML = seat + ": ";

        seatContainer.appendChild(ticketTypeSelect);
        seatList.appendChild(seatContainer);
      }

      // フォームの送信時に席の種類が選択されているか確認
      document.querySelector('form').addEventListener('submit', function(event) {
        for (var seat in seatTicketMapping) {
          if (seatTicketMapping[seat] === '選択してください') {
            alert('席の種類を選択してください。');
            event.preventDefault(); // フォームの送信を阻止
            return;
          }
        }
      });
      
    </script>

  </body>

  <footer>
    <div class="container">
      <img src="../images/logo2.png" alt="画像の説明" />
      <ul>
        <li><a href="#">会社概要</a></li>
        <li><a href="#">特定商取引法に基づく表記</a></li>
        <li><a href="#">利用規約</a></li>
        <li><a href="#">プライバシーポリシー</a></li>
        <li><a href="#">サイトマップ</a></li>
        <p>
          Copy right © 2023 HAL CINEMA<br />
          All rights reserved.
        </p>
      </ul>
    </div>
  </footer>
</html>
