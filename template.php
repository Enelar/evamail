<?php /* Template from mail chump */ 

$mail =
[
  "subject" => "Тема письма",
];

function h1($text)
{
?>
  <h1 class="primary-heading" style='
      font-size:22px;
      font-weight:normal;
      color:#7e7e7e;
      font-family:Georgia;
      line-height:150%;
      text-align:center;'>
      <?= $text ?>
  </h1>
<?php
}

function subtitle($text)
{
?>
  <h3 class="primary-heading" style='
      font-size: 12px;
      font-weight: bold;
      color: #737373;
      font-family: Georgia;
      line-height: 50%;
      text-align: left;'>
      <?= $text ?>
  </h3>
<?php
}

function h2($text)
{
?>
  <h2 class="primary-heading" style='
    font-size: 18px;
    font-weight: bold;
    color: #545454;
    font-family: Georgia;
    line-height: 50%;
    text-align: left;'>
      <?= $text ?>
  </h2>
<?php
}

function img($src)
{
?>
  <div style='max-width: 600px; text-align: center;'>
    <img src="<?= $src ?>" mc:edit="image_1" mc:allowdesigner style="max-width: 80%;">
  </div>
<?php
}

function button($link, $title)
{
?>
  <p style="text-align: center;">
    <a href='<?= $link ?>' target="_blank"
      style='
      background:#ff8e6b;
      border:3px solid #ebebeb;
      -webkit-border-radius: 3;
      -moz-border-radius: 3;
      border-radius: 3px;
      font-family: Arial;
      color: #ffffff;
      padding: 10px 20px 10px 20px;
      text-decoration: none;
      font-size: 30px;
      line-height: 2em;'>
        <?= $title ?>
    </a>
  </p>
<?php
}

function p($text)
{
?>
  <p style='text-align: justify;'>
    <?= $text ?>
  </p>
<?php
}

?>
<html>
  <head>
    <title><?= $mail['subject'] ?></title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">

  <style type="text/css">
    #topbar{
      background-color:transparent;
      padding:10px 0 20px;
      color:#666;
      font-size:11px;
      font-family:Georgia;
      font-weight:normal;
      text-align:center;
      color:#ff8e6b;
      text-decoration:underline;
      font-weight:normal;
    }

    p.btn{
      background:#ff8e6b;
      border:3px solid #ebebeb;
      width:auto;
      color:#fff;
      text-align:center;
      margin:25px 15%;
      font-size:40px;
      font-family:Georgia;
      padding:.7em 0;
    }

    p.note{
      font-family:Georgia;
      color:#777;
      margin:0 10%;
      font-size:16px;
      line-height:1.4em;
      text-align:center;
    }

    #footer{
    /*@tab Footer
      @section footer
      @tip You might give your footer a light background color and separate it with a top border
      @theme footer*/
      background-color:transparent;
      padding:20px;
      font-size:10px;
      color:#666;
      line-height:100%;
      font-family:Georgia;
      text-align:center;
    }

    #footer a{
      color:#ff8e6b;
      text-decoration:underline;
      font-weight:normal;
    }

    a,a:link,a:visited{
      color:#ff8e6b;
      text-decoration:underline;
      font-weight:normal;
    }
  </style>
</head>
  <body style='background-color:#d2efef; text-align:center;'>
    <div id="wrap" style='background-color:#d2efef; text-align:center; font-size: 14px;'>
      <table id="layout" border="0" cellspacing="0" cellpadding="0" width="600" style="margin:10px auto; text-align:left;">
        <tr>
          <td id="content" mc:edit="main" style='background:#ffffff; line-height:1.25em; padding:10px 20px 30px 40px; vertical-align:top;'>

<?php
if (!isset($overload))
  include('first_code.php');
else
  echo $overload;
?>
          </td>
        </tr>
        <tr>
          <td id="page_curl">
            <img src="https://storage.googleapis.com/eva-email/img/footer.png">
          </td>
        </tr>
      </table>
    </div>
    <span style="padding: 0px;"></span>
  </body>
</html>

