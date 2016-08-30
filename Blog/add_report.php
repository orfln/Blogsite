<?php
  include"connect.php";

  /******************* Post number calculation ***********************/
  $result = $con->query("SELECT ID, DATE FROM REPORTS");
  $repnum=$result->num_rows;
      
  $dt=date("Y-m-d h:i:s"); 
  echo "$_POST[name]";
  $sql = "INSERT INTO REPORTS SET NAME='$_POST[name]', TITLE='$_POST[title]', CONTENT='$_POST[content]', DATE='$dt', 
	  COMNUM=0, LAST_COMMENT_DATE='0000-00-00 00:00:00'";
  $result = $con->query($sql);

  if (mysql_error($con)==0) {
      echo "Your report has been added!"."<br>";
      $repnum++;
      echo "Now ".$repnum." reports are submitted "."<br>";
    };
   
   
   while ($repnum>50) 
    {
      $aa=$con->query("SELECT ID FROM REPORTS ORDER BY DATE LIMIT 1");
      $row_aa=$aa->fetch_assoc();
      //echo "1 OLDEST REPORT IS DELETED"."<br>";
      // *** Delete all comments on this report ***
      $id=$row_aa["ID"];
      $bb=$con->query("DELETE FROM COMMENTS WHERE REPORT_ID=$id");
      $con->query("DELETE FROM REPORTS ORDER BY DATE LIMIT 1");
      $repnum--;
      echo "1 OLDEST REPORT IS DELETED"."<br>";
    };

  $con->close();
?> 
