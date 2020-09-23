<!DOCTYPE html>

<html>
   <head>
      <meta charset = "utf-8">
      <title>理髮店</title>
      <link rel = "stylesheet" type = "text/css" href = "haircut.css">
   </head>
   <body>
   <?php
      include "db_conn.php";
      $query = ("select * from barber");
      $stmt = $db->query($query);
      $barbers = $stmt->fetchAll();

      $query = ("select * from customer inner join vip on customer.customer_ID = vip.customer_ID");
      $stmt = $db->query($query);
      $vips = $stmt->fetchAll();

      $query = ("select * from customer left outer join hairstyle on customer.customer_ID = hairstyle.customer_ID");
      $stmt = $db->query($query);
      $customers = $stmt->fetchAll();
      //Barbers
      echo "<table>";
      echo "<caption>Barbers</caption>";
      echo "<tr>";
      echo "<td class='top'>barber_ID</td>";
      echo "<td class='top'>name</td>";
      echo "<td class='top'>gender</td>";
      echo "<td class='top'>phone</td>";
      echo "<td class='top'>salary</td>";
      echo "</tr>";
      for($i=0; $i<count($barbers); $i++){
         if($i%2==0) {
            echo "<tr>";
            echo "<td class='even'>".$barbers[$i]['barber_ID']."</td>";
            echo "<td class='even'>".$barbers[$i]['name']."</td>";
            echo "<td class='even'>".$barbers[$i]['gender']."</td>";
            echo "<td class='even'>".$barbers[$i]['cellphone']."</td>";
            echo "<td class='even'>".$barbers[$i]['salary']."</td>";
            echo "</tr>";
         }
         else {
            echo "<tr>";
            echo "<td>".$barbers[$i]['barber_ID']."</td>";
            echo "<td>".$barbers[$i]['name']."</td>";
            echo "<td>".$barbers[$i]['gender']."</td>";
            echo "<td>".$barbers[$i]['cellphone']."</td>";
            echo "<td>".$barbers[$i]['salary']."</td>";
            echo "</tr>";
         }
      }
      echo "</table>";
      //VIP
      echo "<table>";
      echo "<caption>VIP</caption>";
      echo "<tr>";
      echo "<td class='top'>customer_ID</td>";
      echo "<td class='top'>name</td>";
      echo "<td class='top'>gender</td>";
      echo "<td class='top'>VIP</td>";
      echo "<td class='top'>phone</td>";
      echo "<td class='top'>point</td>";
      echo "</tr>";
      for($i=0; $i<count($vips); $i++){
         if($i%2==0) {
            echo "<tr>";
            echo "<td class='even'>".$vips[$i]['customer_ID']."</td>";
            echo "<td class='even'>".$vips[$i]['name']."</td>";
            echo "<td class='even'>".$vips[$i]['gender']."</td>";
            if($vips[$i]['IsNotVIP']==1) echo "<td class='even'>Yes</td>";
            else echo "<td class='even'>No</td>";
            echo "<td class='even'>".$vips[$i]['telephone']."</td>";
            echo "<td class='even'>".$vips[$i]['point']."</td>";
            echo "</tr>";
         }
         else {
            echo "<tr>";
            echo "<td>".$vips[$i]['customer_ID']."</td>";
            echo "<td>".$vips[$i]['name']."</td>";
            echo "<td>".$vips[$i]['gender']."</td>";
            if($vips[$i]['IsNotVIP']==1) echo "<td>Yes</td>";
            else echo "<td>No</td>";
            echo "<td>".$vips[$i]['telephone']."</td>";
            echo "<td>".$vips[$i]['point']."</td>";
            echo "</tr>";
         }
      }
      echo "</table>";
      //Customers
      echo "<table>";
      echo "<caption>Customers</caption>";
      echo "<tr>";
      echo "<td class='top'>customer_ID</td>";
      echo "<td class='top'>name</td>";
      echo "<td class='top'>gender</td>";
      echo "<td class='top'>style</td>";
      echo "<td class='top'>shampoo</td>";
      echo "</tr>";
      for($i=0; $i<count($customers); $i++){
         if($i%2==0) {
            echo "<tr>";
            echo "<td class='even'>".$customers[$i]['customer_ID']."</td>";
            echo "<td class='even'>".$customers[$i]['name']."</td>";
            echo "<td class='even'>".$customers[$i]['gender']."</td>";
            echo "<td class='even'>".$customers[$i]['style']."</td>";
            echo "<td class='even'>".$customers[$i]['shampoo']."</td>";
            echo "</tr>";
         }
         else {
            echo "<tr>";
            echo "<td>".$customers[$i]['customer_ID']."</td>";
            echo "<td>".$customers[$i]['name']."</td>";
            echo "<td>".$customers[$i]['gender']."</td>";
            echo "<td>".$customers[$i]['style']."</td>";
            echo "<td>".$customers[$i]['shampoo']."</td>";
            echo "</tr>";
         }
      }
      echo "</table>";
   ?>
   </body>
</html>