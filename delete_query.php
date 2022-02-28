

 <?php
        require_once("inc/config.inc");
        
  if($_SESSION['username'] == ''){ header("location: index.php"); }
      if(isset($_GET['logout'])){ session_destroy(); header("location: index.php"); }

      $self = $_SESSION['id'];
      $role_id = $_SESSION['role_id'];

      if (isset($_GET['id'])){$idd = $_GET['id']; }
$check = sqlsrv_query( $con ,"SELECT * FROM [employee] ");
//$output = $check->fetch_array();
$output = sqlsrv_fetch_array($check );
$orders_num = 1;
$username_idd = $output['username_id'];

$s_username = $_SESSION['username'];

$sqltime = date ("Y-m-d H:i:s");
$name ="";
 $id_leave ="";
if(isset($_POST['name'])){$name = $_POST['name'];}
     if (isset($_POST['Request_ID'])) { $id_leave = $_POST['Request_ID'];}

     if(isset($_POST['DeleteR']))
     {
///echo $name .'---'.$id_leave;

//insert 

$insertqry = "INSERT into leaves_demo select * ,'$s_username','$sqltime'  from $name where id = '$id_leave' ";
//sqlsrv_query( $con ,$insertqry);
  $insertqry.'<br/>' ;
 if($insertqry){
  '<div class="popup" id="message">
<div class="content" name="done" ><h2>INSERT is done<i class="fas fa-thumbs-up"></i> ...</h2></div>
</div>';}
else{  '<h2>ERROOOOOOOOOOOOOOOOOOR</h2>';}
//delete 
$deleteqry = "DELETE  from $name where id = '$id_leave' and $name <> $name ";
 //sqlsrv_query( $con ,$deleteqry);
 $deleteqry .'<br/>' ;
if($deleteqry){
  '<div class="popup" id="message2">
<div class="content" name="done" ><h2>Deleting is done<i class="fas fa-thumbs-up"></i> ...</h2></div>
</div>';}
     }

      ?>

<!DOCTYPE html>
<html>

<head>
  <title>Delete Recored</title>
    <!-- Required meta tags always come first -->
   <link rel="icon" href="imag/logo.jpg">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#33b5e5">
    <link rel="manifest" href="/manifest.json">
     <script src="js/prettify.min.js"></script>
  <script src="lib/example.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <script src="js/jquery.min.js"></script>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="report1.css">
      <link rel="stylesheet" type="text/css" href="css/morris.css">

  <link rel="stylesheet" type="text/css" href="css/prettify.min.css">

  <link rel="stylesheet" href="css/bootstrap22.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome22.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  <!-- Morris charts -->
  <link rel="stylesheet" href="css/morris22.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">

  <link rel="stylesheet" href="css/_all-skins.min.css">
 
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/bootstrap2.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style4.css">
</head>
<body>
       
    <div class="wrapper">
        <!-- Sidebar  -->
 
   <style>
     #sidebar {
    min-width:3px;
    max-width: 250px;
    background: #7386D5;
    background-image: initial;
    background-position-x: initial;
    background-position-y: initial;
    background-size: initial;
    background-repeat-x: initial;
    background-repeat-y: initial;
    background-attachment: initial;
    background-origin: initial;
    background-clip: initial;
    background-color: #092834;
    color: #fff;}
  #sidebar .sidebar-header{
    background-color: #092834;

            }

                .sidebar, .main-panel {
    overflow-x:  hidden;
    overflow-y:  hidden;
    
}
.overlay {
  position: absolute;
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
  position: absolute;
  background: rgba(0, 0, 0, 0.7);
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

    </style>

 <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid"><a href="theme.php">
          <button type="button" id="sidebarCollapse" class="btn btn-info" >
          <i class="fas fa-align-left"></i>Home</button></a>
          <a href="ticketing_updates.php"> <button type="button" id="sidebarCollapse"  class="btn btn-success" >
          <i class="fas fa-copy"></i>
          Update tickets</button></a>
          <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-align-justify"></i>
          </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul><img src="imag/logo.jpg" alt="logo.jpg"  style="padding: 1px; padding-bottom: 1px; margin-right: 1px; padding-top: 1px; padding-left: 1px; width: 25px; margin-bottom: 3px; "><span style="font-size:15px;font-family: Century Gothic; margin-right: 1px; ">WorkForce Managment Tool</span></ul> 
                        <ul class="nav navbar-nav ml-auto">

 <li ><a href="#" style="font-size: 9.5px;"><span class="glyphicon glyphicon-user"></span> login as <samp>:</samp>
        <?php echo $_SESSION["username"];?><h6 style="color: orange;font-size: 10px;text-align: justify;text-indent: 10px;letter-spacing: -.5px;line-height: 0.8;" ></h6></a></li>
                            <!--li class="nav-item active">
                                <a class="nav-link" href="#">Page</a>
                            </li!-->
                           
<li><a href="?logout"><span class="glyphicon glyphicon-log-in "></span> Logout</a></li>

                        </ul>
                    </div>
                </div>
            </nav>
  <?php

$check = sqlsrv_query( $con ,"SELECT * FROM [employee]  ");
$output = sqlsrv_fetch_array($check );
$senior = $output['manager_id'];
$username_idd = $output['username_id'];
$orders_num = 1;
?>
    <div class="content">
    <div class="container-fluid">


    <div class="row">
    <div class="col-md-12">
    <!-- AREA CHART -->
    <div class="box box-primary">

            <div class="box-header with-border">
              <h2 class="box-title">Delete Records</h2>
              <div class="box-tools pull-right">

                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

     <div class="box-body chart-responsive">
      
    <form method="post">
     <div class="card-body" style="height:60px;">

<input list="browser" name="name" placeholder="Select Table..." 
value='<?php if($name != '') echo $name; $name != 'leaves_demo'; ?>' style="width:49%;padding:7px;" /> 
<datalist id="browser" name="name"  >
     <?php
     if(isset($_POST['name'])){$name = $_POST['name'];}
$gogo = sqlsrv_query( $con ,"SELECT [name]
FROM SYSOBJECTS WHERE xtype = 'U' and name  in ('leaves' , 'employee')");
//FROM SYSOBJECTS WHERE xtype = 'U' and name != 'leaves_demo' and name != 'schedule_demo' ");
  while($index = sqlsrv_fetch_array($gogo)){
  $rows  = '<option ';
  $rows .= $index['name'] ? "selected" : "";;
  $rows .= 'value="'.$index['name'].'">'.$index['name'].'</option>';
  echo $rows;
$date1 =$index['adate'];
}
  $name = $_POST['name'];?> 
 </datalist>      
 <input list="browsers" placeholder="Select ID..." name="Request_ID" 
 value='<?php if($id_leave != '') echo $id_leave; ?>' required style="width:49%;padding:7px;"/>

</div>


 <!--/datalist-->
<a style='color:#f3e5ab;font-size:13px;' href='?Request_ID=<?php if (isset($_GET['Request_ID'])) { $id_leave = $_GET['Request_ID'];
 echo $id_leave; }?>'>
<button  type='submit' name="datalist" value="Get data" class="btn btn-outline-info btn-rounded col-md-6" 
style="background-color: gray; padding: 10px; color: #eee; font-size: 15px; margin-left:23%;">Get data </button></a>
<br>
<br/>
<br/>
<br/>
<div  class="table table-striped table-hover" style="overflow:scroll;">
   <table  class="order-table table" style="color: #702283; border: 5px solid #eee;  flex-wrap: wrap;
  text-transform: uppercase;">
 <?php 

 if(isset($_POST['datalist'])){
//echo '<div id="msg_txt"  class="order-table table" style="overflow-x:scroll;" >';
   if (isset($_POST['Request_ID'])) { $id_leave = $_POST['Request_ID']; 

 if (isset($_GET['Request_ID'])) { $id_leave = $_GET['Request_ID']; }


 
 $stmt =sqlsrv_query($con, "SELECT top 1 * FROM $name where '$name' <> 'leaves_demo' " ); /// get table header only 
 $stmt2 =sqlsrv_query($con, "SELECT * FROM $name  where id = '$id_leave' and '$name' <> 'leaves_demo'  " ); // get table data

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

<br/>
    <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" name="DeleteR"
     type="submit">Delete Recored</button>


        </form>

        </div>

        <!-- Form -->
        </div>            
        </div>
        <!-- /.box-body -->
        </div>
        </div>
        <?php 
        $username_idd = $output['username_id'];

$s_username = $_SESSION['username'];

$sqltime = date ("Y-m-d H:i:s");
$name ="";
$id_leave ="";
if(isset($_POST['name'])){$name = $_POST['name'];}
     if (isset($_POST['Request_ID'])) { $id_leave = $_POST['Request_ID'];}

     if(isset($_POST['DeleteR']))
     {
///echo $name .'---'.$id_leave;

//insert employee_demo
if($name == 'employee') {
  $employee_insertqry =sqlsrv_query( $con ,"INSERT into employee_demo select * ,'$s_username','$sqltime'
    from $name where id = '$id_leave' ");
//sqlsrv_query( $con ,$insertqry);
 if($employee_insertqry){
 echo '<div class="popup" id="message" >
<div class="content" name="done"   ><h2>INSERT is done<i class="fas fa-thumbs-up"></i> ...</h2></div>
</div>';}
else{ echo '<h2>ERROOO employee OOOR</h2>';}
}
      /*
      [id]
      ,[username]
    ,[username_id]*/
    //insert leaves_demo
if($name == 'leaves') {
$insertqry =sqlsrv_query( $con , "INSERT into leaves_demo select * ,'$s_username','$sqltime'  from $name where id = '$id_leave' ");

//sqlsrv_query( $con ,$insertqry);
  //$insertqry.'<br/>' ;
 if($insertqry){
 echo '<div class="popup" id="message" >
<div class="content" name="done"  ><h2>INSERT is done<i class="fas fa-thumbs-up"></i> ...</h2></div>
</div>';}
else{ echo '<h2>ERROOOOOOOOOOOOOOOOOOR</h2>';}
}
//delete 
if($name == ['leaves_demo'] ){
  echo '<h2>ERROOOOO  delete  OOOOOR</h2>';
}

$deleteqry = "DELETE  from $name where id = '$id_leave' and '$name' <> 'leaves_demo' and '$name' <> 'schedule_demo'   ";
 sqlsrv_query( $con ,$deleteqry);
 $deleteqry .'<br/>' ;
if($deleteqry){
 echo '<div class="popup" id="message2">
<div class="content" name="done" ><h2>Deleting is done<i class="fas fa-thumbs-up"></i> ...</h2></div>
</div>';}
else{ echo '<h2>ERROOOOO  delete  OOOOOR</h2>';}
     }
     ?> 
<script type="text/javascript">
$(document).ready(function(){
  $(".btn-group .btn").click(function(){
    var inputValue = $(this).find("input").val();
    if(inputValue != 'all'){
      var target = $('table tr[data-status="' + inputValue + '"]');
      $("table tbody tr").not(target).hide();
      target.fadeIn();
    } else {
      $("table tbody tr").fadeIn();
    }
  });
  // Changing the class of status label to support Bootstrap 4
    var bs = $.fn.tooltip.Constructor.VERSION;
    var str = bs.split(".");
    if(str[0] == 4){
        $(".label").each(function(){
          var classStr = $(this).attr("class");
            var newClassStr = classStr.replace(/label/g, "badge");
            $(this).removeAttr("class").addClass(newClassStr);
        });
    }
});
</script>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.showNotification();

    });
</script>
       <script type="text/javascript">
  setTimeout(function() {
  document.getElementById("message").style.display = 'none';
}, 1000);
</script>
 <script type="text/javascript">
  setTimeout(function() {
  document.getElementById("message2").style.display = 'none';
}, 1500);
</script>
<!-- jQuery 3 -->
<script src="js/jquery22.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="js/bootstrap22.min.js"></script>
<!-- Morris.js charts -->
<script src="js/raphael22.min.js"></script>
<script src="js/morris22.min.js"></script>
<!-- FastClick -->
<script src="js/fastclick22.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte22.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo22.js"></script>
<!-- page script -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>