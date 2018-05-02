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
            <h3 class="box-title">Events</h3>

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
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $allTable = $db->fillCombo('ems_event', 'event_status', '1');
                    foreach ($allTable as $value){
                        $user = $db->getOneValue('ems_users', 'user_id', $value['event_author']);
                        ?>
                        <tr>
                            <td><a style="color: #000;" href=<?php echo "?page=event&type=edit&id=".$value['event_id']; ?>><?php echo $value['event_title']?></a></td>
                            <td><?php echo $user['user_first_name']?></td>
                            <td><span class="label label-success"><?php echo $value['event_date']?></span></td>
                            <td><button class="btn-default" disabled><a href='<?php echo "?page=event&type=edit&id=".$value['event_id']; ?>' disabled="disabled">Edit</a></button> |
                                <button class="btn-danger"><a href="javascript:del('<?php echo $value['event_id'];?>','<?php echo $value['event_title'];?>')">Delete</a></button> |
                                <button class="btn-bitbucket"><a href="?page=post&type=new&event=<?=$value['event_id']?>">Add Post</a></button>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <a href="?page=event&type=new" class="btn btn-sm btn-info btn-flat pull-left">New Event</a>
            <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Delete All Event (Not Available Yet)</a>
        </div>
        <!-- /.box-footer -->
    </div>

<!--    edit the event-->

</section>

<script type="text/javascript">
    function del(id, title) {
        if (confirm("do you want to delete event '"+title+"'?")) {
            window.location.href = 'php_actions/deleteEvent.php?id='+id;
        }
    }
</script>

