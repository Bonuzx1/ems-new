<?php include "includes/header.php";

if (isset($_GET['page'])&&!isset($_GET['type']))
{
    $page = $_GET['page'];
    if ($page == 'dashboard')
    {
        include 'includes/dashboard.php';
    }
    elseif ($page == 'event')
    {
        include 'includes/event.php';
    }
    elseif ($page == 'post')
    {
        include "includes/post.php";
    }
    elseif ($page == 'users')
    {
        include "includes/users.php";
    }
    elseif ($page == 'profile')
    {
        include "includes/profile.php";
    }
    elseif ($page == 'logout')
    {
        include "includes/logout.php";
    }
}
if (isset($_GET['page'])&&isset($_GET['type']))
{
    $page = $_GET['page'];
    $type = $_GET['type'];
    if ($page == 'post')
    {
        if ($type == 'new')
        {
            include "includes/new-post.php";
        }
        elseif ($type == 'edit')
        {
            include "includes/edit-post.php";
        }
    }
    elseif ($page == 'event')
    {
        if ($type == 'new')
        {
            include 'includes/new-event.php';
        }
    }
    elseif ($page == 'users')
    {
        if ($type == 'new')
        {
            include "includes/new-user.php";
        }
        elseif ($type == 'edit')
        {
            include "includes/edit-user.php";
        }
    }
}


include "includes/footer.php"; ?>