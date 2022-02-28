

<?php

 include ("pages.php");

      ?>
      <title>My Password</title>

</head>
     <div id="content">


<?php 
         if(isset($_POST['username'])){ $username = $_POST['username']; }
        if(isset($_POST['password'])){ $password = $_POST['password']; }
?>
  <h1 class="alert alert-warning" style="font-size:23px;border-radius: 20px 20px 20px 20px;
 border:1px solid gray;width:100%;">
  <span class="warn warning">&#9888;</span> As your Password is 123

  please change your password and logout then login to continue  using the WFT</h1>

<br>
<div class="signup-form">
        
    <form  method="post"style="box-shadow: 10px 10px 5px #aa4d9c;
    width:70%;margin-left:12%;padding-bottom: 23px;padding-left:-30px; border-radius: 20px 20px 20px 20px;
     background-color:#46428f;opacity:0.6;">
        <h2 style="padding-top:3.5%; color:white;font-size:25px; margin-left:20px; font-weight:bold;">Change Password</h2>
        <br>
         <div class="row mb-4">

    <div class="col-md-4">
      <div class="input-group">
        <input type="text" id="form6Example1" name="username" class="form-control username" placeholder="username" value="<?php echo $_SESSION["username"];?>" readonly="true" />
        <label class="form-label" for="form6Example1"></label>
      </div>
    </div>

    <div class="col-md-8">
    <div class="input-group">
  <span class="input-group-text" id="dates basic-addon1">Password</span>
  <input type="text" class="form-control" name="password" placeholder="Password" required 
    value="<?php echo $_SESSION["password"];?>"
    aria-describedby="basic-addon1" required/>
</div>
 </div>
  </div>

         <!--input type="submit" name="save" value="Save" style=" 
         background: linear-gradient(to bottom, #000066 0%, #660066 100%);margin-left:10%;
         border-radius: 50%; width:100px;height:100px; color:white; margin-top:-30px;font-size:16px; font-weight:bold;"-->

         <center>
<button type="submit" name="save" value="Save"  class="btn btn-warning submit"style="width: 30%;padding: 10px;color: #fff;font-size: 15px; border-radius: 20px 20px 20px 20px;background: linear-gradient(to bottom, #000066 0%, #660066 100%);">
  Save
</button>
</center>


  <br>
  <br>

  <!-- test >
  <div class="row g-3 align-items-center">
  <div class="form-outline col-auto">
    <input
      type="password"
      id="formTextExample2"
      class="form-control"
      aria-describedby="textExample2"
    />
    <label class="form-label" for="formTextExample2">Password</label>
  </div>
  <div class="col-auto">
    <span id="textExample2" class="form-text"> Must be 8-20 characters long. </span>
  </div>
</div>
  <test -->

<?php
     //if (isset($_GET['id'])) { $id = $_GET['id']; }
$s_username = $_SESSION['username'];
  if(isset($_POST['username'])){$username = $_POST['username'];}

$checks = sqlsrv_query( $con ,"SELECT * FROM [employee] WHERE [username] = '$s_username'");
//$output = $check->fetch_array();
$output = sqlsrv_fetch_array($checks);
$orders_num = 1;
?>

<?php

$s_username = $_SESSION['username'];

if(isset($_POST['save']))
{
  if(isset($_POST['username'])){$username = $_POST['username'];}
  if(isset($_POST['password'])){$password = $_POST['password'];}
  if(isset($_POST['role_id'])){$role_id = $_POST['role_id'];}
  if(isset($_POST['manager_id'])){$manager_id = $_POST['manager_id'];}
  $checkme = sqlsrv_query( $con ,"SELECT * FROM [employee] where id = '$self' ");
$output = sqlsrv_fetch_array($checkme );
$Unit_Name = $output['Unit_Name'];
$username_id = $output['id'];
   echo $username_id ;

// insert 
$username_update = $_SESSION['username'];
  $creation_time = date ("Y-m-d h:i:s");
  //insert old
  $insertqry = sqlsrv_query( $con ,"INSERT INTO [Aya_Web_APP].[dbo].[employee_demo] 
     SELECT * ,'$s_username','$creation_time' from employee where [id] ='$username_id' ");
 //sqlsrv_query($con ,
  //update new
$update_query =sqlsrv_query($con ,"UPDATE employee SET [password] = '$password' , [updated_by] = '$username_update' , 
    [creation_time]='$creation_time' WHERE [username] = '$username_update' and id ='$username_id' ");
  if($update_query){
     echo '"<script> window.onload = function() {
     swal("Your Password has been Changed");}; 
 </script>"';
  }else{ echo '<script> window.onload = function() {
     swal("Error");}; 
 </script>"';}
}
?>
  </form>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
  //swal("Sign done");

 /* swal({
  title: "Good job!",
  text: "You clicked the button!",
  icon: "success",
  button: "Aww yiss!",
});*/
</script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>

        <?php
 include ("footer.html");
 ?>
