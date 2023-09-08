<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./kenshu.css" />
    <link rel="stylesheet" href="../common.css" />
    <script src="../common.js"></script>
    <title>2.券種選択</title>
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

      <h2></h2>

      <div id="seatList"></div>

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
          var ticketTypes = ['一般', '学生', 'シニア'];
          var defaultOption = document.createElement('option');
          defaultOption.value = '';
          defaultOption.text = '選択してください';
          ticketTypeSelect.appendChild(defaultOption);

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
            //console.log(seatTicketMapping); // オブジェクトの内容をコンソールで確認
            console.log(seatTicketMapping); // オブジェクトの内容をコンソールで確認
          });

          var seatContainer = document.createElement('div');
          seatContainer.innerHTML = seat + ": ";
          seatContainer.appendChild(ticketTypeSelect);
          seatList.appendChild(seatContainer);
        }
        var form = document.querySelector('form');
        form.addEventListener('submit', function() {
          var seatTicketMappingJSON = JSON.stringify(seatTicketMapping);
          var hiddenInput = document.createElement('input');
          hiddenInput.type = 'hidden';
          hiddenInput.name = 'seatTicketMapping';
          hiddenInput.value = seatTicketMappingJSON;
          form.appendChild(hiddenInput);
        });
      </script>
      
      <form action="../3.情報入力/step3.php" method="post">
        <!-- フォーム送信時にseatTicketMappingをinput要素に設定して送信 -->
        <input type="hidden" name="seatTicketMapping">
        <div class="next">
          <input type="submit" value="次へ" />
        </div>
      </form>

      <div>
        <a href="#" class="moda">◀戻る</a>
      </div>

    </main>

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
