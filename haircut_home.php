<!DOCTYPE html>

<html>
   <head>
      <meta charset = "utf-8">
      <title>?†é«®åº?/title>
      <link rel = "stylesheet" type = "text/css" href = "haircut.css">
      <script type="text/javascript">
         var board;
         var i, j;
         var customer_num = 0;
         var barber_num = 0;

         function main() {
            board = document.getElementById("board");
            board.src = "images\\front.jpg";
         }
         
         function barbers() {
            board.src = "http://localhost:8888/haircut_barber.php";
         }

         function member() {
            board.src = "http://localhost:8888/haircut_member.php";
         }

         function password() {
            var answer = window.prompt("Please enter the password: (87)");
            if(answer == "87") manager();
            else { 
               window.alert("Wrong password")
               main();
            }
         }
         function manager() {
            board.src = "http://localhost:8888/haircut_manager.php";
         }

      </script>
   </head>
   <body onload="main()">
      <table>
         <td onclick="main()" class="topic">Home</td>
         <td onclick="barbers()" class="topic">Barbers</td>
         <td onclick="member()" class="topic">Log In</td>
         <td style="color: black;background-color: gray;border: 1px black solid;" onclick="password()">Manager</td>
      </table>
      <iframe width="100%" height="900px" id="board"></iframe>
   </body>
</html>