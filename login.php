<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/login.css">
    <title>ログイン画面</title>
</head>
<body>
    <div class="header">
        <img class="header-logo" src="image-file/LOmenu-logo-header.png" alt="logo">
    </div>
    <!-- ログイン機能 -->
    <div class="login_form_top">
        <h1 class="titli-login">ログイン</h1>
        <div class="login_form">
            <form id="hoge" action="login.php" method="post">

                <div class="input_form">
                    <label for="users_name_id">ユーザーネーム</label><br>
                    <input type="text" name="users_name" id="users_name_id" class="input_form_class"><br>

                    <label for="password_id">パスワード</label><br>
                    <input type="password" name="password" id="password_id" class="input_form_class"><br>
                </div>
            </form>
            <div class="login_button">
                <button class="sign_up_button" onclick="location.href='sign-up.php'">新規登録</button>
                <input form="hoge" class="submit_button" type="button" value="ログイン" onclick="submit()">
            </div>
            <?php
                session_start();
                require_once('db_connect.php');
                $next_page = '';
                $login_completed ='';
                $error_log ='';

                if(isset($_POST["users_name"]) && isset($_POST["password"])){
                    if(!empty($_POST)){
                        //formに入力がされているか
                        if($_POST['users_name'] === ''){
                            $error_log = $error_log.'メールアドレスが入力されていません'."<br>";
                            $error = '';
                        }
                        if($_POST['password'] === ''){
                            $error_log = $error_log.'パスワードが入力されていません'."<br>";
                            $error = '';
                        }

                        try{

                            if(!isset($error)){
                                //passwordの比較
                                $member = $db->prepare('SELECT * FROM users WHERE users_name=?');
                                $member->bindValue(1, $_POST['users_name'], PDO::PARAM_STR);
                                $member->execute();
                                $result = $member->fetch(PDO::FETCH_ASSOC);

                                if(password_verify($_POST['password'],$result['password'])){
                                    $login_completed =  "<h2>ログインできました</h2>";
                                    $_SESSION['login_user'] = $_POST['users_name'];
                                    echo "<br>";
                                    $next_page = "<button class=\"next_page_button\" onclick=\"location.href='seisaku-mypage.php'\">ページはこちら</a>";
                                }else{
                                    $error_log = 'ログインが出来ませんでした';
                                }
                            }
                            
                        }catch(PDOException $e){
                            echo "エラーです";
                        }
                    }
                }
            ?>
        </div>
        <div class="next_page">
            <?php echo $login_completed ?>
            <?php echo $next_page ?>
            <?php echo $error_log ?>
        </div>
    </div>
</body>
</html>