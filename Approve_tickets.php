
<?php
include ("pages.php");

     $self = $_SESSION['id'];
      $role_id = $_SESSION['role_id'];
      $s_username = $_SESSION['username'];
      ?>
    <title>Approve ticket</title>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/my_table.css">

</head>
 
<div style="padding:20px;">
<center>
<div class="col-md-8">
        <aside class="profile-nav alt" style="border:1px solid rgba(0,0,0,.125);
        border-radius: 20px 20px 20px 20px;">
            <div class="card-header user-header alt bg-light"
            style="border-radius: 20px 20px 0 0 ;">
            <div class="media">
            <div class="media-body">
              <h2 class="text-dark display-12" >Ticketing System</h2>
              <p style="color:lightgray;"> <?php
              $time = date("H");
              if ($time < "12") {
        echo "<img src='images/morning.png' style='width:50px;' > Good morning : $s_username";
    }if ($time >= "12" && $time < "17") {
        echo "<img src='images/afternoon.png' style='width:50px;margin-top:-15px;' > Good afternoon : $s_username";
    }if ($time >= "17" && $time < "19") {
        echo "<img src='images/evening.png' style='width:50px;' > Good evening : $s_username";
    } if ($time >= "19") {
        echo "<img src='images/night.png' style='width:50px;' > Good night : $s_username";
    }
  ?></p>
              </div>
          </div>
      </div>
       <p style="background-color:#55608f;font-weight:bold;font-size:16px;
       color:white;">Here you can find all requests pending workforce action</p>
    </aside>
  </div>
</center>
  
</div>
<br>
<br>
<?php

$self = $_SESSION['id'];

if ($_SESSION['role_id'] == 1){

$check_orders = sqlsrv_query( $con ,"SELECT * FROM tbl_Ticketing_system " , array() , array('Scrollable' =>'static'));
//$open = $_POST['id'];
 while($output = sqlsrv_fetch_array($check_orders )){
$open = $output['Request_status'];

$check_orders = sqlsrv_query( $con ,"SELECT * FROM tbl_Ticketing_system WHERE [Request_status] = 'Open'  " , array() , array('Scrollable' =>'static'));

$orders_num = sqlsrv_num_rows($check_orders);

$check_orders = sqlsrv_query( $con ,"SELECT * FROM tbl_Ticketing_system WHERE [Request_status] = 'in progress' " , array() , array('Scrollable' =>'static'));
$orders_num2 = sqlsrv_num_rows($check_orders);

$check_orders = sqlsrv_query( $con ,"SELECT * FROM tbl_Ticketing_system WHERE [Request_status] = 'closed' " , array() , array('Scrollable' =>'static'));
$orders_num3 = sqlsrv_num_rows($check_orders);

$check_orders = sqlsrv_query( $con ,"SELECT * FROM tbl_Ticketing_system WHERE [Request_status] = 'pending to requester' " , array() , array('Scrollable' =>'static'));
$orders_num4 = sqlsrv_num_rows($check_orders);

$check_orders = sqlsrv_query( $con ,"SELECT * FROM tbl_Ticketing_system WHERE [Request_status] = 'pending to admin'  " , array() , array('Scrollable' =>'static'));
$orders_num5 = sqlsrv_num_rows($check_orders);

$check_orders = sqlsrv_query( $con ,"SELECT * FROM tbl_Ticketing_system WHERE [Request_status] = 'on hold' " , array() , array('Scrollable' =>'static'));
$orders_num6 = sqlsrv_num_rows($check_orders);

while($output_query = sqlsrv_fetch_array($check_orders)){
}
$opens = (($output_query['Request_ID']) && ($output_query['Request_status'] == 'Open' ));


if(  $orders_num > 0  || $orders_num2 > 0 || $orders_num3 > 0 || $orders_num4 > 0 || $orders_num5 > 0 || $orders_num6 > 0)

 {
    echo '<div class="content">
            <div class="animated fadeIn">
              <div class="row" style="width:100%; padding: 20px;">

                <div class="col-md-4">
                  
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Open</strong>
                        </div>
                         <a href="approve_ticket.php?Open='.$open.'class="divlink">
                        <div class="card-body">
                          <p class="card-text">'.$orders_num.'</p>
                        </div>
                        </a>
                    </div>
                    
                </div>

              <div class="col-md-4">
                  <div class="card">
                      <div class="card-header">
                          <strong class="card-title">In Progress</strong>
                      </div>
                      <a href="approve_ticket.php?progress='.$open.'"class="divlink">
                      <div class="card-body">
                          <p class="card-text">'.$orders_num2.'</p>
                      </div>
                    </a>
                  </div>
              </div>

              <div class="col-md-4">
                  <div class="card">
                      <div class="card-header">
                          <strong class="card-title">Pending to requester </strong>
                      </div>
                      <a href="approve_ticket.php?pendindR='.$open.'"class="divlink">
                      <div class="card-body">
                          <p class="card-text">'.$orders_num4.' </p>
                      </div>
                    </a>
                  </div>
              </div>

                  </div>
                </div>
              </div>

              <div class="content">
            <div class="animated fadeIn">
              <div class="row" style="width:100%; padding: 20px;">

                <div class="col-md-4">
                  
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">pending to Admin</strong>
                        </div>
                        <a href="approve_ticket.php?pendindA='.$open.'" class="divlink">
                        <div class="card-body">
                          <p class="card-text">'.$orders_num5.'</p>
                        </div>
                        </a>
                    </div>
                    
                </div>

              <div class="col-md-4">
                  <div class="card">
                      <div class="card-header">
                          <strong class="card-title">On Hold</strong>
                      </div>
                      <a href="approve_ticket.php?Hold='.$open.'" class="divlink">
                      <div class="card-body">
                          <p class="card-text">'.$orders_num6.'</p>
                      </div>
                    </a>
                  </div>
              </div>

              <div class="col-md-4">
                  <div class="card">
                      <div class="card-header">
                          <strong class="card-title">closed</strong>
                      </div>
                      <a  href="approve_ticket.php?closed='.$open. '" class="divlink">
                      <div class="card-body">
                          <p class="card-text">'.$orders_num3.' </p>
                      </div>
                    </a>
                  </div>
              </div>

                  </div>
                </div>
              </div>';
               }}
}

?>
 

</div>
    <?php

 include ("footer.html");
 ?>
