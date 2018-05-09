<?php
include 'conn.php';
include_once 'function.php';
$classid = $_POST["classid"];
echo $classid;
echo "<br>";
$sql = "select * from student where classid='{$classid}' and save=1";
//echo $sql;
$arr1 = sqlSelect($sql);
//echo "<pre>";
//print_r($arr1);
//echo "</pre>";
for ($i = 0; $i < count($arr1); $i++) {
    $rannum = rand(0, 200);
//    echo "<br>";
//    echo $rannum;
//    echo "<br>";
    $arr1[$i]["hdsort"] = $rannum + $arr1[$i]["hdsort"]; //随机因子+提问加成
//    echo $arr1[$i]["hdsort"];
//    echo "<br>";
}
$thespecial = selectstu($arr1);
$thespecial_no = $thespecial[0]["stdnum"]; //学号
$sql1 = "select hdsort from student where stdnum='{$thespecial_no}' and classid='{$classid}'";
$sql2 = "select avg(hdsort) as asort from student where classid='{$classid}'";
$avgsort = sqlSelect1($sql2)["asort"];
//echo $avgsort;
$relsort = sqlSelect1($sql1)["hdsort"];
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="change.php" method="post">
            <input type="hidden" value="<?php echo $thespecial_no; ?>" name="sno">
            
            
            <?php
            if ($relsort > $avgsort) {
              $high=1;//1代表高于平均值
                ?>
                <p style="font-size: 70px;color: red;"><?php echo $thespecial[0]["name"]; //姓名   ?></p>
                <?php } else {
                  $high=0;
                ?>
                <p style="font-size: 70px;"><?php echo $thespecial[0]["name"]; //姓名   ?></p>
                <?php
            }
            ?>
            <input type="hidden" value="<?php echo $high; ?>" name="ishigh">
            <input type="radio" value="1" checked="checked" name="change"> more
            <input type="radio" value="0" name="change"> less
            <input type="radio" value="0" name="change"> 0
            <br>
            <input type="submit" value="继续" style="width: 300px; height: 100px; font-size: 70px;">
        </form>
    </body>
</html>
