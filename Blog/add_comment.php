<?php

  include"connect.php";

  $dt=date("Y-m-d h:i:s"); 
  echo $dt; 
  
  $report_id=$_GET[r_id];
  echo $report_id;

  $sql = "INSERT INTO COMMENTS SET REPORT_ID='$report_id', NAME='$_POST[name]', CONTENT='$_POST[content]', DATE='$dt';";
  $result = $con->query($sql);

  $sql2 = "UPDATE REPORTS SET LAST_COMMENT_DATE='$dt' WHERE ID=$report_id;";
  $result = $con->query($sql2);
  echo "***************************";
  /*if ($result->num_rows > 0) {
  // виводимо дані кожного рядка таблиці
  while($row = $result->fetch_assoc()) {
  echo "id: " . $row["ID"]. " - Name: " . $row["NAME"]. " " . $row["CONTENT"]. " <br>";
    }
    } else {
  echo "0 results";
  }
  */
  $con->close();
?> 
