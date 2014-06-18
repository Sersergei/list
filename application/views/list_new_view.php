<form name="thisform" method="post">
<p>Введите название нового списка:<br><input type="text" class="input" name="list" value="<?php echo($data['post']['login'])?>" /></p>
<p><input type="submit" value="Создать" class="button" onclick="return getValidate(this.form)"/></p>
</form>