<!DOCTYPE html>
<html>
<head>
    <title>Payroll Calculator</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;        }
        th {
            background-color: #f2f2f2;
        }
    </style>
<! wow thats epic >
</head>
<body>

<?php
// Hardcoded variables
$employeeName = "Jamer Whacton";
$hoursWorked = 40.0;
$payRate = 54.50;
$federalTaxRate = 0.245; // 24.5%
$stateTaxRate = 0.055; // 5.5%

// Calculations
$grossPay = $hoursWorked * $payRate;
$yearlyincome = $grossPay * 52;
$federalWithholding = $grossPay * $federalTaxRate;
$stateWithholding = $grossPay * $stateTaxRate;
$totalDeductions = $federalWithholding + $stateWithholding;
$netPay = $grossPay - $totalDeductions;
//TAX

if ($yearlyincome <= 11600) 
    $taxbracket = "10%";
elseif($yearlyincome >= 11601 && $yearlyincome <=47150)
    $taxbracket = "12%";
elseif($yearlyincome >= 47151 && $yearlyincome <=100525)
    $taxbracket = "22%";
elseif($yearlyincome >= 100526 && $yearlyincome <=191950)
    $taxbracket = "24%";
elseif($yearlyincome >= 191951 && $yearlyincome <=243725)
    $taxbracket = "32%";
elseif($yearlyincome >= 243726 && $yearlyincome <=609350)
    $taxbracket = "35%";
elseif($yearlyincome >= 609351)
    $taxbracket = "37%";





// PRINT
echo "<table>\n";
    echo "\t<tr><th colspan='2'>Payroll Information</th>\n\t</tr>\n";
    echo "\t<tr>\n\t\t<td>Employee Name:</td><td>$employeeName</td>\n\t</tr>\n";
    echo "\t<tr>\n\t\t<td>Hours Worked:</td>\n\t\t<td>$hoursWorked</td>\n\t</tr>\n";
    echo "\t<tr>\n\t\t<td>Pay Rate:</td>\n\t\t<td>$" . number_format($payRate, 2) . "</td>\n\t</tr>\n";
    echo "\t<tr>\n\t\t<td>Gross Pay:</td>\n\t\t<td>$" . number_format($grossPay, 2) . "</td>\n\t</tr>\n";
    echo "\t<tr>\n\t\t<th colspan ='2'>Deductions:</td></th>\n\t</tr>\n";
    echo "\t<tr>\n\t\t<td style='padding-left:20px;'>Tax Bracket</td>\n\t\t<td>$taxbracket</td>\n\t</tr>\n";
    echo "\t<tr>\n\t\t<td style='padding-left:20px;'>Federal Withholding (24.5%):</td>\n\t\t<td>$" . number_format($federalWithholding, 2) . "</td>\n\t</tr>\n";
    echo "\t<tr>\n\t\t<td style='padding-left:20px;'>State Withholding (5.5%):</td>\n\t\t<td>$" . number_format($stateWithholding, 2) . "</td>\n\t</tr>\n";
    echo "\t<tr>\n\t\t<td>Total Deduction:</td>\n\t\t<td>$" . number_format($totalDeductions, 2) . "</td>\n\t</tr>\n";
    echo "\t<tr>\n\t\t<td>Net Pay:</td>\n\t\t<td>$" . number_format($netPay, 2) . "</td>\n\t</tr>\n";
echo "</table>\n"; 
?>

</body>
</html>
