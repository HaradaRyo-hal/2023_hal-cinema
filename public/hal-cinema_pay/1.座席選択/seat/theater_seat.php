<?php

// シアタータイプとスケジュールIDを入れるとそれに対応した座席を出力する関数
function theaterSeat($type,$scheduleId)
{
    // データベースと接続
    try {
   
        // データベースに接続
        $pdo = new PDO(
            'mysql:dbname=cinemasys;host=localhost;charset=utf8mb4',
            'root',
            '',
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );
    
    } catch (PDOException $e) {
    
        // エラーが発生した場合は「500 Internal Server Error」でテキストとして表示して終了する
        header('Content-Type: text/plain; charset=UTF-8', true, 500);
        exit($e->getMessage()); 
    
    }
    // スケジュールIDと席が埋まっていることを意味するf_seat_status=1の時の座席番号を取得するSQL
    $stmt = $pdo->query("SELECT f_seat_number FROM t_seats WHERE f_theater_schedule_id =". $scheduleId ." AND f_seat_status = 1;");
    $seat_reserved = array();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // 取得したSQLを使いやすいように配列に変形
    foreach($result as $key => $value){
        foreach($value as $colmun => $val){
            array_push($seat_reserved,$val);
        }
    }

    // 全シアター共通部分なので一度変数に格納
    $preface = '<!DOCTYPE html><html lang="ja"><head><meta charset="UTF-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge" /><meta name="viewport" content="width=device-width, initial-scale=1.0" /><link rel="stylesheet" href="../common.css" /><link rel="stylesheet" href="./kounyuu_zaseki.css" /><script src="../common.js"></script></head><body><div class="screen"><p>SCREEN</p></div>';
    $footer = "</body></html>";
    // 通路番号とfor文の通し番号を変換するための配列
    $section = array("A","B","C","D","E","F","G","H","I","J");
    $ret = "";

    if($type=='シアター１'){
        // シアター１　縦１０列　横２０列
        for($i=0;$i<10;$i++){
            $ret .= '<div class='.$section[$i].'><div class="seat-row">';
            for($j=1;$j<=20;$j++){
                // 座席ひとつずつ埋まってるか検索
                foreach($seat_reserved as $value){
                    $check = false;
                    preg_match('/([A-Za-z]+)([0-9]+)/',$value,$matches);
                    if(count($matches)=== 3){
                        $column = $matches[1];
                        $row    = (int)$matches[2];
                    }
                    if($column == $section[$i] && $row == $j){
                        $check = true;
                        break;
                    }else{
                        $check = false;
                    }
                }
                // 座席が埋まっている→true
                if($check){
                    $ret .= '<button class="custom-button disabled" onclick="toggleSeat(this)" disabled>'.$j.'</button>';
                }else{
                    $ret .= '<button class="custom-button" onclick="toggleSeat(this)" enabled>'.$j.'</button>';
                }
                // 通路の表示
                if($j == 4 || $j == 16){
                    $ret .= '<div class ="tateretu"><p>'.$section[$i].'</p></div>';
                }
            }
            $ret .= '</div></div>';

        }
        return $preface.$ret.$footer;
        
        
    }else if($type=='シアター２'){
        for($i=0;$i<10;$i++){
            $ret .= '<div class='.$section[$i].'><div class="seat-row">';
            for($j=1;$j<=12;$j++){
                foreach($seat_reserved as $value){
                    $check = false;
                    preg_match('/([A-Za-z]+)([0-9]+)/',$value,$matches);
                    if(count($matches)=== 3){
                        $column = $matches[1];
                        $row    = (int)$matches[2];
                    }
                    if($column == $section[$i] && $row == $j){
                        $check = true;
                        break;
                    }else{
                        $check = false;
                    }
                }
                if($check){
                    $ret .= '<button class="custom-button disabled" onclick="toggleSeat(this)" disabled>'.$j.'</button>';
                }else{
                    $ret .= '<button class="custom-button" onclick="toggleSeat(this)" enabled>'.$j.'</button>';
                }
                if($j == 2 || $j == 10){
                    $ret .= '<div class ="tateretu"><p>'.$section[$i].'</p></div>';
                }
            }
            $ret .= '</div></div>';

        }
        return $preface.$ret.$footer;

    }else if($type=='シアター３'){
        for($i=0;$i<7;$i++){
            $ret .= '<div class='.$section[$i].'><div class="seat-row">';
            for($j=1;$j<=10;$j++){
                foreach($seat_reserved as $value){
                    $check = false;
                    preg_match('/([A-Za-z]+)([0-9]+)/',$value,$matches);
                    if(count($matches)=== 3){
                        $column = $matches[1];
                        $row    = (int)$matches[2];
                    }
                    if($column == $section[$i] && $row == $j){
                        $check = true;
                        break;
                    }else{
                        $check = false;
                    }
                }
                if($check){
                    $ret .= '<button class="custom-button disabled" onclick="toggleSeat(this)" disabled>'.$j.'</button>';
                }else{
                    $ret .= '<button class="custom-button" onclick="toggleSeat(this)" enabled>'.$j.'</button>';
                }
                if($j == 10){
                    $ret .= '<div class ="tateretu"><p>'.$section[$i].'</p></div>';
                }
            }
            $ret .= '</div></div>';

        }
        return $preface.$ret.$footer;
    }else{
        return 'その他の劇場の座席情報';
    }
}
?>