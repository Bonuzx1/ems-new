<?php
/**
 * Created by PhpStorm.
 * User: DERBIE
 * Date: 3/28/2018
 * Time: 7:38 AM
 */
?>
<div class="col-lg-4 col-md-4 col-sm-4">
    <div class="latest_post">
        <h2><span>Latest post</span></h2>
        <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
                <?php $all = $db->fillTable('ems_post');
                foreach ($all as $row){
                    $src = $row['post_image'];
                    ?>
                <li>
                    <div class="media"> <a href="admin/uploads/blog_images/<?=$src?>" class="media-left"> <?php echo '<img src="admin/uploads/blog_images/'.$src.'"/>';?> </a>
                        <div class="media-body"> <a href="<?='view.php?id='.$row['post_id']?>" class="catg_title"> <?=$row['post_title']?> </a> </div>
                    </div>
                </li>

                <?php  }?>
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
        </div>
    </div>
</div>
