<?php
include("functions.php");
$obj = new admin_post();

$id = $_SESSION['user_sms_id'];
$name =$_SESSION['user_sms_name'];

if(!isset($id)){
  header("location:login.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
     <div class='container'>
    <div class='inbox'>
      <aside>
        <ul ng-controller='chatCtrl as chat'>
          <div ng-repeat='chat in chats'>
            <?php
            
            $row = $obj->chat_data_row();
            while($rows = mysqli_fetch_assoc($row)){
              
              ?>
            <li>
              <p class='username'>
                <?php echo $rows['username'];?>
              </p>
            </li>
         
              <?php
            }
            ?>
         
          </div>
        </ul>
      </aside>
      <main ng-controller='chatCtrl as chat'>
        <div class='loader'>
          <p></p>
          <h4>Loading</h4>
        </div>
        <!-- Set A Ng Repeat For Our Messages || Check To See If Our Value (Which Is Set Via Ng Click) Is Equal To The Id Of The Message List We Want To Show -->
        <div class='message-wrap'>
          <!-- Repeat Each Item In The Array Seperately -->
         
            <?php

            $smslist = $obj->chat_data_sms_show_user();
            while($smslists = mysqli_fetch_assoc($smslist)){
                ?>
                 <div class='message'>
                  <span style="font-size:10px;"><?php echo $smslists['user_sms_name'];?></span>
                  <p><?php echo $smslists['sms_text'];?></p>
                  </div>
                <?php
            }

            ?>
            
            
          
        </div>
        <footer>
            <?php
                if(isset($_POST['sms_submit'])){
                    $obj->chat_data_insert($_POST,$id,$name);
                }
            ?>

          <form action="" method="post">
            <input ng-model='text' required name="user_sms" placeholder='Enter a message' type='text'>
            <input name="sms_submit" type='submit' value='Send'>
          </form>
        </footer>
      </main>
    </div>
  </div>
  <script>



  </script>
</body>

</html>

