<?php
//1.  DB接続します

try {
  //ID:'root', Password: xamppは 空白 ''
  $pdo = new PDO('mysql:dbname=gs_db_kadai;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}


//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_an_table1");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<p>";
    $view .= $result['date'] . $result['name']. $result['place'] . $result['thoughts'] . $result['memo'];
    $view .= "</p>";
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>結果表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">あなたはこれだけ食べました</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?= $view ?></div>
</div>

<!-- Main[End] -->

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Bing Maps</title>
    <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?key=AqOfSC7rQNAzeDmap_9Z1muQvvFUIqHXE_P0rLx1dR35_zvXe1w16kfRGlHU12KW'></script>
    <script type='text/javascript'>
        let map;

        function GetMap() {
            map = new Microsoft.Maps.Map('#myMap', {
                credentials: 'AqOfSC7rQNAzeDmap_9Z1muQvvFUIqHXE_P0rLx1dR35_zvXe1w16kfRGlHU12KWY' // ここに API キーを入力
            });
            Microsoft.Maps.loadModule('Microsoft.Maps.Search', function () {
                const searchManager = new Microsoft.Maps.Search.SearchManager(map);
                const requestOptions = {
                    where: '東京タワー, Tokyo, Japan',
                    callback: function (results) {
                        if (results && results.results && results.results.length > 0) {
                            const pin = new Microsoft.Maps.Pushpin(results.results[0].location);
                            map.entities.push(pin);
                        }
                    }
                };
                searchManager.geocode(requestOptions);
            });
        }
    </script>
</head>
<body onload='GetMap()'>
    <div id='myMap' style='width: 800px; height: 600px;'></div>
</body>
</html>
