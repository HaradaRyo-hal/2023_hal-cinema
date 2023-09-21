<?php
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    header("Location: step4.html");
    exit();
    //aaaaa

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // JSONデータを受け取り、連想配列に変換
  $requestData = json_decode(file_get_contents('php://input'), true);

  // seatTicketMapping の値をセッション変数に保存
  $_SESSION['seatTicketMapping'] = $requestData['seatTicketMapping'];

  // 保存が成功したことを示すレスポンスを返す
  echo json_encode(['message' => '保存が成功しました。']);
} else {
  // POSTリクエスト以外の場合、エラーレスポンスを返す
  http_response_code(400);
  echo json_encode(['error' => 'Invalid request']);
}

?>