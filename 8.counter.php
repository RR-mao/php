<?php
    session_start();
    //如果沒有"counter" = 1
    if (!isset($_SESSION["counter"]))
        $_SESSION["counter"]=1;
    else
        //如果有就 + 1
        $_SESSION["counter"]++;
    
    echo "counter=".$_SESSION["counter"];
    //會轉到"9.reset_counter.php"來重製"counter"
    echo "<br><a href=9.reset_counter.php>重置counter</a>";
?>
