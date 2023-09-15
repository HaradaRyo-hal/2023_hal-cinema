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
if ($stmt->execute()) {
    echo "データが正常に挿入されました。-payments";
    $paymentsId = $conn->insert_id;
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
$scheduleId = $_COOKIE["schedule"];
$paymentId = $paymentsId;
$userId = $_COOKIE["userid"];

$stmt->bind_param("iis", $scheduleId, $paymentId, $userId);

// クエリの実行
if ($stmt->execute()) {
    echo "レコードが正常に挿入されました。";
    $appointmentsId = $conn->insert_id;
} else {
    echo "エラー: " . $stmt->error;
}

// ステートメントを閉じる
$stmt->close();

// 予約詳細の登録

$f_screen_id = $_COOKIE['screen']; // スクリーンID

foreach ($_COOKIE['seat'] as $key => $value) {
    # code...
    $sql = "INSERT INTO t_appointment_details (f_appointment_id, f_screen_id, f_seat_number, f_ticket_type_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $seat = htmlspecialchars($key);
    $seatType = htmlspecialchars($value);


    switch ($seatType) {
    case '一般':
        # code...
        $seatType = "TT000001";
        break;
    case '大学生等':
        # code...
        $seatType = "TT000002";
        break;
    case '中学、高校':
        # code...
        $seatType = "TT000003";
        break;
    case '小学生、幼児':
        $seatType = "TT000004";
        break;
    default:
        # code...
        break;
    }


    $stmt->bind_param("isss", $appointmentsId, $f_screen_id, $seat, $seatType);
    // クエリの実行
    if ($stmt->execute()) {
        echo "レコードが正常に挿入されました。";
        $appointmentsId = $conn->insert_id;
    } else {
        echo "エラー: " . $stmt->error;
    }

    // ステートメントを閉じる
    $stmt->close();

}


$conn->close();

header('location: ../5.購入完了/step5.php');
?>