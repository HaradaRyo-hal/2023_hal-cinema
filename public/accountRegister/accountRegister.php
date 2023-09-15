<?php
// レスポンスヘッダーにCORSヘッダーを設定
header("Access-Control-Allow-Origin: http://localhost:3000"); // リクエストを許可するオリジンを指定
header("Access-Control-Allow-Methods: POST, GET, OPTIONS"); // 許可するHTTPメソッドを指定
header("Access-Control-Allow-Headers: Content-Type"); // 許可するリクエストヘッダーを指定

$json = file_get_contents('php://input');

$data = json_decode($json);


var_dump((array) $data);

$setData = (array) $data;

// print($data['f_user_id']);

// デバッグ
// var_dump($data);

// データベース接続情報
$hostname = "localhost"; // データベースサーバーのホスト名
$username = "root"; // データベースユーザー名
$password = "root"; // データベースパスワード
$database = "cinemasys"; // データベース名

try {
    // データベースに接続
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);

    // エラーモードを例外モードに設定
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // データ数計算
    // データベースに接続
    try {
        $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQLクエリを実行
        $stmt = $conn->prepare("SELECT COUNT(*) FROM m_users");
        $stmt->execute();

        // 結果セットの行数を取得
        $rowCount = $stmt->fetchColumn();
        
        // 結果を表示
        // echo "行数: " . $rowCount;
    } catch (PDOException $e) {
        echo "エラー: " . $e->getMessage();
    }

    // データベース接続を閉じる
    $conn = null;

    // 挿入するデータ
    $f_user_id = sprintf("UR%06d", $rowCount + 1);
    $f_login_name = $setData['f_user_id'];
    $f_login_password = $setData['f_login_password'];
    // $f_news_subscribed = $setData['f_news_subscribed'];
    if($setData['f_news_subscribed']){
        $f_news_subscribed = 1;
    }else{
        $f_news_subscribed = 0;
    }
    $f_birthday = $setData['f_birthday'];
    $f_postal_code = $setData['f_postal_code'];
    $f_prefecture = $setData['f_prefecture'];
    $f_city = $setData['f_city'];
    $f_address1 = $setData['f_address1'];
    $f_address2 = $setData['f_address2'];
    $f_mail_address = $setData['f_mail_address'];
    $f_full_name_kanji = $setData['f_full_name_kanji'];
    $f_full_name_kana = $setData['f_full_name_kana'];

    // SQL文を準備
    $sql = "INSERT INTO m_users (
        f_user_id,
        f_login_name,
        f_login_password,
        f_news_subscribed,
        f_birthday,
        f_postal_code,
        f_prefecture,
        f_city,
        f_address1,
        f_address2,
        f_mail_address,
        f_full_name_kanji,
        f_full_name_kana
    ) VALUES (
        :f_user_id,
        :f_login_name,
        :f_login_password,
        :f_news_subscribed,
        :f_birthday,
        :f_postal_code,
        :f_prefecture,
        :f_city,
        :f_address1,
        :f_address2,
        :f_mail_address,
        :f_full_name_kanji,
        :f_full_name_kana
    )";

    // SQLステートメントを準備
    $stmt = $pdo->prepare($sql);

    // パラメータをバインド
    $stmt->bindParam(':f_user_id', $f_user_id);
    $stmt->bindParam(':f_login_name', $f_login_name);
    $stmt->bindParam(':f_login_password', $f_login_password);
    $stmt->bindParam(':f_news_subscribed', $f_news_subscribed);
    $stmt->bindParam(':f_birthday', $f_birthday);
    $stmt->bindParam(':f_postal_code', $f_postal_code);
    $stmt->bindParam(':f_prefecture', $f_prefecture);
    $stmt->bindParam(':f_city', $f_city);
    $stmt->bindParam(':f_address1', $f_address1);
    $stmt->bindParam(':f_address2', $f_address2);
    $stmt->bindParam(':f_mail_address', $f_mail_address);
    $stmt->bindParam(':f_full_name_kanji', $f_full_name_kanji);
    $stmt->bindParam(':f_full_name_kana', $f_full_name_kana);

    // ステートメントを実行
    $stmt->execute();

    // データベース接続をクローズ
    $pdo = null;

    echo "データが挿入されました。";
} catch (PDOException $e) {
    echo "エラー: " . $e->getMessage();
}



?>