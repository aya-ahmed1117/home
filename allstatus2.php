<?php


include ("pages.php");
?>

  <title>All History</title>
<meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='expires' content='0'>
<meta http-equiv='pragma' content='no-cache'>
  <link rel="stylesheet" type="text/css" href="css/kpi_css.css">
</head> 
<form method="post" class="form-horizontal">    

     
<div style="padding: 20px;">
    <?php

$engineer_id = $_SESSION['id'];

if($role_id == 2) {
    ?>
<h2 style="color:; ">Table Filter</h2>
    <input type="search" class="light-table-filter" data-table="order-table" placeholder="Filter"/>
    <br>
    <br>
<div class="tableFixHead">
<table class="table order-table"  cellspacing="0" id="tblCustomers" >
  <thead >
    <tr>
    <th >engineer_Name</th>
    <th >All leaves status</th>
    <th >All Deduction status</th>
    <th >All Tasks status</th>
</tr>
  </thead>
  <tbody>
  <?php
$check_engineers = sqlsrv_query( $con ,"SELECT * FROM employee WHERE manager_id = '$self' ");
while ($output_engineers = sqlsrv_fetch_array($check_engineers)){
  $engineers_id = $output_engineers['id'];
  $rows ="<tr>";
  $rows.="<td style='border: 1px solid gray;font-size:13px;'>".$output_engineers['username']."</td>";

      $check_orders = sqlsrv_query( $con ,"SELECT * FROM deduction WHERE engineer_id = '$engineers_id'  ");
          //$orders_num2 = mysqli_num_rows($check_orders);
          $orders_num2 = 1;
    $check_orders = sqlsrv_query( $con ,"SELECT * FROM leaves WHERE engineer_id = '$engineers_id' ");
         // $orders_num1 = mysqli_num_rows($check_orders);
          $orders_num1 =1;
          $check_orders = sqlsrv_query( $con ,"SELECT * FROM create_task WHERE engineer_id = '$engineers_id' ");
          $orders_num=1;

  $rows.="<td class='hovers' style='border: 1px solid lightgray;'><a style='color:#f3e5ab;font-size:13px;' href='leavesstatus2.php?engineer_id=".$engineers_id."'>Leaves</a></td>";

  $rows.="<td class='hovers' style='border: 1px solid lightgray;'><a style='color:#f3e5ab;font-size:13px;' href='deductionstatus2.php?engineer_id=".$engineers_id."'>Deduction</a></td>";

  $rows.="<td class='hovers' style='border: 1px solid lightgray;'><a style='color:#f3e5ab;font-size:13px;' href='taskstatus2.php?engineer_id=".$engineers_id."'>Tasks</a></td>";


  $rows.="</tr>";
  echo $rows;

}
}
$engineer_id = $_SESSION['id'];
if($_SESSION['role_id'] == 3){
 ?>
 <h2 style="color:; ">Table Filter</h2>
    <input type="search" class="light-table-filter" data-table="order-table" placeholder="Filter"/>
    <br>
    <br>
<div class="tableFixHead">
<table class="table order-table"  cellspacing="0" id="tblCustomers" >
  <thead >
    <tr>
  <th >engineer_Name</th>
  <th >All leaves status</th>
  <th >All Deduction status</th>
  <th>All Tasks status</th>
</tr>
  </thead>
  <tbody>
<?php 
$check_engineers = sqlsrv_query( $con ,"SELECT * FROM employee WHERE super_id = '$self' ");
while ($output_engineers = sqlsrv_fetch_array($check_engineers)){
  $engineers_id = $output_engineers['id'];
  $rows ="<tr>";
  $rows.="<td style='border: 1px solid gray;font-size:13px;'>".$output_engineers['username']."</td>";

      $check_orders = sqlsrv_query( $con ,"SELECT * FROM deduction WHERE engineer_id = '$engineers_id'  ");
          //$orders_num2 = mysqli_num_rows($check_orders);
          $orders_num2 = 1;
    $check_orders = sqlsrv_query( $con ,"SELECT * FROM leaves WHERE engineer_id = '$engineers_id' ");
         // $orders_num1 = mysqli_num_rows($check_orders);
          $orders_num1 =1;
          $check_orders = sqlsrv_query( $con ,"SELECT * FROM create_task WHERE engineer_id = '$engineers_id' ");
          $orders_num=1;

  $rows.="<td class='hovers' style='border: 1px solid lightgray;'><a style='color:#f3e5ab;font-size:13px;' href='leavesstatus2.php?engineer_id=".$engineers_id."'>Leaves</a></td>";

  $rows.="<td class='hovers' style='border: 1px solid lightgray;'><a style='color:#f3e5ab;font-size:13px;' href='deductionstatus2.php?engineer_id=".$engineers_id."'>Deduction</a></td>";

  $rows.="<td class='hovers' style='border: 1px solid lightgray;'><a style='color:#f3e5ab;font-size:13px;' href='taskstatus2.php?engineer_id=".$engineers_id."'>Tasks</a></td>";


  $rows.="</tr>";
  echo $rows;

}

} ?>
</tbody>
</table>
<?php if($role_id == 1){
    ?>

 <br>
<h2 style="color:; ">Table Filter</h2>
    <input type="search" class="light-table-filter" data-table="order-table" placeholder="Filter"/>
    <br>
    <br>
<div class="tableFixHead">
<table class="table order-table"  cellspacing="0" id="tblCustomers" >
  <thead >
    <tr>
        <th >Engineer Name</th>
        <th >All leaves status</th>
        <th >All Deduction status </th>
        <th >All Tasks status</th>
        <th >All Swap status</th>
    </tr>
  </thead>
  <tbody>
    <?php
//admin can view all engineers ..
$check_engineers = sqlsrv_query( $con ,"SELECT * FROM employee WHERE role_id  not in (1,4,5,6,7)");
while ($output_engineers = sqlsrv_fetch_array($check_engineers)){

  $engineers_id = $output_engineers['id'];
  $rows ="<tr>";
  $rows.= "<td class='hovers' style='border: 1px solid lightgray;' >".$output_engineers['username']."</td>";

    $check_orders = sqlsrv_query( $con ,"SELECT distinct id,username FROM deduction WHERE engineer_id = '$engineers_id' and year([creation_time])=2021 ");
    //$orders_num2 = mysqli_num_rows($check_orders);
    $orders_num2  = 1 ;
    $check_orders = sqlsrv_query( $con ,"SELECT distinct s_id,username FROM create_task WHERE engineer_id = '$engineers_id' and year([creation_time])=2021");
   // $orders_num = mysqli_num_rows($check_orders);
    $orders_num  = 1 ;

    $check_orders = sqlsrv_query( $con ,"SELECT distinct id,username FROM leaves WHERE engineer_id = '$engineers_id' and year([creation_time])=2021");
    //$orders_num1 = mysqli_num_rows($check_orders);
    $orders_num1  = 1 ;

  $check_orders = sqlsrv_query( $con ,"SELECT distinct id,username FROM swaping WHERE engineer_id = '$engineers_id' and year([creation_time])=2021");
//$orders_num = mysqli_num_rows($check_orders);
$orders_nums =1 ;

  $rows.="<td class='hovers' style='border: 1px solid lightgray;background-color:#09568d;' ><a style='color:white;font-size:13px;' href='leavesstatus2.php?engineer_id=".$engineers_id."'>Leaves</a></td>";

  $rows.="<td class='hovers' style='border: 1px solid lightgray;background-color:#09568d;'><a style='color:white;font-size:13px;' href='deductionstatus2.php?engineer_id=".$engineers_id."'>Deduction</a></td>";

  $rows.="<td class='hovers' style='border: 1px solid lightgray;background-color:#09568d;'><a style='background-color:#09568d;color:white;font-size:13px;' href='taskstatus2.php?engineer_id=".$engineers_id."'>Tasks</a></td>";

  $rows.="<td class='hovers' style='border: 1px solid lightgray;background-color:#09568d;'><a style='color:white;font-size:13px;' href='Team_Swaps?engineer_id=".$engineers_id."'>Swap</a></td>";


  $rows.="</tr>";
  echo $rows;
}}

?>


  </tbody>
</table>
   
    </div>
</form>

</div>
<?php 
include("footer.html");
?>