<main id="main" class="main">
  <?php $user_id = $_SESSION['user_id']; ?>
  <div class="pagetitle">
    <h1>Order Transaction History</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
        <li class="breadcrumb-item">user</li>
        <li class="breadcrumb-item active">Order Transaction History</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <?php $orderdata = $this->db->where('user_id',$user_id)->get('order_transaction')->result_array();
  
  
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
                <th scope="col">Transaction Id</th>
                <th scope="col">Amount</th>
                <th scopt="col">Order Id</th>
              </tr>
              <?php $i = 1; foreach($orderdata as $value){?>
              <tr>
                <td><?php echo $i?></td>
               
                <td><?php echo $value['transaction_id']?></td>
                <td><?php echo $value['amount']?></td>
                <td><?php echo $value['order_id']?></td>
            
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