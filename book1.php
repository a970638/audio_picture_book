<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>細蜂仔蜜花</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/book1.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    </head>

    <body onload="timer();">
        

        <div class="wrapper">
            <div class="header" style="background-color: rgb(0, 0, 0);">
                <div id="logoBar" class="logoBar" style="display: block; left: 0px; width: 154.639px;">
                    <img style="position: absolute; left: 0px; top: 3px; height: 40px;" src="img/appLogoIcon.png">
                </div> 
                <div class="menubar">
                    <h4 style="font-weight:bold; margin-right: 10px;"><a style="color: rgb(255, 255, 255);" href="home.html">主選單</a></h4>
                    <h4 style="font-weight:bold; margin-right: 10px;"><a style="color: rgb(255, 255, 255);" href="profile1.php">學習歷程</a></h4>
                    <h4 style="font-weight:bold;"><a style="color: rgb(255, 255, 255);" href="more.html">其他資源</a></h4>
                </div>
            </div>

            <form id="time_form" class="time" method="POST" action="insert.php" target="test_iframe">
                <!-- <label>現在的語言是:</label> -->
                <input type = "hidden" id="language" name = "language" value= 'chinese' type="text" onfocus="this.blur()">
                <!-- <label>現在在第幾頁:</label> -->
                <input type = "hidden" id="pagenum" name = "pagenum" value='1' type="text" onfocus="this.blur()">
                <!-- <label>在本頁的停留時間:</label> -->
                <input type = "hidden" id="timecount" name = "staytime" value='0' type="text" onfocus="this.blur()" >
                <!-- <label>在本頁的錄音次數:</label> -->
                <input type = "hidden" id="rec_count" name = "rectime" value='0' type="text" onfocus="this.blur()" >
                <!-- <label>在本頁的播放次數:</label> -->
                <input type = "hidden" id="p_count" name = "playtime" value='0' type="text" onfocus="this.blur()">
            </form>

            <iframe id="aaa_iframe" name="test_iframe" width="0px" height="0px"></iframe>
        
            <div class="content">

                <div class="left_content">
                </div>

                <div class="center_content">

                    <div class="language">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-lan1-tab" data-bs-toggle="pill" data-bs-target="#pills-lan1"
                            type="button" role="tab" aria-controls="pills-lan1" aria-selected="true" onclick="language(1); refresh(); timer();">中文</button>
                            </li>
                            <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-lan2-tab" data-bs-toggle="pill" data-bs-target="#pills-lan2"
                            type="button" role="tab" aria-controls="pills-lan2" aria-selected="false" onclick="language(2); refresh(); timer();">英文</button>
                            </li>
                            <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-lan3-tab" data-bs-toggle="pill" data-bs-target="#pills-lan3"
                            type="button" role="tab" aria-controls="pills-lan3" aria-selected="false" onclick="language(3); refresh(); timer();">客語大埔腔</button>
                            </li>
                            <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-lan4-tab" data-bs-toggle="pill" data-bs-target="#pills-lan4" type="button"
                            role="tab" aria-controls="pills-lan4" aria-selected="false" onclick="language(4); refresh(); timer();">客語四縣腔</button>
                            </li>
                            <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-lan5-tab" data-bs-toggle="pill" data-bs-target="#pills-lan5" type="button"
                            role="tab" aria-controls="pills-lan5" aria-selected="false" onclick="language(5); refresh(); timer();">客語海陸腔</button>
                            </li>
                            <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-lan6-tab" data-bs-toggle="pill" data-bs-target="#pills-lan6" type="button"
                            role="tab" aria-controls="pills-lan6" aria-selected="false" onclick="language(6); refresh(); timer();">閩南語</button>
                            </li>
                            <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-lan7-tab" data-bs-toggle="pill" data-bs-target="#pills-lan7" type="button"
                            role="tab" aria-controls="pills-lan7" aria-selected="false" onclick="language(7); refresh(); timer();">印尼語</button>
                            </li>
                        </ul>
                    </div>

                    <div class="middle">
                        <button class="pre" style="background-color: transparent; border: none;" onclick="submit_form(); prepage(); preaudio(); timer(); refresh(); prebutton();"><img class="pre" src="img/previous_normal.png"></button>
                        <img id="pagenum1" class='book' src="book/book1.jpg" style="display:block;">
                        <img id="pagenum2" class='book' src="book/book2.jpg" style="display:none;">
                        <img id="pagenum3" class='book' src="book/book3.jpg" style="display:none;">
                        <img id="pagenum4" class='book' src="book/book4.jpg" style="display:none;">
                        <img id="pagenum5" class='book' src="book/book5.jpg" style="display:none;">
                        <img id="pagenum6" class='book' src="book/book6.jpg" style="display:none;">
                        <img id="pagenum7" class='book' src="book/book7.jpg" style="display:none;">
                        <img id="pagenum8" class='book' src="book/book8.jpg" style="display:none;">
                        <img id="pagenum9" class='book' src="book/book9.jpg" style="display:none;">
                        <img id="pagenum10" class='book' src="book/book10.jpg" style="display:none;">
                        <img id="pagenum11" class='book' src="book/book11.jpg" style="display:none;">
                        <img id="pagenum12" class='book' src="book/book12.jpg" style="display:none;">
                        <img id="pagenum13" class='book' src="book/book13.jpg" style="display:none;">
                        <img id="pagenum14" class='book' src="book/book14.jpg" style="display:none;">
                        <img id="pagenum15" class='book' src="book/book15.jpg" style="display:none;">
                        <img id="pagenum16" class='book' src="book/book16.jpg" style="display:none;">
                        <img id="pagenum17" class='book' src="book/book17.jpg" style="display:none;">
                        <img id="pagenum18" class='book' src="book/book18.jpg" style="display:none;">
                        <img id="pagenum19" class='book' src="book/book19.jpg" style="display:none;">
                        <img id="pagenum20" class='book' src="book/book20.jpg" style="display:none;">
                        <img id="pagenum21" class='book' src="book/book21.jpg" style="display:none;">
                        <img id="pagenum22" class='book' src="book/book22.jpg" style="display:none;">
                        <img id="pagenum23" class='book' src="book/book23.jpg" style="display:none;">
                        <button class="next" style="background-color: transparent; border: none;" onclick="submit_form(); nextpage(); nextaudio(); timer(); refresh(); nextbutton();"><img class="next" src="img/next_normal.png"></button>
                    </div>
                
                    <!-- <div class="control">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-lan1" role="tabpanel" aria-labelledby="pills-lan1-tab">
                                                        
                            </div>        
                            
                            <div class="tab-pane fade" id="pills-lan2" role="tabpanel" aria-labelledby="pills-lan2-tab">
                                
                            </div>
                        
                            <div class="tab-pane fade" id="pills-lan3" role="tabpanel" aria-labelledby="pills-lan3-tab">
                                
                            </div>
                        
                            <div class="tab-pane fade" id="pills-lan4" role="tabpanel" aria-labelledby="pills-lan4-tab">
                                
                            </div>
                        
                            <div class="tab-pane fade" id="pills-lan5" role="tabpanel" aria-labelledby="pills-lan5-tab">
                                
                            </div>
                        </div>
                    </div> -->

                    <div class = "button">
                        <div class = "rec">
                            <div>
                                <button class="record" id="record_0" style="display:none" onclick="startRec(); record_start(); record_count(); startCount(); recBar();" >開始錄音</button>
                                <button class='pause_play' id="record_1" style="display:none" onclick="playRec(); record_stop();" >結束並播放</button>
                            </div>
                            <div class="recBar" id="recBar" style="display:none"></div>
                            <form id="recordtime_form" class="record_time">
                                <!-- <label>剩餘錄音時間:</label> -->
                                <input type="hidden" id="rec_time" value='30' type="text" onfocus="this.blur();"> 
                            </form>
                        </div>

                        <div class="audio">
                            <button id="play1"style="display:none" onclick="playAudio1();" value="0">播放第一句</button>
                            <audio id="play_audio1" src="audioAll/audio_1_1_1.mp3"></audio>
                            <button id="play2" style="display:none" onclick="playAudio2();" value="0">播放第二句</button>
                            <audio id="play_audio2" src="audioAll/audio_1_1_2.mp3"></audio>
                            <button id="play3" style="display:none" onclick="playAudio3();" value="0">播放第三句</button>
                            <audio id="play_audio3" src="audioAll/audio_1_1_3.mp3"></audio>
                            <button class="play" id="play_button" style="display:none" onclick="playAudio(); play_account();" value="0">播放繪本</button>
                                <audio id="play_audio" src="audio/audio_1_1.mp3"></audio>      
                        </div>
                    </div>

                </div>

                <div class="right_content">

                    <div class="account_form">
                        <form>
                            
                            <h5>帳號資訊</h5>
                            <h1>
                            <i id="login_head" class="fa fa-user-circle-o"></i>
                            </h1>
        
                            <h6>帳號：</h6>
                            <h6 style="font-weight:bold;"><?php echo $_SESSION['username']?></h6>
                            
                            <h6>身分：</h6>
                            <h6 style="font-weight:bold;">一般使用者</h6>
                            <input type = "button" value = "登出" onclick="location.href='https://hakka-ebook.herokuapp.com/'" style="width: 40px; height: 22px; font-size:12px"/>
                            
                        </form>
                    </div>

                </div>

                
                     
            </div>



            <div class="footer"></div>

        </div>
    

    <script src="js/book1.js"> </script>
    
    <script src="https://xiangyuecn.github.io/Recorder/recorder.mp3.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>
    

    </body>


</html>