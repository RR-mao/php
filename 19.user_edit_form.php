<html>
    <head><title>修改使用者</title></head>
    <body>
    <?php
    // 關閉錯誤訊息
    error_reporting(0);
    // 啟用 Session
     // 若未登入
    session_start();
    // 顯示登入提示
    if (!$_SESSION["id"]) {
        // 3 秒後導向登入頁
        echo "請登入帳號";
        // 3 秒後導向登入頁
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{   
        // 建立資料庫連線
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
         // 依據 GET 傳入的 id 查詢該使用者資料
        $result=mysqli_query($conn, "select * from user where id='{$_GET['id']}'");
        // 取得資料列
        $row=mysqli_fetch_array($result);
        // 顯示修改表單，帳號不可更改，密碼可修改
        
        echo "
        // 表單送出至 20.user_edit.php
        <form method=post action=20.user_edit.php>
            // 隱藏帳號值
            <input type=hidden name=id value={$row['id']}>
            // 顯示帳號（不可編輯）
            帳號：{$row['id']}<br> 
            // 顯示密碼欄位
            密碼：<input type=text name=pwd value={$row['pwd']}><p></p>
            // 提交按鈕
            <input type=submit value=修改>
        </form>
        ";
    }
    ?>
    </body>
</html>
