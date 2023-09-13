<!DOCTYPE html>
<html lang="ja">

<?php

  error_reporting(0);

  foreach ($_COOKIE['profile'] as $key => $value) {
    # code...

    setcookie("profile[$key]", "", time() - 1000, "/");
  }

  foreach ($_COOKIE['seat'] as $key => $value) {
    # code...

    setcookie("seat[$key]", "", time() - 1000, "/");
  }


  // スケジュールID
  setcookie("schedule", "" , time() - 1000, "/");
  // スクリーンID
  setcookie("screen", "",  time() - 1000, "/");

  setcookie("ticketPrice", "" , time() - 1000, "/");


  error_reporting(-1);
?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../common.css" />
  <link rel="stylesheet" href="../common.js" />
  <link rel="stylesheet" href="./styles.css" />
  <title>5.購入完了</title>
</head>

  <body>

    <header>
        <img src="../images/logo.png" class="logo" />
        <div class="stepbar-row">
            <ol class="stepbar">
                <li class="done"><span></span><br />座席選択</li>
                <li class="done"><span></span><br />券種選択</li>
                <li class="done"><span></span><br />情報入力</li>
                <li class="done"><span></span><br />確認画面</li>
                <li class="done"><span></span><br />購入完了</li>
            </ol>
        </div>
    </header>

    <main>

        <h2>購入完了</h2>
        <div class="m1">
          購入が完了しました。ご利用ありがとうございました。
        </div>
        <a href="http://localhost:3000" class="moda" style="margin-top: 50px" >TOPへ</a>

    </main>

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

  </body>
</html>
