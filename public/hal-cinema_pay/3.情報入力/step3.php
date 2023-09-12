<?php
session_start();
if (isset($_POST['seatTicketMapping'])) {
  $seatTicketMapping = $_POST['seatTicketMapping'];
  $_SESSION['seatTicketMapping'] = $seatTicketMapping;
} else {
  echo "No data received.";
}
?>
<!DOCTYPE html>
  <html lang="ja">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../common.css" />
    <link rel="stylesheet" href="../common.js" />
    <link rel="stylesheet" href="./index.css" />
    
    <title>3.情報入力</title>
  </head>

    <body>

        <header>
            <img src="../images/logo.png" class="logo" />
            <div class="stepbar-row">
              <ol class="stepbar">
                <li class="done"><span></span><br />座席選択</li>
                <li class="done"><span></span><br />券種選択</li>
                <li class="done"><span></span><br />情報入力</li>
                <li><span></span><br />確認画面</li>
                <li><span></span><br />購入完了</li>
              </ol>
            </div>
        </header>


        <main>

          <h2>お客様情報入力</h2>

          <div class="user_box">
            <form action="../4.購入内容確認/step4.php" method="GET">

              <div class="title_box">
                <div class="title">お名前（カタカナ）</div>
                <div class="red_text">入力必須</div>
              </div>
              <div class="form-group">
                <div class="sei">
                  <label for="lastName">セイ</label>
                  <input type="text" id="lastName" name="lastName" placeholder="例：ヤマダ" required>
                </div>
                <div class="mei">
                  <label for="firstName">メイ</label>
                  <input type="text" id="firstName" name="firstName" placeholder="例：タロウ" required>
                </div>
              </div>
          
              <div class="title_box">
                <div class="title">メールアドレス</div>
                <div class="red_text">入力必須</div>
              </div>
              <div class="form-email">
                <input type="email" id="email" name="email" placeholder="例：example@example.com" required>
                <label for="email" class="emaillabel">メールアドレス確認</label>
                <input type="email" id="emailConfirm" name="emailConfirm" placeholder="例：example@example.com" required>
              </div>
          
              <div class="title_box">
                <div class="title">電話番号</div>
                <div class="red_text">入力必須</div>
              </div>
              <div class="form-email">
                <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="例：01234567890" required>
              </div>

              <div class="form_box">
                <div class="title_box">
                  <div class="title">お支払情報</div>
                  <div class="red_text">入力必須</div>
                </div>
                <div class="title_box">
                  <div class="text">クレジットカード決済の必要事項を入力ください</div>
                </div>

                <div class="form-card">
                  <label for="cardNumber">カード番号</label>
                  <input id="cardNumber" name="cardNumber" maxlength="16" placeholder="例：1234567890123456" required>
                  <p class="haihun">※半角数字、ハイフン「-」なしで入力してください。</p>
                </div>

                <div class="form-card">
                  <label for="expiry">有効期限</label>
                  <select id="expiry" name="expiryMonth" placeholder="01" required>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <!-- 他の月のオプションを追加 -->
                  </select>
                  <p>月</p>
                  <select name="expiryYear"  placeholder="2023" required>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2024">2025</option>
                    <option value="2024">2026</option>
                    <option value="2024">2027</option>
                    <option value="2024">2028</option>
                    <option value="2024">2029</option>
                    <option value="2024">2030</option>
                    <option value="2024">2031</option>
                    <option value="2024">2032</option>
                    <option value="2024">2033</option>
                    <option value="2024">2034</option>
                    <option value="2024">2035</option>
                    <option value="2024">2036</option>
                    <option value="2024">2037</option>
                    <option value="2024">2038</option>
                    <option value="2024">2039</option>
                    <option value="2024">2040</option>
                    <!-- 他の年のオプションを追加 -->
                  </select>
                  <p>年</p>
                </div>

                <div class="form-card">
                  <label for="securityCode">セキュリティーコード</label>
                  <input type="text" id="securityCode" name="securityCode" placeholder="例：123" maxlength="3" required>
                </div>

                <div class="form-card">
                  <label for="cardHolderName">カード名義人</label>
                  <input type="text" id="cardHolderName" name="cardHolderName" 
                    placeholder="例：YAMADA TARO" pattern="[A-Z]+" required title="アルファベットのみ入力してください">
                </div>
              </div>

              <div class="next">
                <input type="submit" value="次へ">
              </div>
              
            </form>

            <div>
              <a href="#" class="moda">◀戻る</a>
            </div>
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