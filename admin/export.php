<?php
	include('../core/init.php');

	$html = '<table border="1"><tr><td>Matric No</td><td>Fullname</td><td>Email</td><td>Phone No</td><td>Gender</td><td>Level</td><td>Nacos ID</td></tr>';
	foreach ($admin->exportStudentList() as $fetchstudent) {
		$html.='<tr><td>'.$fetchstudent->matricno.'</td><td>'.$fetchstudent->fullname.'</td><td>'.$fetchstudent->email.'</td><td>'.$fetchstudent->phone.'</td><td>'.$fetchstudent->gender.'</td><td>'.$fetchstudent->level.'</td><td>'.$fetchstudent->nacos_id.'</td></tr>';
	}
	$html.='</table>';
	header('Content-Type:application/xls');
	header('Content-Disposition:attachment;filename=all-student.xls');
	echo $html;
?>