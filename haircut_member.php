<!DOCTYPE html>

<html>
   <head>
      <meta charset = "utf-8">
      <title>理髮店</title>
      <link rel = "stylesheet" type = "text/css" href = "haircut.css">
      <script type="text/javascript">
         var number;
         var result;

         function setup() {
            var loginButton = document.getElementById("loginButton");
            loginButton.addEventListener("click", login, false);
         }

         //login
         function login() {
            var customerName = document.getElementById("customerName")
            var name = customerName.value;

            <?php
               include "db_conn.php";
               $query = ("SELECT name, customer_ID FROM customer");
               $stmt = $db->query($query);
               $result = $stmt->fetchAll();
            ?>

            number = <?php echo count($result)?>;
            result = <?php echo json_encode($result)?>;
            var pass = 0;
            for(i=0;i<number;i++){
               if(result[i]["name"] == name) {
                  document.location.href=("http://localhost:8888/haircut_memberZone.php?id="+result[i]["customer_ID"]);
                  pass = 1;
               }
            }
            if(pass==0) window.alert("Oops! Can't find your name.");
         }

         //join
         function joinUs() {
            var name = document.forms["join"]["customerName"].value;
            var gender = document.forms["join"]["customerGender"].value;

            <?php
               include "db_conn.php";
               $query = ("SELECT name FROM customer");
               $stmt = $db->query($query);
               $result = $stmt->fetchAll();
            ?>

            var number = <?php echo count($result)?>;
            var result = <?php echo json_encode($result)?>;
            for(i=0; i<number; i++){
               if(result[i]["name"] == name) {
                  window.alert("Already a member!");
               }
            }
         }
      </script>
   </head>
   <body onload="setup()">
      <h1>Log In</h1><br>
      <p>Name: </p><input id="customerName" type="text">
      <input id="loginButton" type="button" value="submit"><br>

      <h1>Join us</h1><br>
      <form name="join" action="haircut_member.php" method="post" onsubmit="joinUs()">
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
      <div style="display: none">
         <?php
            include "db_conn.php";
            $query = ("SELECT name FROM customer");
            $stmt = $db->query($query);
            $result = $stmt->fetchAll();

            $id = 20001+count($result);
            $customerName = $_POST["customerName"];
            $customerGender = $_POST["customerGender"];
            $barber = $_POST["barber"];
                  
            $query = "INSERT INTO customer (customer_ID, name, telephone, IsNotVIP, gender, barber_ID) VALUES ('".$id."', '".$customerName."', NULL, NULL, '".$customerGender."', '".$barber."');";
            $stmt = $db->query($query);
            header("http://localhost:8888/haircut_memberZone.php?id="+$id);
         ?>
      </div>
   </body>
</html>