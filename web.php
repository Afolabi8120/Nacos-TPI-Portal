<?php
	
	if(isset($_POST['btnCalculate'])){
		$amount = $_POST['amount'];

		$amount = 1000;
		$discount = (10 / 100) * $amount;

		echo "The 10% discount of " . $amount . " is " .$discount;
	}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Discount PHP</title>
</head>
<body>
	<form method="POST" action="web.php">
		<div>
			<label>Enter an Amount</label>
			<input type="text" name="amount">
		</div>
		<input type="submit" name="btnCalculate" value="Calculate">
		
	</form>

</body>
</html>