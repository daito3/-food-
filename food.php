<?php
    session_start();
    require_once('db_connect.php');

    $sql = $db->prepare("SELECT * FROM users WHERE users_name='".$_SESSION['login_user']."'");
    $sql->execute();

    foreach ($sql as $row){
        $tomato          = $row['tomato'];
        $cucumber        = $row['cucumber'];
        $chinese_cabbage = $row['chinese_yabbage'];
        $cabbage         = $row['cabbage'];
        $onion           = $row['onion'];
        $potato          = $row['potato'];
        $carrot          = $row['carrot'];
        $piman           = $row['piman'];
        $egg             = $row['egg'];
        $niku_tori_momo  = $row['niku_tori_momo'];
    }
    //カウンタ　プラスボタン
    function plus($food1){
        
        $a = $food1."plus";

        if (isset($_POST[$a])) {
            
            try {
                $db1 = new PDO(
                    'mysql:dbname=LOmenu_db;host=localhost;port=8889;charset=utf8',
                    'root',
                    'root'
                );
            } catch (PDOException $e1) {
                echo "データベースの接続に失敗しました:";
                echo $e1->getMessage();
                die();
            }

            try {

                $stmt1 = $db1->prepare("UPDATE users SET " . $food1 . "=" . $food1 . " + 1 WHERE users_name = '" . $_SESSION['login_user'] . "'");
                $stmt1->execute();



            } catch (PDOException $e1) {
                echo "error";
            }

            $b = 1;

        } else {
            $b = 0;
        }
        echo $a;
        return $b;
    }
    //カウンタ　マイナスボタン
    function minus($food){
        
        if (isset($_POST[$food])) {
            
            try {
                $db = new PDO(
                    'mysql:dbname=LOmenu_db;host=localhost;port=8889;charset=utf8',
                    'root',
                    'root'
                );
            } catch (PDOException $e) {
                echo "データベースの接続に失敗しました:";
                echo $e->getMessage();
                die();
            }

            try {

                $stmt = $db->prepare("UPDATE users SET " . $food . "=" . $food . " - 1 WHERE users_name = '" . $_SESSION['login_user'] . "'");
                $stmt->execute();

            } catch (PDOException $e) {
                echo "error";
            }

            $b = -1;

        } else {
            $b = 0;
        }
        echo $food;
        return $b;
    }



?>

