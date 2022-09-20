<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>制作物</title>
        <meta name="viewport" content="width=device-width" />
        <meta name="description" content="">
        <link rel="stylesheet" type="text/css" href="stylesheet/recipe.css">
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
        <!-- 献立レシピ提案 -->
        <div class="Menu_Recipe_Suggestions">
            <?php
                session_start();
                require_once("db_connect.php");
                $food_search = array();

                try {

                    $stmt = $db->prepare("SELECT * FROM users WHERE users_name='".$_SESSION['login_user']."'");
                    $stmt->execute();

                    foreach ($stmt as $row ) {

                        if($row['tomato'] > 0){
                            array_push($food_search, "tomato");
                        }
                        if($row['cucumber'] > 0) {
                            array_push($food_search, "cucumber");
                        }
                        if($row['chinese_yabbage'] > 0) {
                            array_push($food_search, "chinese_yabbage");
                        }
                        if($row['cabbage'] > 0) {
                            array_push($food_search, "cabbage");
                        }
                        if($row['onion'] > 0) {
                            array_push($food_search, "onion");
                        }
                        if($row['potato'] > 0) {
                            array_push($food_search, "potato");
                        }
                        if($row['carrot'] > 0) {
                            array_push($food_search, "carrot");
                        }
                        if($row['piman'] > 0) {
                            array_push($food_search, "piman");
                        }
                        if($row['egg'] > 0) {
                            array_push($food_search, "egg");
                        }
                        if($row['niku_tori_momo'] > 0) {
                            array_push($food_search, "niku_tori_momo");
                        }

                    }
                    
                    $food_search_count = count($food_search);

                } catch (PDOException $e) {
                    echo 'error直せ';
                }

                try {

                    $recipe_push_1 = array();

                    for($i = 0; $i < $food_search_count; $i++){
                        
                        $recipe = $db->prepare("SELECT * FROM recipes WHERE ingredient LIKE '%".$food_search[$i]."%'");
                        $recipe->execute();
    
                        foreach ($recipe as $row1) {
                            
                            array_push($recipe_push_1, $row1["id"]);
                            
                        }
                    }

                    $recipe_list_1 = array_unique($recipe_push_1);


                } catch (PDOException $e) {
                    echo "errorだよ";
                }

            ?>
            <div class="recipe_box_top">

                <?php
                    require_once("db_connect.php");

                    foreach($recipe_list_1 as $recipe_id){

                        $recipe1 = $db->prepare("SELECT * FROM recipes WHERE id='".$recipe_id."'");
                        $recipe1->execute();

                        foreach($recipe1 as $recipe_body){
                            $food = "recipe-image-file/".$recipe_body["image_name"].".jpg";
                            echo "<a href='recipe_body.php?a=".$recipe_body["id"]."' class=\"recipe_box\" >";
                            echo "<img src=".$food." class=\"recipe_image\">";
                            echo "<div class=\"recipe_name\">".$recipe_body["recipe_name"]."</div>";
                            echo "</a>";

                        }

                    }
       
                ?>
                
            </div>

        </div>
       
        <!-- フッター -->
        <footer>

        </footer>
    </body>

</html>