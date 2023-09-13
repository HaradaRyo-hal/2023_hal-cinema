<?php
// データベース接続情報
$servername = "localhost"; // データベースサーバーのホスト名
$username = "root";   // データベースユーザー名
$password = "root";   // データベースパスワード
$dbname = "cinemasys"; // 使用するデータベース名

// データベースへの接続
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続確認
if ($conn->connect_error) {
    die("データベースへの接続に失敗しました: " . $conn->connect_error);
}

// echo "データベースへの接続に成功しました";

// データベースへのクエリ実行など、データベース操作を行うコードをここに追加します

// 決済情報登録

// フォームから送信されたデータ
foreach ($_COOKIE['profile'] as $key => $value) {
    # code...
    $profile[$key] = htmlspecialchars($value);
}

$expirationDate = $profile['expiryYear'].$profile['expiryMonth'];

// プリペアドステートメントを作成
$stmt = $conn->prepare("INSERT INTO t_payments (f_mail_address, f_phone_number, f_expiration_date, f_card_holder_name) VALUES (?, ?, ?, ?)");
// プリペアドステートメントに変数をバインド
$stmt->bind_param("ssis", $profile['email'], $profile['phoneNumber'], $expirationDate, $profile['cardHolderName']);
// クエリを実行してデータを挿入
$lastInsertId = null;
if ($stmt->execute()) {
    echo "データが正常に挿入されました。-payments";
    $lastInsertId = $conn->insert_id;
} else {
    echo "データの挿入中にエラーが発生しました。-payments: " . $stmt->error;
}


$stmt->close();

// テーブルに値を挿入するSQLクエリ
$sql = "INSERT INTO t_appointments (f_theater_schedule_id, f_payment_id, f_user_id)
        VALUES (?, ?, ?)";

// SQLステートメントを準備
$stmt = $conn->prepare($sql);

// パラメータのバインド
// これらの変数に挿入する値を設定します
$scheduleId = $_COOKIE["schedule"]; // 例として1を使用
$paymentId = $lastInsertId; // 例として123を使用
$userId = $_COOKIE["userid"]; // 例としてユーザーIDを使用

$stmt->bind_param("iis", $scheduleId, $paymentId, $userId);

// クエリの実行
if ($stmt->execute()) {
    echo "レコードが正常に挿入されました。";
} else {
    echo "エラー: " . $stmt->error;
}

// ステートメントを閉じる
$stmt->close();
$conn->close();
?>