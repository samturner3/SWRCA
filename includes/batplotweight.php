<?php
# PHPlot Example: Simple line graph
require_once 'phplot.php';

$data = array(
  array('', 1, 78), array('', 2, 89), array('', 3, 104),
  array('', 4, 122), array('', 5,  144), array('', 6,  166),
  array('', 7,  192), array('', 8,  217), array('', 9,  244),
  array('', 10,  272), array('', 11,  298), array('', 12,  326),
  array('', 13, 352), array('', 14, 375), array('', 15, 398),
  array('', 16, 418), array('', 17, 435), array('', 18, 448),
  array('', 19, 459), array('', 20, 464),
);

$plot = new PHPlot(800, 600);
$plot->SetImageBorderType('plain');
$plot->SetPlotType('lines');
$plot->SetDataType('data-data');
$plot->SetDataValues($data);
$plot->SetYTitle('Weight (grams)');
$plot->SetXTitle('Week');

# Main plot title:
$plot->SetTitle('Expected Bat Weight');

# Make sure Y axis starts at 0:
$plot->SetPlotAreaWorld(NULL, 0, NULL, NULL);

$plot->DrawGraph();