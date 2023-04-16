<link href="<?php echo base_url(); ?>admin/assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>admin/assets/css/core.css" rel="stylesheet" type="text/css" />

<script src="<?php echo base_url(); ?>admin/assets/js/jquery.dataTables.min.js"></script>


<style>
.new-post {
  width: 100%;
  height: auto;
  padding-top: 2rem;
  padding-bottom: 2rem;

}

.new-post .box {
  width: 100%;
  height: auto;
  background-color: white;
  box-shadow: 0 3px 3px -2px rgb(0 0 0 / 40%);
  border: 1px solid #cdcdcd;
  padding-top: 2rem;
  padding-bottom: 2rem;
  padding-left: 1rem;
  padding-right: 1rem;
  margin-bottom: 2rem;
}

.new-post input[type="text"],
input[type="file"],
input[type="number"],
select,
textarea {
  width: 100%;
  height: auto;
  padding-top: .5rem;
  padding-bottom: .5rem;
  padding-left: 1rem;
  border: 1px solid #cdcdcd;
  margin-bottom: 1rem;
}

.new-post button {
  width: 10rem;
  height: auto;
  padding-top: .6rem;
  padding-bottom: .6rem;
  color: white;
  background-color: rgb(239, 69, 84);
  outline: none;
  border: none;
  transition: .5s;
}

.new-post button:hover {
  opacity: .7;

}

.new-post p {
  margin-top: -.5rem;
  color: #666;
  font-size: 12px;
  font-weight: 300;
  font-style: italic;
}
</style>

<?php $initialdata = $this->db->get('schemesetting')->result_array();?>

<div class="new-post">
  <div class="container">
    <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
        ?>
    <h3>Iniial Amount</h3>
    <form method="post" action="<?php echo base_url()?>admin/initialamount/update" enctype="multipart/form-data">

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <?php foreach($initialdata as $value){?>
            <label>Joining Amount</label>
            <input type="text" name="joining" placeholder="Enter Joining amount" value="<?php echo $value['joining']?>"
              required>

            <label>Salary percentage</label>
            <input type="text" name="salary" placeholder="Enter Salary percentage" value="<?php echo $value['salary']?>"
              required>

            <label>Bonus Amount</label>
            <input type="text" name="bonus" placeholder="Enter Bonus amount" value="<?php echo $value['bonus']?>"
              required>

            <label>Insurance Amount</label>
            <input type="text" name="insurance" placeholder="Enter Insurance amount"
              value="<?php echo $value['insurance']?>" required>

            <label>Pension Amount</label>
            <input type="text" name="pension" placeholder="Enter Pension amount" value="<?php echo $value['pension']?>"
              required>

            <input type="hidden" name="id" value="<?php echo $value['id']?>">
            <button name="formSubmit">Update</button>
            <?php }?>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>