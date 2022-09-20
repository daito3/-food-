<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>制作物</title>
    <meta name="viewport" content="width=device-width" />
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="stylesheet/recipe_body.css">
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
    <!-- レシピ　本体 -->

    <?php 
    
        session_start();
        require_once('db_connect.php');

        $sql = $db->prepare("SELECT * FROM recipes WHERE id='".$_GET['a']."'");
        $sql->execute();

        foreach($sql as $row){

            $food_image       = $row["image_name"];
            $recipe_image     = "recipe-image-file/".$food_image.".jpg";
            $food_name        = $row["recipe_name"];
            //$food_description = $row[""];
            $ingredient       = $row["ingredient_food"];
            $food_recipe      = $row["recipe"];

        }

    ?>

    <div class="recipe_image">
        <img src=<?php echo $recipe_image?>>
    </div>
    <div class="recipe_box">
        <!-- レシピの名前 -->
        <div class="recipe_name"><?php echo $food_name ?></div>
        <!---->
        <div class="recipe_description"><?php //echo $food_description ?></div>
        <hr>
        <!-- レシピの材料 -->
        <h3>材料</h3>
        <div class="ingredient">
            <?php echo $ingredient ?>
        </div>
        <hr>
        <h3>作り方</h3>
        <div class="ingredient">
            <?php echo $food_recipe ?>
        </div>
    </div>
</body>
</html>