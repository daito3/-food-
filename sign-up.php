<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/sign-up.css">
    <title>会員登録画面</title>
</head>
<body>
    <div class="header">
        <img class="header-logo" src="image-file/LOmenu-logo-header.png" alt="logo">
    </div>
    <!-- 新規登録機能 -->
    <div class="sign_up_form_top">
        <h1 class="titli-login">新規作成</h1>
        <div class="sign_up_form">
            <form action="sign-up.php" method="POST">
                
                <div class="input_form">
                    <label for="users_name_id">ユーザーネーム</label><br>
                    <input id="users_name_id" class="input_form_class" type="text" name="users_name"><br>

                    <label for="mail_address_id">メールアドレス</label></br>
                    <input id="mail_address_id" class="input_form_class" type="text" name="mail_address"></br>

                    <label for="new_password_id">パスワード</label></br>
                    <input id="new_password_id" class="input_form_class" type="password" name="new_password"></br>

                    <label for="re_password_id">パスワード(再入力)</label></br>
                    <input id="re_password_id" class="input_form_class" type="password" name="re_password"></br>
                    
                    <div class="submit_button">
                        <input type="button" value="登録" onclick="submit()">
                    </div>
                </div>

            </form>
            <?php
                session_start();
                require_once('db_connect.php');
                $next_page = '';
                $login_completed ='';
                $error_log ='';

                if(isset($_POST["users_name"]) && isset($_POST["mail_address"] ) && isset($_POST["new_password"]) && isset($_POST["re_password"])){
                    if(!empty($_POST)){

                        if($_POST['users_name'] === ''){
                            $error_log = $error_log.'ユーザーが入力されていません'."<br>";
                            $error ='';
                        }

                        if($_POST['mail_address'] === ''){
                            $error_log = $error_log.'メールアドレスが入力されていません'."<br>";
                            $error ='';
                        }

                        if($_POST['new_password'] === ''){
                            $error_log = $error_log.'パスワードが入力されていません'."<br>";
                            $error ='';
                        }

                        if($_POST['re_password'] === ''){
                            $error_log = $error_log.'パスワード(再入力)が入力されていません'."<br>";
                            $error ='';
                        }

                        if($_POST['new_password'] !== $_POST['re_password']){
                            $error_log = $error_log.'パスワードが一致していません'."<br>";
                            $error ='';
                        }

                        if(!isset($error)){
                            $member = $db->prepare('SELECT COUNT(*) as cnt1 FROM users WHERE users_name=?');
                            $member->execute(array($_POST['users_name']));
                            $record_users = $member->fetch();

                            $member = $db->prepare('SELECT COUNT(*) as cnt2 FROM users WHERE email=?');
                            $member->execute(array($_POST['mail_address']));
                            $record_email = $member->fetch();

                            

                            if($record_users['cnt1'] > 0){
                                $error = $error.'このユーザーネームは使用できません'."<br>";
                                $error ='';
                            }
                            if($record_email['cnt2'] > 0){
                                $error_log = $error_log.'このメールアドレスは使用できません'."<br>";
                                $error ='';
                            }

                            try{
                                if(!isset($error)){

                                    $sql = $db->prepare("INSERT INTO users(users_name,email,password) VALUES(:new_users_name, :new_mail_address, :new_password)");
                                    $sql->bindValue(':new_users_name',$_POST['users_name']);
                                    $sql->bindValue(':new_mail_address',$_POST['mail_address']);
                                    $sql->bindValue(':new_password',password_hash($_POST['new_password'], PASSWORD_DEFAULT));
                                    $sql->execute();
                                    $login_completed = "<h2>新規登録が完了しました</h2>";
                                    $_SESSION['login_user'] = $_POST['users_name'];
                                    echo "<br>";
                                    $next_page = "<button class=\"next_page_button\" onclick=\"location.href='seisaku-mypage.php'\">ページはこちら</a>";
                                    
                                }else{
                                    $error_log = '新規登録が出来ませんでした';
                                }
                            }catch(PDOException $e){
                                echo "エラー直せ";
                            }
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