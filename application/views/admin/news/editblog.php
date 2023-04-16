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
        padding-top: 1rem;
        padding-bottom: 1rem;
        color: white;
        background-color: rgb(239, 69, 84);
        outline: none;
        border: none;
        transition: .5s;
    }

    .new-post button:hover {
        opacity: .7;
    }

    #im {
        width: 50%;
        height: auto;
        padding-top: 1rem;
        padding-bottom: 2rem;
    }

    .new-post p {
        margin-top: -.5rem;
        color: #666;
        font-size: 12px;
        font-weight: 300;
        font-style: italic;
    }
    #video{
        width: 100%;
        height: auto;
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
        <form method="post" action="editpost/update" enctype="multipart/form-data">
            <?php if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'ON') {
                $url = "https://";
            } else {
                $url = "http://";
            }
            $url .= $_SERVER['HTTP_HOST'];
            $url .= $_SERVER['REQUEST_URI'];



            $parts = basename($url);

            $rerfe = explode("=", $parts);

            ?>
            <?php foreach ($fetch_content as $value) {
                if ($value['id'] == $rerfe[1]) { ?>
                    <?php $vall =$value['image']; $last = basename($vall); $ext = explode('.', $last); if($ext[1]=="mp4"){$videotag = '<video src="'.$value['image'].'" controls id="video"></video>'; }else{$videotag ='<img src="'.$value['image'].'" id="im">';}?>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="box">
                                <label>Post Heading</label>
                                <input type="text" name="heading" placeholder="Enter Heading" value="<?php echo $value['head']; ?>">

                                <label>Post Content</label>
                                <textarea name="content" id="textareaContent" placeholder="Type Your Blog Here...." required><?php echo $value['content']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="box">
                                <label>Post Link</label>
                                <input name="link" type="text" placeholder="Enter Post name" value="<?php echo $value['link']; ?>">
                                <p>Update Your Own Post Link</p>
                                <label>Publish Your Post</label>
                                <button name="formSubmit">Update</button>
                            </div>
                            <div class="box">
                                <label>Featured Image</label>
                                <?php echo $videotag; ?>
                                <p>Your Featured Image</p>
                                <label>upload new Image</label>
                                <input name="images" id="fileupload" type="file">
                                <p>Update Featured Image</p>
                                <input class="hidden" name="id" type="text" value="<?php echo $value['id']; ?>">
                            </div>


                            <!--div class="box">
                    <label>Meta Tags</label>
                    <textarea name="tags"  required><?php echo $value['tag']; ?></textarea>
                   
                    <p>Separate tags with commas</p>
                    
                </div-->

                        </div>
                    </div>







                    <!--div class="box">
            <label>Meta Title</label>
                <input name="mtitle" type="text" placeholder="Enter Meta Title" value="<?php echo $value['mt_title']; ?>">
                
                <label>Meta Description</label>
               
                <textarea name="mdesc" required><?php echo $value['m_desc']; ?></textarea>
                
                <label>Meta Keywords</label>
                <input name="mkey" type="text" placeholder="Enter Meta Keywords" value="<?php echo $value['m_key']; ?>">
        </div-->
            <?php }
            } ?>
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