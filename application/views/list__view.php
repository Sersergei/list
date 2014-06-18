<?php echo($data['name']); ?><br />
<table border="0" cellspacing="1" cellpadding="1">
<tr>
<td> Наименование</td>
<td> Количество</td>
<td> Еденица измерения</td>
<td> Цена</td>
</tr>
<?php
while($array = mysql_fetch_array($data['result']))
{
    
echo("<tr><td>".$array['name_goods']."</td><td>".$array['qti']."</td><td>".$array['measure']."</td><td>".$array['price']."</td></tr>");
}
?>
</table>
<a href="/list/update/?id=<?php echo($_GET['id'])?>">Редактировать</a>

