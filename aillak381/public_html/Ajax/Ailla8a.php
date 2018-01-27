<?php
include "XMLParser.class";
header("Cache-Control: post-check=1,pre-check=2");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/xml");
echo '<?xml version = "1.0" encoding="UTF-8"?>';
echo '<EMPLOYEES>';
$xml = file_get_contents("Employees.xml");
$parser = new XMLParser($xml);
$parser->Parse();
$lastName = $_GET["qu"];
$found = false;
foreach( $parser->document->employee as $employee)
{
$stmt = $employee->emplastname[0]->tagData;
if ((strtolower($lastName)) == strtolower(substr($stmt, 0, strlen($lastName)))) 
{
$found = true;
echo '<Employee>';
echo '<EmpNo>' . $employee->empno[0]->tagData. '</EmpNo>';
echo '<EmpFirstName>' . $employee->empfirstname[0]->tagData. '</EmpFirstName>';
echo '<EmpLastName>' . $employee->emplastname[0]->tagData. '</EmpLastName>';
echo '<EmpPhone>' . $employee->empphone[0]->tagData. '</EmpPhone>';
if ($employee->supempno[0]->tagData)
echo '<SupEmpNo>' . $employee->supempno[0]->tagData . '</SupEmpNo>';
else
echo '<SupEmpNo></SupEmpNo>';
if ($employee->empcommrate[0]->tagData)
echo '<EmpCommRate>' . $employee->empcommrate[0]->tagData . '</EmpCommRate>';
else
echo '<EmpCommRate></EmpCommRate>';
echo '<EmpEmail>' . $employee->empemail[0]->tagData. '</EmpEmail>';
echo '</Employee>';
}
}
if ($found == false)
echo '<DATA></DATA>';
echo '</EMPLOYEES>';
?>