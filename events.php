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
<?php if (!isset($_GET['id'])){?>
    <div class="single_post_content">
        <h2><span>Events</span></h2>
        <ul class="photograph_nav  wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
	        <?php
//	        $allEvents = $db->fillTable('ems_event', 'event_status', '0');
            $allEvents = $db->fillTable('ems_event');
            foreach ($allEvents as $event) {$event_title = explode(' ',trim($event['event_title']));?>
            <li>
                <div class="photo_grid">
                    <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="admin/uploads/event_images/<?=$event['event_image']?>" title="<?=$event['event_title']?>"> <img src="admin/uploads/event_images/<?=$event['event_image']?>" alt=""></a> </figure>
                </div>
                <div class="centered-down-event btn-read-more"><a href="events.php?id=<?=$event['event_id']?>">View Event Details</a></div>
            </li>
                <?php }?>
        </ul>
    </div>
<?php }elseif (!empty($_GET['id'])){
    $id = $_GET['id'];
    $event = $db->getOneValue('ems_event', 'event_id', $id);
    ?>
    <div class="single_page">
        <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Events</li>
        </ol>
        <h1><?=$event['event_title']?></h1>
        <div class="post_commentbox"> <a href="search.php?sort=user&id=<?=$event['event_author']?>"><i class="fa fa-user"></i><?=$event['event_author']?></a> <span><i class="fa fa-calendar"></i><?=$event['event_date']?></span></div>
        <div class="single_page_content"> <?php echo '<img class="img-center" src="admin/uploads/event_images/'.$event['event_image'].'"/>';?>
            <div class="contact_area">
                <h2>Event Details</h2>
                <div role="tabpanel" class="tab-pane active" id="category">
                    <h4>Date:</h4> <h6 class="my-link cat-item"><?=$event['event_date']?></h6>
                    <h4>Venue:</h4> <h6 class="my-link cat-item"><?=$event['event_venue']?></h6>
                </div>
                <h5>Don't miss it!</h5>
                
            </div>
            <div class="social_link">
                <h2 class="single_post_content">
                    <span>Share:</span>
                </h2>
                <ul class="sociallink_nav">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
            </div>
            <div class="contact_area">
                <h2>Your thoughts</h2>
                <p><b><b>NOTE: </b>Your comments will be reviewed before allowing it on this event ;)</b></p>
                <h4><?=$msg?></h4>
                <div class="twt-wrapper">
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <form action="admin/php_actions/addEventComment.php" class="contact_form" method="post">
                                <input required name="username" class="form-control" type="text" placeholder="Name*" minlength="3">
                                <input required name="post" type="hidden" value="<?=$_GET['id']?>">
                                <input class="form-control" name="useremail" type="email" placeholder="Email (Optional)">
                                <textarea minlength="20" name="commenttext" required class="form-control" cols="30" rows="3" placeholder="Thoughts*"></textarea>
                                <br />
                                <input href="#" type="submit" class="btn btn-primary btn-sm pull-right" name="submit" value="Share"/>
                            </form>
                            <div class="clearfix"></div>
                            <hr />
                            <ul class="media-list">
								<?php $comments = $db->useRawQuery("SELECT * FROM ems_comment WHERE comment_post_id = ".$_GET['id']." AND comment_isApproved = '1'");
									foreach ($comments as $comment) {?>
                                        <li class="media">
                                            <a href="#" class="pull-left">
                                                <img src="assets/img/1.png" alt="" class="img-circle">
                                            </a>
                                            <div class="media-body">
                                        <span class="text-muted pull-right">
                                            <small class="text-muted">30 min ago</small>
                                        </span>
                                                <strong class="text-success">@ <?=$comment['comment_username']?></strong>
                                                <p>
													<?=$comment['comment_text']?>
                                                </p>
                                            </div>
                                        </li>
									<?php }?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- TWEET WRAPPER END -->
            </div>
        </div>
    </div>
    <?php }?>
    </div>
    




<?php
include "includes/side-bar.php";
include "includes/footer.php";
?>