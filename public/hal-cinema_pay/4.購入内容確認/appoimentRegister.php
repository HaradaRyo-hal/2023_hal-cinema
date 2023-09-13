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

echo "データベースへの接続に成功しました";

// データベースへのクエリ実行など、データベース操作を行うコードをここに追加します

// テーブルに値を挿入するSQLクエリ
$sql = "INSERT INTO t_appointments (f_theater_schedule_id, f_payment_id, f_user_id)
        VALUES (?, ?, ?)";

// SQLステートメントを準備
$stmt = $conn->prepare($sql);

// パラメータのバインド
// これらの変数に挿入する値を設定します
$scheduleId = -1; // 例として1を使用
$paymentId = -1; // 例として123を使用
$userId = "tester"; // 例としてユーザーIDを使用

$stmt->bind_param("iis", $scheduleId, $paymentId, $userId);

// クエリの実行
if ($stmt->execute()) {
    echo "レコードが正常に挿入されました。";
} else {
    echo "エラー: " . $stmt->error;
}

// ステートメントを閉じる
$stmt->close();
?>