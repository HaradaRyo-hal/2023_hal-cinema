//step1.htmlのチェックボックス
function validateForm(event) {
  var checkbox = document.getElementById("myCheckbox");
  if (!checkbox.checked) {
    alert("利用規約に同意するにチェックを入れてください。");
    event.preventDefault(); // フォームのデフォルトの送信を阻止
  } else {
    // 別のページに遷移する処理を記述
    event.preventDefault();
    location.href = "./券種/step2.html";
  }
}


//step1.html座席予約システム処理
  // 選択された座席の数をカウントする変数
  var selectedCount = 0;

  // 選択された座席を格納する配列
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
  }
