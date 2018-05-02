<?php
	/**
	 * Created by PhpStorm.
	 * User: DERBIE
	 * Date: 4/26/2018
	 * Time: 4:49 AM
	 */
	
	
	if (isset($_GET['start']) && !empty($_GET['start']) && empty($_GET['end']))
	{
		$result = $db->useRawQuery("SELECT * FROM ems_subscribers WHERE sub_date_registered > '".$_GET['start']."'");
		
	}
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
			<h3 class="box-title">Event Report</h3>
			
			<div class="box-tools pull-right">
				<!--                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>-->
				<!--                </button>-->
				<!--                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<form action="" method="post" id="ereport">
				<div class="form-group">
					<label for="example-date-input" class="col-2 col-form-label">Start Date</label>
					<div class="col-10">
						<input class="form-control" name="start" type="date" id="example-date-input">
					</div>
				</div>
				<div class="form-group">
					<label for="example-date-input" class="col-2 col-form-label">End Date</label>
					<div class="col-10">
						<input class="form-control" name="end" type="date" id="example-date-input">
					</div>
				</div>
				<input class="btn btn-success" type="button" value="Get Report" id="submit-ereport" name="submit">
			</form>
			<br>
			<div id="reportPanel" class="">
				<table class="table table-bordered table-hover" border="1" style="width: 100%;" id="ereportTable">
					<thead>
					<tr>
						<th>#</th>
						<th>Event title</th>
						<th>Author</th>
						<th>Date</th>
					</tr>
					</thead>
					<tbody id="reporting">
					
					
					</tbody>
				</table>
			</div>
		</div>
		<style>
			@media print {
				.print-hide {
					display: none;
				}
			}
		</style>
		
		<div id="printHeader" style="display: none; ">
			<div id="page-wrapper">
				<div id="page-inner">
					<div class="row">
						<div class="col-md-12">
							<h3 class="page-head-line">REPORT</h3>
						
						</div>
					</div>
					<div class="row">
						<div class="row pad-top-bot ">
							<div class="col-lg-6  ">
								<img src="uploads/logo.jpg"  align='left' style="padding:0px 30px 0px 30px;" />
							</div>
							<div class="col-lg-6 ">
								
								<strong>  EMS - Event Management System</strong>
								<br />
								<i>Address :</i> Accra Road, Kumasi
								<br />
								Commercial Area,
								<br />
								Ghana.
							
							</div>
						</div>
					</div>
					<br/><br/>
					<div class="row">
						<div  class="row text-center contact-info" style="padding:0px 50px 0px 0px; font-style: oblique;font-weight: bolder; font-family:"Courier New", Courier, monospace;" >
							<hr />
							<span>
             &emsp;
                 <strong>Email : </strong>eventlabgh@gmail.com
           &emsp;&emsp;
                 <strong>Call : </strong>+233 -3220- 60301
                 &emsp;&nbsp;
                 <strong>Fax : </strong>+233-3220- 60122
             </span>
							<hr />
						
						</div>
					
					</div>
				</div>
				<!-- /. PAGE INNER  -->
			</div>
			
			
			
			<!-- <table id="" border="3" style="width: 100%;">
				<tr>
					<td style="width: 7%" rowspan="3"><h2>LOGO</h2></td>
					<td>
						<strong>Maintenance</strong> <br>
						P O Box whatever <br>
						some other detail
					</td>
				</tr>
			</table> -->
		</div>
		
		<div id="printfooter" style="display: none; ">
			
			<br/><br/>
			<p style="float:right">....................</p>
			<br/><br/><br/>
			<p style="float:right">Signature</p>
		</div>
		<!-- /. PAGE INNER  -->
		<!-- /.box-body -->
		<div class="box-footer clearfix">
			<button class="btn btn-sm btn-info btn-flat pull-left" id="printeReport">Print</button>
			<button class="btn btn-sm btn-default btn-flat pull-right" id="clear-tbl">Clear Table</button>
		</div>
		<!-- /.box-footer -->
	</div>
</section>

<script type="text/javascript">
    function del(id, title) {
        if (confirm("do you want to delete post '"+title+"'?")) {
            window.location.href = 'php_actions/deletePost.php?id='+id;
        }
    }
</script>

