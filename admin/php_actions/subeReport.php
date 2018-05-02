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
		$sql = "SELECT * FROM ems_event WHERE event_date >= '".$_POST['start']."'";
		$all = $user->useRawQuery($sql);
		$table = '';
		foreach ($all as $one)
		{
			$qw = $user->getOneValue('ems_users', 'user_id', $one['event_author']);
			$table .= "<tr>
                   <td>".$one['event_id']."</td>
                    <td>".$one['event_title']."</td>
                    <td>".$qw['user_first_name']."</td>
                    <td>".$one['event_date']."</td>
                    </tr>";
		}if ($table == '')
		echo "<tr><td colspan='4'>No Records</td></tr>";
		echo $table;
	}elseif (isset($_POST['start']) && $_POST['end']!='' && $_POST['start']!='')
	{
		$sql = "SELECT * FROM ems_event WHERE event_date >='".$_POST['start']. "' AND event_date <= '".$_POST['end']."'";
		$data = [':today' => $_POST['start']];
		$all = $user->useRawQuery($sql, $data);
		$table = '';
		foreach ($all as $one)
		{
			$qw = $user->getOneValue('ems_users', 'user_id', $one['event_author']);
			$table .= "<tr>
                   <td>".$one['event_id']."</td>
                    <td>".$one['event_title']."</td>
                    <td>".$qw['user_first_name']."</td>
                    <td>".$one['event_date']."</td>
                    </tr>";
		}
		if ($table == '')
			echo "<tr><td colspan='4'>No Records</td></tr>";
		echo $table;
	}else{
		echo "<tr><td colspan='4'>Select Some Date</td></tr>";
	}