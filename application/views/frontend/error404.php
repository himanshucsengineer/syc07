<style>
.error {
  width: 100%;
  height: auto;
  padding-top: 5rem;
  padding-bottom: 5rem;
  background-color: white;
}

.error button {
  width: 15rem;
  height: auto;
  padding-top: .5rem;
  padding-bottom: .5rem;
  color: white;
  border: none;
  outline: none;
  background-color: #1876bf;
  margin-top: 2rem;
  margin-bottom: 2rem;
}
</style>
<div class="error">
  <div class="container">
    <div class="row text-center" align=center>
      <div class="col-md-12">
        <h3>Oops!!! Page Not Found</h3>
        <h3>It's look like Nothing was found at this Location. Maybe try One of the links below or a search.</h3>
      </div>
    </div>
    <div align=center>
      <a href="<?php echo base_url();?>"><button>Back to home</button></a>
    </div>
  </div>
</div>