<main id="main" class="main">

  <div class="pagetitle">
    <h1>Withdraw Pension</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
        <li class="breadcrumb-item">user</li>
        <li class="breadcrumb-item active">Withdraw Pension</li>
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
        <h5 class="card-title">Withdraw Pension</h5>

        <form action="<?php echo base_url()?>frontend/user/withdrawpension/transfer" method="post">
          <!-- <label for="inputText" class=" col-form-label">Select Bank</label> -->
          <!-- <select name="bank_id" id="" class="form-select">
            <option value="">Select Bank</option>
            <?php foreach($bank_list as $value){?>
            <option value="<?php echo $value['id']?>"><?php echo $value['bank_name']?></option>
            <?php }?>
          </select> -->
          <label for="inputText" class=" col-form-label">Amount</label>
          <input type="number" name="amount" class="form-control" placeholder="Enter Amount">
          <p>Minimum amount : 1500 Rs.</p>
          <button type="submit" class="btn btn-primary mt-4">Transfer to salary</button>
        </form>
      </div>
    </div>
  </section>
</main><!-- End #main -->