<?php
echo "<ul class='pagination'>";

if($page>1){
    echo "<li><a href='{$page_url}' title='Go To First.'>";
        echo "First page";
    echo "</a></li>";
}

$total_pages = ceil($total_rows / $records_per_page);

$range = 2;

$initial_num = $page - $range;
$condition_limit_num = ($page + $range)  + 1;
 
for ($x=$initial_num; $x<$condition_limit_num; $x++) {

    if (($x > 0) && ($x <= $total_pages)) {

        if ($x == $page) {
            echo "<li class='active'><a href=\"#\">$x <span class=\"sr-only\">(current)</span></a></li>";
        } 

        else {
            echo "<li><a href='{$page_url}page=$x'>$x</a></li>";
        }
    }
}

if($page<$total_pages){
    echo "<li><a href='" .$page_url. "page={$total_pages}' title='Last Page {$total_pages}.'>";
        echo "Last";
    echo "</a></li>";
}
 
echo "</ul>";
?>