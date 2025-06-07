<?php
    // 關閉錯誤訊息
    error_reporting(0);
    // 啟用 Session
    session_start();

    // 檢查是否登入
    if (!$_SESSION["id"]) {
        // 提示未登入
        echo "please login first";
        // 3 秒後導向登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
        // 顯示新增佈告表單 HTML
        echo "
        <html>
            <head><title>新增佈告</title></head>
            <body>
                // 表單送出至 bulletin_add.php
                <form method=post action=23.bulletin_add.php>
                
                    // 輸入標題欄位
                    標    題：<input type=text name=title><br>

                    // 輸入內容
                    內    容：<br><textarea name=content rows=20 cols=20></textarea><br>

                    // 單選佈告類型
                    佈告類型：<input type=radio name=type value=1>系上公告 
                            <input type=radio name=type value=2>獲獎資訊
                            <input type=radio name=type value=3>徵才資訊<br>
                            
                    // 選擇日期
                    發布時間：<input type=date name=time><p></p>

                     // 送出與重設按鈕
                    <input type=submit value=新增佈告> <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>
