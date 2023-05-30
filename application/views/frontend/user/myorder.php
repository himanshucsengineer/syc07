<main id="main" class="main">
  <?php $user_id = $_SESSION['user_id']; ?>
  <div class="pagetitle">
    <h1>My Orders</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
        <li class="breadcrumb-item">user</li>
        <li class="breadcrumb-item active">My Orders</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <?php $orderdata = $this->db->where('user_id',$user_id)->get('orders')->result_array();
  
  
  ?>

  <section class="section">
    <div class="row">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Insurance History</h5>
          <!-- Bordered Table -->
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Amount</th>
                <th scopt="col">Billing Address</th>
                <th scope="col">Shipping Address</th>
              </tr>
              <?php $i = 1; foreach($orderdata as $value){ $productdata = $this->db->where('id',$value['product_id'])->get('products')->result_array();?>
              <tr>
                <td><?php echo $i?></td>
                <?php foreach($productdata as $product){?>
                <td><?php echo $product['name']?></td>
                <td><?php echo $product['discounted_price']?></td>
                <?php }?>
                <td><?php echo $value['address1'].", ". $value['address2'].", ".$value['city'].", ".$value['state'].", ".$value['country']." (".$value['zip'].")"?></td>
                <td><?php echo $value['ship_address1'].", ". $value['ship_address2'].", ".$value['ship_city'].", ".$value['ship_state'].", ".$value['ship_country']." (".$value['ship_zip'].")"?></td>
              </tr>
              <?php $i++;}?>
            </thead>
            <tbody>
            </tbody>
          </table>
          <!-- End Bordered Table -->
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->