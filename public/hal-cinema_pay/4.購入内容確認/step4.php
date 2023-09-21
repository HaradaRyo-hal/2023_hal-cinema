<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../common.css" />
  <link rel="stylesheet" href="../common.js" />
  <link rel="stylesheet" href="../common.php" />
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
    <style>
      ul {
          list-style-type: none;
          padding: 0;
          margin: 0;
      }

      ul li.seat{
        background-color: #f8f8f8;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease;
      }
      .seat-info {
        font-size: 18px;
        font-weight: bold;
       
      }
      .ticket-info {
        font-size: 18px;
        font-weight: bold;
        color: #000; 
      }
      h2 {
        font-size: 24px;
        font-weight: bold;
        margin-top: 20px;
        color: #333; 
      }
      .input-info {
          font-weight: bold;
          font-size: 20px;
          margin: 10px 0;
      }
      .data-item {
          margin: 5px 0;
      }
    </style>

  </header>

  <main>
    <div class="confirmation">
      <!-- <h2>入力された情報(debug)</h2> -->
      <?php
      
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // seatTicketMapping フォームデータを取得
          if (isset($_POST["seatTicketMapping"])) {
              $seatTicketMappingJSON = $_POST["seatTicketMapping"];
              
              // JSONデータを連想配列にデコード
              $seatTicketMapping = json_decode($seatTicketMappingJSON, true);

              if (json_last_error() === JSON_ERROR_NONE) {
                  // データの表示
                  echo "<h2>購入する座席と選択されたチケット</h2>";
                  echo "<ul>";
                  foreach ($seatTicketMapping as $seat => $ticketType) {
                      echo 
                      "<li class='seat'>
                        <p>座席</p><span class='seat-info'>$seat $ticketType</span>
                      </li>";
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

        // print "POST </br>";
        foreach ($_POST as $key => $value) {
          // print $key;
          // print ": ";
          // print $value;
          // print "<br/>";
          setcookie("profile[$key]", $value, ['path' => '/']);
        }
      
        // print "COOLIKIE </br>";
        foreach ($_COOKIE as $key => $value) {
          // print $key;
          // print ": ";
          // print $value;
          // print "<br/>";
        }
        $price = 0;
        foreach ($_COOKIE["seat"] as $key => $value) {
          // print $key;
          // print ": ";
          // print $value;
          // print "<br/>";
          
          switch ($value) {
            case '一般':
              # code...
              $price += 1800;
              break;
            case '大学生等':
              # code...
              $price += 1600;
              break;
            case '中学、高校':
              # code...
              $price += 1400;
              break;
            case '小学生、幼児':
              $price += 1000;
            default:
              # code...
              break;
          }
      }

      setcookie("ticketPrice", $price, ['path' => '/']);


        // print "end";
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
      echo "<p class='input-info'>お名前（カタカナ）: <span class='data-value'>$lastName $firstName</span></p>";
      echo "<p class='input-info'>メールアドレス: <span class='data-value'>$email</span></p>";
      echo "<p class='input-info'>電話番号: <span class='data-value'>$phoneNumber</span></p>";
      echo "<p class='input-info'>購入金額: <span class='data-value'>$price</span></p>";

      //echo "<p>カード番号: $cardNumber</p>";
      //echo "<p>有効期限: $expiryMonth/$expiryYear</p>";
      //echo "<p>セキュリティーコード: $securityCode</p>";
      //echo "<p>カード名義人: $cardHolderName</p>";
      ?>
    </div>
    <form action="appoimentRegister.php" method="post">
      <input type="hidden" name="" value=""/>
      <div class="next">
        <input type="submit" value="予約を確定する" />
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
