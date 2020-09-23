<!DOCTYPE html>

<html>
   <head>
      <meta charset = "utf-8">
      <title>理髮店</title>
      <link rel = "stylesheet" type = "text/css" href = "haircut.css">
      <script type="text/javascript">
         var i=0;
         function edit() {
            if(i==0) {
               document.getElementById("edit").style.display = "block";
               i=1;
            }
            else {
               document.getElementById("edit").style.display = "none";
               i=0;
            }
         }
      </script>
   </head>
   <body>
      <?php
         include "db_conn.php";
         $id = $_GET["id"];
         $query = ("SELECT * FROM customer WHERE customer_ID = ".$id);
         $stmt = $db->query($query);
         $customers = $stmt->fetchAll();

         $query = ("SELECT name FROM barber WHERE barber_ID = ".$customers[0]["barber_ID"]);
         $stmt = $db->query($query);
         $barbers = $stmt->fetchAll();
         
         echo "<p>Hello! ".$customers[0]["name"]."</p>";
         echo "<p>id: ".$customers[0]["customer_ID"]."</p>";
         echo "<p>Gender: ".$customers[0]["gender"]."</p>";
         echo "<p>Barber: ".$barbers[0]["name"]."</p>";
      ?>
      <input type="button" name="edit" value="edit" onclick="edit()">
      <div id="edit" style="display: none">
         <form name="join" action="haircut_memberZone.php" method="post" onsubmit="joinUs()">
         <p>Name: </p><input name="customerName" type="text"><br>
         <p>Gender: </p>
         <input name="customerGender" type="radio" value="M" required>Male 
         <input name="customerGender" type="radio" value="F" required>Female<br>
         <p>Barber: </p>
         <select name="barber">
            <?php
               include "db_conn.php";
               $query = ("SELECT * FROM barber");
               $stmt = $db->query($query);
               $result = $stmt->fetchAll();

               for($i=0; $i<count($result); $i++){
                  echo "<option value=".$result[$i]['barber_ID'].">".$result[$i]['name']."</option>";
               }
            ?>
         </select><br><br>
         <input type="submit" value="submit">
      </form>
      </div>
   </body>
</html>