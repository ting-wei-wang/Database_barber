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
         $query = ("SELECT * FROM barber");
         $stmt = $db->query($query);
         $result = $stmt->fetchAll();
         
         echo "<table>";
         echo "<caption>Barbers</caption>";
         echo "<tr>";
         echo "<td class='top'>barber_ID</td>";
         echo "<td class='top'>name</td>";
         echo "<td class='top'>gender</td>";
         echo "<td class='top'>phone</td>";
         echo "<td class='top'>salary</td>";
         echo "</tr>";
   

         for($i=0; $i<count($result); $i++){
            if($i%2==0) {
               echo "<tr>";
               echo "<td class='even'>".$result[$i]['barber_ID']."</td>";
               echo "<td class='even'>".$result[$i]['name']."</td>";
               echo "<td class='even'>".$result[$i]['gender']."</td>";
               echo "<td class='even'>".$result[$i]['cellphone']."</td>";
               echo "<td class='even'>".$result[$i]['salary']."</td>";
               echo "</tr>";
            }
            else {
               echo "<tr>";
               echo "<td>".$result[$i]['barber_ID']."</td>";
               echo "<td>".$result[$i]['name']."</td>";
               echo "<td>".$result[$i]['gender']."</td>";
               echo "<td>".$result[$i]['cellphone']."</td>";
               echo "<td>".$result[$i]['salary']."</td>";
               echo "</tr>";
            }
         }
         echo "</table>";
      ?>
         </table>>
   </body>
</html>