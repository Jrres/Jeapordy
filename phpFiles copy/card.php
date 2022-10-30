    <?php
    function card($val,$i){
    echo "<div class='Link'><td class='flip-card'><a href='question.php?qnum=$i'>{$val}</a></td></div> ";
    }
    function crit($criteria){
        echo "<div ><td class='flip-card'>{$criteria}</td></div>";
    }
    ?>