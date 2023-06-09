<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=1"> -->
    <title>登入頁面</title>

    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>
<body>
    <div class="wrapper">
        <header class="fbTopBar" id="fbTopBar" style="background-color: rgb(0, 0, 0);">
            <div id="logoBar" class="logoBar" style="display: block; left: 0px; width: 154.639px;">
                <img style="position: absolute; left: 0px; top: 3px; height: 40px;" src="img/appLogoIcon.png">
            </div> 
        </header>
        
        <div class="content">
            <div class="login_form">
                <form method="POST" action="register.php">
                    
                    <h1>登入</h1>
                    <i id="login_head" class="fa fa-user-circle-o"></i>

                    <h2>帳號</h2>
                    <input class="input" type = "text" placeholder="請輸入帳號" name = "username"/> <br><br>
                    <h2>密碼</h2>
                    <input class="input" type = "password" placeholder="請輸入密碼" name="password"/> <br><br>
                
                    <input type = "submit" value = "登入" style="width: 60px; height: 30px; font-size:15px"/>
                    
                </form>
            </div>
        </div>

        <footer id="fbToolBar" class="fbToolBar" style="background-color: rgb(0, 0, 0);">
        </footer>
    </div>

</body>
</html>