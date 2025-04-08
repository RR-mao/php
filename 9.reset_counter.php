<?php
    session_start();
    unset($_SESSION["counter"]);
    // 顯示重置成功訊息
    echo "counter重置成功....";
    // 設定2秒後跳轉到"8.counter.php"
    echo "<meta http-equiv=REFRESH content='2; url=8.counter.php'>";

?>
