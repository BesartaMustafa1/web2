<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Send Email</title>
   <style>
      body {
         display: flex;
         justify-content: center;
         align-items: center;
         height: 100vh;
         margin: 0;
         color: #F5F5DC;
      }

      .background {
         position: fixed;
         top: 0;
         left: 0;
         width: 200%;
         height: 100%;
         background-size: contain;
         background-image: url('emailbg.jpg');
      }

      .form-container {
         width: 400px;
         padding: 40px;
         border: 1px solid #ccc;
         border-radius: 10px;
         z-index: 2; 
      }

      .form-container input[type="email"],
      .form-container input[type="text"] {
         width: 100%;
         padding: 10px;
         margin-bottom: 10px;
         box-sizing: border-box;
      }

      .form-container button {
         width: 100%;
         padding: 10px;
         background-color: #007bff;
         color: #fff;
         border: none;
         border-radius: 5px;
         cursor: pointer;
      }

      .form-container button:hover {
         background-color: #0056b3;
      }
   </style>
</head>
<body>
   <div class="background"></div>
   <div class="form-container">
   <h2>Contact</h2>
      <form action="mail.php" method="post">
         Email <input type="email" name="email" value=""> <br><br>
         Subject <input type="text" name="subject" value=""><br><br>
         Message <input type="text" name="message" value=""> <br><br>
         <button type="submit" name="send">Send</button>
      </form>
   </div>
</body>
</html>
