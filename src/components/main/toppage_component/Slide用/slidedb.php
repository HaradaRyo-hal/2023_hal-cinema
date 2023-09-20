<?php
//

// クロスオリジン対策
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Content-Type');

// POSTリクエストからデータを受け取る
$data = json_decode(file_get_contents("php://input"));
$id = $data->id; // リクエストからIDを取得

// データベースに接続する
try {
  $pdo = new PDO('mysql:host=localhost;dbname=cinemacys2;charset=utf8', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
  exit('データベースエラー: ' . $e->getMessage());
}

// m_moviesとm_movie_titlesからデータを取得する
try {
  $stmt = $pdo->prepare("SELECT m.f_movie_id, m.f_movie_title_id, m.f_genre_id, m.f_content, m.f_movie_runtime_min, m.f_movie_data, t.f_movie_title_japan, t.f_movie_title_foreign FROM m_movies m LEFT JOIN m_movie_titles t ON m.f_movie_title_id = t.f_movie_title_id WHERE m.f_movie_id = ?");
  $stmt->execute([$id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  // データが見つからない場合のエラーハンドリング
  if (!$result) {
    echo json_encode(['error' => 'Movie not found']);
  } else {
    echo json_encode($result);
  }
}
catch (PDOException $e) {
  exit('データベースエラー: ' . $e->getMessage());
}
?>
