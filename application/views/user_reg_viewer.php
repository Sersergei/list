<a href= "#" target="_blank"> На главную</a> 
<a href="avto" target ="_blank">Авторизация </a>
<div class><h1>Регистрация</h1></div>
<form name="thisform" method="post">
<p>Логин:<br><input type="text" class="input" name="login" value="<?php echo($data['post']['login'])?>" /></p>
<p>Пароль:<br><input type="password" class="input" name="password" value="<?php echo($data['post']['password'])?>" /></p>
<p>E-mail:<br><input type="email"  class="input"name="email" value="<?php echo($data['post']['email'])?>" class="email" />
<div id="error"><?php echo($data['error']); ?></div></p>
<p><input type="submit" value="Регистрация" class="button" onclick="return getValidate(this.form)"/></p>
</form>