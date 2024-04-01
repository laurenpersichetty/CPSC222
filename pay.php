<html>
	<head>
		<title>Pay Calculator</title>
	</head>
	<body>
		Pay Calculator
		<table border=1>
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$employeeName = "Lauren Persichetty";
$hoursWorked = 40;
$payRate = 54.50;
$federalTaxRate = 0.245;
$stateTaxRate = 0.055;

$grossPay = $hoursWorked * $payRate;
$federalWitholding = $grossPay * $federalTaxRate;
$stateWitholding = $grossPay * $stateTaxRate;
$totalDeduction = $federalWitholding + $stateWitholding;
$netPay = $grossPay - $totalDeduction;
$annualPay = $grossPay * 52;

$hoursWorked = number_format($hoursWorked, 2);
$payRate = number_format($payRate, 2);
$grossPay = number_format($grossPay, 2);
$federalWitholding = number_format($federalWitholding, 2);
$stateWitholding = number_format($stateWitholding, 2);
$totalDeduction = number_format($totalDeduction, 2);
$netPay = number_format($netPay, 2);

$federalTaxBracket = "";
if ($annualPay <= 11600) {
	$federalTaxBracket = "10%";
}
elseif ($annualPay >= 11601 && $annualPay <= 47150) {
	$federalTaxBracket = "12%";
}
elseif ($annualPay >= 47151 && $annualPay <= 100525) {
	$federalTaxBracket = "22%";
}
elseif ($annualPay >= 100526 && $annualPay <= 191950) {
	$federalTaxBracket = "24%";
}
elseif ($annualPay >= 191951 && $annualPay <= 243725) {
	$federalTaxBracket = "32%";
}
elseif ($annualPay >= 243726 && $annualPay <= 609350) {
	$federalTaxBracket = "35%";
}
else {
	$federalTaxBracket = "37%";
}

echo "<tr><th>Employee Name</th><td>$employeeName</td></tr>";
echo "<tr><th>Hours Worked</th><td>$hoursWorked</td></tr>";
echo "<tr><th>Pay Rate</th><td>\$$payRate</td></tr>";
echo "<tr><th>Gross Pay</th><td>\$$grossPay</td></tr>";
echo "<tr><th>Federal Witholding (24.5%)</th><td>\$$federalWitholding</td></tr>";
echo "<tr><th>State Witholding (5.5%)</th><td>\$$stateWitholding</td></tr>";
echo "<tr><th>Total Deduction</th><td>\$$totalDeduction</td></tr>";
echo "<tr><th>Net Pay</th><td>\$$netPay</td></tr>";
echo "<tr><th>Federal Tax Bracket</th><td>$federalTaxBracket</td></tr>";

?>
		</table>
	</body>
</html>
