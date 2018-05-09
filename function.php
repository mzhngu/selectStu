<?php

function sqlSelect($sql) {//数据库数据=>数组
    $result = mysql_query($sql);
    //echo mysql_num_rows($result);
    echo mysql_error();
    $rows = array();
    while ($row = mysql_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function selectstu($arrUsers) {//二维数组排序 并假如随机因数
    $sort = array(
        'direction' => 'SORT_DESC', //排序顺序标志 SORT_DESC 降序；SORT_ASC 升序
        'field' => 'hdsort', //排序字段
    );
    $arrSort = array();
    foreach ($arrUsers AS $uniqid => $row) {
        foreach ($row AS $key => $value) {
            $arrSort[$key][$uniqid] = $value;
        }
    }
    if ($sort['direction']) {
        array_multisort($arrSort[$sort['field']], constant($sort['direction']), $arrUsers);
    }
    echo "<pre>";
//var_dump($arrUsers);
    echo "</pre>";
    return $arrUsers; //返回唯一学生，随机因子+提问加成最高
}

function changeSort($table_name, $set, $condition) {//数据库更新
    $sql = "update {$table_name} set {$set}  where {$condition}";
    $result = mysql_query($sql);
    if ($result) {
        echo "<script>";
        echo "alert('更改成功');";
        echo "window.location.href='index.php';";
        echo "</script>";
    }
}

function sqlSelect1($sql) {
    $result = mysql_query($sql);
    echo mysql_error();
    $num = mysql_num_rows($result);
    if ($num == 1) {
        $row = mysql_fetch_assoc($result);
        return $row;
    } else {
        $row = array(); //空数组是布尔假
        return $row;
    }
}
?>
