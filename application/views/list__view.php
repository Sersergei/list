<?php echo($data['name']); ?><br />
<table border="0" cellspacing="1" cellpadding="1">
<tr>
<td> Наименование</td>
<td> Количество</td>
<td> Еденица измерения</td>
<td> Цена</td>
</tr>
<?php
while($array = $data['result']->fetch())
{
    
echo("<tr><td>".$array['name_goods']."</td><td>".$array['qti'][$i]."</td><td>".$array['measure'][$i]."</td><td>".$array['price'][$i]."</td></tr>");
$i++;
}
?>
</table>
<a href="/list/update/?id=<?php echo($_GET['id'])?>">Редактировать</a>

