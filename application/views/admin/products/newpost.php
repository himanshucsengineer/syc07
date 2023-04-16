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
    input[type="file"],input[type="number"],
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

<div class="new-post">
    <div class="container">
        <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
        ?>
        <h3>New Post</h3>
        <form method="post" action="newpost/post" enctype="multipart/form-data">

            <div class="row">
                <div class="col-md-9">
                    <div class="box">
                        <label>Product Name</label>
                        <input type="text" name="name" placeholder="Enter Heading" required>

                        <label>Product Description</label>
                        <textarea name="about" id="textareaContent" placeholder="Type Here...." required></textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box">
                        <label for="">Select Weight/Pieces</label>
                        <select name="net_content" id="" required>
                            <option value="">Select Weight/Pcs.</option>
                            <option value="weight">Weight</option>
                            <option value="pieces">Pieces</option>
                        </select>
                        
                        <label for="">Net Content</label>
                        <input type="text" placeholder="Enter Net Weight / Pieces" name="net_content_2" required>
                        <p>Ex: 1 Kg. / 500 grm. / 10 pieces</p>
                        <label>Publish Your Post</label>
                        <button name="formSubmit">Publish</button>
                    </div>
                    <div class="box">
                        <label>Featured Image</label>
                        <input  multiple="multiple" name="files[]"  maxlength="5" id="fileupload" type="file" required>
                        <p>Max : 5 files</p>
                    </div>


                    <div class="box">
                        <label>Original Price (INR):</label>
                        <input type="number" name="original_price" placeholder="Enter Original Price" required>
                        <label>After Discount Price (INR):</label>
                        <input type="number" name="discounted_price" placeholder="Enter After Discount Price" required>
                    </div>
                </div>
            </div>



      
        </form>
    </div>
</div>




<script language="javascript" type="text/javascript">
    $(function() {
        $("#fileupload").change(function() {
            $("#dvPreview").html("");
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpeg|.jpg|.png)$/;
            if (regex.test($(this).val().toLowerCase())) {
                if ($.browser.msie && parseFloat(jQuery.browser.version) <= 9.0) {
                    $("#dvPreview").show();
                    $("#dvPreview")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = $(this).val();
                } else {
                    if (typeof(FileReader) != "undefined") {
                        $("#dvPreview").show();
                        $("#dvPreview").append("<img class='thunbnail_image images_preview'/>");
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $("#dvPreview img").attr("src", e.target.result);
                        }
                        reader.readAsDataURL($(this)[0].files[0]);
                    } else {
                        alert("This browser does not support FileReader.");
                    }
                }
            } else {
                alert("Please upload a valid file.");
            }
        });
    });
</script>

<script src="<?php echo base_url(); ?>admin/assets/ckeditor/ckeditor.js"></script>

<script>
    $(document).ready(function() {
        CKEDITOR.replace('textareaContent');
    });
</script>