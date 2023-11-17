<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>


<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;


$inputFileName1 = './files/sample.txt';
$spreadsheet1 = IOFactory::load($inputFileName1);
$worksheet1 = $spreadsheet1->getActiveSheet();
echo  "Text File";
echo "<hr>";
foreach ($worksheet1->getRowIterator() as $row) {
  foreach ($row->getCellIterator() as $cell) {
      $cellValue = $cell->getValue();
      echo $cellValue . "\t"; // Output the cell value
  }
  echo "\n"; // Move to the next row
}
echo "<br>";echo "<br>";echo "<br>";
$inputFileName2 = './files/sample.xlsx';
$spreadsheet2 = IOFactory::load($inputFileName2);
$worksheet2 = $spreadsheet2->getActiveSheet();
$tableData = $worksheet2->toArray();
echo  "Excel File";
echo "<hr>";
echo '<table>';
foreach ($tableData as $row) {
  echo '<tr>';
  foreach ($row as $cell) {
      echo '<td>' . $cell . '</td>';
  }
  echo '</tr>';
}
echo '</table>';

echo "<br>";echo "<br>";echo "<br>";
$inputFileName3 = './files/sample.csv';
$spreadsheet3 = IOFactory::load($inputFileName3);
$worksheet3 = $spreadsheet3->getActiveSheet();
$tableData = $worksheet3->toArray();
echo  "CSV File";
echo "<hr>";
echo '<table>';
foreach ($tableData as $row) {
  echo '<tr>';
  foreach ($row as $cell) {
      echo '<td>' . $cell . '</td>';
  }
  echo '</tr>';
}
echo '</table>';

echo "<br>";echo "<br>";echo "<br>";
echo  "Document File";
echo "<hr>";
$inputFileName4 ='./files/sample.doc';
$spreadsheet4 = IOFactory::load($inputFileName4);
$worksheet4 = $spreadsheet4->getActiveSheet();
$tableData = $worksheet4->toArray();
echo '<table>';
foreach ($tableData as $row) {
  echo '<tr>';
  foreach ($row as $cell) {
      echo '<td>' . $cell . '</td>';
  }
  echo '</tr>';
}
echo '</table>';
?>
</body>

</html>