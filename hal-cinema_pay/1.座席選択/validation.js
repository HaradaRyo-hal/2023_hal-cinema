//validation
function validateForm(event) {
  var checkbox = document.getElementById("myCheckbox");
  if (!checkbox.checked) {
    alert("利用規約に同意するにチェックを入れてください。");
    event.preventDefault(); // フォームのデフォルトの送信を阻止
  } else {
    // 別のページに遷移する処理を記述
    event.preventDefault();
    location.href = "../kenshu/kenshu.html";
  }
}
