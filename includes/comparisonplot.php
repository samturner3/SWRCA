<?php
# PHPlot Example: Simple line graph
require_once 'phplot.php';

$data = array(
  array('', 1, 65), array('', 2, 73.5), array('', 3, 81.5),
  array('', 4, 89), array('', 5,  96), array('', 6,  102),
  array('', 7,  108.5), array('', 8,  114), array('', 9,  119),
  array('', 10,  123.5), array('', 11,  127.5), array('', 12,  131.5),
  array('', 13, 134.5), array('', 14, 137.5), array('', 15, 140),
  array('', 16, 142), array('', 17, 143.5), array('', 18, 145),
  array('', 19, 146), array('', 20, 146.5),
);

$plot = new PHPlot(800, 600);
$plot->SetImageBorderType('plain');
$plot->SetPlotType('lines');
$plot->SetDataType('data-data');
$plot->SetDataValues($data);
$plot->SetYTitle('Forearm Length (mm)');
$plot->SetXTitle('Week');

# Main plot title:
$plot->SetTitle('Expected Bat Forearm Size');

# Make sure Y axis starts at 0:
$plot->SetPlotAreaWorld(NULL, 0, NULL, NULL);

$plot->DrawGraph();