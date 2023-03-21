<?php 
    session_start();
    if(!empty($_POST['language_select'])){
        $language = $_POST['language_select'];
        $_SESSION['language']= $language;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>學習歷程</title>

    <link rel="stylesheet" type="text/css" href="css/profile1.css" />
</head>
<body>
<div class="wrapper">

    <header class="fbTopBar" id="fbTopBar" style="background-color: rgb(0, 0, 0);">
        <div>
            <img style="position: absolute; left: 0px; top: 3px; height: 40px;" src="img/appLogoIcon.png">
        </div>
        
        <div>
            <form name="lan_select" method="POST" action="">
                <select class="select" id="lang" name="language_select" onchange="this.form.submit(); ">
                    <option id="preset" selected="selected">請選擇語言</option>
                    <option value="chinese" <?php if(!empty($_SESSION['language']) && $_SESSION['language'] == 'chinese'){ echo "selected";}?>>中文</option>
                    <option value="english" <?php if(!empty($_SESSION['language']) && $_SESSION['language'] == 'english'){ echo "selected";}?>>英文</option>
                    <option value="taiwanese" <?php if(!empty($_SESSION['language']) && $_SESSION['language'] == 'taiwanese'){ echo "selected";}?>>閩南語</option>
                    <option value="hakkaBig"<?php if(!empty($_SESSION['language']) && $_SESSION['language'] == 'hakkaBig'){ echo "selected";}?>>客語大埔腔</option>
                    <option value="hakkaFour" <?php if(!empty($_SESSION['language']) && $_SESSION['language'] == 'hakkaFour'){ echo "selected";}?>>客語四縣腔</option>
                    <option value="hakkaSea" <?php if(!empty($_SESSION['language']) && $_SESSION['language'] == 'hakkaSea'){ echo "selected";}?>>客語海陸腔</option>
                    <option value="Indonesia" <?php if(!empty($_SESSION['language']) && $_SESSION['language'] == 'Indonesia'){ echo "selected";}?>>印尼語</option>
                </select>
            </form>
        </div>

        <div class="menubar">
            <h2 style="font-weight:bold; margin-right: 10px;"><a style="color: rgb(255, 255, 255);" href="home.html">主選單</a></h2>
            <h2 style="font-weight:bold; margin-right: 10px;"><a style="color: rgb(255, 255, 255);" href="book1.php">回到繪本</a></h2>
            <h2 style="font-weight:bold;"><a style="color: rgb(255, 255, 255);" href="more.html">其他資源</a></h2>
        </div>
    </header>

    <!-- <script>
        function change(){
            var language = document.getElementById('lang').options[document.getElementById('lang').selectedIndex].value
            document.getElementById('preset').innerText = language;
        }
    </script> -->

    <?php
    require_once 'connect.php';
    ?>
    <?php
    $datas = array();
    if(!empty($language)){
        $id = $_SESSION['userid'];
        $sql = "SELECT SUM(stay),SUM(record),SUM(play) FROM time WHERE time_id = $id AND `lang`='$language' GROUP BY page ORDER BY page";
        unset($_SESSION['language']);


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
    }
    // // 處理完後印出資料
    // if(!empty($result)){
    //     // 如果結果不為空，就利用print_r方法印出資料
    //     print_r($datas);
    // }
    // else {
    //     // 為空表示沒資料
    //     echo "查無資料";
    // }
    ?>
    <?php mysqli_close($link); ?>

    <div class="table-outbox">
        <table>
            <thead>
            <tr>
                <th>頁碼</th>
                <th>觀看時間</th>
                <th>聆聽次數</th>
                <th>錄音次數</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for($i=0;$i<24;$i++){
                if(!empty($datas[$i])){
                    $stay = intval($datas[$i]['SUM(stay)']);
                    $play = $datas[$i]['SUM(play)'];
                    $record = $datas[$i]['SUM(record)'];
                echo"<tr>";
                echo"<td>page".($i+1)."</td>";
                echo"<td>";
                if(floor($stay/3600)> 0){
                echo floor($stay/3600);
                echo"時";}
                if(floor($stay % 3600 /60)>0){
                echo floor($stay % 3600 /60);
                echo"分";}
                echo $stay % 60;
                echo"秒</td>";
                echo"<td>".$play."次</td>";
                echo"<td>".$record."次</td>";
                echo"</tr>";
                }else{
                    echo"<tr>";
                echo"<td>page".($i+1)."</td>";
                echo"<td>0秒</td>";
                echo"<td>0次</td>";
                echo"<td>0次</td>";
                echo"</tr>";
                }
            }
            
            ?>
            <!-- <tr>
                <td>page2</td>
                <td id="stay2">XX秒</td>
                <td id="record2">XX次</td>
                <td id="play2">XX次</td>
            </tr>

            <tr>
                <td>page3</td>
                <td id="stay3">XX秒</td>
                <td id="record3">XX次</td>
                <td id="play3">XX次</td>
            </tr>

            <tr>
                <td>page4</td>
                <td id="stay4">XX秒</td>
                <td id="record4">XX次</td>
                <td id="play4">XX次</td>
            </tr>

            <tr>
                <td>page5</td>
                <td id="stay5">XX秒</td>
                <td id="record5">XX次</td>
                <td id="play5">XX次</td>
            </tr>

            <tr>
                <td>page6</td>
                <td id="stay6">XX秒</td>
                <td id="record6">XX次</td>
                <td id="play6">XX次</td>
            </tr>

            <tr>
                <td>page7</td>
                <td id="stay7">XX秒</td>
                <td id="record7">XX次</td>
                <td id="play7">XX次</td>
            </tr>

            <tr>
                <td>page8</td>
                <td id="stay8">XX秒</td>
                <td id="record8">XX次</td>
                <td id="play8">XX次</td>
            </tr>

            <tr>
                <td>page9</td>
                <td id="stay9">XX秒</td>
                <td id="record9">XX次</td>
                <td id="play9">XX次</td>
            </tr> -->

            </tbody>
        </table>
    </div>

    <footer id="fbToolBar" class="fbToolBar" style="background-color: rgb(0, 0, 0);">
    </footer>
</div>
</body>
</html>