<?php 
 session_start();

if(!isset($_SESSION['admin_logged_in'])){
    header('location: login.php');
    exit;
}

?>

<?php 

$orders = array(
    array('order_id' => 1, 'order_status' => 'pending', 'user_id' => 1, 'order_date' => '2022-01-01', 'user_phone' => '1234567890', 'user_address' => 'Address 1'),
    array('order_id' => 2, 'order_status' => 'shipped', 'user_id' => 2, 'order_date' => '2022-01-05', 'user_phone' => '9876543210', 'user_address' => 'Address 2'),
    // Add more orders data here
);

?>


<!-- Admin Dashboard Template -->

<?php include('header.php');?>

    <section class="">

    <div class="container">
        <div class="row col-lg-12 col-md-12 col-sm-12">
            <div class="row mx-auto container">
                <h1>Dashboard</h1>
                
                <table class="table table-striped table-sm">
  <caption>List of users</caption>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Ordere Status</th>
      <th scope="col">User Id</th>
      <th scope="col">Order Date</th>
      <th scope="col">User Phone</th>
      <th scope="col">User Address</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($orders as $orders) {?>
    <tr>
        <td><?php echo $orders['order_id'];?></td>
        <td><?php echo $orders['order_status'];?></td>
        <td><?php echo $orders['user_id'];?></td>
        <td><?php echo $orders['order_date'];?></td>
        <td><?php echo $orders['user_phone'];?></td>
        <td><?php echo $orders['user_address'];?></td>
        <td><a class="btn btn-primary">Edit</a></td>
        <td><a class="btn btn-danger">Delete</a></td>
    </tr>
    <?php }?>
  </tbody>
</table>
            </div>
        </div>
    </div>

</section>
</body>
</html>