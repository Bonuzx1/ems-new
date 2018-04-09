<?php
/**
 * Created by PhpStorm.
 * User: DERBIE
 * Date: 3/23/2018
 * Time: 3:10 AM
 */
$row = $db->getOneValue('ems_users', 'user_id', $_GET['id']);
$id = $row['user_id'];
$email = $row['user_email'];
$phone = $row['user_phone'];
$type = $row['user_type'];
$name = $row['user_first_name'];
$username = $row['user_name'];
$image = $row['user_picture'];
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
<section class="content">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit User : <?php echo $name?></h3>
        </div>
        <div class="box-body">
            <div class="row">
                <form action="php_actions/editUser.php" enctype="multipart/form-data" method="post">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_name">username <small>(used for login)</small></label>
                            <input type="text" name="user_name" value="<?php echo $username?>" class="form-control" placeholder="user name">
                        </div>
                        <div class="form-group">
                            <label for="user_name">First Name</label>
                            <input type="text" name="user_first_name" value="<?php echo $name?>" class="form-control" placeholder="first name">
                        </div>
                        <div class="form-group">
                            <label for="email">User Email</label>
                            <input type="email" name="user_email" value="<?php echo $email?>" class="form-control" placeholder="New username">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" name="user_phone" class="form-control" value="<?php echo $phone?>" id="phone" placeholder="Enter phone number">
                        </div>
                        <div class="form-group">
                            <label for="phone">User Type</label>
                            <select name="user_type" class="form-control" id="user_type">
                                <option value="">Select one</option>
                                <?php $all = $db->fillCombo('ems_user_type');
                                foreach ($all as $row){?>
                                    <option value="<?php echo $row['user_type_id'] ?>"><?php echo $row['user_type_name']?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input value="<?php echo $_GET['id']?>" name="id" hidden>
                            <input type="submit" class="btn btn-success" name="submit" id="submit" value="Save Changes" ">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <a href="?page=users" class="btn btn-sm btn-info btn-flat pull-left">Cancel</a>
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
</section>
<script type="text/javascript">
    $("#user_type").val("<?php echo $type; ?>");
</script>