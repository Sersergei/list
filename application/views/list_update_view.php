<a href="/list/unbloc/?id=<?php echo($_GET['id']); ?>" style="position:absolute;left:10px"><<Назад к списку</a>&nbsp&nbsp&nbsp
<?php echo($data['name']);?>
<form name="thisform" method="post">
<input type='hidden' class='input' name='del_list' value='<?php echo($_GET['id']) ?>' />
<input type="submit" value="Удалить список" class="button" />
</form>
<p>Поделиться списком</p>
<form name="thisform" method="post">
Введите e-mail Пользователя:<input type='text' class='input' name='add_user' value='' />
<input type="submit" value="Добавить пользователя" class="button" />
</form>
<p><?php echo($data['error']); ?></p>
<br />
<table>
<tr>
<td> Наименование</td>
<td> Количество</td>
<td> Еденица измерения</td>
<td> Цена</td>
</tr>
<input type="hidden" name="mydata" id="mydata" value="<?php echo($_GET[id]); ?>" />
<?php
while($array = mysql_fetch_array($data['result']))
{
    
echo("<tr><td>".$array['name_goods']."</td><td>".$array['qti']."</td><td>".$array['measure']."</td><td>".$array['price']."</td>
<td><form name='del' method='post'>
<input type='hidden' class='input' name='del_id' value='".$array['id']."' />
<input type='image' src='http://www.dbest.ru/.files/1515/Image/delit.gif'>
</form></td>
<td><form name='del' method='post'>
<input type='hidden' class='input' name='edit_id' value='".$array['id']."' />
<input type='image' src='http://www.dbest.ru/.files/1515/Image/vnesti_v_razdel.gif'>
</form></td></tr>");

}
$val=filter_var('ggg',FILTER_VALIDATE_FLOAT,array('options' => array('decimal' => ',')));
?>

</table>
<form name="thisform" method="post">
<p>Добавить еще покупку<br/> Наименование:<br /><input type="text" class="input" name="name_goods" value="" /></p>
<p>Количество:<br /><input type="text" class="input" name="qti" value="" /></p>
<p>Еденица измерения:<br /><input type="text" class="input" name="measure" value="" /></p>
<p>Цена:<br /><input type="text" class="input" name="price" value="" /></p>
<p><input type="submit" value="Добавить" class="button" onclick="return getValidate(this.form1)"/></p>
</form>
<script type="text/javascript"> setTimeout(show_list, 1000);</script>