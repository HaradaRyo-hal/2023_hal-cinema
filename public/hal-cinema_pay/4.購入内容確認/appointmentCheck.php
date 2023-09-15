<?php
    // memo: ダブりカウント
    // select f_seat_number,COUNT(*)    シート名と人数
    // from t_appointments JOIN t_appointment_details   
    // ON t_appointments.f_appointment_id = t_appointment_details.f_appointment_id
    // AND f_theater_schedule_id = "1" 
    // GROUP BY f_seat_number;

    $connt = 0;
    
    $seatNanem = "A5";
    $f_theater_schedule_id = "1";
    

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

    $sql = "select f_seat_number,COUNT(*) as 'count' from t_appointments JOIN t_appointment_details ON t_appointments.f_appointment_id = t_appointment_details.f_appointment_id AND f_theater_schedule_id = ? AND f_seat_number = ? GROUP BY f_seat_number";
    $stmt = $conn->prepare($sql);

    if($stmt){
        
        $stmt->bind_param("ss", $f_theater_schedule_id, $seatNanem);

        // ステートメントを実行
        $stmt->execute();

        // 結果を取得
        $result = $stmt->get_result();

        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        print_r($data);

        if(empty($data)){
            echo "not data";
        }else{
            echo "on data";
        };

    }

        $stmt = null;
        $conn = null;

?>