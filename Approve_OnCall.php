 
    <title>Approve OnCall</title>
    <head>
   <link rel="stylesheet" type="text/css" href="css/kpi_css.css">
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
 <?php
          include ("pages.php");
      $self = $_SESSION['id'];
      $role_id = $_SESSION['role_id'];
      $s_username = $_SESSION['username'];

  
 //senior approve
if(isset($_GET['senior'])){
$sch_id = $_GET['senior'];
$status = "senior approve";
$approved_by = $_SESSION['username'];
$sqltime = date ("Y-m-d H:i:s");
$senior_approve = sqlsrv_query( $con ,"UPDATE oncall_sd SET status = '$status' , approval = '$approved_by',
  [approval_time] = '$sqltime' WHERE id = '$sch_id'");
if($senior_approve){
echo '<script>
    swal({
    title: "Approved",
  icon: "success",
  })
     </script>';}
   }
//senior reject
if(isset($_GET['senior2'])){
$rejected_by = $_SESSION['username'];
$sch_id = $_GET['senior2'];
$status = "senior reject";
$sqltime = date ("Y-m-d H:i:s");
$senior_reject = sqlsrv_query( $con ,"UPDATE oncall_sd SET status = '$status' , rejection = '$rejected_by' , [rejection_time] = '$sqltime' WHERE id = '$sch_id'");
if($senior_reject){
      echo '<script>
    swal({
    title: "Rejected",
  icon: "info",
  })
     </script>';

     }
}

//Super2 approve
if(isset($_GET['Super'])){
$sch_id = $_GET['Super'];
$status = "super approve";
$approved_by = $_SESSION['username'];
$sqltime = date ("Y-m-d H:i:s");

$super_approve = sqlsrv_query( $con ,"UPDATE oncall_sd SET status = '$status' , approval = '$approved_by' , [approval_time] = '$sqltime' WHERE id = '$sch_id'");
if($super_approve){
echo '<script>
    swal({
    title: "Approved",
  icon: "success",
  })
     </script>';}
   }

////Super2 reject
if(isset($_GET['Super2'])){
$rejected_by = $_SESSION['username'];
$sch_id = $_GET['Super2'];
$status = "super reject";
$sqltime = date ("Y-m-d H:i:s");

$super_reject = sqlsrv_query( $con ,"UPDATE oncall_sd SET status = '$status' , rejection = '$rejected_by' , [rejection_time] = '$sqltime'  WHERE id = '$sch_id'");
if($super_reject){
      echo '<script>
    swal({
    title: "Rejected",
  icon: "info",
  })
     </script>';

     }
}
//section approve
if(isset($_GET['section'])){
$sch_id = $_GET['section'];
$status = "section approve";
$approved_by = $_SESSION['username'];
$sqltime = date ("Y-m-d H:i:s");

$section_approve = sqlsrv_query( $con ,"UPDATE oncall_sd SET status = '$status' , approval = '$approved_by' , [approval_time] = '$sqltime' WHERE id = '$sch_id'");
if($section_approve){
echo '<script>
    swal({
    title: "Approved",
  icon: "success",
  })
     </script>';}
   }

////section reject
if(isset($_GET['section2'])){
$rejected_by = $_SESSION['username'];
$sch_id = $_GET['section2'];
$status = "section reject";
$sqltime = date ("Y-m-d H:i:s");

$section_reject = sqlsrv_query( $con ,"UPDATE oncall_sd SET status = '$status' , rejection = '$rejected_by' , [rejection_time] = '$sqltime'  WHERE id = '$sch_id'");
if($section_reject){
      echo '<script>
    swal({
    title: "Rejected",
  icon: "info",
  })
     </script>';

     }
}
// //UnitManager  approve
if(isset($_GET['UnitManager'])){
$sch_id = $_GET['UnitManager'];
$status = "Unit approve";
$approved_by = $_SESSION['username'];
$sqltime = date ("Y-m-d H:i:s");

$unit_approve = sqlsrv_query( $con ,"UPDATE oncall_sd SET status = '$status' , approval = '$approved_by' , [approval_time] = 
  '$sqltime' WHERE id = '$sch_id'");
if($unit_approve){
echo '<script>
    swal({
    title: "Approved",
  icon: "success",
  })
     </script>';}
   }

////UnitManager  reject
if(isset($_GET['UnitManager2'])){
$rejected_by = $_SESSION['username'];
$sch_id = $_GET['UnitManager2'];
$status = "Unit reject";
$sqltime = date ("Y-m-d H:i:s");

$unit_reject = sqlsrv_query( $con ,"UPDATE oncall_sd SET status = '$status' , rejection = '$rejected_by' , [rejection_time] = '$sqltime'  WHERE id = '$sch_id'");
if($unit_reject){
      echo '<script>
    swal({
    title: "Rejected",
  icon: "info",
  })
     </script>';

     }
}

      ?>

<style type="text/css">
    .hovers:hover {
      background-color: #333d6b ;
      color: white;
      border-radius:20px 20px 20px 20px ;
        }
  .zoom:hover{
    transform: scale(1.5);
  }
  .order-table tr:nth-child(even) {
    background-color: #f8f6ff;
}
</style>
<?php

if ($_SESSION['role_id'] == 0){
  echo'
<style>
.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
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

<div id="message" class="overlay">
  <div class="popup">
    <h2>Hi '.$s_username.'</h2>
<br/>
    <div class="content">
      Sorry You are not allowed to open me...
    </div>
  </div>
</div>

';
}
else{
?>
<div style="padding:20px;">

<center>
<div class="col-md-8">
        <aside class="profile-nav alt" style="border:1px solid rgba(0,0,0,.125);
        border-radius: 20px 20px 20px 20px;">
            <div class="card-header user-header alt bg-light"
            style="border-radius: 20px 20px 0 0 ;">
            <div class="media">
            <div class="media-body">
              <h2 class="text-dark display-12" style="font-family:Century Gothic;" >Approve / Reject OnCall</h2>
      <a href="approve_request.php">
    <button type="button" id="sidebarCollapse" class="btn btn-warning" >
    <i class="fa fa-backward"></i> Back
    </button></a></h2>
                  <p style="color:lightgray;">Welcome : <?php echo $_SESSION["username"];?></p>
              </div>
          </div>
      </div>
       <p style="background-color:#55608f;font-weight:bold;font-size:16px;color:white;padding:2%;"></p>
    </aside>
  </div>
</center>
<br>
<center>
<h2 style="color:; ">Table Filter</h2>
    <input type="search" class="light-table-filter" data-table="order-table" placeholder="Filter"/>
    <br>
    <br>
    <form  method="post" >
<div class="tableFixHead">

<table class="table order-table"  cellspacing="0" id="tblCustomers" >
  <thead style="color: white;font-size: 15px;background-color: #55608f;border: 1px solid white; ">
  	<tr>
      <th ><center>ID num</center></th>
      <th ><center>Engineer</center></th>
      <th ><center>Type</center></th>
      <th ><center>Days</center></th>
      <th ><center>Month</center></th>
      <th ><center>Year</center></th>
      <th ><center>Creation time</center></th>
      <th ><center>Notes</center></th>
      <th ><center>Status</center></th>
      <th ><center>Approve/Reject</center></th>
   
	</tr>
</thead>
  <tbody style="background-color:#fff;" align="center">
<?php      
if(isset($_GET['engineer_id'])){
  $engineer_id = $_GET['engineer_id'];
}
//mysqli -> select data from table 
$check_engineers  = sqlsrv_query( $con ,"SELECT * FROM employee WHERE id ='$engineer_id'   ");
    while( $output_engineers = sqlsrv_fetch_array($check_engineers)){
  $engineers_id = $output_engineers['id'];
  $eng_username = $output_engineers['username'] ;
}

$first_query = sqlsrv_query( $con ,"SELECT  [id]
      ,[username],[type]
      ,[days],[month],[year]
      ,[status],[creation_time],[note]
  FROM [Aya_Web_APP].[dbo].[oncall_sd] WHERE engineer_id ='$engineer_id' ");

if($_SESSION['role_id'] == 2)
{
  $first_query = sqlsrv_query( $con ,"SELECT  [id]
      ,[username]
      ,[type]
      ,[days]
      ,[month]
      ,[year]
      ,[status]
      ,[creation_time]
      ,[note]
  FROM [Aya_Web_APP].[dbo].[oncall_sd]WHERE engineer_id ='$engineer_id'  AND status = 'pending'");

}
if($_SESSION['role_id'] == 3)
{
  $first_query = sqlsrv_query( $con ," SELECT  [id]
      ,[username]
      ,[type]
      ,[days]
      ,[month]
      ,[year]
      ,[status]
      ,[creation_time]
      ,[note]
  FROM [Aya_Web_APP].[dbo].[oncall_sd]WHERE engineer_id ='$engineer_id'  AND status = 'pending'");
}
if($_SESSION['role_id'] == 4)
{
  $first_query = sqlsrv_query( $con ,"SELECT  [id]
      ,[username]
      ,[type]
      ,[days]
      ,[month]
      ,[year]
      ,[status]
      ,[creation_time]
      ,[note]
  FROM [Aya_Web_APP].[dbo].[oncall_sd]WHERE engineer_id ='$engineer_id'  AND status = 'pending'");
}

if($_SESSION['role_id'] == 5)
{
  $first_query = sqlsrv_query( $con ,"SELECT  [id]
      ,[username]
      ,[type]
      ,[days]
      ,[month]
      ,[year]
      ,[status]
      ,[creation_time]
      ,[note]
  FROM [Aya_Web_APP].[dbo].[oncall_sd]WHERE engineer_id ='$engineer_id'  AND status = 'pending'");
}

  while( $output_query = sqlsrv_fetch_array($first_query)){

$rows ="<tr>";
$rows .= '<td class="hovers" style="border: 1px solid lightgray;">'.$output_query["id"].'</td>';
$rows .= '<td  class="hovers" style="border: 1px solid lightgray;">'.$output_query["username"].'</td>';
$rows.='<td class="hovers" style="border: 1px solid lightgray;">'.$output_query["type"].'</td>';
$rows.='<td class="hovers" style="border: 1px solid lightgray;">'.$output_query["days"].'</td>';
$rows.= '<td class="hovers" style="border: 1px solid lightgray;">'.$output_query["month"].'</td>';
$rows.= '<td class="hovers" style="border: 1px solid lightgray;">'.$output_query["year"].'</td>';
$rows.='<td class="hovers" style="border: 1px solid lightgray;">'.$output_query["creation_time"]->format("Y-m-d H:i:s").'</td>';
$rows.='<td class="hovers" style="border: 1px solid lightgray;">'.$output_query["note"].'</td>';
$rows.='<td class="hovers" style="border: 1px solid lightgray;">'.$output_query["status"].'</td>';
if($output_query['status'] == 1){

  if($_SESSION['role_id'] == 2){
  $rows .= '<td width="25%">Senior Accepted

  </td>';

  }elseif ($_SESSION['role_id'] == 2) {
  $rows .='<td ><a href="?senior='.$output_query["id"].'&engineer_id='.$engineer_id.'">Senior Accepted</a>
                 </td>';}
}elseif($output_query['status'] == 4){
    if($_SESSION['role_id'] == 2){
  $rows .='<td >Senior Rejected</td>';

  }elseif ($_SESSION['role_id'] == 2) {
  $rows .='<td >
       <a type="button" name="senior reject" class="btn btn-danger" href="?senior='.$output_query["id"].'&engineer_id='.$engineer_id.'">Rejected</a></td>';
  }else{
  header("location: welcomeadmin2.php");
  }

}elseif($output_query['status'] == 2){

  if($_SESSION['role_id'] == 1){
  }elseif ($_SESSION['role_id'] == 1) {
  $rows .=    '<td width="25%">
   </td>';
  }else{
  header("location: welcomeadmin2.php");
  }

}else{
 
     //senior
     if($_SESSION['role_id'] == 2) {
  $rows .='<td><a type="button"  class="btn btn-outline-success button1"  href="?senior='.$output_query["id"].'&engineer_id='.$engineer_id.'"><samp><i class="fa fa-check"></i> Approve</samp></a>

     <a type="button" name="senior reject" class="btn btn-danger button3" href="?senior2='.$output_query["id"].'&engineer_id='.$engineer_id.'">Rejected</a></td>';  }
  // super
   if($_SESSION['role_id'] == 3){
  $rows .='<td>
<a type="button" class="btn btn-outline-success button1"  href="?Super='.$output_query["id"].'&engineer_id='.$engineer_id.'"> <samp><i class="fa fa-check"></i> Approve</samp></a>

<a type="button" width="1%" name="super reject" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.9), 0 6px 22px 0 rgba(0,0,0,0.20);" class="btn btn-danger button3" href="?Super2='.$output_query["id"].'&engineer_id='.$engineer_id.'">Rejected</a></td>'; }
  // section 
  if($_SESSION['role_id'] == 4){
  $rows .='<td>
<a type="button" class="btn btn-outline-success" href="?section='.$output_query["id"].'&engineer_id='.$engineer_id.'"><samp><i class="fa fa-check"></i> Approve</samp></a>

<a type="button" width="1%" name="section reject" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.9), 0 6px 22px 0 rgba(0,0,0,0.20);" class="btn btn-outline-danger button3" href="?section2='.$output_query["id"].'&engineer_id='.$engineer_id.'">Rejected</a></td>';}

// UnitManager 
  elseif($_SESSION['role_id'] == 5){
  $rows .='<td>
<a type="button" class="btn btn-outline-success" href="?UnitManager='.$output_query["id"].'&engineer_id='.$engineer_id.'"><samp><i class="fa fa-check"></i> Approve</samp></a>

<a type="button" width="1%" name="UnitManager reject" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.9), 0 6px 22px 0 rgba(0,0,0,0.20);" class="btn btn-outline-danger button3" href="?UnitManager2='.$output_query["id"].'&engineer_id='.$engineer_id.'">Rejected</a></td>';}

}

$rows .=  '</tr>';
echo $rows;
}


?>

</tbody>
</table>
</div>
</form>
</center>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script src="js/table2excel.js"></script>

  <?php

 include ("footer.html");
}
 ?>
