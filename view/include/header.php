<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="client/public/reset.css">

  <link rel="stylesheet" href="client/public/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="client/public/font-awesome/css/all.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/wafynfll6yk0et81pwlvcwdx6r76d4pl4gy3397p9126dmzm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="client/public/js/main.js"></script>

</head>



          <?php 
            if(isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == false || empty($_SESSION['isLogin'])){
              ?>
                <button id="sign_in" class="btn" style="background:#203ace; margin-right: 3px; height: 40px; margin-top: 10px;"><a href="<?php echo HEADERLINK."/user";?>" style="color: white;">LOGIN</a></button>
                <button id="sign_in" class="btn" style="background:#203ace; height: 40px; margin-top: 10px;"><a href="<?php echo HEADERLINK."/user/register";?>" style="color: white;">REGISTER</a></button>
              <?php
            }
          ?>
          
        </div>
      </div>