<!-- process_form.php -->
<?php
// フォームデータを取得
$lastName = $_POST['lastName'];
$firstName = $_POST['firstName'];
$email = $_POST['email'];
$emailConfirmation = $_POST['emailConfirmation'];
$securityCode = $_POST['securityCode'];
$cardHolderName = $_POST['cardHolderName'];

// フォームデータを次のページに渡すための処理を実行する（例：セッション変数を使用する）
session_start();
$_SESSION['lastName'] = $lastName;
$_SESSION['firstName'] = $firstName;
$_SESSION['email'] = $email;
$_SESSION['emailConfirmation'] = $emailConfirmation;
$_SESSION['securityCode'] = $securityCode;
$_SESSION['cardHolderName'] = $cardHolderName;

// 次のページにリダイレクト
header("Location: ./step4.php");
exit();
?>
