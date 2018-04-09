<?php
include "../class/Ems.class.php";

$ems = new Ems();

if(isset($_POST['submit'])){
    $user = $ems->getCurUser();
    if ($_POST['blog_publishDate']===''){
        $scheduled = date('Y-m-d H:m:s');

    }else
    {
        $temp = strtotime($_POST['blog_publishDate']);
        $scheduled = date('Y-m-d H-m-s', $temp);
        if ($scheduled == date('Y-m-d ').'00-03-00') {
            $scheduled = date('Y-m-d H-m-s');
        }
    }


    $title = $_POST['blog_title']; $content = $_POST['blog_body'];
    $category = $_POST['blog_category']; $tag = $_POST['blog_tags'];
    $comment = '56'; $status = '1';
    $image = $_POST['blog_image'];

    if($ems->post_edit($_POST['id'], $title, $content, $category, $tag,
        $scheduled, $comment, $status, $image))
        header('Location: '.$_SERVER['HTTP_REFERER'].'&message=success');

}