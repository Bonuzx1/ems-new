<?php
	/**
	 * Created by PhpStorm.
	 * User: DERBIE
	 * Date: 4/26/2018
	 * Time: 9:06 AM
	 */
	include "../class/Ems.class.php";
	$user = new Ems();
	$today = date('Y-m-d');
	$all = null;
	$useData = array();
	$format = 'Y-m-d';
	if (isset($_POST['start']) && $_POST['end']=='' && $_POST['start']!='')
	{
		$sql = "SELECT * FROM ems_subscribers WHERE ems_subscribers.sub_date_registered >= '".$_POST['start']."'";
		$all = $user->useRawQuery($sql);
		$table = '';
		foreach ($all as $one)
		{
			$table .= "<tr>
                   <td>".$one['sub_id']."</td>
                    <td>".$one['sub_name']."</td>
                    <td>".$one['sub_phone']."</td>
                    </tr>";
		}
		echo $table;
	}elseif (isset($_POST['start']) && $_POST['end']!='' && $_POST['start']!='')
	{
		$sql = "SELECT * FROM ems_subscribers WHERE sub_date_registered >='".$_POST['start']. "' AND sub_date_registered <= '".$_POST['end']."'";
		$data = [':today' => $_POST['start']];
		$all = $user->useRawQuery($sql, $data);
		$table = '';
		foreach ($all as $one)
		{
			$table .= "<tr>
                    <td>".$one['sub_id']."</td>
                    <td>".$one['sub_name']."</td>
                    <td>".$one['sub_phone']."</td>
                    </tr>";
		}
		if ($table == '')
			echo "<tr><td colspan='4'>No Records</td></tr>";
		echo $table;
	}else{
		echo "<tr><td colspan='4'>Select Some Date</td></tr>";
	}