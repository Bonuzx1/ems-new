<?php
/**
 * Created by PhpStorm.
 * User: DERBIE
 * Date: 4/24/2018
 * Time: 12:40 AM
 */
?>
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
<style>

</style>
<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">New Media</h3>
        </div>
        <div class="box-body">
            <div class="col-sm-6">
                <form action="" id="media-form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Event</label>
                        <select class="form-control" name="event" id="exampleFormControlSelect1">
                            <option value="">Select event</option>
                            <?php $today = date("Y-m-d H-m-s"); $events = $db->useRawQuery("SELECT * FROM ems_event WHERE event_date <= '".$today."' ORDER BY event_title ASC");
                            foreach ($events as $event){?>
                            <option value="<?= $event['event_id'] ?>"><?=$event['event_title']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group hidden col-sm-12" id="image-container">

                    </div>
                    <div class="form-group" id="drop-area">
                        <h2 id="image-drop-header"></h2>
                        <input class="form-control" name="files[]" type="file" accept="image/*" id="selectImages" multiple/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" id="submit-upload" value="Upload" />
                        <a class="btn btn-primary" style="float: right;" href="?page=gallery" >Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">

        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
</section>

