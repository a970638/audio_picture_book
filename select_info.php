<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require_once 'connect.php';
    ?>
    <?php
    $datas = array();
    $sql = "SELECT SUM(stay),SUM(record),SUM(play) FROM time WHERE lang='chinese' GROUP BY page ORDER BY page";
    $result = mysqli_query($link,$sql);
    
    if ($result) {
        // mysqli_num_rows方法可以回傳我們結果總共有幾筆資料
        if (mysqli_num_rows($result)>0) {
            // 取得大於0代表有資料
            // while迴圈會根據資料數量，決定跑的次數
            // mysqli_fetch_assoc方法可取得一筆值
            while ($row = mysqli_fetch_assoc($result)) {
                // 每跑一次迴圈就抓一筆值，最後放進data陣列中
                $datas[] = $row;
            }
        }
        // 釋放資料庫查到的記憶體
        mysqli_free_result($result);
    }
    else {
        echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
    }
    // 處理完後印出資料
    if(!empty($result)){
        // 如果結果不為空，就利用print_r方法印出資料
        print_r($datas);
    }
    else {
        // 為空表示沒資料
        echo "查無資料";
    }
    ?>
    <h3>foreach列出查詢結果</h3>
    <div>
        <?php if(!empty($datas)): ?>
        <ul>
        <!-- 資料 as key(下標) => row(資料的row) -->
        <?php foreach ($datas as $key => $row) :?>
        <li>
        第<?php echo($key +1 ); ?> 頁，時間<?php echo $row['SUM(stay)']; ?>，播放次數<?php echo $row['SUM(play)']; ?>，錄音次數<?php echo $row['SUM(record)'];?>
        </li>
        <?php endforeach; ?>
        </ul>
        <?php else:  ?>
        查無資料
        <?php endif; ?>
    </div>
    <?php mysqli_close($link); ?>


</body>
</html>