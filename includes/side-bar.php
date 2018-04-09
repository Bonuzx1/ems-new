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
                $count = 0;
                foreach ($all as $row){?>
                <li>
                    <div class="media"> <a href="<?='veiw.php?id='.$row['post_id']?>" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                        <div class="media-body"> <a href="<?='veiw.php?id='.$row['post_id']?>" class="catg_title"> <?=$row['post_title']?> <?=$count?></a> </div>
                    </div>
                </li>

                <?php $count++; }?>
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
        </div>
    </div>
</div>
