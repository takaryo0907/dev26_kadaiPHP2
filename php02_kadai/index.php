<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>食べタカログ</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- Main[Start] -->
    <form method="post" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>食べ食べ記録</legend>
                <label>店名：<input type="text" name="name"></label><br>
                <label>住所：<input type="text" name="place"></label><br>
                <label>金額：<input type="text" name="thoughts"></label><br>
                <label>メモ欄</label><br>
                <label><textArea name="memo" rows="4" cols="40"></textArea></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->

    <!-- Head[Start] -->
    <header>
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧
                </a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->
</body>

</html>
