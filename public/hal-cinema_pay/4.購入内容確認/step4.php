<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../common.css" />
  <link rel="stylesheet" href="../common.js" />
  <link rel="stylesheet" href="./styles.css" />
  <title>4.確認画面</title>
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
        <li><span></span><br />購入完了</li>
      </ol>
    </div>
  </header>

  <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // seatTicketMapping フォームデータを取得
          if (isset($_POST["seatTicketMapping"])) {
              $seatTicketMappingJSON = $_POST["seatTicketMapping"];
              
              // JSONデータを連想配列にデコード
              $seatTicketMapping = json_decode($seatTicketMappingJSON, true);

              if (json_last_error() === JSON_ERROR_NONE) {
                  // データの表示
                  echo "<h2>座席とチケットの種類:</h2>";
                  echo "<ul>";
                  foreach ($seatTicketMapping as $seat => $ticketType) {
                      echo "<li>座席: $seat, チケットの種類: $ticketType</li>";
                  }
                  echo "</ul>";
              } else {
                  echo "JSONデコードエラー: " . json_last_error_msg();
              }
          } else {
              echo "座席情報が送信されていません。";
          }
      } else {
          echo "無効なリクエストです。";
      }
    ?>

  <main>
    <div class="confirmation">
      <h2>入力された情報(debug)</h2>
      <?php
      
        print "POST </br>";
        foreach ($_POST as $key => $value) {
          print $key;
          print ": ";
          print $value;
          print "<br/>";
          setcookie("profile[$key]", $value, ['path' => '/']);
        }
      
        print "COOLIKIE </br>";
        foreach ($_COOKIE as $key => $value) {
          print $key;
          print ": ";
          print $value;
          print "<br/>";
        }

        foreach ($_COOKIE["seat"] as $key => $value) {
          print $key;
          print ": ";
          print $value;
          print "<br/>";
      }


        print "end";
      ?>

      <!-- ここから本筋 -->

      <?php

      // フォームの値を取得
      $lastName = $_POST['lastName'];
      $firstName = $_POST['firstName'];
      $email = $_POST['email'];
      $phoneNumber = $_POST['phoneNumber'];
      $cardNumber = $_POST['cardNumber'];
      $expiryMonth = $_POST['expiryMonth'];
      $expiryYear = $_POST['expiryYear'];
      $securityCode = $_POST['securityCode'];
      $cardHolderName = $_POST['cardHolderName'];

      // フォームの値を表示
      echo "<h2>入力された情報</h2>";
      echo "<p>お名前（カタカナ）: $lastName $firstName</p>";
      echo "<p>メールアドレス: $email</p>";
      echo "<p>電話番号: $phoneNumber</p>";
      //echo "<p>カード番号: $cardNumber</p>";
      //echo "<p>有効期限: $expiryMonth/$expiryYear</p>";
      //echo "<p>セキュリティーコード: $securityCode</p>";
      //echo "<p>カード名義人: $cardHolderName</p>";
      ?>
    </div>
    <form action="appoimentRegister.php" method="post">
      <input type="hidden" name="" value=""/>
      <div class="next">
        <input type="submit" value="予約する" />
      </div>
    </form>
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
