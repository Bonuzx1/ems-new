<?php
/**
 * Created by PhpStorm.
 * User: DERBIE
 * Date: 2/19/2018
 * Time: 8:30 PM
 */

$r = $db->getOneValue('ems_subscribers', 'sub_status', '0');
$r1 = $db->getOneValue('ems_comment', 'comment_status', '1');
$r2 = $db->getOneValue('ems_users', 'user_status', '1');
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

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Eventz Lab GH</h3>

            <div class="box-tools pull-right">
<!--                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">-->
<!--                    <i class="fa fa-minus"></i></button>-->
<!--                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">-->
<!--                    <i class="fa fa-times"></i></button>-->
            </div>
        </div>
        <div class="box-body">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?=count($r)+1?></h3>

                        <p>Subscribers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="?page=sreport" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?=count($r1)+1?></h3>

                        <p>Comments</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="?page=comment" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-gray">
                    <div class="inner">
                        <h3><?=count($r2)+1?></h3>

                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-people"></i>
                    </div>
                    <a href="?page=users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- /.box-body -->

        <!-- /.box-footer-->
    </div>
    <!-- /.box -->

    
</section>
<!-- /.content -->
