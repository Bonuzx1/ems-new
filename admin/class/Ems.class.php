<?php
session_start();
include "DB.class.php";
class Ems{
    private $db;
    private $database_type = 'mysql';
    private $database_host = 'localhost';
    private $database_username = 'root';
    private $database_password = '';
    private $database_name = 'ems-new';
	private $EXPIRE_AFTER = 5;
	

    function __construct()
    {
        $this->db = new PDODb($this->database_type, $this->database_host, $this->database_username, $this->database_password, $this->database_name);
        define('BASE_URL', 'http://localhost/ems-new');
        define('ADMIN_BASE_URL', 'http://localhost/ems-new/admin/');
    }
    function isexpire($time)
    {
	    $EXPIRE_SECONDS = $this->EXPIRE_AFTER * 60;
	    if($time >= $EXPIRE_SECONDS){
		    //User has been inactive for too long.
		    //Kill their session.
		    session_unset();
		    session_destroy();
	    }
	
    }
    function newsubscriber($name, $phone)
    {
    	$today = date("Y-m-d H-m-s");
    	$data_q = [
    		'sub_name' => $name,
		    'sub_phone' => $phone,
		    'sub_received_text' => '0',
		    'sub_status' => '1',
		    'sub_date_registered' => $today
	    ];
	    if ($res = $this->db->insert('ems_subscribers', $data_q))
		    return true;
	    else
		    return $this->db->getLastErrorCode();
    }
    function post_new($title, $content, $author, $category, $tag, $created, $scheduled, $comment, $status, $permalink, $image)
    {
        $ems_post = [
            'post_title' => $title,
            'post_content' => $content,
            'post_author' => $author,
            'post_category' => $category,
            'post_tags' => $tag,
            'post_date_created' => $created,
            'post_date_scheduled' => $scheduled,
            'post_comment_count' => $comment,
            'post_status' => $status,
            'post_permalink' => $permalink,
            'post_image' => $image
        ];

        if ($res = $this->db->insert('ems_post', $ems_post))
            return $res;
        else
            return $this->db->getLastErrorCode();
    }
    function addComment($name, $email, $comment, $post)
    {
    	$comm = [
    		'comment_username' => $name,
		    'comment_email' => $email,
		    'comment_text' => $comment,
		    'comment_post_id' => $post
	    ];
    	if ($this->db->insert('ems_comment', $comm))
	    {
	    	return true;
	    }
	    return $this->db->getLastError();
    }
function addEventComment($name, $email, $comment, $event)
    {
    	$comm = [
    		'comment_username' => $name,
		    'comment_email' => $email,
		    'comment_text' => $comment,
		    'comment_event_id' => $event
	    ];
    	if ($this->db->insert('ems_comment', $comm))
	    {
	    	return true;
	    }
	    return $this->db->getLastError();
    }
    function fillCombo($table, $condition = null, $conditionValue = null)
    {
        if ($condition != null)
            $this->db->where($condition, $conditionValue);
        if ($all = $this->db->get($table))
            return $all;
        return $this->db->getLastError();
    }
    function new_event($title, $color, $date, $location, $image)
    {
        $ems_event = [
            'event_title' => $title,
            'event_color' => $color,
            'event_date' => $date,
            'event_image' => $image,
	        'event_venue' => $location,
            'event_author' => $_SESSION['user_id']

        ];

        if ($this->db->insert('ems_event', $ems_event))
            return true;
        else
            return $this->db->getLastError();
    }
    function addEventMedia($event, $image, $video)
    {
    	$gallery = [
    		'gallery_image' => $image,
		    'gallery_video' => $video,
		    'gallery_event_id' => $event
	    ];
    	if ($this->db->insert('ems_gallery', $gallery))
	    {
	    	return true;
	    }
	    return $this->db->getLastError();
    }
    function fillTable($table, $condition = null, $conditionValue = null)
    {
        if ($condition != null && $conditionValue != null)
            $this->db->where($condition, $conditionValue);
        if ($all = $this->db->get($table))
            return $all;
        return $this->db->getLastError();
    }
    function delPost($table, $id)
    {
        $this->db->where('post_id', $id);
        $data = ['post_status' => '0'];
        if ($this->db->update($table, $data))
        {
            return true;
        }else
            return $this->db->getLastError();
    }
    function getOneValue($table, $condition, $conditionValue)
    {
        $this->db->where($condition, $conditionValue);
        if ($owner = $this->db->getOne($table))
            return $owner;
        return $this->db->getLastError();
    }
    function delEvent($id)
    {
        $this->db->where('event_id', $id);
        $data = ['event_status' => '0'];
        if ($this->db->update('ems_event', $data))
        {
            return true;
        }else
            return $this->db->getLastError();
    }
    function delUser($id)
    {
        $this->db->where('user_id', $id);
        $data = ['user_status' => '0'];
        if ($this->db->update('ems_users', $data))
        {
            return true;
        }else
            return false;
    }
    function Login($email, $password)
    {
        $hashedpassword = md5($password);
        $this->db->where('user_name', $email);
        $this->db->where('user_password', $hashedpassword);
        $all = $this->db->getOne('ems_users', '*');
        if (empty($all))
            return false;
        $_SESSION['user_id'] = $all['user_id'];
        return true;
    }
    function logout()
    {
        session_unset();
        session_destroy();
    }
    function getCurUser()
    {
        $id = $_SESSION['user_name'];
        $user = $this->getOneValue('ems_users', 'user_name', $id);
        return $user;
    }
    function post_edit($id, $title, $content, $category, $tag, $scheduled, $comment, $status, $image)
    {
        $ems_post = [
            'post_title' => $title,
            'post_content' => $content,
            'post_category' => $category,
            'post_tags' => $tag,
            'post_date_scheduled' => $scheduled,
            'post_comment_count' => $comment,
            'post_status' => $status,
            'post_image' => $image
        ];
        $this->db->where('post_id', $id);
        if ($this->db->update('ems_post', $ems_post))
            return true;
        else
            return json_encode($ems_post);
    }
    function new_user($username, $name, $email, $password, $phone, $type, $image_name, $image_file)
    {
        $date = date('Y-m-d H-m-s');
        $ems_user = [
            'user_first_name' => $name,
            'user_name' => $username,
            'user_email' => $email,
            'user_password' => $password,
            'user_phone' => $phone,
            'user_type' => $type,
            'user_registered' => $date,
            'user_status' => '1',
            'user_picture' => $image_file,
            'user_image_data' => $image_name
        ];

        if ($this->db->insert('ems_users', $ems_user))
            return true;
        else
            return false;
    }
    function user_edit($username, $name, $id, $email, $phone, $type)
    {
        $ems_user = [
            'user_name' => $username,
            'user_first_name' => $name,
            'user_email' => $email,
            'user_phone' => $phone,
            'user_type' => $type,
        ];
        $this->db->where('user_id', $id);
        if ($this->db->update('ems_users', $ems_user))
            return true;
        else
            return false;
    }
    function pageNotFound($param)
    {
        if (!isset($param))
            return true;
        else
            return false;
    }
    function goToHeader($url){
        if(headers_sent())
            header_remove();
        header('Location:'.$url);
    }
    function useRawQuery($sql, $data = null)
    {
            return $this->db->rawQuery($sql);
    }
    function insertId()
    {
        return $this->db->getLastInsertId();
    }

}