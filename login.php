<?php
include("functions.php");
$obj = new admin_post();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
<style>
    input#exampleFormControlInput1 {
    width: 264px;
    height: 57px;
}
</style>
</head>

<body>

    <div class='container'>
    <?php
        
        if(isset($_POST['submit_login'])){
            $obj->chat_data_read($_POST);
        }
        
        ?>
        <div class="row">
            <div class="col-xl-6">
            <form action="" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" name="user_name" id="exampleFormControlInput1"
                    >
            </div>
           
                
                <input type="submit" class="form-control" value="Login" name="submit_login" id="exampleFormControlInput1"
                    >
           
            </form>
            </div>
        </div>
       
            
          
       
    
    </div>
    <script>



    </script>
</body>

</html>