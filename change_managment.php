
 <?php
        require_once("inc/config.inc");
        
  if($_SESSION['username'] == ''){ header("location: index.php"); }
      if(isset($_GET['logout'])){ session_destroy(); header("location: index.php"); }

      $self = $_SESSION['id'];
      $role_id = $_SESSION['role_id'];

 
 $ticket_table ="";
 $id_leave ="";
   if(isset($_POST['ticket_table'])){$ticket_table = $_POST['ticket_table'];}
   if (isset($_POST['Request_ID'])) { $id_leave = $_POST['Request_ID'];}


      ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="imag/logo.jpg">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Update Change Management</title>
    <!-- Bootstrap CSS CDN -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap2.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap2.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">

<link rel="stylesheet" href="css/style4.css">

</head>
<body>
       
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>WFM </h3>
                <strong>WFM</strong>
            </div>

            <ul class="list-unstyled components">
              
                <li>
                    <!--a href="senior_home.php">
                    <i class="fas fa-home"></i>
                        Home
                    </a-->
            <?php
            if($_SESSION['role_id'] == 0) {
              echo'<li class="active">
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-copy"></i>
                        Create new
                    </a>
                    <li>
                    <a href="senior_home.php">
                    <i class="fas fa-home"></i>
                        Home
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">

                     <li>
                           <a href="leaves2.php">Create New leaves</a>
                        </li>
                        <li>
                            <a href="deductions2.php">Create Deduction Complain</a>
                        </li>
                        <li>
                            <a href="create_task2.php">Create New Task</a>
                        </li>
                        
                    </ul>
                </li>';}?>

                  <?php 
                  /*
                if($_SESSION['username'] == 'y_test'){
                  echo '             
                   <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"style="background-color:#82b74b;">
                    <i class="fas fa-copy"></i>
                   Ticketing Pages
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="ticketing_sys.php">Creat ticket</a>
                    </li>
                    <li>
                        <a href="view_my_ticket.php">View ticket</a>
                    </li>
                  
                </ul>
            </li>';} */?>

           <?php
	if(($_SESSION['role_id'] == 1) || ($_SESSION['role_id'] == 2) || ($_SESSION['role_id'] == 3) || ($_SESSION['role_id'] == 4)){
          echo'

          <li class="active">
                    <a  href="senior_home.php">
                    <i class="fas fa-home"></i>
                        Home
                    </a>

  <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"style="background-color:#82b74b;">
                    <i class="fas fa-copy"></i>
                   Ticketing Pages
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="ticketing_sys.php">Create ticket</a>
                    </li>
                    <li>
                        <a href="view_my_ticket.php">View ticket</a>
                    </li>
                  
                </ul>
            </li>


                    
                  <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-briefcase"></i>
                        Open Me
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="in_and_out2">Sign Log History view</a>
                        </li>
                        <li>
                            <a href="utilizationadmin2">Utilization</a>
                        </li>
                        <li>
                            <a href="alldeduction2">Deduction History view</a>
                        </li>
                        <li>
                            <a href="scheduleadmin2">Schedule view</a>
                        </li>
                        <li>
                            <a href="employee_info2.php">Employee view</a>
                        </li>
                    </ul>
                </li>
                 <li>
                    <a href="allstatus2">
                        <i class="fas fa-copy"></i>
                        All views
                    </a>
                </li>
                <li>
                    <a href="create_task2.php">
                        <i class="fas fa-tasks"></i>
                        Create Task
                    </a>
                </li>
                <li>
                            <a href="employee_info2.php"><i class="fas fa-users"></i>Employee view</a>
                        </li>
                <li>
                    <a href="welcomeadmin2.php" >
                        <i class="fas fa-copy"></i>
                        Check request
                    </a>
                </li>


            ';}?>

                      <?php
        if($_SESSION['role_id'] == 0) {
          echo'
                  <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-briefcase"></i>
                        View History
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="signview2.php">Sign Log History view</a>
                        </li>
                        <li>
                            <a href="leavesview2.php">leaves History view</a>
                        </li>
              
                        <li>
                            <a href="deductionview2">Deduction History view</a>
                        </li>
                         <li>
                    <a href="welcomeadmin2.php">
                        <i class="fas fa-copy"></i>
                        Tasks History view
                    </a>
                </li>
                      
                    </ul>
                </li>';}?>
                
                      <?php
        if($_SESSION['role_id'] == 0){
echo'<li>
                    <a href="utilization2.php">
                        <i class="fas fa-image"></i>
                        My utilization
                    </a>
                </li>
                <li>
                    <a href="schedule2.php">
                        <i class="fas fa-copy"></i>
                        My schedule
                    </a>
                </li>';}?>
  <li ><a  style="color: #6666;" href="edit_password2.php"><span class="glyphicon glyphicon-user"></span>Change Password</a></li>

    
<?php 
  if(($_SESSION['role_id'] == 1) || ($_SESSION['role_id'] == 2) || ($_SESSION['role_id'] == 3) || ($_SESSION['role_id'] == 4) || ($_SESSION['role_id'] == 0)  ){
$engineer_id = $_SESSION['id'];

$check_engineers = sqlsrv_query( $con ,"SELECT * FROM employee WHERE id  = 482 ");
while ( $output_engineers = sqlsrv_fetch_array($check_engineers)){
  //$output_engineers = $check_engineers->fetch_array()){
  $engineers_id = $output_engineers['id'];
  
  $check_orders = sqlsrv_query( $con ,"SELECT * FROM chat_box WHERE [send_to] = '$engineers_id'" , array() , array('Scrollable' =>'static') );
  $orders_num = sqlsrv_num_rows($check_orders);
  $sqltime = date ("Y-m-d H:i:s");
     $time =['when_time'];

 
  $check_orders2 = sqlsrv_query( $con ,"SELECT * FROM chat_box WHERE [send_from] = '$engineers_id'" , array() , array('Scrollable' =>'static') );
  $orders_num2 = sqlsrv_num_rows($check_orders2);

  //$max = $orders_num2 - $orders_num;
   if($max = $orders_num2 >= $orders_num ){
  echo'<label class="glyphicon glyphicon-bell" align="center"style="color:#FBBC05;font-size:22px;  height: 35px;text-align:center;
  width: 35px;border-radius: 60%;"></label>' ;}

 $rows ="<tr>";
  $rows.=$max."<td style='border: 1px solid gray;font-size:13px;background-color:#eee;'>".$output_engineers['username']."</td>";
 
 $rows.="<div id='myDIV' style=' padding: 10px;'>
  <a style='color:black;'href='chating2.php?engineer_id=".$engineers_id."'>Chat</a></li></div>";
        
      '<div id="myDIV" style=" padding: 9px;margin-left:-6%;">
  <li class="img-circle" style="color:#1e7145; font-size: 22px;margin-left:-6%;"><a style="color:#2A4B7C;margin-left:28%;" href="chating2.php?engineer_id=482"'.$engineers_id.'">Chat</a></li></div>';
  $rows.="</tr>";
}
}
?>
    
<style> 
#myDIV {
  -webkit-animation: mymove 5s infinite;
  animation: mymove 2s infinite;
}

@-webkit-keyframes mymove {
  20% {text-shadow: 2px 5px 10px red;}
}

@keyframes mymove {
  70% {text-shadow: 2px 5px 10px red;}
}
</style>
  
<?php
echo'    <li >
             <a id="myDIV"  href="chating2.php?engineer_id='.$engineers_id.'">
               <i class="fas fa-paper-plane"></i>
               Contact</a></li>';
     if($_SESSION["role_id"] == 0){ 
     echo'   <hr>        
    <li class="nav-item" style="margin-left:-5%;">
      <a id="myDIV" class="nav-link" href="pmreports2.php">
  <img src="imag/graph+infographic.png" style="margin-bottom: 1rem;width: 30px;margin-bottom: 1px;">
My Reports<span class="sr-only">(current)</span></a>
</li>
</ul>';}?>

      <li><a href="?logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>

            <ul class="list-unstyled CTAs">
                <!--li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li-->
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <!--span>Toggle Sidebar</span-->
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul><img src="imag/logo.jpg" style="padding: 1px; padding-bottom: 1px; margin-right: 1px; padding-top: 1px; padding-left: 1px; width: 25px; margin-bottom: 3px; "><span style="font-size:15px;font-family: Century Gothic; margin-right: 1px; ">WorkForce Managment Tool</span></ul> 
                        <ul class="nav navbar-nav ml-auto">
                            <?php 

if (isset($_SESSION['id'])) { $aya = $_SESSION['id']; }
$checkme = sqlsrv_query( $con ,"SELECT * FROM [employee] WHERE [id] = '$aya'");
$output = sqlsrv_fetch_array($checkme );
$Unit_Name = $output['Unit_Name'];
$manager_id = $output['manager_id'];
      ?>
 <li ><a href="#" style="font-size: 9.5px;"><span class="glyphicon glyphicon-user"></span> login as <samp>:</samp>
        <?php echo $_SESSION["username"];?><h6 style="color: orange;font-size: 10px;text-align: justify;text-indent: 10px;letter-spacing: -.5px;line-height: 0.8;" >Unit:<?php echo $output["Unit_Name"];?></h6></a></li>
                            <!--li class="nav-item active">
                                <a class="nav-link" href="#">Page</a>
                            </li!-->
                           
<li><a href="?logout"><span class="glyphicon glyphicon-log-in "></span> Logout</a></li>

                        </ul>

                    </div>
                </div>
            </nav>

<style>
  body{
       /* background-color:  #eee;*/
        font-family: "Roboto", sans-serif;
    }

    .signup-form form{
        color: #999;
        margin-bottom: 5px;
        background: #eee;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 3px;

    }
     .signup-form{
        width: 500px;
        margin: 0 auto;
        padding: 20px 0 ;
        font-size: 20px;

    }
    .signup-form .hint-text{
        color: #999;
        margin-bottom:2px;
        text-align: center;
        box-shadow: 0 15px 25px #8a7f8d;

    }
      .grhdr {
    background-image: -moz-linear-gradient(top, #fafafa,#f3f3f3); padding: 15px;
    height: 64px;background-color: #e0e6e2;margin-top:0.1%;font-size: 35px;
  }
.button {
  font-size: 1em;
  padding: 10px;
  color: #fff;
  border: 2px solid #06D85F;
  border-radius: 20px/50px;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.3s ease-out;
}
.button:hover {
  background: #06D85F;
}

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}

.popup {

  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  border-radius: 5px;
  width: 100%;
  position: fixed;
  background: rgba(0, 0, 0, 0.7);
}
.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}

.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  background-color: #eee;
  width: 39%;
  margin: 200px 0 10px 30%;
  text-align: center;
  padding: 45px;
  border: 2px solid rgba(0, 0, 10, 0.7);
  border-radius: 20px/50px;
  font-size: 40px;
  color: black;
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  
  .popup{
    width: 70%;
  }
}

input[type="submit"]:hover{
  background: #2A6881;
  -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
  -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
  box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
}
 input[type="submit"]{
  margin-left:37%; background-color: #7386D5;color: #eee;width: 25%;padding: 10px;

  border: 2px solid #fff;
  border-radius: 20px/50px;
  background-clip: padding-box;
  text-align: center;
  font-size: 25px;
}
.btn-circle {
  width: 45px;
  height: 45px;
  line-height: 45px;
  padding: 0;
  border-radius: 50%;
  margin-left:37%;
}

.btn-circle i {
  position: relative;
  top: -1px;
  margin-left:37%;
}
.btn-circle-xl {
  width: 70px;
  height: 70px;
  line-height: 70px;
  font-size: 1.3rem;
}
</style>

<form method="post" style="width:100%;border: 2px solid gray; 
    border-collapse: separate;background-color: #F9F9F9; 
    border-color: rgb(204, 204, 204);" class="signup-form" >
 

<div class="grhdr"> 
  <h6 style="float: left; font-size:25px;margin-top:-1.5%; color: #3f012c;font-style:initial;">
    <img src="imag/helpdesk-icon-png-11.jpg" style="width:8%;">Request type :<em>Change Management</em> </h6>


  <a href="view_my_ticket.php" >
 <i class="fas fa-ticket-alt"  style="float: right; size: 20px;font-size:30px;margin-top:-1.5%;"></i>
<h5 style="float: right; size: 20px;font-size:15px;margin-top: -1%; color: #3f012c;font-style:initial;">
  <em>View old ticket..</em></h5>  

</div></a>
<br>
 <div class="card-body" style="height:40px;">

<input list="browser" name="Request_ID" placeholder="Select ID number..." 
value='<?php if($id_leave != '') echo $id_leave;?>' style="width:22%;padding:1px; margin-left:-6%;" /> 
<button  type='submit' name="datalist" value="Get data" class="btn btn-success btn-circle btn-circle-xl m-1"
style="transform: translate(380%,-10px);">Get data </button>

<br/>
<br/>
<datalist id="browser" name="Request_ID"  >

     <?php
     if(isset($_POST['ticket_table'])){$ticket_table = $_POST['ticket_table'];}
$gogo = sqlsrv_query( $con ,"SELECT * FROM tbl_Ticketing_system
 WHERE Request_Type = 'Change Management'  and Request_status <> 'closed'   ");
// and Request_status = 'Open'
  while($index = sqlsrv_fetch_array($gogo)){
  $rows  = '<option ';
  $rows .= $index['Request_ID'] ? "selected" : "";;
  $rows .= 'value="'.$index['Request_ID'].'">'.$index['Request_ID'].'</option>';
  echo $rows;
$date1 =$index['adate'];
}
  $Request_ID = $_POST['Request_ID'];?> 
 </datalist> 

</div>

<div  class="table table-striped table-hover" style="overflow:scroll;overflow-x: auto; overflow-y: hidden;width: 80%;">
  <br>
   <table  class="order-table table" style="color: #702283; border:2px solid #eee;  flex-wrap: wrap;
  text-transform: uppercase; ">
 <?php 

 if(isset($_POST['datalist'])){
//echo '<div id="msg_txt"  class="order-table table" style="overflow-x:scroll;" >';
   if (isset($_POST['Request_ID'])) { $id_leave = $_POST['Request_ID']; 

 if (isset($_GET['Request_ID'])) { $id_leave = $_GET['Request_ID']; }


 
 $stmt =sqlsrv_query($con, "SELECT top 1 * FROM tbl_Ticketing_system  " ); /// get table header only 
 $stmt2 =sqlsrv_query($con, "SELECT * FROM tbl_Ticketing_system  where Request_ID = '$id_leave'   " ); // get table data

while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){

echo '<thead>';
 foreach ($rows as $column=>$value){

  echo '<th style="border:  1px solid #660066; background-color:#3b6879 ; color:#eee;">'.$column .'</th>';

}echo '</thead>';
}

while($rows = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC)){
echo '<tbody>';
 foreach ($rows as $column=>$value){
if($value instanceof \DateTime) {
   echo '<td style="border: 1px solid #eee;font-size:13px;">'.$value->format('Y-m-d H:i:s') .'</td>';
}
else
{
  echo '<td style="border: 1px solid #eee;font-size:13px;">'.$value .'</td>';
}

}echo '</tbody>';}

 }}
 ?>
</div>

 </table>
<br>
</div>
</form>
<form method="post"style="width:100%;border: 2px solid gray; 
    border-collapse: separate;background-color: #F9F9F9; 
    border-color: rgb(204, 204, 204);" class="signup-form">

<div style="padding-bottom: 18px;box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  border-radius: 3px;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  padding: 10px;
  outline: none;" >
<!-- id="Last_working_date"  -->
  <i class="fas fa-clock"></i>Last working date<br/>
<input type="date"  name="Last_working_day" required style="width: 45%;padding:17px ;
color: gray;padding-bottom: 18px;box-sizing: border-box;
  -webkit-box-sizing: border-box;width: 45%;
  -moz-box-sizing: border-box;
  border: 1px solid #C2C2C2;
  box-shadow: 1px 1px 4px #EBEBEB;
  -moz-box-shadow: 1px 1px 4px #EBEBEB;
  -webkit-box-shadow: 1px 1px 4px #BC8F8F;" class="form-control" />
</div>

<div  style="padding-bottom: 18px;padding-bottom: 18px;box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box; border-radius: 3px;-webkit-border-radius: 3px;
  -moz-border-radius: 3px; padding: 10px;outline: none;" >
<i class="fas fa-id-card"></i>username<br/>
  <input list="browsers" name="username" placeholder="Select/write username" type="text" class="form-control"required style="padding:17px;box-sizing: border-box;
  -webkit-box-sizing: border-box;width: 45%;font-size: 20px;
  -moz-box-sizing: border-box;
  border: 1px solid #C2C2C2;
  box-shadow: 1px 1px 4px #EBEBEB;
  -moz-box-shadow: 1px 1px 4px #EBEBEB;
  -webkit-box-shadow: 1px 1px 4px #BC8F8F;">
        <datalist id="browsers" name="username">

     <?php
     //
$checks = sqlsrv_query( $con ,"SELECT * from  employee  where role_id != 1 ");
//while($outputs = $checks->fetch_array()){
  while($outputs = sqlsrv_fetch_array($checks)){
        $rows = '<option ';
        $rows .= $outputs['id'] ? "selected" : " ";;
        $rows .= ' value="'.$outputs['username'].'">'.$outputs['username'].'</option>';
  echo $rows;
}
  ?>
 </datalist>
</div>





<div style="padding-bottom: 18px;padding-bottom: 18px;box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
 
  border-radius: 3px;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  padding: 10px;
  outline: none;" >
  <!--  id="Employee_new_id" -->
  <i class="fas fa-id-card"></i>Employee id<br/>
<input type="number"  name="Employee_ID" required style="padding:17px;box-sizing: border-box;
  -webkit-box-sizing: border-box;width: 45%;font-size: 20px;
  -moz-box-sizing: border-box;
  border: 1px solid #C2C2C2;
  box-shadow: 1px 1px 4px #EBEBEB;
  -moz-box-shadow: 1px 1px 4px #EBEBEB;
  -webkit-box-shadow: 1px 1px 4px #BC8F8F;" class="form-control" />
</div>
<div style="padding-bottom: 18px;padding-bottom: 18px;box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box; border-radius: 3px;-webkit-border-radius: 3px;
  -moz-border-radius: 3px; padding: 10px;outline: none;" >
<i class="fas fa-id-card"></i>New Manager<br/>
  <input list="brows" name="Employee_Manager" placeholder="Select/write Manager" type="text" class="form-control"required style="padding:17px;box-sizing: border-box;
  -webkit-box-sizing: border-box;width: 45%;font-size: 20px;
  -moz-box-sizing: border-box;
  border: 1px solid #C2C2C2;
  box-shadow: 1px 1px 4px #EBEBEB;
  -moz-box-shadow: 1px 1px 4px #EBEBEB;
  -webkit-box-shadow: 1px 1px 4px #BC8F8F;">
        <datalist id="brows" name="Employee_Manager">

     <?php
     //
$checks = sqlsrv_query( $con ,"SELECT * from  employee  where role_id not in (1,0) ");
//while($outputs = $checks->fetch_array()){
  while($outputs = sqlsrv_fetch_array($checks)){
        $rows = '<option ';
        $rows .= $outputs['id'] ? "selected" : " ";;
        $rows .= ' value="'.$outputs['username'].'">'.$outputs['username'].'</option>';
  echo $rows;
}
  ?>
 </datalist>
</div>

  <a  href="?done">
  <input name="save" value="Update ticket" type="submit" style="" /></a>
  <?php
  $gogo = sqlsrv_query( $con ,"SELECT [name]
FROM SYSOBJECTS WHERE xtype = 'U'");
while($index = sqlsrv_fetch_array($gogo)){
$tables =$index['name'];
 $tables.'<br>';}
 
?>
<div>
<?php 
$Requester_username = $_SESSION['username'];
$engineer_id = $_SESSION['id'];
$Creation_time = date ("Y-m-d H:i:s");

if(isset($_POST['Employee_ID'])){$Employee_new_id = $_POST['Employee_ID'];}
if(isset($_POST['Last_working_day'])){$Last_working_day = $_POST['Last_working_day'];}
if(isset($_POST['Employee_Manager'])){$Employee_Manager = $_POST['Employee_Manager'];}
if(isset($_POST['username'])){$usernames = $_POST['username'];}

if(isset($_POST['save'])){
/*
INSERT INTO [Aya_Web_APP].[dbo].[schedule_demo] SELECT * ,'$Creation_time','$engineer_id',
  '$Requester_username',' ' from schedule_table where engineer_id = '$Employee_new_id' and schedule_date > '$Last_working_day'
  ////////////
SELECT  [id]
,[engineer_id]
      ,[username]
      ,[shift_start]
      ,[shift_end]
      ,[schedule_date]
      ,[senior]
      ,[super]
      ,[section] ,$Creation_time,'$engineer_id',
  '$Requester_username',' ' 
  from schedule_table where schedule_table.engineer_id = '$Employee_new_id' and schedule_date > '$Last_working_day'
  */

 $insertqry2 =sqlsrv_query( $con ,"INSERT INTO [Aya_Web_APP].[dbo].[schedule_demo] SELECT  [id]
    ,[engineer_id]
      ,[username]
      ,[shift_start]
      ,[shift_end]
      ,[schedule_date]
      ,[senior]
      ,[super]
      ,[section] ,'$Creation_time','$engineer_id',
  '$Requester_username',' ' 
  from schedule_table where schedule_table.engineer_id = '$Employee_new_id' and schedule_date > '$Last_working_day'" ); 
}
if(isset($_POST['save'])){
  $DBhost = "172.29.29.76";
  $DBuser = "Seniors";
  $DBpass = "123456789";
  $DBname = "Employess_DB";
  
  $connectionInfo = array( "Database"=>"Employess_DB" , "UID"=>"Seniors" , "PWD"=>"123456789");
  $con1 = sqlsrv_connect($DBhost, $connectionInfo);
$Group= sqlsrv_query($con1,"SELECT [Group] FROM [tbl_Personal_info] where UserName = '$Employee_Manager'");
$unit= sqlsrv_query($con1,"SELECT [Unit] FROM [tbl_Personal_info] where UserName = '$Employee_Manager'");
 //$usernames = sqlsrv_query($con,"SELECT username from tbl_Personal_info where id = '$Employee_new_id'");


//FROM [Employess_DB].[dbo].[internal_transfer]
$insert_query = sqlsrv_query( $con1 ,"INSERT INTO [internal_transfer]
([Employee_ID] , [User_Name] , [Hiring_date] , [Employee_Type] , [Last_working_day] , 
  [Effective_Date] ,[Employee_Manager],[Department],[unit],[Created_User],[Date_time],[Group] )

VALUES
 ('$Employee_new_id', (SELECT username from tbl_Personal_info where id = '$Employee_new_id'), 
(SELECT Hiring_Date from tbl_Personal_info where id = '$Employee_new_id'),
(SELECT Employee_Type from tbl_Personal_info where id = '$Employee_new_id'),
 '$Last_working_day',DATEADD(day,1,'$Last_working_day'),
(SELECT Manager_Name from tbl_Personal_info where id = '$Employee_new_id'),
(SELECT Tbl_departments.Department from tbl_Personal_info join Tbl_departments on 
  Department_ID = tbl_Personal_info.Department where id = '$Employee_new_id'),
(SELECT Units from tbl_Personal_info join Tbl_Units on Unit = Units_ID where id = '$Employee_new_id'),
'$Requester_username','$Creation_time',
(SELECT [Group] from tbl_Personal_info where id = '$Employee_new_id') )");

 /*if($tables =='schedule_table'){
$insertqry2 =sqlsrv_query( $con ,"INSERT INTO [Aya_Web_APP].[dbo].[schedule_demo] SELECT * ,'$Creation_time','$engineer_id','$Requester_username'
  from schedule_table where engineer_id = '$Employee_new_id' " ); 
if($insertqry2){
 echo '<div class="popup" id="message">
<div class="content" name="done" ><h2>INSERT is done<i class="fas fa-thumbs-up"></i> ...</h2></div>
</div>';}
else{
  echo 'ERRORRRRRRRRRRRRR';
}
}*/
$update3=sqlsrv_query( $con1 ,"UPDATE [tbl_Personal_info]

set [Group] = (SELECT [Group] from [tbl_Personal_info] where UserName  = '$Employee_Manager')

where ID = '$Employee_new_id' ");

/*
////////////////////
$update3=sqlsrv_query( $con1 ,"UPDATE [tbl_Personal_info]
set [sub_Group] = (SELECT [sub_Group] from [tbl_Personal_info] where UserName  = '$Employee_Manager')

where ID = '$Employee_new_id' ");
*/
//////////////////////////////

  $update3=sqlsrv_query( $con1 ,"UPDATE [tbl_Personal_info]

set [Unit] = (SELECT [Unit] from [tbl_Personal_info] where UserName  = '$Employee_Manager')

where ID = '$Employee_new_id' ");

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  $update3=sqlsrv_query( $con1 ,"UPDATE [tbl_Personal_info]
set [Manager_Name] = '$Employee_Manager'
where ID = '$Employee_new_id' ");
  
  $update3=sqlsrv_query( $con1 ," UPDATE [Tbl_manager_structure]
set  Manager_Name_L7 = '$Employee_Manager'
where ID = '$Employee_new_id'");

  $update2=sqlsrv_query( $con," UPDATE [Aya_Web_APP].[dbo].[schedule_table]
set senior = '$Employee_Manager'
where username = '$usernames' and schedule_date > '$Last_working_day' ");


 //sqlsrv_query( $con1 ,$insert_query);

 if($update2){
 echo '<div class="popup" id="message">
<div class="content" name="done" ><h2>update done 3<i class="fas fa-thumbs-up"></i> ...</h2></div>
</div>';}
else{
  echo 'ERRORRR update2  RRR';
}
if($update3){
 echo '<div class="popup" id="message2">
<div class="content" name="done" ><h2>update done<i class="fas fa-thumbs-up"></i> ...</h2></div>
</div>';}
else{
  echo 'ERRORRR update  RRR';
}

if($insertqry2){
 echo '<div id="message">
<div class="content" name="done" ><h2>INSERT is done<i class="fas fa-thumbs-up"></i> ...</h2></div>
</div>';}
else{
  echo 'ERRORRRRRRRRRRRRR insert';

}
//if($update2){
}

  ?>
 

 <script type="text/javascript">
  setTimeout(function() {
  document.getElementById("message").style.display = 'none';
}, 1100);

  setTimeout(function() {
  document.getElementById("message2").style.display = 'none';
}, 1500);
</script>


<script type="text/javascript">
  
(function(document) {
  'use strict';

  var LightTableFilter = (function(Arr) {

    var _input;

    function _onInputEvent(e) {
      _input = e.target;
      var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
      Arr.forEach.call(tables, function(table) {
        Arr.forEach.call(table.tBodies, function(tbody) {
          Arr.forEach.call(tbody.rows, _filter);
        });
      });
    }

    function _filter(row) {
      var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
      row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
    }

    return {
      init: function() {
        var inputs = document.getElementsByClassName('light-table-filter');
        Arr.forEach.call(inputs, function(input) {
          input.oninput = _onInputEvent;
        });
      }
    };
  })(Array.prototype);

  document.addEventListener('readystatechange', function() {
    if (document.readyState === 'complete') {
      LightTableFilter.init();
    }
  });

})(document);
  
</script>
</div>
</form>

      <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

       <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
</script>
</body>

</html>