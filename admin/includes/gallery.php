<?php
/**
 * Created by PhpStorm.
 * User: DERBIE
 * Date: 4/23/2018
 * Time: 11:57 PM
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

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Gallery For Past Events</h3>
        </div>
        <div class="box-body">
            <div class="col-sm-12">
                <button class="btn btn-success left"><a href="?page=gallery&type=new-img">Add More Images</a></button>
                <button class="btn btn-info right-side"><a href="?page=gallery&type=new-vid">Add More Videos</a></button>
            </div>
            <div class="col-sm-6" id="slider-thumbs">
                <!-- Bottom switcher of slider -->
                <ul class="hide-bullets">
                    <?php $gallery = $db->fillTable('ems_gallery');
                    $count = 0;
	                    foreach ($gallery as $each) {?>
                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-<?=$count?>">
                            <img src="uploads/gallery/<?=$each['gallery_image']?>">
                        </a>
                    </li>
                    <?php $count++; }?>
                </ul>
            </div>
            <div class="col-sm-6">
                <div class="col-xs-12" id="slider">
                    <!-- Top part of the slider -->
                    <div class="row">
                        <div class="col-sm-12" id="carousel-bounding-box">
                            <div class="carousel slide" id="myCarousel">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
	                                <?php $gallery = $db->fillTable('ems_gallery');
	                                $count = 0;
		                                foreach ($gallery as $each) {?>
                                    <div class="<?=($count==0)?'active ':''?>item" data-slide-number="<?=$count?>">
                                        <img src="uploads/gallery/<?=$each['gallery_image']?>"></div>
                                    <?php $count++; }?>
                                </div>
                                <!-- Carousel nav -->
                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">

        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
</section>
