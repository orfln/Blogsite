<?php
  
include"connect.php";

  $sql="SELECT ID FROM REPORTS";
  $result = $con->query($sql);
  $sql2="SELECT ID FROM COMMENTS";
  $result2 = $con->query($sql2);

  $repnum=$result->num_rows;
  $comnum=$result2->num_rows;

  echo "<h2>"."Тематичний блог на теми науки, мистецтва, подорожей, відпочинку\n"."</h2>";
  echo "\n";
  echo "<h2>"."Зараз на сайті ".$repnum." постерів"."</h2>";
  echo "<h2>"."До них подано ".$comnum." коментарів"."</h2>";
  
  $con->close();
?> 
