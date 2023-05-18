<?php
	include('../core/init.php');

	$i = 1;
	$html = '<table border="1"><tr><td>S/N</td><td>Matric No</td><td>Fullname</td><td>Email</td><td>Phone No</td><td>Gender</td><td>Level</td><td>Signature</td><td>Date Collected</td></tr>';
	foreach ($admin->exportStudentList2() as $fetchstudent) {
		$html.='<tr><td>'.$i++.'</td><td>'.$fetchstudent->matricno.'</td><td>'.$fetchstudent->fullname.'</td><td>'.$fetchstudent->email.'</td><td>'.$fetchstudent->phone.'</td><td>'.$fetchstudent->gender.'</td><td>'.$fetchstudent->level.'</td><td></td><td></td></tr>';
	}
	$html.='</table>';
	header('Content-Type:application/xls');
	header('Content-Disposition:attachment;filename=all-student.xls');
	echo $html;
?>