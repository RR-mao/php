<html>
    <head><title>使用者管理</title></head>
    <body>
    <?php
        // 關閉錯誤訊息
        error_reporting(0);
        // 啟用 Session
        session_start();
        // 若未登入
        if (!$_SESSION["id"]) {
             // 顯示提示訊息
            echo "請登入帳號";
            // 3 秒後跳轉到登入頁
            echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
        }
        else{   
            // 顯示標題與功能連結
            echo "<h1>使用者管理</h1>
                [<a href=14.user_add_form.php>新增使用者</a>] [<a href=11.bulletin.php>回佈告欄列表</a>]<br>
                <table border=1>
                    <tr><td></td><td>帳號</td><td>密碼</td></tr>";
             // 連接資料庫
            $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
            // 查詢 user 資料表中所有使用者
            $result=mysqli_query($conn, "select * from user");
            // 用迴圈輸出每筆使用者資料（包含修改與刪除連結）
            while ($row=mysqli_fetch_array($result)){
                echo "<tr><td><a href=19.user_edit_form.php?id={$row['id']}>修改</a>||<a href=17.user_delete.php?id={$row['id']}>刪除</a></td><td>{$row['id']}</td><td>{$row['pwd']}</td></tr>";
            }
            // 結束表格
            echo "</table>";
        }
    ?> 
    </body>
</html>
