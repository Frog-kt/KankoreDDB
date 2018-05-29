<?php

//SQLログイン用情報
$db_user = "user";
$db_pass = "pass";
$db_host = "localhost";
$db_name = "kankore";
$db_type = "mysql";

//データソースネーム
$dbh = new PDO("$db_type:hots=$db_host;dbname=$db_name;charset=utf8",$db_user,$db_pass);

$shipName = $_POST["shipNameText"];

//var_dump($dbh);　errorが起きたときに使える


//SQL
/*====================================================================================================================================================*/


//艦名と艦種を取り出して $name_type_result に格納
$name_type = $dbh->prepare("SELECT ships.id, ships.name, types.type_name FROM ships INNER JOIN types ON ships.type_id = types.id WHERE ships.name = '$shipName'");
$name_type->execute();
$name_type_result = $name_type->fetchALL(PDO::FETCH_ASSOC);
//取得したships.idを変数に入れる
$ship_id = $name_type_result[0]["id"];

//取り出した艦名から出現エリアを取得し $ship_area_result に格納
$ship_area = $dbh->prepare("SELECT drops.ship_id, areas.name FROM drops INNER JOIN areas ON drops.area_id = areas.id WHERE drops.ship_id = '$ship_id'");
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
</head>
<body>
    <head>
        <h1>艦これDDB</h1>
    </head>
    <main>
      <div id="output">
        <h2>検索結果</h2>
        <p>艦名　:<?php print $name_type_result[0]["name"]; ?></p>
        <p>艦種　:<?php print $name_type_result[0]["type_name"]; ?></p>
        <p>＝＝＝ドロップエリア＝＝＝</p>
        <?php print @$ship_area_result[0][name]; ?><br />
        <?php print @$ship_area_result[1][name]; ?><br />
        <?php print @$ship_area_result[2][name]; ?><br />
        <?php print @$ship_area_result[3][name]; ?><br />
        <?php print @$ship_area_result[4][name]; ?><br />
        <?php print @$ship_area_result[5][name]; ?><br />
        <?php print @$ship_area_result[6][name]; ?><br />
        <?php print @$ship_area_result[7][name]; ?><br />
        <?php print @$ship_area_result[8][name]; ?><br />
        <?php print @$ship_area_result[9][name]; ?><br />
        <?php print @$ship_area_result[10][name]; ?><br />
        <?php print @$ship_area_result[11][name]; ?><br />
        <?php print @$ship_area_result[12][name]; ?><br />
        <?php print @$ship_area_result[13][name]; ?><br />
        <?php print @$ship_area_result[14][name]; ?>
        <p></p>
      </div>
    </main>
</body>
</html>
