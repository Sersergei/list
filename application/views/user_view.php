<div>Логин:<?php echo($_SESSION['user']['login']);?> <a href="user/logaut"> Выйти</a></div>
<br />Мои списки:
<br />
<?php

while($array = $data['1']->fetch())
{
echo "<a href=\"/list/view/?id=".$array['id']. " \"> ".$array['name']."</a><br>";
}
;
?>
<br /> Доступные списки
<?php
while($array = $data['2']->fetch())
{
echo "<a href=\"/list/view/?id=".$array['id']. " \"> ".$array['name']."</a><br>";
}
?>
<a href="/list/new">Создать список</a>
