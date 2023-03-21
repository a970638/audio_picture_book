

            var rec;
            function startRec(){
                rec=Recorder();//使用預設配置，mp3格式
                
                //開啟麥克風授權獲得相關資源
                rec.open(function(){
                    //開始錄音
                    rec.start();
                },function(msg,isUserNotAllow){
                    //使用者拒絕了許可權或瀏覽器不支援
                    alert((isUserNotAllow?"使用者拒絕了許可權，":"")+"無法錄音:"+msg);
                });
            };
            
            // function uploadRec(){
            //     //停止錄音，得到了錄音檔案blob二進位制物件，想幹嘛就幹嘛
            //     rec.stop(function(blob,duration){
            //         /*
            //         blob檔案物件，可以用FileReader讀取出內容
            //         ，或者用FormData上傳，本例直接上傳二進位制檔案
            //         ，對於普通application/x-www-form-urlencoded表單上傳
            //         ，請參考github裡面的例子
            //         */
            //         var form=new FormData();
            //         form.append("upfile",blob,"test.mp3"); //和普通form表單並無二致，後端接收到name為upfile的檔案，檔名為recorder.mp3
                    
            //         //直接用$.ajax上傳
            //             $.ajax({
            //             type: "POST",
            //             url: "uploadrecord.php",  //同目錄下的php檔案
                    
            //             data:form,

            //             //如果傳遞的是FormData資料型別,那麼下來的三個引數是必須的,否則會報錯
            //             cache:false,  //預設是true,但是一般不做快取
            //             processData:false, //用於對data引數進行序列化處理,這裡必須false;如果是true,就會將FormData轉換為String型別
            //             contentType:false,  //一些檔案上傳http協議的關係,自行百度,如果上傳的有檔案,那麼只能設定為false
                    
            //             });
            //     },
            //     function(msg){
            //         alert("錄音失敗:"+msg);
            //     }
            //     );
            // };
            
  
            
  
            function playRec(){
                //停止錄音，得到了錄音檔案blob二進位制物件，想幹嘛就幹嘛
                rec.stop(function(blob,duration){
                    var testData = !!document.getElementById("tmpRec");
                    if(testData == true){
                        document.getElementById("tmpRec").remove();
                    }
                    var audio=document.createElement("audio");
                    audio.id = 'tmpRec';
                    audio.controls=true;
                    document.body.appendChild(audio);
                    
                    //非常簡單的就能拿到blob音訊url
                    audio.src=URL.createObjectURL(blob);
                    audio.play();

                    var form=new FormData();
                    form.append("upfile",blob,"test.mp3"); //和普通form表單並無二致，後端接收到name為upfile的檔案，檔名為recorder.mp3
                    
                    //直接用$.ajax上傳
                        $.ajax({
                        type: "POST",
                        url: "uploadrecord.php",  //同目錄下的php檔案
                    
                        data:form,

                        //如果傳遞的是FormData資料型別,那麼下來的三個引數是必須的,否則會報錯
                        cache:false,  //預設是true,但是一般不做快取
                        processData:false, //用於對data引數進行序列化處理,這裡必須false;如果是true,就會將FormData轉換為String型別
                        contentType:false,  //一些檔案上傳http協議的關係,自行百度,如果上傳的有檔案,那麼只能設定為false
                    
                        });

                },function(msg){
                    alert("錄音失敗:"+msg);
                });

                document.getElementById('rec_time').value = 30;
                clearInterval(intervalID);
                document.getElementById('rec_time').type = "hidden"
            };
   
    
  
            function record_start(){
                var test = document.getElementById("record_0").innerText;
                if(test == "開始錄音" ){
                document.getElementById("record_0").innerText = '錄音中';
            }
            }
        
            function record_stop(){
                var test = document.getElementById("record_0").innerText;
                if(test == "錄音中"){
                document.getElementById("record_0").innerText = '開始錄音';
                }
                document.getElementById('rec_time').value = 30;
                document.getElementById("recBar").style.display = "none";
            }
    
    
        // 播放/暫停
        type="text/javascript"
            function playAudio() {
            var test = document.getElementById("play_button").value;
            const audio = document.getElementById("play_audio");
            if(test == 0 ){
                audio.currentTime = 0;
                audio.play();
                document.getElementById("play_button").value = 1;
                document.getElementById("play_button").innerText = '暫停';
            }
            else if(test == 1){
                audio.pause();
                document.getElementById("play_button").value = 0;
                document.getElementById("play_button").innerText = '播放繪本';
            }
            }

            function playAudio1() {
                var test = document.getElementById("play1").value;
                const audio = document.getElementById("play_audio1");
                if(test == 0 ){
                    audio.currentTime = 0;
                    audio.play();
                    document.getElementById("play1").value = 1;
                    document.getElementById("play1").innerText = '暫停';
                }
                else if(test == 1){
                    audio.pause();
                    document.getElementById("play1").value = 0;
                    document.getElementById("play1").innerText = '播放第一句';
                }
                }

            function playAudio2() {
                var test = document.getElementById("play2").value;
                const audio = document.getElementById("play_audio2");
                if(test == 0 ){
                    audio.currentTime = 0;
                    audio.play();
                    document.getElementById("play2").value = 1;
                    document.getElementById("play2").innerText = '暫停';
                }
                else if(test == 1){
                    audio.pause();
                    document.getElementById("play2").value = 0;
                    document.getElementById("play2").innerText = '播放第一句';
                }
                }

            function playAudio3() {
                var test = document.getElementById("play3").value;
                const audio = document.getElementById("play_audio3");
                if(test == 0 ){
                    audio.currentTime = 0;
                    audio.play();
                    document.getElementById("play3").value = 1;
                    document.getElementById("play3").innerText = '暫停';
                }
                else if(test == 1){
                    audio.pause();
                    document.getElementById("play3").value = 0;
                    document.getElementById("play3").innerText = '播放第一句';
                }
            }


        
        // 播放/暫停

        // 翻頁
        
            nowpage = 1;
            function nextpage(){
                nowID = 'pagenum' + nowpage;
                if(nowpage == 23){
                    nowpage ==23;
                }
                else{
                    nowpage +=1;
                }
                nextID = 'pagenum' + nowpage;
                document.getElementById(nowID).style.display="none";
                document.getElementById(nextID).style.display="block";
                document.getElementById('pagenum').value = nowpage;
            }
            
            function prepage(){
                nowID = 'pagenum' + nowpage;
                if(nowpage == 1){
                    nowpage ==1;
                }
                else{
                    nowpage -=1;
                }
                nextID = 'pagenum' + nowpage;
                document.getElementById(nowID).style.display="none";
                document.getElementById(nextID).style.display="block";
                document.getElementById('pagenum').value = nowpage;
            }
        
        // 翻頁

        //按鈕顯示
            buttoncount = 1;
            function nextbutton(){
                record = document.getElementById('record_0')
                record_play = document.getElementById('record_1')
                play = document.getElementById('play_button')
                play1 = document.getElementById('play1')
                play2 = document.getElementById('play2')
                play3 = document.getElementById('play3')
                buttoncount += 1;
                if(buttoncount > 23){
                    buttoncount = 23;
                }

                if(buttoncount == 10){
                    play3.style.display="inline-block";
                }else{
                    play3.style.display="none";
                }

                if((buttoncount >= 6 && buttoncount <= 10)||(buttoncount >= 15 && buttoncount <= 16)){
                    play2.style.display="inline-block";
                }else{
                    play2.style.display="none";
                }
                
                if(buttoncount >= 5 && buttoncount <= 17){
                    record.style.display="inline-block";
                    record_play.style.display="inline-block";
                    play.style.display="inline-block";
                    play1.style.display="inline-block";
                }
                else{
                    record.style.display="none";
                    record_play.style.display="none";
                    play.style.display="none";
                    play1.style.display="none";
                }  
            }

            function prebutton(){
                record = document.getElementById('record_0')
                record_play = document.getElementById('record_1')
                play = document.getElementById('play_button')
                
                buttoncount -= 1;
                if(buttoncount <=0){
                    buttoncount = 1;
                }
                if(buttoncount == 10){
                    play3.style.display="inline-block";
                }else{
                    play3.style.display="none";
                }

                if((buttoncount >= 6 && buttoncount <= 10)||(buttoncount >= 15 && buttoncount <= 16)){
                    play2.style.display="inline-block";
                }else{
                    play2.style.display="none";
                }
                
                if(buttoncount >= 5 && buttoncount <= 17){
                    record.style.display="inline-block";
                    record_play.style.display="inline-block";
                    play.style.display="inline-block";
                    play1.style.display="inline-block";
                }
                else{
                    record.style.display="none";
                    record_play.style.display="none";
                    play.style.display="none";
                    play1.style.display="none";
                }  
            }


            
        // 按鈕顯示


        // 語言
            function language(lang){
                var play_auido = document.getElementById("play_audio");
                var play1 = document.getElementById("play_audio1");
                var play2 = document.getElementById("play_audio2");
                var play3 = document.getElementById("play_audio3");
                var now_audio = document.getElementById("play_audio").src;
                var now_audio_all = document.getElementById("play_audio1").src;
                var change_lang = now_audio.split('_');  //取 audio_1_1 中間的數字
                var changeAll = now_audio_all.split('_');

                //換語言音檔，並寫入 <audio src>裡面
                var test_output = "";
                var audio1 = "";
                var audio2 = "";
                var audio3 = "";
                test_output = test_output + change_lang[0] + "_" + lang + "_" + change_lang[2];
                audio1 = audio1 + changeAll[0] + "_" + lang + "_" + changeAll[2] + "_" + "1";
                audio2 = audio2 + changeAll[0] + "_" + lang + "_" + changeAll[2] + "_" + "2";
                audio3 = audio3 + changeAll[0] + "_" + lang + "_" + changeAll[2] + "_" + "3";
                document.getElementById("play_audio").src = test_output;
                document.getElementById("play_audio1").src = audio1;
                document.getElementById("play_audio2").src = audio2;
                document.getElementById("play_audio3").src = audio3;

                document.getElementById("play_button").value = 0;
                document.getElementById("play1").value = 0;
                document.getElementById("play2").value = 0;
                document.getElementById("play3").value = 0;
                document.getElementById("play_button").innerText = '播放繪本';
                document.getElementById("play1").innerText = '播放第一句';
                document.getElementById("play2").innerText = '播放第二句';
                document.getElementById("play3").innerText = '播放第三句';

                if(lang == 1){
                    document.getElementById('language').value = 'chinese';
                }else if(lang == 2){
                    document.getElementById('language').value = 'english';
                }else if(lang == 3){
                    document.getElementById('language').value = 'hakkaBig';
                }else if(lang == 4){
                    document.getElementById('language').value = 'hakkaFour';
                }else if(lang == 5){
                    document.getElementById('language').value = 'hakkaSea';
                }else if(lang == 6){
                    document.getElementById('language').value = 'taiwanese';
                }else if(lang == 7){
                    document.getElementById('language').value = 'Indonesia';
                }
                

                // play_auido.play();
                
            }
        // 語言

        // 前後音檔
            function nextaudio(){
                var test_output = "";
                var audio1 = "";
                var audio2 = "";
                var audio3 = "";
                var play_auido = document.getElementById("play_audio");
                var play1 = document.getElementById("play_audio1");
                var play2 = document.getElementById("play_audio2");
                var play3 = document.getElementById("play_audio3");
                var now_audio = document.getElementById("play_audio").src;
                var now_audio_all = document.getElementById("play_audio1").src;
                var change_lang = now_audio.split('_');  //取 audio_1_1.mp3 後面的的數字
                var changeAll = now_audio_all.split('_');
                var change_pange = change_lang[2].split('.');  //取1.mp3中.前面的數字
                
                if(parseInt(change_pange[0]) < 24){  //判斷是不是最後一頁，不是的話 就+1
                    var next_page = parseInt(change_pange[0]) + 1;   /*===+1下一頁====*/
                }
                else{
                    var next_page = change_pange[0];
                }

                test_output = test_output + change_lang[0] + "_" + change_lang[1] + "_" + next_page + ".mp3";
                var audio1 = audio1 + changeAll[0] + "_" + changeAll[1] + "_" + next_page + "_1" + ".mp3";
                var audio2 = audio2 + changeAll[0] + "_" + changeAll[1] + "_" + next_page + "_2" + ".mp3";
                var audio3 = audio3 + changeAll[0] + "_" + changeAll[1] + "_" + next_page + "_3" + ".mp3";
                document.getElementById("play_audio").src = test_output;  //寫回新語音進 <audio>
                document.getElementById("play_audio1").src = audio1;
                document.getElementById("play_audio2").src = audio2;
                document.getElementById("play_audio3").src = audio3;

                document.getElementById("play_button").value = 0;
                document.getElementById("play1").value = 0;
                document.getElementById("play2").value = 0;
                document.getElementById("play3").value = 0;
                document.getElementById("play_button").innerText = '播放繪本';
                document.getElementById("play1").innerText = '播放第一句';
                document.getElementById("play2").innerText = '播放第二句';
                document.getElementById("play3").innerText = '播放第三句';
                // play_auido.play();

            }   
 
            function preaudio(){   //基本上跟next一樣  
                var test_output = "";
                var audio1 = "";
                var audio2 = "";
                var audio3 = "";
                var play_auido = document.getElementById("play_audio");
                var play1 = document.getElementById("play_audio1");
                var play2 = document.getElementById("play_audio2");
                var play3 = document.getElementById("play_audio3");
                var now_audio = document.getElementById("play_audio").src;
                var now_audio_all = document.getElementById("play_audio1").src;
                var change_lang = now_audio.split('_');  //取 audio_1_1.mp3 後面的的數字
                var changeAll = now_audio_all.split('_');
                var  change_pange = change_lang[2].split('.');  //取1.mp3中.前面的數字
                
                if(parseInt(change_pange[0]) > 0){  //判斷是不是最後一頁，不是的話 就+1
                    var next_page = parseInt(change_pange[0]) - 1;   /*===-1上一頁====*/
                }
                else{
                    var next_page = change_pange[0];
                }

                test_output = test_output + change_lang[0] + "_" + change_lang[1] + "_" + next_page + ".mp3";
                var audio1 = audio1 + changeAll[0] + "_" + changeAll[1] + "_" + next_page + "_1" + ".mp3";
                var audio2 = audio2 + changeAll[0] + "_" + changeAll[1] + "_" + next_page + "_2" + ".mp3";
                var audio3 = audio3 + changeAll[0] + "_" + changeAll[1] + "_" + next_page + "_3" + ".mp3";
                document.getElementById("play_audio").src = test_output;  //寫回新語音進 <audio>
                document.getElementById("play_audio1").src = audio1;
                document.getElementById("play_audio2").src = audio2;
                document.getElementById("play_audio3").src = audio3;
                
                // play_auido.play();

                document.getElementById("play_button").value = 0;
                document.getElementById("play_button").innerText = '播放繪本';
                document.getElementById("play1").value = 0;
                document.getElementById("play2").value = 0;
                document.getElementById("play3").value = 0;
                document.getElementById("play1").innerText = '播放第一句';
                document.getElementById("play2").innerText = '播放第二句';
                document.getElementById("play3").innerText = '播放第三句';
            }
        // 前後音檔

        

        // 時間
            setInterval(count, 1000); //直接放在這邊就好

            function count() {
                var get_input_value = parseInt(document.getElementById('timecount').value); //取值
                var time_count = get_input_value += 1;  
                document.getElementById('timecount').value = time_count;  //回寫
            }

            function timer(){
                document.getElementById('timecount').value = 0;
                // var myTimer = setInterval(count, 1000); //每1000毫秒 執行一次這個function
                // clearInterval(myTimer);//重置 myTimer的setInterval **但可這個可能要看一下好像有錯她不會重置
            }
        // 時間

        // 錄音計算
            function record_count(){
                var record_value = parseInt(document.getElementById('rec_count').value); //取值
                var rec_count = record_value += 1;
                document.getElementById('rec_count').value = rec_count;
            }
        // 錄音計算

        // 播放計算
            function play_account(){
                var play_state = document.getElementById("play_button").value;
                var play_value = parseInt(document.getElementById('p_count').value); //取值
                if(play_state == 1){
                    var p_count = play_value += 1;
                    document.getElementById('p_count').value = p_count;
                    }
                else{
                    p_count = p_count;
                }
                
            };
        // 播放計算

        // 次數重置
            function refresh(){
                document.getElementById('rec_count').value = 0;
                document.getElementById('p_count').value = 0;
            };
        // 次數重置

        // 提交表單
            var myform = document.getElementById("time_form");
            function submit_form() {
                myform.submit();
            };
        // 提交表單

        //錄音計時
            var intervalID;
        
            function startCount(){
                intervalID = setInterval(recCount, 1000);
            }

            function recCount(){
                // document.getElementById("recBar").style.display = "block";
                // document.getElementById('rec_time').type = "show";
                var getValue = parseInt(document.getElementById('rec_time').value);
                var rectime_count = getValue -= 1; 
                if(rectime_count >= 0){
                    document.getElementById('rec_time').value = rectime_count;
                }else{
                    playRec();
                    document.getElementById('rec_time').value = 30;
                    clearInterval(intervalID);
                    if(document.getElementById("record_0").innerText == "錄音中"){
                        document.getElementById("record_0").innerText = '開始錄音';
                    }
                    // document.getElementById('rec_time').type = "hidden"
                    document.getElementById("recBar").style.display = "none";
                }

            }

            function recBar(){
                document.getElementById("recBar").style.display = "block";
                const animMoving = [
                    {width: '120px'},
                    {width: '0px'}
                ];
                const animTiming = {
                    duration: 30000,
                    iterations: 1,
                }  
                document.getElementById("recBar").animate(animMoving, animTiming);
            }
        //錄音計時

        



        
