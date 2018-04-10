<?php
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
<section class="content col-sm-12">
    <div class="box box-info"   >
        <div class="box-header with-border">
            <h3 class="box-title">Posts</h3>

            <div class="box-tools pull-right">
<!--                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>-->
<!--                </button>-->
<!--                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="table" class="table no-margin">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Tags</th>
                        <th>Comments</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $allTable = $db->fillCombo('ems_post', 'post_status', '1');
                    foreach ($allTable as $value){
                        $cat = $db->getOneValue('ems_post_category', 'cat_id', $value['post_category']);
                        $author = $db->getOneValue('ems_users', 'user_id', $value['post_author']);
                    ?>
                    <tr>
                        <td><a href=<?php echo "?page=post&type=edit&id=".$value['post_id']; ?>><?php echo $value['post_title']?></a></td>
                        <td><?php echo $author['user_first_name']?></td>
                        <td><span class=""><?php echo $cat['cat_name']?></span></td>
                        <td>
                            <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $value['post_tags']?></div>
                        </td>
                        <td><?php echo $value['post_comment_count']?></td>
                        <td><span class="label label-success"><?php echo $value['post_date_scheduled']?></span></td>
                        <td><button class="" disabled><a href=<?php echo "?page=post&type=edit&id=".$value['post_id']; ?>>Edit</a></button> | <button class=""><a href="javascript:del('<?php echo $value['post_id'];?>','<?php echo $value['post_title'];?>')">Delete</a></button> </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <a href="?page=post&type=new" class="btn btn-sm btn-info btn-flat pull-left">New Post</a>
            <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
        </div>
        <!-- /.box-footer -->
    </div>
</section>

<script type="text/javascript">
    function del(id, title) {
        if (confirm("do you want to delete post '"+title+"'?")) {
            window.location.href = 'php_actions/deletePost.php?id='+id;
        }
    }
</script>

