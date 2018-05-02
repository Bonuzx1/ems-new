<?php include "includes/header.php";
$msg = '';
$msg = (isset($_GET['msg']))? $_GET['msg']:'';
$post_id = $_GET['id'];
$detail = $db->getOneValue('ems_post', 'post_id', $post_id);
$post_title = $detail['post_title'];
$post_content = $detail['post_content'];
$post_image = $detail['post_image'];
$post_authorr = $detail['post_author'];
$user_temp = $db->getOneValue('ems_users', 'user_id', $post_authorr);
$post_author = $user_temp['user_first_name'];
$post_catt = $detail['post_category'];
$cat_temp = $db->getOneValue('ems_post_category', 'cat_id', $post_catt);
$post_cat = $cat_temp['cat_name'];
$post_tags = explode(',', $detail['post_tags']);
$date = $detail['post_date_created'];
$commentCount = $detail['post_comment_count'];
$status = $detail['post_status'];

?>

  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
            <ol class="breadcrumb">
              <li><a href="index.php">Home</a></li>
              <li class="active"><?=$post_cat?></li>
            </ol>
            <h1><?=$post_title?></h1>
            <div class="post_commentbox"> <a href="search.php?sort=user&id=<?=$post_authorr?>"><i class="fa fa-user"></i><?=$post_author?></a> <span><i class="fa fa-calendar"></i><?=$date?></span> <a href="search.php?sort=category&id=<?=$post_catt?>"><i class="fa fa-briefcase"></i><?=$post_cat?></a> </div>
                <div class="single_page_content"> <?php echo '<img class="img-center" src="admin/uploads/blog_images/'.$post_image.'"/>';?>
              <p><?=$post_content?></p>
                    <h2 class="single_post_content">
                        <span>Tags</span>
                    </h2>
                    <div role="tabpanel" class="tab-pane active" id="category">
                        <ul>
                    <?php foreach ($post_tags as $tag){?>
                    <li class="cat-item"><a href="<?='search.php?sort=tag&tag='.$tag?>"><?=$tag?></a></li>
                    <?php }?>
                        </ul>
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
                        <p><b><b>NOTE: </b>Your comments will be reviewed before allowing it on this post ;)</b></p>
                        <h4><?=$msg?></h4>
                        <div class="twt-wrapper">
                            <div class="panel panel-info">
                                <div class="panel-body">
                                    <form action="admin/php_actions/addComment.php" class="contact_form" method="post">
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
            <div class="related_post">
              <h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2>
              <ul class="spost_nav wow fadeInDown animated">

<!--                  --><?php //$data = [':keyword' => $detail['post_category']];
                  $all = $db->useRawQuery("SELECT * FROM ems_post WHERE post_category = ".$detail['post_category']." LIMIT 3");
                  foreach ($all as $row){ ?>
                <li>
                  <div class="media"> <a class="media-left" href="view.php"> <img src="images/post_img1.jpg" alt=""> </a>
                    <div class="media-body"> <a class="catg_title" href="view.php"> Aliquam malesuada diam eget turpis varius</a> </div>
                  </div>
                </li>
                  <?php }?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <nav class="nav-slit"> <a class="prev" href="#"> <span class="icon-wrap"><i class="fa fa-angle-left"></i></span>
        <div>
          <h3>City Lights</h3>
          <img src="images/post_img1.jpg" alt=""/> </div>
        </a> <a class="next" href="#"> <span class="icon-wrap"><i class="fa fa-angle-right"></i></span>
        <div>
          <h3>Street Hills</h3>
          <img src="images/post_img1.jpg" alt=""/> </div>
        </a> </nav>

    </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <aside class="right_content">
                <div class="single_sidebar">
                    <h2><span>Popular Post</span></h2>
                    <ul class="spost_nav">
                        <?php $all = $db->fillTable('ems_post');
                        foreach ($all as $row){?>
                            <li>
                                <div class="media wow fadeInDown"> <a href="view.php?id=<?=$row['post_id']?>" class="media-left"> <?php echo '<img src="admin/uploads/blog_images/'.$row['post_image'].'"/>';?> </a>
                                    <div class="media-body"> <a href="view.php" class="catg_title"> <?=$row['post_title']?></a> </div>
                                </div>
                            </li>
                        <?php }?>

                    </ul>
                </div>
                <div class="single_sidebar">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a></li>
                        <li role="presentation"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a></li>
                        <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Comments</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="category">
                            <ul>
                                <?php $all = $db->fillTable('ems_post_category');
                                $count = 0;
                                foreach ($all as $row){?>
                                <li class="cat-item"><a href="<?='view.php?type=cat&id='.$row['cat_id']?>"><?=$row['cat_name']?></a></li>
                                <?php }?>
                            </ul>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="video">
                            <div class="vide_area">
                                <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="comments">
                            <ul class="spost_nav">
                                <li>
                                    <div class="media wow fadeInDown"> <a href="view.php" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                                        <div class="media-body"> <a href="view.php" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media wow fadeInDown"> <a href="view.php" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                                        <div class="media-body"> <a href="view.php" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media wow fadeInDown"> <a href="view.php" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                                        <div class="media-body"> <a href="view.php" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media wow fadeInDown"> <a href="view.php" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                                        <div class="media-body"> <a href="view.php" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="single_sidebar wow fadeInDown">
                    <h2><span>Sponsor</span></h2>
                    <a class="sideAdd" href="#"><img src="images/add_img.jpg" alt=""></a> </div>
                <div class="single_sidebar wow fadeInDown">
                    <h2><span>Category Archive</span></h2>
                    <select class="catgArchive">
                        <option>Select Category</option>
                        <?php $all = $db->fillTable('ems_post_category');
                        $count = 0;
                        foreach ($all as $row){?>
                        <option value="<?=$row['cat_id']?>"><?=$row['cat_name']?></option>
                        <?php }?>

                    </select>
                </div>
                <div class="single_sidebar wow fadeInDown">
                    <h2><span>Links</span></h2>
                    <ul>

                        <li><a href="admin">Admin Login</a></li>

                    </ul>
                </div>
            </aside>
        </div>
  </section>
<?php include "includes/footer.php";?>


