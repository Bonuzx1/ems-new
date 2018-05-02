<?php
/**
 * Created by PhpStorm.
 * User: DERBIE
 * Date: 4/10/2018
 * Time: 5:45 PM
 */

include "includes/header.php";
if (!isset($_GET['sort']))
{
    echo "error";exit;
}
else{
    $pg = $_GET['sort'];
    if ($_GET['sort']=='user' && isset($_GET['id']))
    {
        $user = $db->getOneValue('ems_users', 'user_id', $_GET['id']);
        $userName = $user['user_name'];

    }
    elseif ($_GET['sort']=='category' && isset($_GET['id']))
    {
        $cat = $db->getOneValue('ems_post_category', 'cat_id', $_GET['id']);
        $catName = $cat['cat_name'];
    }
    elseif ($_GET['sort']=='tag' && isset($_GET['tag']))
    {
        $tags = explode(',',trim($_GET['tag']));
        $data = '%'.$tags[0].'%';
        $posts = $db->useRawQuery("SELECT * FROM ems_post WHERE post_tags LIKE '$data'");
        $tagName = $tags[0];

    }
}

?>
<div class="col-lg-8 col-md-8 col-sm-8">
    <?php if ($pg == 'category'){?>
    <div class="single_post_content ">
        <h2><span>Posts From Category - (<?=$catName?>)</span></h2>
        <ul class="photograph_nav  wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
            <?php
            $allpost = $db->fillTable('ems_post', 'post_category', $_GET['id']);
            foreach ($allpost as $post){ $post_title = explode(' ',trim($post['post_title']));?>
            <li>
                <div class="photo_grid cont">
                    <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="view.php?id=<?=$post['post_id']?>" title="<?=$post['post_title']?>"> <?php echo '<img class="img-center" src="admin/uploads/blog_images/'.$post['post_image'].'"/>';?></a> </figure>
                    <div class="centered"><?=$post_title[0]."..."?></div>
                    <div class="centered-down btn btn-read-more"><a href="view.php?id=<?=$post['post_id']?>">View Post</a></div>
                </div>
            </li>
                <?php }?>
        </ul>
    </div>
    <?php }elseif ($pg == 'tag'){ ?>
    <div class="single_post_content ">
        <h2><span>Posts With Tag - (<?=$tagName?>)</span></h2>
        <ul class="photograph_nav  wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
            <?php foreach ($posts as $post){ $post_title = explode(' ',trim($post['post_title']));?>
            <li>
                <div class="photo_grid cont">
                    <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="view.php?id=<?=$post['post_id']?>" title="<?=$post['post_title']?>"> <?php echo '<img class="img-center" src="admin/uploads/blog_images/'.$post['post_image'].'"/>';?></a> </figure>
                    <div class="centered"><?=$post_title[0]."..."?></div>
                    <div class="centered-down btn btn-read-more"><a href="view.php?id=<?=$post['post_id']?>">View Post</a></div>
                </div>
            </li>
                <?php }?>
        </ul>
    </div>
    <?php } elseif ($pg == 'user'){?>
    <div class="single_post_content ">
        <h2><span>Posts From User - (<?=$userName?>)</span></h2>
        <ul class="photograph_nav  wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
            <?php $allpost = $db->fillTable('ems_post', 'post_author', $_GET['id']);
            foreach ($allpost as $post){ $post_title = explode(' ',trim($post['post_title']));?>
            <li>
                <div class="photo_grid cont">
                    <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="view.php?id=<?=$post['post_id']?>" title="<?=$post['post_title']?>"> <?php echo '<img class="img-center" src="admin/uploads/blog_images/'.$post['post_image'].'"/>';?></a> </figure>
                    <div class="centered"><?=$post_title[0]."..."?></div>
                    <div class="centered-down btn btn-read-more"><a href="view.php?id=<?=$post['post_id']?>">View Post</a></div>
                </div>
            </li>
                <?php }?>
        </ul>
    </div>
<?php }?>
</div>
<?php
include "includes/side-bar.php";

include "includes/footer.php";
?>