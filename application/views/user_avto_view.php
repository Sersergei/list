<a href= "#" target="_blank"> На главную</a> 
<a href="reg" target ="_blank">Регистрация </a>
<div class><h1>Авторизация</h1></div>
<form name="thisform" method="post">
<p>Пароль:<br><input type="password" class="input" name="password" value="<?php echo($data['post']['password'])?>" /></p>
<p>E-mail:<br><input type="email"  class="input"name="email" value="<?php echo($data['post']['email'])?>" class="email" />
<div id="error"><?php echo($data['error']); ?></div>
<p><input type="submit" value="Авторизация" class="button" onclick="return getValidate(this.form)"/></p>
</form>