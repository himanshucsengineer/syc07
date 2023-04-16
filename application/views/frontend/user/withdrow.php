<main id="main" class="main">

  <div class="pagetitle">
    <h1>Payment Request</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
        <li class="breadcrumb-item">user</li>
        <li class="breadcrumb-item active">Payment Request</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <?php
      if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
        ?>
  <?php $bank_list = $this->db->where('userid',$_SESSION['user_id'])->get('bank')->result_array()?>

  <section class="section">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Payment Request</h5>

        <form action="<?php echo base_url()?>frontend/user/withdrow/create" method="post">
          <label for="inputText" class=" col-form-label">Select Bank</label>
          <select name="bank_id" id="" class="form-select">
            <option value="">Select Bank</option>
            <?php foreach($bank_list as $value){?>
            <option value="<?php echo $value['id']?>"><?php echo $value['bank_name']?></option>
            <?php }?>
          </select>
          <label for="inputText" class=" col-form-label">Amount</label>
          <input type="number" name="amount" class="form-control" placeholder="Enter Amount">
          <p>Minimum amount : 500 Rs.</p>
          <button type="submit" class="btn btn-primary mt-4">Withdraw</button>
        </form>
      </div>
    </div>
    <?php $withdrawhistory = $this->db->where('user_id',$_SESSION['user_id'])->get('withdraw')->result_array()?>
    <div class="row">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">My Accounts</h5>
          <!-- Bordered Table -->

          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Bank Name</th>
                <th scope="col">Amount</th>
                <th scope="col">Status</th>
              </tr>
              <?php $i=1; foreach($withdrawhistory as $val){?>
              <tr>
                <td><?php echo $i;?></td>
                <td>
                  <?php foreach($bank_list as $bank){
                    if($val['bank_id'] == $bank['id']){
                      echo $bank['bank_name'];
                    }
                  }?>
                </td>
                <td><?php echo $val['amount']?></td>
                <td>
                  <?php if($val['status'] == 0 ){ echo "Pending";}else{echo "Transfered";}?>
                </td>
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