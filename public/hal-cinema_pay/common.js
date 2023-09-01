//step1.html座席予約システム処理
  // 選択された座席の数をカウントする変数
  var selectedCount = 0;

  // 選択された座席(seatID)を格納する配列
  var selectedSeats = [];

  // 選択された座席のクラスを切り替える関数
  function toggleSeat(seat) {
    // 選択された座席のクラスを切り替える
    seat.classList.toggle("selected");

    // 選択された座席のアルファベットと番号を取得
    var seatLabel = seat.parentElement.querySelector(".tateretu p").innerHTML; // .tateretu p の中のテキストを呼び出している。
    var seatNumber = seat.innerHTML; // seatオブジェクトがクリックされた座席のボタン要素。

    // 選択された座席がすでに選択されているかチェック
    var seatID = seatLabel + seatNumber;
    var index = selectedSeats.indexOf(seatID);

    if (index === -1) {
      // 選択された座席がまだ選択されていない場合
      if (selectedCount < 6) {
        // 最大6つまで選択できる
        selectedCount++;
        selectedSeats.push(seatID);
      } else {
        // 最大選択数に達しているため、選択できないようにする
        seat.classList.remove("selected");
        alert("最大6つまでしか選択できません。");
      }
    } else {
      // 選択された座席がすでに選択されている場合、選択を解除する
      selectedCount--;
      selectedSeats.splice(index, 1);
    }

    //テスト用。コンソールにIDが表示される。例：A1,B3,G11 selectedSeatsに格納されてるはず。
    console.log("選択された座席のID:", seatID);
    console.log("選択された座席番号一覧:", selectedSeats);

    
  // ローカルストレージに配列を保存
    localStorage.setItem('selectedSeats', JSON.stringify(selectedSeats));
}

// seatTicketMappingオブジェクトをローカルストレージに保存
localStorage.setItem('seatTicketMapping', JSON.stringify(seatTicketMapping));
console.log(seatTicketMapping); // オブジェクトの内容をコンソールで確認