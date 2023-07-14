<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
     <style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			min-height: 100vh;
		}
	</style>
     <script>
          function escapeHTML(input) {
               return input.replace(/</g, "&lt;").replace(/>/g, "&gt;");
          }

          function validateForm() {
               var message = document.getElementById("message").value;

              
               message = escapeHTML(message);

               
               document.getElementById("myForm").submit();
          }
     </script>
</head>
<body>
     <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
     <a href="logout.php">Logout</a>

     <?php if (isset($_GET['error'])): ?>
		<p><?php echo $_GET['error']; ?></p>
	<?php endif ?>

     <form id="myForm" action="upload.php" method="post" enctype="multipart/form-data">
          <label for="message">Entrez un message</label>  <br>
     	<input type="text" id="message" name="message" placeholder="message"><br>
           <input type="file" 
                  name="my_image">

           <input type="button" value="Upload" onclick="validateForm()">
     	
     </form>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
