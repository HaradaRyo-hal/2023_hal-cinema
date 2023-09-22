<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../common.css" />
  <link rel="stylesheet" href="../common.js" />
  <link rel="stylesheet" href="../common.php" />
  <link rel="stylesheet" type="text/css" href="step4.css">

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
    </style>

  </header>

  <main>

    <div class="confirmation">
      
      <h2>購入内容確認</h2>
      <h2 class="red">まだ購入は確定していません。</h2>
      <p>ご購入内容をご確認頂き、「購入完了」ボタンを押して購入を確定してください。</p>

      <div class="subtitle">作品情報</div>

      <div class="viewbox">

        <div class="viewbar">
          <h1>劇場/スクリーン</h1>
          <div class="infor">HAL CINEMA / シアター１</div>
        </div>
        <div class="viewbar">
          <h1>作品名</h1>
          <div class="infor">名探偵コナン名探偵コナン名探偵コナン名探偵コナン名探偵コナン名探偵コナン名探偵コナン名探偵コナン名探偵コナン名探偵コナン名探偵コナン名探偵コナン名探偵コナン名探偵コナン名探偵コナン名探偵コナン名探偵コナン名探偵コナン名探偵コナン名探偵コナン名探偵コナン名探偵コナン名探偵コナン</div>
        </div>
        <div class="viewbar">
          <h1>鑑賞日時</h1>
          <ul>
            <li class="seat">
              <div class="infor red">2023年 6月1日(木) 08:30～10:00</div>
            </li>
            <li class="seat">
              <div class="red">※鑑賞日時を必ずご確認ください。</div>
            </li>
          </ul>
        </div>

        <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // seatTicketMapping フォームデータを取得
            if (isset($_POST["seatTicketMapping"])) {
              $seatTicketMappingJSON = $_POST["seatTicketMapping"];

              // JSONデータを連想配列にデコード
              $seatTicketMapping = json_decode($seatTicketMappingJSON, true);

              if (json_last_error() === JSON_ERROR_NONE) {
                // データの表示
                echo "<div class='viewbar'>";
                  echo "<h1>座席</h1>";
                    echo "<ul>";
                          foreach ($seatTicketMapping as $seat => $ticketType) {
                            echo 
                            "<li class='seat'>
                              <div class='seat-infor'>$seat</div>
                              <div class='seat-infor'>$ticketType</div>
                            </li>";
                          }
                    echo "</ul>";
                echo "</div>";
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

      </div>


      <?php
        // print "POST </br>";
        foreach ($_POST as $key => $value) {
          // print $key;
          // print ": ";
          // print $value;
          // print "<br/>";
          setcookie("profile[$key]", $value, ['path' => '/']);
        }
      
      //   // print "COOLIKIE </br>";
      //   foreach ($_COOKIE as $key => $value) {
      //     // print $key;
      //     // print ": ";
      //     // print $value;
      //     // print "<br/>";
      //   }
      //   $price = 0;
      //   foreach ($_COOKIE["seat"] as $key => $value) {
      //     // print $key;
      //     // print ": ";
      //     // print $value;
      //     // print "<br/>";
          
      //     switch ($value) {
      //       case '一般':
      //         # code...
      //         $price += 1800;
      //         break;
      //       case '大学生等':
      //         # code...
      //         $price += 1600;
      //         break;
      //       case '中学、高校':
      //         # code...
      //         $price += 1400;
      //         break;
      //       case '小学生、幼児':
      //         $price += 1000;
      //       default:
      //         # code...
      //         break;
      //     }
      // }
      // setcookie("ticketPrice", $price, ['path' => '/']);

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
      echo "<div class='subtitle'>購入情報</div>";
      
      echo "<div class='viewbox'>";
        echo "<div class='viewbar'>";
            echo 
              "<h1>お名前（カタカナ）</h1>
              <div class='infor'>$lastName $firstName</div>";
        echo "</div>";
        echo "<div class='viewbar'>";
            echo 
              "<h1>メールアドレス</h1>
              <div class='infor'>$email</div>";
        echo "</div>";
        echo "<div class='viewbar'>";
            echo 
              "<h1>電話番号</h1>
              <div class='infor'>$phoneNumber</div>";
        echo "</div>";
        echo "<div class='viewbar'>";
            echo 
              "<h1>カード番号</h1>
              <div class='infor'>$cardNumber</div>";
        echo "</div>";
      echo "</div>";

      //echo "<p class='input-info'>購入金額: <span class='data-value'>$price</span></p>";

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
    
    <div>
      <a href="../3.情報入力/step3.php" class="moda">◀戻る</a>
    </div>
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
