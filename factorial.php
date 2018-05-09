<?php
function factorial($num) {
    if(!$num){
        return 1;
    }else{
        return factorial($num-1)*$num;
    }
}
//echo factorial(3);
$sum=0;
for($i=1;$i<=100;$i++){
    if($i%10==3){
        continue;
    }
   $sum=$sum+$i;
}
echo $sum;
?>
