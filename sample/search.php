<?php  
 $connect = mysqli_connect("localhost", "root", "", "dbSales");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM tblproduct WHERE productname LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li>'.$row["productname"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '<li>Product Not Found</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?>  