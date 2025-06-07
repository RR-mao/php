<html>
    // 設定網頁標題
    <head><title>新增使用者</title></head>
    <body>
<?php        
     // 關閉所有錯誤訊息
    error_reporting(0);
    // 啟用 session 功能
    session_start();
    // 檢查是否尚未登入（id 尚未存在於 session）
    if (!$_SESSION["id"]) {
        // 顯示請登入訊息
        echo "請登入帳號";
        // 3 秒後重新導向到登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{    
        echo "
            // 表單提交至 15.user_add.php，使用 POST 方法
            <form action=15.user_add.php method=post>
                // 輸入帳號欄位
                帳號：<input type=text name=id><br>
                // 輸入密碼欄位
                密碼：<input type=text name=pwd><p></p>
                // 提交與重設按鈕
                <input type=submit value=新增> <input type=reset value=清除>
            </form>
        ";
    }
?>
    </body>
</html>