<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="utf-8">
        <title>食材確認フォーム</title>
        <meta name="viewport" content="width=device-width" />
        <meta name="description" content="">
        <link rel="stylesheet" type="text/css" href="stylesheet/food.css">
        <script src="tab.js" defer></script>
    </head>

    <body>
        <!-- ヘッダー -->
        <div class="header">
            <img class="header-logo" src="image-file/LOmenu-logo-header.png" alt="logo">
        </div>

        <!-- 機能欄 -->
        <div class="function-column">
            <a href="seisaku-mypage.php"><img class="home_button" src="image-file/Home-button.jpeg" alt="ホームに戻る"></a>
            <a href="recipe.php"><img class="home_button" src="image-file/menu-icon.jpeg" alt="レシピ提案ホームに行く"></a>
            <a href="food.php"><img class="home_button" src="image-file/refrigerator.jpeg" alt="食材管理ホームに行く"></a>
            <a href="recipe-addtion.php"><img class="home_button" src="image-file/recipe-memo.jpeg" alt="レシピ記録フォームに行く"></a>
            <a href="recipe-addtion.php"><img class="home_button" src="image-file/logout.png" alt="ログアウト"></a>
        </div>

        <!-- タブ -->
        <div class="tabs_color">
            <!-- <div class="tab_main"> -->
            <ul class="tabs">
                <li><a href="" class="active">野菜</a></li>
                <li><a href="">肉・魚</a></li>
                <li><a href="">主食</a></li>
                <li><a href="">調味料</a></li>
            </ul>
            
            <ul class="contents">
                <li class="active">
                    <!-- 一段目 ------------------------------------------ -->
                    <div id="count" class="counter">
                        <!-- トマト -------------------------------------- -->
                        <div class="count_box count_boxs">
                            <form action="food.php" method="post">
                                <img src="image-file/tomato.jpeg" alt="トマト">
                                <div class="count_button_box">
                                    <button class="plus" type="submit" name="<?php $tomato_plus = plus("tomato")?>">＋</button>
                                    <button class="minus" type="submit" name="<?php $tomato_minus = minus("tomato")?>">－</button>
                                </div>
                            </form>
                            <div class="food_name">トマト</div>
                            <div class="food_number"><?php echo $tomato + $tomato_plus + $tomato_minus?>個</div>
                        </div>

                        <!-- きゅうり -------------------------------------- -->
                        <div class="count_box count_boxs">
                            <div>
                                <form action="food.php" method="post">
                                    <img src="image-file/cucumber.jpeg" alt="きゅうり">
                                    <div class="count_button_box">
                                        <button class="plus" type="submit" name="<?php $cucumber_plus = plus("cucumber")?>">＋</button>
                                        <button class="minus" type="submit" name="<?php $cucumber_minus = minus("cucumber")?>">－</button>
                                    </div>
                                </form>
                                <div class="food_name">きゅうり</div>
                                <div class="food_number"><?php echo $cucumber + $cucumber_plus + $cucumber_minus?>個</div>
                            </div>
                        </div>

                        <!-- 白菜 -------------------------------------- -->
                        <div class="count_box">
                            <div>
                                <form action="food.php" method="post">
                                    <img src="image-file/chinese-cabbage.jpeg" alt="白菜">
                                    <div class="count_button_box">
                                        <button class="plus" type="submit" name="<?php $chinese_cabbage_plus = plus("chinese_yabbage")?>">＋</button>
                                        <button class="minus" type="submit" name="<?php $chinese_cabbage_minus = minus("chinese_yabbage")?>">－</button>
                                    </div>
                                </form>
                                <div class="food_name">白菜</div>
                                <div class="food_number"><?php echo $chinese_cabbage + $chinese_cabbage_plus + $chinese_cabbage_minus?>個</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 二段目 ------------------------------------------- -->
                    <div id="count" class="counter counter_cotens_while_top">
                        <div class="count_box count_boxs">
                            <div>
                                <form action="food.php" method="post">
                                    <img src="image-file/cabbage.png" alt="キャベツ">
                                    <div class="count_button_box">
                                        <button class="plus" type="submit" name="<?php $cabbage_plus = plus("cabbage")?>">＋</button>
                                        <button class="minus" type="submit" name="<?php $cabbage_minus = minus("cabbage")?>">－</button>
                                    </div>
                                </form>
                                <div class="food_name">キャベツ</div>
                                <div class="food_number"><?php echo $cabbage + $cabbage_plus + $cabbage_minus?>個</div>
                            </div>
                        </div>
                        <div class="count_box count_boxs">
                            <div>
                                <form action="food.php" method="post">
                                    <img src="image-file/onion.jpeg" alt="玉ねぎ">
                                    <div class="count_button_box">
                                        <button class="plus" type="submit" name="<?php $onion_plus = plus("onion")?>">＋</button>
                                        <button class="minus" type="submit" name="<?php $onion_minus = minus("onion")?>">－</button>
                                    </div>
                                </form>
                                <div class="food_name">玉ねぎ</div>
                                <div class="food_number"><?php echo $onion + $onion_plus + $onion_minus?>個</div>
                            </div>
                        </div>
                        <div class="count_box">
                            
                            <div>
                                <form action="food.php" method="post">
                                    <img src="image-file/broccoli.jpeg" alt="ブロッコリー">
                                    <div class="count_button_box">
                                        <button class="plus" type="submit" name="">＋</button>
                                        <button class="minus" type="submit" name="">－</button>
                                    </div>
                                </form>
                                <div class="food_name">ブロッコリ</div>
                                <div class="food_number">0個</div>
                            </div>
                        </div>
                    </div>
                    <!-- 三段目----------------------------------------------- -->
                    <div id="count" class="counter counter_cotens_while_top">
                        <div class="count_box count_boxs">
                            
                            <div>
                                <form action="food.php" method="post">
                                    <img src="image-file/potato.jpeg" alt="じゃがいも">
                                    <div class="count_button_box">
                                        <button class="plus" type="submit" name="<?php $potato_plus = plus("potato")?>">＋</button>
                                        <button class="minus" type="submit" name="<?php $potato_minus = minus("potato")?>">－</button>
                                    </div>
                                </form>
                                <div class="food_name">じゃがいも</div>
                                <div class="food_number"><?php echo $potato + $potato_plus + $potato_minus?>個</div>
                            </div>
                        </div>
                        <div class="count_box count_boxs">
                            
                            <div>
                                <form action="food.php" method="post">
                                    <img src="image-file/carrot.jpeg" alt="にんじん">
                                    <div class="count_button_box">
                                        <button class="plus" type="submit" name="<?php $carrot_plus = plus("carrot")?>">＋</button>
                                        <button class="minus" type="submit" name="<?php $carrot_minus = minus("carrot")?>">－</button>
                                    </div>
                                </form>
                                <div class="food_name">にんじん</div>
                                <div class="food_number"><?php echo $carrot + $carrot_plus + $carrot_minus?>個</div>
                            </div>
                        </div>
                        <div class="count_box">
                            
                            <div>
                                <form action="food.php" method="post">
                                    <img src="image-file/piman.png" alt="ピーマン">
                                    <div class="count_button_box">
                                        <button class="plus" type="submit" name="<?php $piman_plus = plus("piman")?>">＋</button>
                                        <button class="minus" type="submit" name="<?php $piman_minus = minus("piman")?>">－</button>
                                    </div>
                                </form>
                                <div class="food_name">ピーマン</div>
                                <div class="food_number"><?php echo $piman + $piman_plus + $piman_minus?>個</div>
                            </div>
                        </div>
                    </div>
                    <!-- 四段目------------------------------------------ -->
                    <div id="count" class="counter counter_cotens_while_top">
                        <div class="count_box count_boxs">
                            
                            <div>
                                <form action="food.php" method="post">
                                    <img src="image-file/pumpkin.jpeg" alt="カボチャ">
                                    <div class="count_button_box">
                                        <button class="plus" type="submit" name="">＋</button>
                                        <button class="minus" type="submit" name="">－</button>
                                    </div>
                                </form>
                                <div class="food_name">かぼちゃ</div>
                                <div class="food_number">0個</div>
                            </div>
                        </div>
                        <div class="count_box count_boxs">
                            
                            <div>
                                <form action="food.php" method="post">
                                    <img src="image-file/japanese-white-radish.jpeg" alt="大根">
                                    <div class="count_button_box">
                                        <button class="plus" type="submit" name="">＋</button>
                                        <button class="minus" type="submit" name="">－</button>
                                    </div>
                                </form>
                                <div class="food_name">大根</div>
                                <div class="food_number">0個</div>
                            </div>
                        </div>
                        <div class="count_box">
                            
                            <div>
                                <form action="food.php" method="post">
                                    <img src="image-file/eggplant.jpeg" alt="ナス">
                                    <div class="count_button_box">
                                        <button class="plus" type="submit" name="">＋</button>
                                        <button class="minus" type="submit" name="">－</button>
                                    </div>
                                </form>
                                <div class="food_name">なす</div>
                                <div class="food_number">0個</div>
                            </div>
                        </div>
                    </div>                     
                </li>
                
                <li>
                    <div id="count" class="counter">
                        <!-- たまご -------------------------------------- -->
                        <div class="count_box count_boxs">
                            <form action="food.php" method="post">
                                <img src="image-file/egg.png" alt="卵">
                                <div class="count_button_box">
                                    <button class="plus" type="submit" name="<?php $egg_plus = plus("egg")?>">＋</button>
                                    <button class="minus" type="submit" name="<?php $egg_minus = minus("egg")?>">－</button>
                                </div>
                            </form>
                            <div class="food_name">たまご</div>
                            <div class="food_number"><?php echo $egg + $egg_plus + $egg_minus?>個</div>
                        </div>

                        <!-- 鶏もも肉 -------------------------------------- -->
                        <div class="count_box count_boxs">
                            <div>
                                <form action="food.php" method="post">
                                    <img src="image-file/niku_tori_momo.png" alt="鶏もも肉">
                                    <div class="count_button_box">
                                        <button class="plus" type="submit" name="<?php $niku_tori_momo_plus = plus("niku_tori_momo")?>">＋</button>
                                        <button class="minus" type="submit" name="<?php $niku_tori_momo_minus = minus("niku_tori_momo")?>">－</button>
                                    </div>
                                </form>
                                <div class="food_name">鶏もも肉</div>
                                <div class="food_number"><?php echo $niku_tori_momo + $niku_tori_momo_plus + $niku_tori_momo_minus?>個</div>
                            </div>
                        </div>

                        <!-- ささみ -------------------------------------- -->
                        <div class="count_box">
                            <div>
                                <form action="food.php" method="post">
                                    <img src="image-file/niku_tori_sasami.png" alt="ささみ">
                                    <div class="count_button_box">
                                        <button class="plus" type="submit" name="<?php $_plus = plus("")?>">＋</button>
                                        <button class="minus" type="submit" name="<?php $_minus = minus("")?>">－</button>
                                    </div>
                                </form>
                                <div class="food_name">ささみ</div>
                                <div class="food_number">0個</div>
                            </div>
                        </div>
                    </div>

                    <div id="count" class="counter counter_cotens_while_top">
                        <div class="count_box count_boxs">
                            <div>
                                <form action="food.php" method="post">
                                    <img src="image-file/niku_buta.png" alt="豚ばら">
                                    <div class="count_button_box">
                                        <button class="plus" type="submit" name="">＋</button>
                                        <button class="minus" type="submit" name="">－</button>
                                    </div>
                                </form>
                                <div class="food_name">豚バラ</div>
                                <div class="food_number">0個</div>
                            </div>
                        </div>
                        <div class="count_box count_boxs">
                            <div>
                                <form action="food.php" method="post">
                                    <img src="image-file/niku_gyu.png" alt="牛ばら">
                                    <div class="count_button_box">
                                        <button class="plus" type="submit" name="">＋</button>
                                        <button class="minus" type="submit" name="">－</button>
                                    </div>
                                </form>
                                <div class="food_name">牛バラ</div>
                                <div class="food_number">0個</div>
                            </div>
                        </div>
                        <div class="count_box">
                            
                            <div>
                                <form action="food.php" method="post">
                                    <img src="image-file/food_niku_pack_komagire.png" alt="細切れ肉">
                                    <div class="count_button_box">
                                        <button class="plus" type="submit" name="">＋</button>
                                        <button class="minus" type="submit" name="">－</button>
                                    </div>
                                </form>
                                <div class="food_name">細切れ肉</div>
                                <div class="food_number">0個</div>
                            </div>
                        </div>
                    </div>


                    <div id="count" class="counter counter_cotens_while_top">
                        <div class="count_box count_boxs">
                            <div>
                                <form action="food.php" method="post">
                                    <img src="image-file/food_hikiniku_beef.png" alt="牛ひき肉">
                                    <div class="count_button_box">
                                        <button class="plus" type="submit" name="">＋</button>
                                        <button class="minus" type="submit" name="">－</button>
                                    </div>
                                </form>
                                <div class="food_name">牛ひき肉</div>
                                <div class="food_number">0個</div>
                            </div>
                        </div>
                        <div class="count_box count_boxs">
                            <div>
                                <form action="food.php" method="post">
                                    <img src="image-file/food_hikiniku_pork.png" alt="豚ひき肉">
                                    <div class="count_button_box">
                                        <button class="plus" type="submit" name="">＋</button>
                                        <button class="minus" type="submit" name="">－</button>
                                    </div>
                                </form>
                                <div class="food_name">豚ひき肉</div>
                                <div class="food_number">0個</div>
                            </div>
                        </div>
                        <div class="count_box">
                            
                            <div>
                                <form action="food.php" method="post">
                                    <img src="image-file/food_hikiniku_checken.png" alt="鶏ひき肉">
                                    <div class="count_button_box">
                                        <button class="plus" type="submit" name="">＋</button>
                                        <button class="minus" type="submit" name="">－</button>
                                    </div>
                                </form>
                                <div class="food_name">鶏ひき肉</div>
                                <div class="food_number">0個</div>
                            </div>
                        </div>
                    </div>


                    <div id="count" class="counter counter_cotens_while_top">
                        <div class="count_box count_boxs">
                            <div>
                                <form action="food.php" method="post">
                                    <img src="image-file/niku_hamu.png" alt="ハム">
                                    <div class="count_button_box">
                                        <button class="plus" type="submit" name="">＋</button>
                                        <button class="minus" type="submit" name="">－</button>
                                    </div>
                                </form>
                                <div class="food_name">ハム</div>
                                <div class="food_number">0個</div>
                            </div>
                        </div>
                        <div class="count_box count_boxs">
                            <div>
                                <form action="food.php" method="post">
                                    <img src="image-file/kunsei_souseiji.png" alt="ソーセージ">
                                    <div class="count_button_box">
                                        <button class="plus" type="submit" name="">＋</button>
                                        <button class="minus" type="submit" name="">－</button>
                                    </div>
                                </form>
                                <div class="food_name">ソーセージ</div>
                                <div class="food_number">0個</div>
                            </div>
                        </div>
                        <div class="count_box">
                            
                            <div>
                                <form action="food.php" method="post">
                                    <img src="image-file/kunsei_bacon.png" alt="ベーコン">
                                    <div class="count_button_box">
                                        <button class="plus" type="submit" name="">＋</button>
                                        <button class="minus" type="submit" name="">－</button>
                                    </div>
                                </form>
                                <div class="food_name">ベーコン</div>
                                <div class="food_number">0個</div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>コンテンツ3</li>
                <li>コンテンツ4</li>
            
            </ul>
        </div>

        <!-- フッター -->
        <footer>

        </footer>
  
    </body>
</html>