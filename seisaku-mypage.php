<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>LOmenuホームページ</title>
        <meta name="viewport" content="width=device-width" />
        <meta name="description" content="">
        <link rel="stylesheet" type="text/css" href="stylesheet/seisaku.css">
    </head>
    <body>
        <!-- ヘッダー -->
        <div class="header">
            <img class="header-logo" src="image-file/LOmenu-logo-header.png" alt="logo">
        </div>
        <!-- トップ -->
        <div class="top-wrapper">
            <?php
                $random = mt_rand(1, 4);
                
                if ($random == 1) {
                    $food_image = "recipe-image-file/img.curry.jpg";
                    $food_name = "チキンカレー";
                    $food_text = "インド人が作った<br>美味しいカレー！";
                }
                elseif ($random == 2) {
                    $food_image = "recipe-image-file/amirali-mirhashemian-sc5sTPMrVfk-unsplash.jpg";
                    $food_name = "ハンバーガー";
                    $food_text = "とっても肉厚で<br>delicious!!です!!";
                }
                elseif ($random == 3) {
                    $food_image = "recipe-image-file/chad-montano-M0lUxgLnlfk-unsplash.jpg";
                    $food_name = "肉厚ステーキ";
                    $food_text = "日々の労働に<br>少しの贅沢を…";
                }
                elseif ($random == 4) {
                    $food_image = "recipe-image-file/tania-melnyczuk-xeTv9N2FjXA-unsplash.jpg";
                    $food_name = "おいしいサラダ";
                    $food_text = "体に気おつけて<br>しっかり野菜を摂取しよう!!";
                }
                
                ?>
            <div class="Recommended-menu">
                <h1 class="headline">今日のおすすめ</h1>
                <img src=<?php echo $food_image?> alt="">
                <div class="cooking_name"><?php echo $food_name?></div>
                <div class="cooking_sab_heading"><?php echo $food_text?></div>
            </div>
        </div>
        <!-- レシピ提案機能 -->
        <div class="recipe-function">
            <div class="btn btn-recipe">
                <a href="recipe.php" ><img src="image-file/menu-icon.jpeg" alt="">レシピ提案</a>
            </div>
        </div>
        <!-- 食材管理機能 -->
        <div class="food-function">
            <div class="btn btn-food">
                <a href="food.php" ><img src="image-file/refrigerator.jpeg" alt=""> 食材管理 </a>
            </div>
        </div>
        <!-- レシピ追加機能 -->
        <div class="recipe-addtion-function">
            <div class="btn btn-recipe-addtion">
                <a href="recipe-addtion.php" ><img src="image-file/recipe-memo.jpeg" alt="">レシピ追加</a>
            </div>
        </div>
        <!-- フッター -->
        <footer>

        </footer>
    </body>
</html>
