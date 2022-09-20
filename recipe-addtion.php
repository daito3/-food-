<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylesheet/recipe-addtion.css">
    <title>レシピ追加入力フォーム</title>
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

    <div class="header_recipe_addtion">レシピ追加入力フォーム</div>

    <div class="recipe_addtion_form">
        <form action="" method="post">
            <div class="recipe_name">
                <label class="big-syokuzai-lebel">レシピ名</label><br>
                <input id="name" type="text" name="recipe_name" ><br>
            </div>
            <div class="ingredients">
                <label class="big-syokuzai-lebel">使用する食材・調味料</label><br>

                <label class="syokuzai-lebel">・食材</label><br>
                <input id="name" type="text" name="ingredients" ><input id="name" type="number" name="ingredients_number"><br>

                <label class="syokuzai-lebel">・調味料</label><br>
                <input id="name" type="text" name="ingredients" ><br>
            </div>
            <div class="now_to_make">
                <label class="big-syokuzai-lebel">作り方</label><br>
                <textarea id="name" cols="40" rows="10" name="how_to_make"></textarea><br>
            </div>
        </form>
    </div>
</body>
</html>