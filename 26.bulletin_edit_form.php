<?php
    // 關閉錯誤訊息
    error_reporting(0);
    // 啟用 Session
    session_start();

    // 如果尚未登入
    if (!$_SESSION["id"]) {
        // 顯示提示訊息
        echo "please login first";
        // 3 秒後跳轉到登入頁
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
         // 建立資料庫連線
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
         // 根據 bid 查詢該筆佈告資料
        $result=mysqli_query($conn, "select * from bulletin where bid={$_GET["bid"]}");
        // 取出資料
        $row=mysqli_fetch_array($result);

        // 系上公告選項是否選取
        $checked1="";
        // 獲獎資訊選項是否選取
        $checked2="";
        // 徵才資訊選項是否選取
        $checked3="";

        // 若 type 為 1，預選系上公告
        if ($row['type']==1)
            $checked1="checked";
        // 若 type 為 2，預選獲獎資訊
        if ($row['type']==2)
            $checked2="checked";
        // 若 type 為 3，預選徵才資訊
        if ($row['type']==3)
            $checked3="checked";
        
        // 顯示修改表單，帶入原有資料
        echo "
        <html>
            <head><title>新增佈告</title></head>
            <body>
                // 表單送出到 bulletin 編輯處理程式
                <form method=post action=27.bulletin_edit.php>
                    // 隱藏佈告 ID
                    佈告編號：{$row['bid']}<input type=hidden name=bid value={$row['bid']}><br>
                    // 預設標題內容
                    標    題：<input type=text name=title value={$row['title']}><br>
                    // 預設內容
                    內    容：<br><textarea name=content rows=20 cols=20>{$row['content']}</textarea><br>
                    佈告類型：<input type=radio name=type value=1 {$checked1}>系上公告 
                            <input type=radio name=type value=2 {$checked2}>獲獎資訊
                            <input type=radio name=type value=3 {$checked3}>徵才資訊<br>
                    // 顯示原時間
                    發布時間：<input type=date name=time value={$row['time']}><p></p>
                    // 提交與清除按鈕
                    <input type=submit value=修改佈告> <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>
