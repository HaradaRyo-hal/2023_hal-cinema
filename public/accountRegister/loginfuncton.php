<?php
// レスポンスヘッダーにCORSヘッダーを設定
header("Access-Control-Allow-Origin: http://localhost:3000"); // リクエストを許可するオリジンを指定
header("Access-Control-Allow-Methods: POST, GET, OPTIONS"); // 許可するHTTPメソッドを指定
header("Access-Control-Allow-Headers: Content-Type"); // 許可するリクエストヘッダーを指定

$json = file_get_contents('php://input');

$data = json_decode($json);

$setData = (array) $data;

// データベース接続情報
$hostname = "localhost"; // データベースサーバーのホスト名
$username = "root"; // データベースユーザー名
$password = "root"; // データベースパスワード
$database = "cinemasys"; // データベース名

// データベースへの接続
$conn = new mysqli($hostname, $username, $password, $database);

// 接続エラーの確認
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $setData['f_user_id'];
$pass = $setData['f_login_password'];

echo $name."|".$pass;

// プリペアドステートメントを準備
$sql = "SELECT * FROM m_users WHERE f_login_name = ? AND f_login_password = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    // パラメータをバインド
    $stmt->bind_param("ss", $name, $pass);

    // ステートメントを実行
    $stmt->execute();

    // 結果を取得
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // 一致したレコードが存在する場合
        echo "true";
        setcookie("reactUser", "true", time() + 3600, "/");
    } else {
        // 一致するレコードが存在しない場合
        echo "false";
    }

    // ステートメントをクローズ
    $stmt->close();
} else {
    // ステートメントの準備に失敗した場合のエラーハンドリング
    echo "エラー: ステートメントの準備に失敗しました。";
}

// データベース接続を閉じる
$conn->close();


?>