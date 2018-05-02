<?php
/**
 * Created by PhpStorm.
 * User: DERBIE
 * Date: 4/9/2018
 * Time: 7:17 PM
 */
?>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Sidebar Collapsed
		<small>Layout with collapsed sidebar on load</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Layout</a></li>
		<li class="active">Collapsed Sidebar</li>
	</ol>
</section>

<!-- Main content -->
<section class="content col-sm-12">
	<div class="box box-info"   >
		<div class="box-header with-border">
			<h3 class="box-title">Subscribers Rport</h3>
			
			<div class="box-tools pull-right">
				<!--                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>-->
				<!--                </button>-->
				<!--                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table id="example2" class="table table-bordered table-hover">
				<thead>
				<tr>
					<th>#</th>
					<th>Username</th>
					<th>Comment</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
				<?php $comments = $db->fillTable('ems_comment');
				$dis = "<button class='btn-info disabled'>Approved</button>";
					foreach ($comments as $comment) {
						$app = "<button class='btn-info'><a href='php_actions/approveComment.php?id=".$comment['comment_id']."'>Approve</a></button>";
						?>
				<tr>
					<td><?=$comment['comment_id']?></td>
					<td><?=$comment['comment_username']?></td>
					<td><?=$comment['comment_text']?></td>
					<td><?=($comment['comment_isApproved'] == '0')?$app:$dis?></td>
				</tr>
				<?php }?>
			</table>
		</div>
	</div>
</section>