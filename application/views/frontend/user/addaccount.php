<main id="main" class="main">

  <div class="pagetitle">
    <h1>My Account</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
        <li class="breadcrumb-item">user</li>
        <li class="breadcrumb-item active">My Account</li>
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
  <section class="section">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Add Account</h5>

        <form action="<?php echo base_url()?>frontend/user/addaccount/add" method="post">
          <label for="inputText" class=" col-form-label">Bank Name</label>
          <input type="text" class="form-control" name="bank_name" placeholder="Enter Bank Name">
          <label for="inputText" class=" col-form-label">Branch</label>
          <input type="text" class="form-control" name="branch_name" placeholder="Enter Bank Branch">
          <label for="inputText" class="col-form-label">IFSC code</label>
          <input type="text" class="form-control" name="ifsc" placeholder="Enter IFSC">
          <label for="inputText" class="col-form-label">Account Number</label>
          <input type="text" class="form-control" name="account" placeholder="Enter Account Number">
          <label for="inputText" class=" col-form-label">Confirm Account Number</label>
          <input type="text" class="form-control" name="confirm_account" placeholder="Enter Confirm Account Number">
          <label for="inputText" class=" col-form-label">Account Holder Name</label>
          <input type="text" class="form-control" name="holder" placeholder="Enter Account Holder Name">
          <button class="btn btn-primary mt-4">Add Account</button>
        </form>
      </div>
    </div>

    <?php $bankdata = $this->db->where('userid',$_SESSION['user_id'])->get('bank')->result_array();?>

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
                <th scope="col">Branch Name</th>
                <th scope="col">Account No.</th>
                <th scope="col">IFSC</th>
                <th scope="col">Holder Name</th>
                <th scopt="col">Action</th>
              </tr>
              <?php $i=1; foreach($bankdata as $value){?>
              <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $value['bank_name'];?></td>
                <td><?php echo $value['branch_name'];?></td>
                <td><?php echo $value['account'];?></td>
                <td><?php echo $value['ifsc'];?></td>
                <td><?php echo $value['holder'];?></td>

                <td>
                  <form action="<?php echo base_url()?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $value['id']?>">
                    <button class="btn btn-danger"><i class="ri-delete-bin-6-line"></i></button>
                  </form>

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