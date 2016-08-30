<?php
  include"connect.php";

  // ***** Calculate Comments Number ******  
  $sql = "SELECT ID, COMNUM FROM REPORTS";
  $result = $con->query($sql);
  while($row = $result->fetch_assoc()) 
    {   
      $report_id=$row["ID"];
      $result_comments = $con->query("SELECT * FROM COMMENTS WHERE REPORT_ID=$report_id");
      $report_num=0;
      while($row_ = $result_comments->fetch_assoc()) 
	{
	  $report_num++;
	};
	
      $aa=$con->query("UPDATE REPORTS SET COMNUM=$report_num where ID=$report_id");
      //echo "Report_id=".$report_id."     Report_num=  ".$report_num."<br>";
    };
    
  // ***** Ordering by last comment date *****
  $sql = "SELECT * FROM REPORTS WHERE COMNUM<30 ORDER BY LAST_COMMENT_DATE DESC, DATE DESC";
  $result = $con->query($sql);
  while($row = $result->fetch_assoc()) {
  if ($result->num_rows > 0) {
// виводимо дані кожного рядка таблиці

  echo "id: " . $row["ID"]. " - Name: " . $row["NAME"]. '&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.
      "Comments: ".$row["COMNUM"]."<br>"."<br>".
      $row["CONTENT"]. "<br>". "<br>"."Date: " .$row["DATE"]." (". strtotime($row["DATE"]).") ".'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.
      "<a href=\"outputone.php?id=".$row["ID"]."\">Переглянути коментарі</a>"."<br>"."Коментарів: ".$row["COMNUM"]."<br>"."<br>"."<br>";
    }
   else {
	  echo "0 results";
	}
    };
  $sql = "SELECT * FROM REPORTS WHERE COMNUM>=30 ORDER BY LAST_COMMENT_DATE DESC, DATE";
  $result = $con->query($sql);
  while($row = $result->fetch_assoc()) {
  if ($result->num_rows > 0) {
// виводимо дані кожного рядка таблиці

  echo "id: " . $row["ID"]. " - Name: " . $row["NAME"]. '&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.
      "Comments: ".$row["COMNUM"]."<br>"."<br>".
      $row["CONTENT"]. "<br>". "<br>"."Date: " .$row["DATE"]." (". strtotime($row["DATE"]).") ".'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.
      "<a href=\"outputone.php?id=".$row["ID"]."\">Переглянути коментарі</a>"."<br>"."Коментарів: ".$row["COMNUM"]."<br>"."<br>"."<br>";
    }
   else {
	  echo "0 results";
	}
    };
  //vyvid();


  //function vyvid(){
  /*
  while($row = $result->fetch_assoc()) {
  if ($result->num_rows > 0) {
// виводимо дані кожного рядка таблиці

  echo "id: " . $row["ID"]. " - Name: " . $row["NAME"]. '&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.
      "Comments: ".$row["COMNUM"]."<br>"."<br>".
      $row["CONTENT"]. "<br>". "<br>"."Date: " .$row["DATE"]." (". strtotime($row["DATE"]).") ".'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.
      "<a href=\"outputone.php?id=".$row["ID"]."\">Переглянути коментарі</a>"."<br>"."Коментарів: ".$row["COMNUM"]."<br>"."<br>"."<br>";
    }
   else {
	  echo "0 results";
	};
    };
    */
  //};
  //echo "</textarea>";
$con->close();
?> 

<html>
  <body>
    <?php echo $myresult ['textpage']; ?>
  </body>
</html>
