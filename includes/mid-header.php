<?php
/**
 * Created by PhpStorm.
 * User: DERBIE
 * Date: 3/28/2018
 * Time: 7:37 AM
 */
?>
<div class="col-lg-8 col-md-8 col-sm-8">
    <div class="slick_slider">
        <?php $all = $db->fillTable('ems_post');
        foreach ($all as $item){?>
            <div class="single_iteam"> <a href="<?php echo 'view.php?id='.$item['post_id']?>"> <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $item['post_image'] ).'"/>';?></a>
                <div class="slider_article">
                    <h2><a class="slider_tittle" href="<?php echo 'view.php?id='.$item['post_id']?>"><?php echo $item['post_title']?></a></h2>
                    <p><?php echo substr($item['post_content'], 0, 35)?></p>
                </div>
            </div>
        <?php }?>

    </div>
</div>
