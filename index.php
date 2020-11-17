<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>－CALENDAR－</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="calendar.css">
</head>


<body>

<!-- <div class="bg"></div> -->

<!-- 特殊節日二維陣列 -->

<!-- 
Q1:5月一號為幾號?
Q2:上個星期日為幾號?
Q3:兩周後是幾號?
Q4:當年五月一號是星期幾?





$mday=

$holiday=[
    "1"=>["1"=>"元旦"],
    "2"=>["10","11","12","13","14","15","16"=>"春節","28"=>"228紀念日"],
    "3"=>["12"=>"植樹節"],
    "4"=>["4"=>"兒童節,清明節"],
    "5"=>["1"=>"勞動節","$mday"=>"母親節"],
    "6"=>["14"=>"端午節"],
    "8"=>["8"=>"父親節"],
    "9"=>["21"=>"中秋節"],
    "10"=>["10"=>"國慶日","31"=>"萬聖節"],
    "12"=>["25"=>"聖誕節"]
]
-->






<!-- 寫法2.三元運算式 -->

<?php
$thisMonth=isset($_GET["month"])? $_GET["month"]:date('m');
$thisYear=isset($_GET['year'])? $_GET['year']:date('Y');

if($thisMonth>=12){$nextMonth=1;$nextYear=$thisYear+1;}
else{$nextMonth=$thisMonth+1;$nextYear=$thisYear;}
if($thisMonth<=1){$preMonth=12;$preYear=$thisYear-1;}
else{$preMonth=$thisMonth-1;$preYear=$thisYear;}
?>




<!-- 上下個月 -->

<div class="aside">
    <ul>
        <li class="asideli li1"><a href="?month=<?=$preMonth?>&year=<?=$preYear?>">lastmonth</a></li>
        <li class="asideli li2"><a href="?month=<?=date('m')?>&year=<?=date('Y')?>">thismonth</a></li>
        <li class="asideli li3"><a href="?month=<?=$nextMonth?>&year=<?=$nextYear?>">nextmonth</a></li>
    </ul>
</div>



<div class="container">
<section id="bigdate">
    <div>
        <?=$thisYear;?> / <?=$thisMonth;?>
    </div>
    <div class="bigdate">
        <p class="mx-auto" style="font-size:2rem"><?=date('Y-m-d')?> <?=date('l')?></p>
    </div>
</section>

<?php
$startDay=date('w',strtotime($thisYear."-".$thisMonth."-".'01'));
$monthDays=date('t',$startDay);
?>



<table class="col-7 mx-auto">
<tr class="week_tr">
<!-- 禮拜日到禮拜六 -->
<?php
// echo date('2020-11-0'.(1+$j));
for($i=0;$i<7;$i++){
    echo '<td class="week">';
    echo date('D',strtotime('2020-11-0'.(1+$i)));
    echo '</td>';
}
echo '<br>';
?>
</tr>



<!-- 第一天到最後一天 -->
<?php


for($i=0; $i<6;$i++){
    echo "<tr>";
    for($j=0;$j<7;$j++){

            // change today's color
            $today=($i*7)+($j+1)-$startDay;
            //如果這邊只判斷date('d') 那會變成每個月的那一天都是今天
            //因此合理的做法應該是要年月日都一樣才算是今天
            //原本的寫法=>if(date('d') == $today){echo '<td id="today">';}
            if(date('Y-m-d') == $thisYear."-".$thisMonth."-".$today){echo '<td id="today">';}
            
            else{echo '<td class="nottoday">';}

                if($i==0 && $j<$startDay){
                    // echo "&nbsp;";
                }else if((($i*7) + ($j+1) - $startDay)>$monthDays){
                    // echo "&nbsp;";
                }else{
                    echo (($i*7) + ($j+1) - $startDay);}
                
            echo "</td>";
        }
    echo "</tr>";
}


?>
</table></div>




<div class="qq_block">
    <img src="qq.gif" width="400" height="400">
</div>








<!-- 寫法1.有輸入就載入輸入的 沒有就date("Y")&("m") -->

<!-- 
if (!empty($_GET['month']) && !empty($_GET['year'])){
$thisMonth=$_GET['month'];
$thisYear=$_GET['year'];
}else{
$thisMonth=date("m");
$thisYear=date("Y");
}
-->

<!-- 
    name=month
    name=year
    <form action="calendar.php" method="get">
        <input type="text" name="month">
        <input type="text" name="year">
        <input type="submit" value="送出">
    </form>
-->



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>