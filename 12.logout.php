<?php

    // 啟動 Session 功能，這樣才能操作 $_SESSION 變數
    session_start();

    // 使用 unset() 函數刪除 Session 中的 "id"，相當於登出這個使用者
    unset($_SESSION["id"]);

    // 顯示登出成功的訊息給使用者
    echo "登出成功....";

    // 使用 HTML meta 標籤，在 3 秒後自動導向回登入頁面 2.login.html
    echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";

?>
