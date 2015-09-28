<?php

$image_id = 0;
function save_image_from_string($str)
{
  $data = base64_decode($str);
  if ($data === false)
    die('FAILURE IN IMAGE DECODE!');

  global $fname;
  global $image_id;

  $fimg = $fname.".{$image_id}.jpg";
  file_put_contents($fimg, $data);
  $image_id++;
  return $fimg;
}

function upload_image($str)
{
  $begin_str = "<img src=\"data:image/";
  $data_str = "base64,";
  $end_str = "\"";

  $ret = "";

  while (strlen($str) > 0)
  {
    $begin = strpos($str, $begin_str);
    if ($begin === false)
      break;
    $ret .= substr($str, 0, $begin);
    $str = substr($str, $begin + strlen($begin_str) + 1);

    $pos = strpos($str, $data_str);
    if ($pos === false)
      die("FATAL FAILURE IN IMAGE UPLOAD!! (DATA IS MISSING) [last byte: ".strlen($ret)."]");

    $end = strpos($str, $end_str);
    if ($end === false)
      die("FATAL FAILURE IN IMAGE UPLOAD!! (UNEXPECTED END OF DATA) [last byte: ".strlen($ret)."]");

    $data = substr($str, $pos + strlen($data_str), $end - ($pos + strlen($data_str)));
    $url = save_image_from_string($data);

    $ret .= "<img src='http://ettty.ru/eva/$url' ";
    var_dump("Сохраняем изображение $url");

    $str = substr($str, $end + strlen($end_str));
  }

  $ret .= $str;
  return $ret;
}

$name = $_POST['name'];

if (strpos($name, "..") !== false)
  return;

$fname = "templates/eva{$name}.tmpl";

$_POST['template'] = upload_image($_POST['template']);

$res = file_put_contents($fname, json_encode($_POST, JSON_UNESCAPED_UNICODE));
var_dump("Сохранение ($fname) ".($res ? 'успешно' : 'не успешно'));

$overload = $_POST['template'];
include('template.php');

/*
$doc = DOMDocument::loadHTML('<?xml encoding="UTF-8">'.$_POST['template']);
var_dump($_POST);
function recursive($root)
{
  foreach ($root->childNodes as $item)
  {
    if ($item->hasChildNodes())
      recursive($item);
    else
    {
      var_dump($item->tagName);
      //var_dump($item->nodeName);
      //var_dump($item->C14N());
    }
  }
}

recursive($doc);

*/