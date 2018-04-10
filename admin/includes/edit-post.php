<?php
/**
 * Created by PhpStorm.
 * User: DERBIE
 * Date: 3/23/2018
 * Time: 3:06 AM
 */
$row = $db->getOneValue('ems_post', 'post_id', $_GET['id']);
$title = $row['post_title'];
$body = $row['post_content'];
$image = $row['post_image'];
$category = $row['post_category'];
$date = $row['post_date_scheduled'];
$tag = $row['post_tags'];

?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Sidebar Collapsed
        <small>Layout with collapsed sidebar on load</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Layout</a></li>
        <li class="active">Collapsed Sidebar</li>
    </ol>
</section>

<!-- Main content -->

<section class="content-header" xmlns="http://www.w3.org/1999/html">
    <h1>
        Sidebar Collapsed
        <small>Layout with collapsed sidebar on load</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Layout</a></li>
        <li class="active">Collapsed Sidebar</li>
    </ol>
</section>

<!-- Main content -->
<form class="form" action='php_actions/editPost.php' method='POST' id="blog_form">

    <section class="content col-sm-9">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Post</h3>

            </div>

            <div class="box-body">
                <div class="col-sm-12">

                    <div class="form-group">
                        <input type="text" value="<?php echo $title; ?>" name="blog_title" class="form-control" placeholder="Write your title here" required/>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="bContent" name="blog_body" placeholder="Write your blog post here" rows="10" required=""></textarea>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="form-group col-sm-push-1">
                    <input class="btn btn-info" name="blog_image" value="<?php echo $image?>" type="file" />

                </div>
            </div>

            <!-- /.box-footer-->

        </div>
        <!-- /.box -->
    </section>
    <section class="content col-sm-3">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Select Category</h3>
            </div>
            <div class="box-body">
                <select class="form-control" id="bCategory" name="blog_category">
                    <option>Select One</option>
                    <?php $allCategory = $db->fillCombo('ems_post_category', 'cat_status', '1');
                    foreach ($allCategory as $one)
                    {?>
                        <option value="<?php echo $one['cat_id'] ?>"><?php echo $one['cat_name'] ?></option>
                    <?php }?>

                </select>
                <br>

                <div class="form-group">
                    <label class="control-label">Tags <small>(separate each tag with a comma)</small></label>
                    <input type="text" name="blog_tags" value="<?php echo $tag?>" id="bTag" class="form-control" placeholder="tags" required/>
                </div>
            </div>
            <!--    .box-body-->

            <div class="box-header">
                <h3 class="box-title">Publish</h3>
            </div>
            <div class="box-body">
                <label class="control-label">Publish<b id="bwhen-to-publish"> <?php echo $date ?></b></label>
                <button type="button" id="bedit-when-to-publish" class="btn-info small">Edit</button>
                <input class="form-control" name="blog_publishDate" type="date" id="bdate-to-publish" />
                <button type="button" id="bsave-when-to-publish" class="btn-success">Save</button>
            </div>
            <div class="box-footer">
                <div class="form-group">
                    <input hidden name="id" value="<?php echo $_GET['id']?>">
                    <input class="btn btn-success" name='submit' type="submit" value="Publish" />
                    <input class="btn btn-danger" type="button" value="Cancel" />
                </div>
            </div>
        </div>
        <!--box-->

    </section>
</form>
<!-- /.content -->


<script type="text/javascript">
    $(document).ready(function () {
        $("#bContent").html("<?php echo $body; ?>");
        $("#bCategory").val(<?php echo $category; ?>);

        $("#bsave-when-to-publish").toggle(0);
        $("#bdate-to-publish").toggle(0);
        $("#bedit-when-to-publish").click(function () {
            // $("#bdate-to-publish").removeAttr('disabled');
            $("#bdate-to-publish").toggle(1);
            $("#bsave-when-to-publish").toggle(1);
            $("#bwhen-to-publish").text('');
            $(this).toggle(0);

        });
        $("#bsave-when-to-publish").click(function () {
            if ($("#bdate-to-publish").val()==='' || $("#bdate-to-publish").val()===moment().format("YYYY-MM-DD"))
            {
                $("#bwhen-to-publish").text(' <?php echo $date?>');
                $("#bdate-to-publish").toggle(0);
                // $("#bdate-to-publish").attr('disabled', 'disabled');
                $(this).toggle(0);
                $("#bedit-when-to-publish").toggle(1);
            }
        });
        $("#bdate-to-publish").change(function (e) {

            var when = ($("#bdate-to-publish").val());

            $("#bsave-when-to-publish").click(function () {
                if(when==='') {
                    $("#bwhen-to-publish").text(' <?php echo $date?>');
                    $("#bdate-to-publish").toggle(0);
                    $(this).toggle(0);
                    $("#bedit-when-to-publish").toggle(1);

                }
                else{
                    $("#bwhen-to-publish").text(' On: '+                                                                                                when);
                    $("#bdate-to-publish").toggle(0);
                    $("#bedit-when-to-publish").toggle(1);
                    $(this).toggle(0);

                }
            });
        });
    })
</script>