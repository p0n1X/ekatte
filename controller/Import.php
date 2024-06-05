<?php
include('./model/Data.php');

use APP\Model\Data\Data;

//Reading all data from json file and importing in database

$data_model = new Data;
$filename = "ek_atte.json";
$data_from_file = file_get_contents($filename);
$data = json_decode($data_from_file, true);
foreach ($data as $row) {
    $data_model->query("INSERT INTO ekatte (
      `ekatte`,
      `t_v_m`,
      `name`,
      `oblast`,
      `obshtina`,
      `kmetstvo`,
      `kind`,
      `category`,
      `altitude`,
      `document`,
      `abc`,
      `name_en`,
      `nuts1`,
      `nuts2`,
      `nuts3`,
      `text`,
      `oblast_name`,
      `obshtina_name`) VALUES ('" . $row['ekatte'] . "',
      '" . $row['t_v_m'] . "',
      '" . $row['name'] . "',
      '" . $row['oblast'] . "',
      '" . $row['obshtina'] . "',
      '" . $row['kmetstvo'] . "',
      '" . $row['kind'] . "',
      '" . $row['category'] . "',
      '" . $row['altitude'] . "',
      '" . $row['document'] . "',
      '" . $row['abc'] . "',
      '" . $row['name_en'] . "',
      '" . $row['nuts1'] . "',
      '" . $row['nuts2'] . "',
      '" . $row['nuts3'] . "',
      '" . $row['text'] . "',
      '" . $row['oblast_name'] . "',
      '" . $row['obshtina_name'] . "')");
};

$data_model->close();