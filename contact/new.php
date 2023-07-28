<?php 
    // セッション
    session_start();

    $uri = './index.php';

    // 1、フォームから送信された情報を取得
    // フォームが送信されているか確認する
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // フォームから送信された値を受け取る        
        $to_name = filter_input(INPUT_POST, 'name');
        $to_email = filter_input(INPUT_POST, 'email');
        $to_message = filter_input(INPUT_POST, 'message');

        // バリデーションチェック
        if (empty($to_name)) {
            $_SESSION['error_name'] = "名前を入力してください。";
            
            header('Location:' . $uri);
        }

        if (empty($to_email)) {
            $_SESSION['error_email'] = "メールアドレスを入力してください。";

            header('Location:' . $uri);
        }

        if (empty($to_message)) {
            $_SESSION['error_message'] = "お問い合わせ内容を入力してください。";
            
            header('Location:' . $uri);
        }

        // 2、その受け取った情報をゆいさんメールアドレスに送る。
        // これはメールの設定
        mb_language('Japanese');
        mb_internal_encoding('UTF-8');

        $to = "kd1325121@st.kobedenshi.ac.jp"; // 送信先
        $subject = "ポートフォリオお問い合わせフォーム"; // タイトル
        $message = '名前=>' . $to_name . "\nお問い合わせ内容=>" . $to_message; // 内容　　　ぴえ
        $headers = "From: " . $to_email; // 送った人（お問い合わせしたメールアドレス）

        // メール送信
        mb_send_mail($to, $subject, $message, $headers);
    } else {
        header('Location:' . $uri);
    }
?>
<!--  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    vsdvsd
</body>
</html>
