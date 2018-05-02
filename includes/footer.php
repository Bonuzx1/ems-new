<?php
/**
 * Created by PhpStorm.
 * User: DERBIE
 * Date: 3/27/2018
 * Time: 4:33 PM
 */
?>

<footer id="footer">
    <div class="footer_top">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="footer_widget wow fadeInLeftBig">
                    <h2>Add Your Advert Here</h2>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="footer_widget wow fadeInDown">
                    <h2>Tags</h2>
                    <div role="tabpanel" class="tab-pane active" id="category">
                    <ul class="">

                        <?php $all = $db->fillTable('ems_post');
                        $count = 0;
                        foreach ($all as $row){
                            $qp = explode(',', $row['post_tags']);

                            ?>
<li class="cat-item">
                            <?php foreach ($qp as $tag) {?>
                                <a href="search.php?sort=tag&tag=<?=$tag?>" class="my-link cat-item"><?=$tag.'  '?></a>
                            <?php } ?>
</li>
                            <?php
                            echo "<br>";?>

                        <?php  }?>
                    </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="footer_widget wow fadeInRightBig">
                    <h2>Contact</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <address>
                        Perfect News,1238 S . 123 St.Suite 25 Town City 3333,USA Phone: 123-326-789 Fax: 123-546-567
                    </address>
                </div>
            </div>
        </div>
        <div class="thumbnail center well well-small text-center" id="subscribe">
            <h2 style="color: #1c2529">Newsletter</h2>

            <p style="color: #0f0f0f">Subscribe to our daily posts and stay tuned.</p>

            <form action="admin/php_actions/addSubscriber.php" method="post">
                <h2><?=(isset($_GET['s']))?"Succesfully Subscribed to our newsletter": ''?></h2>
                <div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span>
                    <input style="color:#0f0f0f" type="text" id="" name="name" placeholder="Your name" required>
                    <input style="color:#0f0f0f" type="tel" id="" name="sub_phone" placeholder="Your phone number" required>
                </div>
                <br />
                <input style="color:#0f0f0f" type="submit" name="submit-sub" value="Subscribe Now!" class="btn btn-large" />
            </form>
        </div>
    </div>
    <div class="footer_bottom">
        <p class="copyright">Copyright &copy; 2018 <a href="index.php">EMS</a></p>
        <p class="developer">Developed By Biggy</p>
    </div>
</footer>
</div>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/jquery.li-scroller.1.0.js"></script>
<script src="assets/js/jquery.newsTicker.min.js"></script>
<script src="assets/js/jquery.fancybox.pack.js"></script>
<script src="assets/js/custom.js"></script>
<script>
    $("[data-toggle=tooltip]").tooltip();
    var timer = window.setInterval(function()
    {
        $("#subscribe").modal('show')
    }, 1800000);
</script>
</body>
</html>
