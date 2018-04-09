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
            <h3 class="box-title">Users</h3>

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
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Registered</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $allTable = $db->fillCombo('ems_users', 'user_status', '1');
                    $count = 0;
                    foreach ($allTable as $value){
                        $type = $db->getOneValue('ems_user_type', 'user_type_id', $value['user_type'])
                        ?>
                        <tr>
                            <td><a href=<?php echo "?page=users&type=edit&id=".$value['user_id']; ?>><?php echo $value['user_name']?></a></td>
                            <td><?php echo $value['user_first_name']?></td>
                            <td><?php echo $value['user_email']?></td>
                            <td><?php echo $type['user_type_name']?></td>
                            <td><span class="label label-success"><?php echo $value['user_registered']?></span></td>
                            <td><button class="" disabled><a href=<?php echo "?page=users&type=edit&id=".$value['user_id']; ?>>Edit</a></button> | <button class=""><a href=<?php echo ($count==0)? "javascript:void(0)":"javascript:delset('".$value['user_id']."','".$value['user_name']."')"?>>Delete</a></button> </td>
                        </tr>
                    <?php $count++;} ?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <a href="?page=users&type=new" class="btn btn-sm btn-info btn-flat pull-left">New User</a>
            <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Delete All Event (Not Available Yet)</a>
        </div>
        <!-- /.box-footer -->
    </div>
</section>

<script type="text/javascript">

        function delset(id, title) {
            if (confirm("do you want to delete user '"+title+"'?")) {
                window.location.href = 'php_actions/deleteUser.php?id='+id;
            }
        }

</script>

