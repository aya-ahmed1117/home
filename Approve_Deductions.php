 
    <title>Approve Deductions</title>
    <head>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap2.min.js"></script>
   <link rel="stylesheet" type="text/css" href="css/kpi_css.css">
</head>
 <?php
          include ("pages.php");
  set_time_limit(600);
      $self = $_SESSION['id'];
      $role_id = $_SESSION['role_id'];
      $s_username = $_SESSION['username'];
//admin ok
if(isset($_GET['admin'])){
$sch_id = $_GET['admin'];
$status = "E-workforce and senior approve";
$stat_added = "removed";
$eworkforce_approve=$_SESSION['username'];

$sqltime = date ("Y-m-d H:i:s");
$eworkforce_approve = sqlsrv_query( $con ,"UPDATE deduction SET status = '$status' , eworkforce_approve = '$eworkforce_approve' , stat_added = '$stat_added' , [wfm_approval_time] = '$sqltime' WHERE id = '$sch_id'");

if($eworkforce_approve){
echo '<script>
    swal({
    title: "Approved",
  icon: "success",
  })
     </script>';}
}

//admin reject
if(isset($_GET['admin2'])){
$eworkforce_reject = $_SESSION['username'];
$sch_id = $_GET['admin2'];
$status = "E-workforce reject";
$sqltime = date ("Y-m-d H:i:s");
$eworkforce_reject = sqlsrv_query( $con ,"UPDATE deduction SET status = '$status' , eworkforce_reject = '$eworkforce_reject' , [wfm_rejected_time] = '$sqltime' WHERE id = '$sch_id'");

if($eworkforce_reject){
      echo '<script>
    swal({
    title: "Rejected",
  icon: "info",
  })
     </script>';

     }
}
//senior old
if(isset($_GET['senior'])){
$sch_id = $_GET['senior'];
$status = "senior approve";
$senior_approve=$_SESSION['username'];
$sqltime = date ("Y-m-d H:i:s");
$senior_approve = sqlsrv_query( $con ,"UPDATE deduction SET status = '$status' , senior_approve = '$senior_approve' , [senior_approval_time] = '$sqltime' WHERE id = '$sch_id'");
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
$senior_reject = $_SESSION['username'];
$sch_id = $_GET['senior2'];
$status = "senior reject";
$sqltime = date ("Y-m-d H:i:s");
$senior_reject = sqlsrv_query( $con ,"UPDATE deduction SET status = '$status' , senior_reject = '$senior_reject' , [senior_rejected_time] = '$sqltime'  WHERE id = '$sch_id'");
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
$senior_approve=$_SESSION['username'];
$sqltime = date ("Y-m-d H:i:s");
$super_approve = sqlsrv_query( $con ,"UPDATE deduction SET status = '$status' , senior_approve = '$senior_approve' , [senior_approval_time] = '$sqltime' WHERE id = '$sch_id'");
if($super_approve){
echo '<script>
    swal({
    title: "Done",
  icon: "success",
  })
     </script>';}
}
////Super2 reject
if(isset($_GET['Super2'])){
$senior_reject = $_SESSION['username'];
$sch_id = $_GET['Super2'];
$status = "super reject";
$sqltime = date ("Y-m-d H:i:s");
$super_reject = sqlsrv_query( $con ,"UPDATE deduction SET status = '$status' , senior_reject = '$senior_reject' , [senior_rejected_time] = '$sqltime'  WHERE id = '$sch_id'");
if($super_reject){
echo '<script>
    swal({
    title: "Rejected",
  icon: "info",
  })
     </script>';}
}
//section approve
if(isset($_GET['section'])){
$sch_id = $_GET['section'];
$status = "section approve";
$senior_approve = $_SESSION['username'];
$sqltime = date ("Y-m-d H:i:s");
$section_approve = sqlsrv_query( $con ,"UPDATE deduction SET status = '$status' , senior_approve = '$senior_approve' , [senior_approval_time] = '$sqltime' WHERE id = '$sch_id'");

if($section_approve){
echo '<script>
    swal({
    title: "Done",
  icon: "success",
  })
     </script>';}

}
//section reject
if(isset($_GET['section2'])){
$rejected_by = $_SESSION['username'];
$sch_id = $_GET['section2'];
$status = "section reject";
$sqltime = date ("Y-m-d H:i:s");
$section_reject = sqlsrv_query( $con ,"UPDATE deduction SET status = '$status' , senior_reject = '$rejected_by' , [senior_rejected_time] = '$sqltime'  WHERE id = '$sch_id'");
if($section_reject){
echo '<script>
    swal({
    title: "Rejected",
  icon: "info",
  })
     </script>';}
}

//UnitManager  approve
if(isset($_GET['UnitManager'])){
$sch_id = $_GET['UnitManager'];
$status = "Unit approve";
$senior_approve = $_SESSION['username'];
$sqltime = date ("Y-m-d H:i:s");
$Unit_approve = sqlsrv_query( $con ,"UPDATE deduction SET status = '$status' , senior_approve = '$senior_approve' , [senior_approval_time] = '$sqltime' WHERE id = '$sch_id'");
if($Unit_approve){
echo '<script>
    swal({
    title: "Done",
  icon: "success",
  })
     </script>';}

}
//UnitManager  reject
if(isset($_GET['UnitManager2'])){
$rejected_by = $_SESSION['username'];
$sch_id = $_GET['UnitManager2'];
$status = "Unit reject";
$sqltime = date ("Y-m-d H:i:s");
$Unit_reject = sqlsrv_query( $con ,"UPDATE deduction SET status = '$status' , senior_reject = '$rejected_by' , [senior_rejected_time] = '$sqltime'  WHERE id = '$sch_id'");
  if($Unit_reject){
   echo '<script>
    swal({
    title: "Rejected",
  icon: "info",
  })
     </script>';}
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
              <h2 class="text-dark display-12" style="font-family:Century Gothic;" >Approve / Reject Deductions
      <a href="admin_approve.php">
    <button type="button" id="sidebarCollapse" class="btn btn-warning" >
    <i class="fa fa-backward"></i> Back
    </button></a></h2>
              </div>
          </div>
      </div>
       <p style="background-color:#55608f;font-weight:bold;font-size:16px;color:white;padding:2%;">0...0</p>
    </aside>
  </div>
</center>
<?php if ($_SESSION['role_id'] == 1){
  ?>
 <!--- start modal----->
 <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="mediumModalLabel">COMPLAIN </h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
                        </div>
    <div class="modal-body">
  
 <input type="text" value="" class="form-control id"  disabled="true" />
<br>
  <select class="form-control sType" required="true">
  <option value="0" selected>Select your reason...</option>
  <option value="Refund Request">Refund Request</option>
  <option value="PC problem">PC problem</option>
  <option value="Leave/Permission(pending creation)">Leave/Permission(pending creation)</option>
  <option value="Schedule modification">Schedule modification</option>
  </select>
 <br>
 <label required="true">Notes   </label>
        <textarea class="form-control note" ></textarea>
        <br>
            <div class="modal-footer">
                <button class="btn btn-primary submit">Submit</button>
                <button type="button" class="btn btn-secondary close" data-dismiss="modal">Cancel</button>
              
                </div>
                  </div>
                </div>
            </div>
        </div>
        <?php }?>
<br>
<?php if ($_SESSION['role_id'] == 1){
 if(isset($_GET['id2']) ){  ?>

  <!--- start modal----->
 <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="mediumModalLabel">COMPLAIN </h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
                        </div>
    <div class="modal-body" >
  
 <input type="text" value="" class="form-control id"  disabled="true" />
<br>
  <select class="form-control sType" required="true">
  <option value="0" selected>Select your reason...</option>
  <option value="Refund Request">Refund Request</option>
  <option value="PC problem">PC problem</option>
  <option value="Leave/Permission(pending creation)">Leave/Permission(pending creation)</option>
  <option value="Schedule modification">Schedule modification</option>
  </select>
 <br>
 <label required="true">Notes   </label>
        <textarea class="form-control note" ></textarea>
        <br>
            <div class="modal-footer">
                <button class="btn btn-primary submit">Submit</button>
                <button type="button" class="btn btn-secondary close" data-dismiss="modal">Cancel</button>
              
                </div>
                  </div>
                </div>
            </div>
        </div>
  <div >    
    <h3 style="background-color:white; color:black; text-align: center ; border-radius: 0px 20px;
 border: 5px solid ; margin: 0px auto;padding-top: 20%;
   width: 30%; padding-top:5px; pdding-left: 9px; padding-bottom: 130px; ">
<form  method="post" >
  <div class="media">
            <div class="media-body">
  <input enable="false" class="nav-link disabled" tabindex="-1" type="text" name="engineer_id" style="display: none;" value="<?php echo $_SESSION["username"]; ?>"></input>
  <input type="text" name="R_id" style="display: none;" value="<?php if(isset($_GET["id2"])){echo $_GET["id2"] ;}?>">Deduction id num :<?php echo $_GET["id2"] ; ?>
  <label for="type" style="display: none;">Select </label><br>
  
  <label style="width: 30%; padding-left: 15px;float: left;margin-left: 11%;" >Notes
        <textarea name="wfm_note" style="display: block; float: left;"></textarea>
        <br><br>
        <br><br>
  <input type="submit" class="btn btn-primary submit" type="submit" name="formSubmit" value="submit" /></label>
</form>
</div>
</div>
</h3>
</div>
<?php
}
if(isset($_POST['formSubmit'])){

 if(isset($_GET['id2'])){
$sch_id = $_GET['id2'];

$first_query = sqlsrv_query( $con ,"SELECT * FROM deduction where id = '$sch_id' ");
  $output_query = sqlsrv_fetch_array($first_query);
 $note2 =$output_query["wfm_note"];
//  [Note] = '$Note'+' _ '+'$note2'

$escaped = $_POST['wfm_note'];
 $wfm_note = str_replace("'", "`", $escaped);

//$insert_query = sqlsrv_query( $con ," deduction ([wfm_note]) VALUES ('$wfm_note') ");
  $update_query = sqlsrv_query( $con ,"UPDATE deduction SET wfm_note = '$wfm_note'+' _ '+'$note2' WHERE id = '$sch_id'");

if($update_query){
  echo '<script>
    swal({
    title: " Your note has been delivered :) ",
  icon: "success",
  })
     </script>';}
  else{ echo 'error';}
}}
}
?>
<br>

<h2 style="color:; ">Table Filter</h2>
    <input type="search" class="light-table-filter" 
    data-table="order-table" placeholder="Filter"/>
    <br>
    <br>
    <center>
    <form method="post" >
<div class="tableFixHead">

<table class="table order-table"  cellspacing="0" id="tblCustomers" >
  <thead style="color: white;font-size: 15px;background-color: #55608f;border: 1px solid white; ">
  	<tr>
      <?php   if ($_SESSION['role_id'] > 1){
  ?>
      <th ><center>ID num</center></th>
      <th ><center>Engineer</center></th>
      <th ><center>Type</center></th>
      <th ><center>Item</center></th>
      <th ><center>Date</center></th>      
      <th ><center>Time</center></th>
      <th ><center>Creation time</center></th> 
      <th ><center>Comment</center></th>
      <th ><center>Status</center></th>
      <th ><center>Approve/Reject</center></th> 
<?php   }   if ($_SESSION['role_id'] == 1){
  ?>
      <th ><center>ID num</center></th>
      <th ><center>Engineer</center></th>
      <th ><center>Type</center></th>
      <th ><center>Item</center></th>
      <th ><center>Date</center></th>      
      <th ><center>Time</center></th>
      <th ><center>Creation time</center></th> 
      <th ><center>Comment</center></th>
      <th ><center>reject by</center></th>
      <th ><center>Approve/Reject</center></th> 
      <th ><center>Comment</center></th>
      <th ><center>Comment</center></th>

<?php }
?>
  		
	</tr>
 </thead>
  <tbody style="background-color:#fff;" align="center">
<?php      
if(isset($_GET['engineer_id'])){
  $engineer_id = $_GET['engineer_id'];
}


$check_engineers  = $first_query = sqlsrv_query( $con ,"SELECT [username],[id] FROM employee WHERE id ='$engineer_id'");
while ( $output_engineers = sqlsrv_fetch_array($check_engineers)){
  $engineers_id = $output_engineers['id'];
  $eng_username = $output_engineers['username'];
}

$first_query = sqlsrv_query( $con ,"SELECT  [id]
      ,[username]
      ,[a_date]
      ,[item]
      ,[a_time]
      ,[status]
      ,[note]
      ,[type]
      ,[creation_time]
      ,[wfm_note]
  FROM [Aya_Web_APP].[dbo].[deduction] WHERE engineer_id ='$engineer_id'   ");


if($_SESSION['role_id'] == 2)
{

$first_query = sqlsrv_query( $con ,"SELECT  [id]
      ,[username]
      ,[a_date]
      ,[item]
      ,[a_time]
      ,[status]
      ,[note]
      ,[type]
      ,[creation_time]
      ,[wfm_note]
  FROM [Aya_Web_APP].[dbo].[deduction] WHERE engineer_id ='$engineer_id' and id <> 9954 AND status = 'pending'  ");
}
if($_SESSION['role_id'] == 1)
{


if(isset($_GET['engineer_id'])){
  $engineer_id = $_GET['engineer_id'];}

 $first_query = sqlsrv_query( $con ,"SELECT  [id]
      ,[username]
      ,[a_date]
      ,[item]
      ,[a_time]
      ,[note]
      ,[type]
      ,status
      ,[creation_time]
      ,[wfm_note]
      ,senior_reject
  FROM [Aya_Web_APP].[dbo].[deduction] WHERE engineer_id ='$engineer_id' and id <> 9954  AND status in 
  ('SENIOR APPROVE','section approve','Unit Approve','super approve')  ");
}
if($_SESSION['role_id'] == 3)
{
 $first_query = sqlsrv_query( $con ,"SELECT  [id]
      ,[username]
      ,[a_date]
      ,[item]
      ,[a_time]
      ,[status]
      ,[note]
      ,[type]
      ,[creation_time]
      ,[wfm_note]
  FROM [Aya_Web_APP].[dbo].[deduction] WHERE engineer_id ='$engineer_id' and id <> 9954 AND status = 'pending' ");
}


/////// new
if($_SESSION['role_id'] == 4)
{
  $first_query = sqlsrv_query( $con ,"SELECT  [id]
      ,[username]
      ,[a_date]
      ,[item]
      ,[a_time]
      ,[status]
      ,[note]
      ,[type]
      ,[creation_time]
      ,[wfm_note]
  FROM [Aya_Web_APP].[dbo].[deduction] WHERE engineer_id ='$engineer_id'  AND status = 'pending'  ");
}

if($_SESSION['role_id'] == 5)
{
  $first_query = sqlsrv_query( $con ,"SELECT  [id]
      ,[username]
      ,[a_date]
      ,[item]
      ,[a_time]
      ,[status]
      ,[note]
      ,[type]
      ,[creation_time]
      ,[wfm_note]
  FROM [Aya_Web_APP].[dbo].[deduction] WHERE engineer_id ='$engineer_id'  AND status = 'pending'  ");
}

//php -> output data from mysqli
  while( $output_query = sqlsrv_fetch_array($first_query)){
  
$rows ="<tr>";
$rows .= '<td class="hovers" style="border: 1px solid lightgray;">'.$output_query["id"].'</td>';
$rows .= '<td class="hovers" style="border: 1px solid lightgray;">'.$output_query["username"].'</td>';
$rows .= '<td class="hovers" style="border: 1px solid lightgray;">'.$output_query["type"].'</td>';
$rows .=  '<td class="hovers" style="border: 1px solid lightgray;">'.$output_query["item"].'</td>';
$rows .='<td class="hovers" style="border: 1px solid lightgray;">'.$output_query["a_date"]->format('Y-m-d').'</td>';
$rows .= '<td class="hovers" style="border: 1px solid lightgray;">'.$output_query["a_time"]->format('H:i:s').'</td>';
$rows .= '<td class="hovers" style="border: 1px solid lightgray;">'.$output_query["creation_time"]->format("Y-m-d H:i:s").'</td>';//date ("Y-m-d H:i:s")
$rows .= '<td width="5%" class="hovers" style="border: 1px solid lightgray;">'.$output_query["note"].'</td>';
if($_SESSION['role_id'] >1){
$rows .= '<td style="border: 1px solid lightgray;color:green;">'.$output_query["status"].'</td>';
}
if($_SESSION['role_id'] == 1){
$rows .='<td  class="hovers" style="border: 1px solid lightgray;">'.$output_query["senior_reject"].'</td>';}

if($output_query['status'] == 1){

  if($_SESSION['role_id'] == 2){
  $rows .='<td >Senior Accepted</td>';

  }elseif ($_SESSION['role_id'] == 2) {
  $rows .='<td ><a href="?senior='.$output_query["id"].'&engineer_id='.$engineer_id.'">Senior Accepted</a>
                 </td>';}
}elseif($output_query['status'] == 4){
    if($_SESSION['role_id'] == 2){
  $rows .='<td >Senior Rejected</td>';

  }elseif ($_SESSION['role_id'] == 2) {
  $rows .='<td >
    <a type="button" name="senior reject" class="btn btn-danger" href="?senior='.$output_query["id"].'&engineer_id='.$engineer_id.'">Rejected</a></td>';
  }
}elseif($output_query['status'] == 2){

  if($_SESSION['role_id'] == 1){
  }elseif ($_SESSION['role_id'] == 1) {
  $rows .='<td>
   </td>';
  }
}else{
  if($_SESSION['role_id'] == 1){
    if(isset($_GET['engineer_id'])){
  $engineer_id = $_GET['engineer_id'];
}
$rows .= '<td width="20%">
<a type="button" width="1%" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.9), 0 6px 22px 0 rgba(0,0,0,0.20);"class="btn btn btn-outline-success" href="?admin='.$output_query["id"].'&engineer_id='.$engineer_id.'"><samp><i class="fa fa-check"></i> Approve</samp></a>

<a type="button" width="1%" name="admin reject" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.9), 0 6px 22px 0 rgba(0,0,0,0.20);" class="btn btn-outline-danger" href="?admin2='.$output_query["id"].'&engineer_id='.$engineer_id.'">Rejected</a></td>';

/*
$rows .='<td class="hovers">
  <button type="button" class="btn btn-info btn-xs view_data" data-toggle="modal" data-target="#mediumModal" 
  data-type="'.$output_query["id"].'" data-id="'.$output_query["id"].'">Complain</button></td>';
*/

$rows .='<td  style="padding:5px;font-size: 10px;margin-left:6.5%;">
<a type="button" class="btn btn-primary"  href="?id2='.$output_query["id"].'&engineer_id='.$engineer_id.'">Notes</a></td>';

$rows .='<td width="10%">'.$output_query["wfm_note"].'</td>';

  }
if($_SESSION['role_id'] == 3){
  $rows .='<td width="5%">
<a type="button" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.9), 0 6px 22px 0 rgba(0,0,0,0.20);"class="btn btn btn-outline-success" href="?Super='.$output_query["id"].'&engineer_id='.$engineer_id.'"><samp><i class="fa fa-check"></i> Approve</samp></a>

<a type="button" name="senior reject" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.9), 0 6px 22px 0 rgba(0,0,0,0.20);" class="btn btn-outline-danger" href="?Super2='.$output_query["id"].'&engineer_id='.$engineer_id.'">Rejected</a></td>';


  }elseif ($_SESSION['role_id'] == 2) {
  $rows .='<td><a type="button" class="btn btn btn-outline-success" href="?senior='.$output_query["id"].'&engineer_id='.$engineer_id.'"><samp><i class="fa fa-check"></i> Approve</samp></a>

<a name="senior reject" type="button"  class="btn btn-danger" href="?senior2='.$output_query["id"].'&engineer_id='.$engineer_id.'">Rejected</a></td>';}

   
   // section 
  if($_SESSION['role_id'] == 4){
  $rows .='<td width="5%">
<a type="button" class="btn btn-outline-success" href="?section='.$output_query["id"].'&engineer_id='.$engineer_id.'"><samp><i class="fa fa-check"></i> Approve</samp></a>

<a type="button" name="section reject" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.9), 0 6px 22px 0 rgba(0,0,0,0.20);" class="btn btn-outline-danger button3" href="?section2='.$output_query["id"].'&engineer_id='.$engineer_id.'">Rejected</a></td>';}

// UnitManager 
  elseif($_SESSION['role_id'] == 5){
  $rows .='<td>
<a type="button" class="btn btn-outline-success" href="?UnitManager='.$output_query["id"].'&engineer_id='.$engineer_id.'"><samp><i class="fa fa-check"></i> Approve</samp></a>

<a type="button"name="UnitManager reject" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.9), 0 6px 22px 0 rgba(0,0,0,0.20);" class="btn btn-outline-danger button3" href="?UnitManager2='.$output_query["id"].'&engineer_id='.$engineer_id.'">Rejected</a></td>';}

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
<script type="text/javascript">
      $('#mediumModal').on('click', function() {
        $('#mediumModal').modal('show');
    });
</script>

<script src="js/table2excel.js"></script>

  <?php
  /*
   <style>
.button1:hover{
  background-color: #4CAF50;
  color: white;padding:10px;
   border: 5px solid #f44336;
}

.button3:hover {
  background-color: #f44336;
  color: white;padding:10px;
   border-radius:5px 50px 5px 50px;
}
</style>';*/

 include ("footer.html");
}
 ?>
