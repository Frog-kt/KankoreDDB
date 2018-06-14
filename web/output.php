<?php

//SQLログイン用情報
$db_user = "root";
$db_pass = "";
$db_host = "localhost";
$db_name = "kankore";
$db_type = "mysql";

//データソースネーム
$dbh = new PDO("$db_type:hots=$db_host;dbname=$db_name;charset=utf8",$db_user,$db_pass);

$shipName = $_POST["shipNameText"];

//var_dump($dbh);　errorが起きたときに使える?


//SQL
/*====================================================================================================================================================*/


//艦名と艦種を取り出して $name_type_result に格納
// プリペアドステートメントの作成
$name_type = $dbh->prepare('SELECT ships.id, ships.name, types.type_name FROM ships INNER JOIN types ON ships.type_id = types.id WHERE ships.name = :shipName;');

// 値のバインド
$name_type->bindValue(':shipName', $shipName);

// SQLの実行
$name_type->execute();

$name_type_result = $name_type->fetchALL(PDO::FETCH_ASSOC);

//取得したships.idを変数に入れる
$ship_id = $name_type_result[0]["id"];




//取り出した艦名から出現エリアを取得し $ship_area_result に格納
// プリペアドステートメントの作成
$ship_area = $dbh->prepare('SELECT drops.ship_id, areas.name FROM drops INNER JOIN areas ON drops.area_id = areas.id WHERE drops.ship_id = :ship_id');

// 値のバインド
$ship_area->bindValue(':ship_id', $ship_id);

// SQLの実行
$ship_area->execute();
$ship_area_result = $ship_area->fetchALL(PDO::FETCH_ASSOC);


/*====================================================================================================================================================*/



//出力確認用
//print_r($name_type_result);
//print_r($ship_area_result);

$pdo = null;

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>艦これDDB</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <head>
        <h1>艦これDDB</h1>
    </head>
    <main>
      <div id="output">
        <h2>検索結果</h2>
        <p>艦名 : <?php print htmlspecialchars(@$name_type_result[0][name], ENT_QUOTES, 'UTF-8'); ?></p>
        <p>艦名 : <?php print htmlspecialchars(@$name_type_result[0][type_name], ENT_QUOTES, 'UTF-8'); ?></p>
        <p>＝＝＝ドロップエリア＝＝＝</p>
        <?php print htmlspecialchars(@$ship_area_result[1][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <?php print htmlspecialchars(@$ship_area_result[2][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <?php print htmlspecialchars(@$ship_area_result[3][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <?php print htmlspecialchars(@$ship_area_result[4][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <?php print htmlspecialchars(@$ship_area_result[5][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <?php print htmlspecialchars(@$ship_area_result[6][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <?php print htmlspecialchars(@$ship_area_result[7][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <?php print htmlspecialchars(@$ship_area_result[8][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <?php print htmlspecialchars(@$ship_area_result[9][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <?php print htmlspecialchars(@$ship_area_result[10][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <?php print htmlspecialchars(@$ship_area_result[11][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <?php print htmlspecialchars(@$ship_area_result[12][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <?php print htmlspecialchars(@$ship_area_result[13][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <?php print htmlspecialchars(@$ship_area_result[14][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <?php print htmlspecialchars(@$ship_area_result[15][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <?php print htmlspecialchars(@$ship_area_result[16][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <?php print htmlspecialchars(@$ship_area_result[17][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <?php print htmlspecialchars(@$ship_area_result[18][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <?php print htmlspecialchars(@$ship_area_result[19][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <?php print htmlspecialchars(@$ship_area_result[20][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <?php print htmlspecialchars(@$ship_area_result[21][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <?php print htmlspecialchars(@$ship_area_result[22][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <?php print htmlspecialchars(@$ship_area_result[23][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <?php print htmlspecialchars(@$ship_area_result[24][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <?php print htmlspecialchars(@$ship_area_result[25][name], ENT_QUOTES, 'UTF-8'); ?><br />
        <p></p>
      </div>
    </main>
    <footer>
        <ul>
            <li>
                <a href="index.html">もどる</a>
            </li>
        </ul>
    </footer>
</body>
</html>
