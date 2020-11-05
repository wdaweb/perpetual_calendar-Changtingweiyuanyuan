<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>月曆製作</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<style>

table{
    width:750px;
    margin:auto;
    border:1px solid #ccc;
}
table  td {
    border:1px solid #ccc;
    text-align:center;
    padding:10px 0;
}
table td:hover{
    background:yellow;
}

.today{
    color:red;
}
</style>
</head>


<body>
<h3>月曆製作</h3>
<br><br>


<!-- 特殊節日二維陣列 -->
<?php
// $specialDay=[
//     "1"=>["1"=>"元旦"],
//     "2"=>["10","11","12","13","14","15","16"=>"春節","28"=>"228紀念日"],
//     "3"=>[],
//     "4"=>["4"=>"兒童節,清明節"],
//     "5"=>["1"=>"勞動節"],
//     "6"=>["14"=>"端午節"],
//     "7"=>[],
//     "8"=>[],
//     "9"=>["21"=>"中秋節"],
//     "10"=>["10"=>"國慶日"],
//     "11"=>[],
//     "12"=>[],
// ]
// echo $specialDay[2][12];
?>


<br><br>




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



<!-- 寫法2.三元運算式 -->

<?php
$thisMonth=isset($_GET["month"])? $_GET["month"]:date('m');
$thisYear=isset($_GET['year'])? $_GET['year']:date('Y');

if($thisMonth>=12){$nextMonth=1;$nextYear=$thisYear+1;}
else{$nextMonth=$thisMonth+1;$nextYear=$thisYear;}
if($thisMonth<=1){$preMonth=12;$preYear=$thisYear-1;}
else{$preMonth=$thisMonth-1;$preYear=$thisYear;}
?>

<a href="?month=<?=$nextMonth?>&year=<?=$thisYear?>">nextmonth</a>
<a href="?month=<?=$preMonth?>&year=<?=$thisYear?>">lastmonth</a>


<?php
$startDay=date('w',strtotime($thisYear."-".$thisMonth."-".'01'));
echo "第一天星期=>".$startDay;
echo "<br>";

$monthDays=date('t',$startDay);
echo "這個月天數=>".$monthDays;
echo "<br>";
?>



<table>
    <tr>
<!-- 禮拜日到禮拜六 -->
<?php
// echo date('2020-11-0'.(1+$j));
for($i=0;$i<7;$i++){
    echo '<td>';
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
            if(date('d') == $today){echo '<td class="today">';}
            else{echo '<td class="nottoday">';}

                if($i==0 && $j<$startDay){
                    echo "&nbsp;";
                }else if((($i*7) + ($j+1) - $startDay)>$monthDays){
                    
                }else{
                    echo (($i*7) + ($j+1) - $startDay);
                }
            
            echo "</td>";
        }
    echo "</tr>";
}

?>
</table>
<br><br><br><br><br><hr>

































<br><br><br><br><br><hr>
<!-- 測試 -->
<?php
$year=date('Y');
$month=date('m');
$days=date('t');

echo $year,$month,$days;
echo '<br>';
echo '<hr>';
$date_year = date('Y-m-d',strtotime("+1 year"));
// strtotime多用於時間轉換＆加減
// echo出 Y-m-d型態的 (今天)+1年
echo $date_year;
echo '<br>';
echo '<hr>';

$date_tomorrow=date('Y-m=d',strtotime("+1 days"));
// echo出 Y-m=d型態的 (今天)+1天
echo $date_tomorrow;
echo '<br>';
echo '<hr>';

echo date('w');
// 今天星期一 show出數字星期幾
echo date('w',strtotime("$year-$month-$days"));
// echo出 $year-$month-$days(最後一天) 是星期幾
echo '<br>';
echo '<hr>';
?>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>

