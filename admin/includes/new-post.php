<?php
/**
 * Created by PhpStorm.
 * User: DERBIE
 * Date: 2/19/2018
 * Time: 8:30 PM
 */
//print_r($_GET);exit;
?>
<!-- Content Header (Page header) -->
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
<form class="form" enctype="multipart/form-data" action='php_actions/addPost.php' method='POST' id="blog_form">

<section class="content col-sm-9">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Add New Post</h3>

        </div>

        <div class="box-body">
            <div class="col-sm-12">

                    <div class="form-group">
                        <input type="text" name="blog_title" class="form-control" placeholder="Write your title here" required/>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="blog_body" placeholder="Write your blog post here" rows="10" required=""></textarea>
                    </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="form-group ">
                <input type="file" accept="image/*" name="blog_image" class="form-control" id="" placeholder="image.." />

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
            <select class="form-control" name="blog_category">
                <option>Select One</option>
                <?php $allCategory = $db->fillCombo('ems_post_category', 'cat_status', '1');
                foreach ($allCategory as $one)
                {?>
                   <option value="<?php echo $one['cat_id'] ?>"><?php echo $one['cat_name'] ?></option>
                <?php } ?>

            </select>
            <br>

            <div class="form-group">
                <label class="control-label">Tags <small>(separate each tag with a comma)</small></label>
                <input type="text" name="blog_tags" class="form-control" placeholder="tags" required/>
            </div>
        </div>
        <!--    .box-body-->

        <div class="box-header">
            <h3 class="box-title">Publish</h3>
        </div>
        <div class="box-body">
            <label class="control-label">Publish<b id="when-to-publish"> Immediately</b></label>
            <button type="button" id="edit-when-to-publish" class="btn-info small">Edit</button>
            <input class="form-control" name="blog_publishDate" type="date" id="date-to-publish" />
            <button type="button" id="save-when-to-publish" class="btn-success">Save</button>
        </div>
        <div class="box-footer">
            <div class="form-group">
                <input class="btn btn-success" name='submit' type="submit" value="Publish" />
                <input class="btn btn-danger" type="button" value="Cancel" />
            </div>
        </div>
    </div>
<!--box-->

</section>
</form>
<!-- /.content -->
