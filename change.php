<?php
include_once 'conn.php';
include_once 'function.php';
$sno=$_POST["sno"];
//$classid=$_POST["classid"];
$ishigh=$_POST["ishigh"];//学生高于平均与否
$flag=$_POST["change"];//判断学生回答正确
if($ishigh){
  if(!$flag){
    $addsort=-5;
  }else{
    $addsort=1;
  }
}else{
  if(!$flag){
    $addsort=-1;
  }else{
    $addsort=5;
  }
}
$sql1="select hdsort from student where stdnum='{$sno}'";
$relsort=  sqlSelect1($sql1)["hdsort"];
$csort=$relsort+$addsort;
//$sql2="SELECT AVG(hdsort) as avgsort FROM student where classid={$classid}";
$sql=  changeSort("student","hdsort={$csort}", "stdnum='{$sno}'");
?>
