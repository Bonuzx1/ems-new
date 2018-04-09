<?php include "includes/header.php";

$post_id = $_GET['id'];
$detail = $db->getOneValue('ems_post', 'post_id', $post_id);
$post_title = $detail['post_title'];
$post_content = $detail['post_content'];
$post_image = $detail['post_image'];
$post_author = $detail['post_author'];
$user_temp = $db->getOneValue('ems_users', 'user_id', $post_author);
$post_author = $user_temp['user_first_name'];
$post_cat = $detail['post_category'];
$cat_temp = $db->getOneValue('ems_post_category', 'cat_id', $post_cat);
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
            <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i><?=$post_author?></a> <span><i class="fa fa-calendar"></i><?=$date?></span> <a href="#"><i class="fa fa-tags"></i><?=$post_cat?></a> </div>
            <div class="single_page_content"> <?php echo '<img class="img-center" src="data:image/jpeg;base64,'.base64_encode( $post_image ).'"/>';?>
              <p><?=$post_content?></p>
            <div class="social_link">
                Share:
              <ul class="sociallink_nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div>
            <div class="related_post">
              <h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2>
              <ul class="spost_nav wow fadeInDown animated">

<!--                  --><?php //$data = [':keyword' => $detail['post_category']];
                  $all = $db->useRawQuery("SELECT * FROM ems_post WHERE post_category = ".$detail['post_category']." LIMIT 3");
                  foreach ($all as $row){ ?>
                <li>
                  <div class="media"> <a class="media-left" href="veiw.php"> <img src="images/post_img1.jpg" alt=""> </a>
                    <div class="media-body"> <a class="catg_title" href="veiw.php"> Aliquam malesuada diam eget turpis varius</a> </div>
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
                                <div class="media wow fadeInDown"> <a href="veiw.php?id=<?=$row['post_id']?>" class="media-left"> <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['post_image'] ).'"/>';?> </a>
                                    <div class="media-body"> <a href="veiw.php" class="catg_title"> <?=$row['post_title']?></a> </div>
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
                                <li class="cat-item"><a href="<?='veiw.php?type=cat&id='.$row['cat_id']?>"><?=$row['cat_name']?></a></li>
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
                                    <div class="media wow fadeInDown"> <a href="veiw.php" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                                        <div class="media-body"> <a href="veiw.php" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media wow fadeInDown"> <a href="veiw.php" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                                        <div class="media-body"> <a href="veiw.php" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media wow fadeInDown"> <a href="veiw.php" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                                        <div class="media-body"> <a href="veiw.php" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media wow fadeInDown"> <a href="veiw.php" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                                        <div class="media-body"> <a href="veiw.php" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
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


