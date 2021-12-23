<?php 
    include("config.php");
    if(isset($_POST['import'])){
          $file_name = $_FILES['csv']['tmp_name'];
          if($_FILES['csv']['size']>0){
                  $file = fopen($file_name, "r");
                  while(($data = fgetcsv($file,10000,",")) !== FALSE){
                  	$name = $data[1];
                  	$email = $data[2];
                  	$number = $data[3];
                      $query_1 = mysqli_query($conn,"INSERT INTO csv_data (Name,Email,Phone) VALUES ('$name','$email','$number')") or die(mysqli_error($conn));
                      if($query_1){
                      	    echo "<h4 style='color:green;'>CSV Impoted Successfully.</h4>";
                      }else{
                      	echo"";
                      }
                  }
                    fclose($file);  
          }
    }
 
  // The code the exporting the table for DB to the csv form //

  if(isset($_POST['export'])){
       
          header('Content-Type: text/csv; chartset=utf-8');
          header('Content-Disposition: attachment; filename=data.csv');
          $output = fopen("php://output","w");
          fputcsv($output,array('ID','Name','Email','Phone'));
          $query_2 = mysqli_query($conn,"SELECT * FROM csv_data") or die(mysqli_error($conn)); 
          while($row = mysqli_fetch_assoc($query_2)){
                fputcsv($output,$row);
          }  
          fclose($output);
  }    


?>