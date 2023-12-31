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

        // 2、その受け取った情報をメールアドレスに送る。
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/destyle.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <title>sayuki's portfolio.</title>
</head>
<body>
    <div id="cursor" class="cursor"></div>

    <div id="wrapper">

        <div id="sidebar">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                <g clip-path="url(#clip0_107_163)" filter="url(#filter0_i_107_163)">
                    <path d="M3.92118 0.5C2.03152 0.5 0.5 2.03125 0.5 3.92118C0.5 5.81104 2.03152 7.34229 3.92118 7.34229C5.81077 7.34229 7.34229 5.81104 7.34229 3.92118C7.34229 2.03125 5.81077 0.5 3.92118 0.5Z" fill="white"/>
                    <path d="M18 0.5C16.1104 0.5 14.5788 2.03125 14.5788 3.92118C14.5788 5.81104 16.1103 7.34229 18 7.34229C19.8896 7.34229 21.4212 5.81104 21.4212 3.92118C21.4212 2.03125 19.8896 0.5 18 0.5Z" fill="white"/>
                    <path d="M32.0788 7.34229C33.9681 7.34229 35.5 5.81104 35.5 3.92118C35.5 2.03125 33.9681 0.5 32.0788 0.5C30.1895 0.5 28.6577 2.03125 28.6577 3.92118C28.6577 5.81104 30.1895 7.34229 32.0788 7.34229Z" fill="white"/>
                    <path d="M3.92118 14.5786C2.03152 14.5786 0.5 16.1099 0.5 17.9998C0.5 19.8897 2.03152 21.421 3.92118 21.421C5.81077 21.421 7.34229 19.8897 7.34229 17.9998C7.34229 16.1099 5.81077 14.5786 3.92118 14.5786Z" fill="white"/>
                    <path d="M18 14.5786C16.1104 14.5786 14.5788 16.1099 14.5788 17.9998C14.5788 19.8897 16.1103 21.421 18 21.421C19.8896 21.421 21.4212 19.8897 21.4212 17.9998C21.4212 16.1099 19.8896 14.5786 18 14.5786Z" fill="white"/>
                    <path d="M32.0788 14.5786C30.1895 14.5786 28.6577 16.1099 28.6577 17.9998C28.6577 19.8897 30.1895 21.421 32.0788 21.421C33.9681 21.421 35.5 19.8897 35.5 17.9998C35.5 16.1099 33.9681 14.5786 32.0788 14.5786Z" fill="white"/>
                    <path d="M3.92118 28.6577C2.03152 28.6577 0.5 30.189 0.5 32.0788C0.5 33.9688 2.03152 35.5 3.92118 35.5C5.81077 35.5 7.34229 33.9688 7.34229 32.0788C7.34229 30.189 5.81077 28.6577 3.92118 28.6577Z" fill="white"/>
                    <path d="M18 28.6577C16.1104 28.6577 14.5788 30.189 14.5788 32.0788C14.5788 33.9688 16.1104 35.5 18 35.5C19.8896 35.5 21.4212 33.9688 21.4212 32.0788C21.4212 30.189 19.8896 28.6577 18 28.6577Z" fill="white"/>
                    <path d="M32.0788 28.6577C30.1895 28.6577 28.6577 30.189 28.6577 32.0788C28.6577 33.9688 30.1895 35.5 32.0788 35.5C33.9681 35.5 35.5 33.9688 35.5 32.0788C35.5 30.189 33.9681 28.6577 32.0788 28.6577Z" fill="white"/>
                </g>
                <defs>
                    <filter id="filter0_i_107_163" x="0.5" y="0.5" width="35" height="39" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset dy="4"/>
                        <feGaussianBlur stdDeviation="2"/>
                        <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.3 0"/>
                        <feBlend mode="normal" in2="shape" result="effect1_innerShadow_107_163"/>
                    </filter>
                    <clipPath id="clip0_107_163">
                        <rect width="35" height="35" fill="white" transform="translate(0.5 0.5)"/>
                    </clipPath>
                </defs>
            </svg>
        </div>

        <nav id="g-nav">
            <ul>
                <li class="main-nav"><a href="../index.html#">TOP</a></li>
                <li class="main-nav"><a href="../works/index.html#">WORKS</a>
                    <ul>
                        <li class="mini-nav"><a href="../works/index.html#web">WEB</a></li>
                        <li class="mini-nav"><a href="../works/index.html#graphics">GRAPHICS</a></li>
                        <li class="mini-nav"><a href="../works/index.html#others">OTHERS</a></li>
                    </ul>
                </li>
                <li class="main-nav"><a href="../profile/index.html#">PROFILE</a></li>
                <li class="main-nav"><a href="#">CONTACT</a></li>
            </ul>
        </nav>
        <div class="circle-bg"></div>

        <!-- <header id="header">
            <div class="Title">
                <h1>CONTACT.</h1>
                <div>
                    <img src="../img/icn/contact.png" width="100%" alt="">
                </div>
            </div>
        </header> -->

        <div id="main">
            <div class="inner">
                <h2>お問い合わせありがとうございます。<br> メールが送信されました。
                    <br> 内容を確認した後、お返事をお送りいたします。
                </h2>
                <button onclick="location.href='index.php#'">
                    戻る
                </button>
            </div>
        </div>

        <footer id="footer">
            <div id="page-top">
                <a href="index.php#">
                    <div class="arrow-top">
                        <svg width="10" height="172" viewBox="0 0 10 172" fill="none">
                            <path d="M9 173L9 84.5L9 40.25L9 18.125V7.0625V1.53125L1 13" stroke="#6D7067" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <p>PAGE TOP</p>
                </a>
            </div>

            <div id="copyright">
                <p>© 2023 YUI SAYUKI</p>
            </div>
        </footer>

    </div>

    <!-- js読み込み -->

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- slick -->
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- js書き込み -->

    <!-- ナビゲーション -->
    <script>
        $("#sidebar").click(function() { //ボタンがクリックされたら
            $(this).toggleClass('active'); //ボタン自身に activeクラスを付与し
            $("#g-nav").toggleClass('panelactive'); //ナビゲーションにpanelactiveクラスを付与
            $(".circle-bg").toggleClass('circleactive'); //丸背景にcircleactiveクラスを付与
        });

        $("#g-nav a").click(function() { //ナビゲーションのリンクがクリックされたら
            $(".openbtn").removeClass('active'); //ボタンの activeクラスを除去し
            $("#g-nav").removeClass('panelactive'); //ナビゲーションのpanelactiveクラスを除去
            $(".circle-bg").removeClass('circleactive'); //丸背景のcircleactiveクラスを除去
        });
    </script>

    <!-- カーソル設定 -->
    <script>
        // カーソル用のdivタグを取得してcursorに格納
        var cursor = document.getElementById('cursor'); 

        // カーソル用のdivタグをマウスに追従させる
        document.addEventListener('mousemove', function (e) {
            cursor.style.transform = 'translate(' + e.clientX + 'px, ' + e.clientY + 'px)';
        });

        // リンクにホバーした時にクラス追加、離れたらクラス削除
        var link = document.querySelectorAll('button a');
        for (var i = 0; i < link.length; i++) {
            link[i].addEventListener('mouseover', function (e) {
                cursor.classList.add('cursor--hover');
            });
            link[i].addEventListener('mouseout', function (e) {
                cursor.classList.remove('cursor--hover');   
            });
        }
    </script>

</body>
</html>
