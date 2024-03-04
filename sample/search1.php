<?php  
 $connect = mysqli_connect("localhost", "root", "", "dbSales");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM tblparty WHERE partyname LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li>'.$row["partyname"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '<li>partyname Not Found</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?>  