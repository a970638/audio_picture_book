<?php
$host = 'hakkadldatabase.cuiulvnqi1jq.ap-northeast-1.rds.amazonaws.com';
$user ='admin';
$password = 'hakkadigitallearning';
$dbname = 'user';
$link = mysqli_connect($host, $user, $password, $dbname);
// if($link){
//     // mysqli_query($link,'SET NAMES uff8');
//     echo "正確連接資料庫";
// }
// else {
//     echo "不正確連接資料庫</br>" . mysqli_connect_error();
// }
?>