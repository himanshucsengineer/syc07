<link href="<?php echo base_url(); ?>admin/assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>admin/assets/css/core.css" rel="stylesheet" type="text/css" />

<script src="<?php echo base_url(); ?>admin/assets/js/jquery.dataTables.min.js"></script>

<style>
    .blod-category {
        width: 100%;
        height: auto;
        padding-top: 2rem;
        padding-bottom: 2rem;
    }

    .blog-category h3 {
        text-align: center;
        margin-bottom: 2rem;
    }

    .blog-category input[type="text"],
    textarea,
    select {
        width: 100%;
        height: auto;
        border: 1px solid #cdcdcd;
        padding-top: .5rem;
        padding-bottom: .5rem;
        padding-left: 1rem;
        outline: none;
        margin-bottom: 1rem;
    }

    .blog-category button {
        width: 10rem;
        padding-top: 1rem;
        padding-bottom: 1rem;
        border: none;
        color: white;
        background-color: rgb(239, 69, 84);
    }

    .table {
        width: 100% !important;
        height: auto;
    }

    .table-responsive {
        margin-top: 4rem;
    }
</style>
<div class="blog-category">
    <div class="container">
        <?php
        if ($this->session->flashdata('admin_success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('admin_success') . '</div>';
        } else if ($this->session->flashdata('admin_error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('admin_error') . '</div>';
        }


        ?>
        <h3>Create Category</h3>


        <form action="<?php echo base_url(); ?>admin/news/category/insert" method="post" id="referform">
            <label for="">Sub Category</label>
            <input type="text" name="cate" placeholder="Enter Category Name" required>
            <label for="">Category Description</label>
            <textarea name="desc" rows="5" placeholder="Enter Category Description" required></textarea>
            <button name="formSubmit">Create</button>

        </form>

        <div class=" table-responsive">

            <table id="lowinventory" data-order='[[ 0, "desc" ]]' class="table table-striped table-bordered table_shop_custom display">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <
                        <th>Description</th>
                        <th>Action</th>



                    </tr>

                </thead>
                <tbody>

                </tbody>
            </table>
        </div>



    </div>

</div>


<div id="deletePurchaseModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php echo form_open(base_url('admin/news/category/deletecardetail'), array('method' => 'post')); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                <h4 class="modal-title">Delete Course</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" class="deletesliderId" name="deletesliderId" />
                        <h4><b>Do you really want to Delete this Course ?</b></h4>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-info" name="deleteslider" value="Delete">
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#lowinventory').DataTable({
            "ajax": "<?php echo base_url(); ?>admin/news/category/addinventory_api"
        });


        $(document).on('click', '.delete_sliders', function() {

            $('.deletesliderId').val($(this).attr('data-id'));
            $('#deletePurchaseModal').modal('show');

        });

    });
</script>