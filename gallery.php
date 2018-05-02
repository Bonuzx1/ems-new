<?php
/**
 * Created by PhpStorm.
 * User: DERBIE
 * Date: 4/17/2018
 * Time: 8:23 PM
 */

include "includes/header.php";
$msg = '';
$msg = (isset($_GET['msg']))? $_GET['msg']:'';
?>
<div class="col-lg-8 col-md-8 col-sm-8">
    <div class="single_post_content">
        <h2><span>Gallery</span></h2>
        <ul class="photograph_nav  wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
            <?php $allEvents = $db->fillTable('ems_gallery');
            foreach ($allEvents as $gallery) {
                $event = $db->getOneValue('ems_event', 'event_id', $gallery['gallery_event_id']);?>
            <?php if ($gallery['gallery_image'] != ''){?>
                <li>
                <div class="photo_grid">
                    <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="admin/uploads/gallery/<?=$gallery['gallery_image']?>" title="<?=$event['event_title']?>"> <img src="admin/uploads/gallery/<?=$gallery['gallery_image']?>" alt=""></a> </figure>
                </div>
            </li>
                    <?php }else{?>
                    <li>
                        <div class="photo_grid">
                            <iframe src="<?=$gallery['gallery_video']."?controls=1&loop=1"?>" width="50" height="50" frameborder="5"></iframe>
                        </div>
                    </li>
                    <?php }?>
                <?php }?>
        </ul>
    </div>
    </div>
    




<?php
include "includes/side-bar.php";
include "includes/footer.php";
?>