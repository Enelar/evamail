<head>
  <script src="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.0.0/semantic.min.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.0.0/semantic.min.css">
  <meta charset="UTF-8">
</head>
<body style='background-image: url(/eva/unicorn.jpg); background-repeat: no-repeat; background-position: top right;'>
<h1 class='ui header'>Отправка писем</h1>
<form action='/eva/send.php' method='get'>
  <select class="ui search dropdown" name='template'>
    <option value='default'>Первое письмо</option>
<?php
  $templates = glob("templates/*.tmpl");
  foreach ($templates as $tmpl)
    echo "<option value='$tmpl'>$tmpl</option>";
?>
  </select>
  <div class='ui hidden divider'></div>
  <div class='ui input'>
    <input type='text' placeholder='email' name='to'>
  </div>
  <input type='submit' class='ui button' value='Отправить'>
</form>

<div class='ui divider'></div>
<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>

<h1 class='ui header'>Создание писем</h1>
<form action='/eva/add.php' method='post'>
  <div class='ui input'>
    <input name='name' placeholder='Название шаблона'>
  </div>
  <div class='ui hidden divider'></div>
  <div class='ui input'>
    <input name='title' placeholder='Заголовок'>
  </div>
  <div class='ui hidden divider'></div>
  <div class='ui input'>
    <textarea name='template'></textarea>
  </div>
  <div class='ui hidden divider'></div>
  <input type='submit' class='ui button' value='Сохранить'>
</form>
</body>
