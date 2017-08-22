<?php /* Smarty version 2.6.13, created on 2011-09-12 14:38:07
         compiled from common/admin/login.html */ ?>
<div id="login">
	<h1>LOGIN</h1>
  <form name="form1" method="post" action="login.php">
    <input type="hidden" name="PHPSESSID" value="85a1fe34897ffd340ee39272d8a03b8c" />
      <label>Username</label>
      <input name="username" type="text" id="username" maxlength="20">  
      <label>Password</label>
      <input name="password" type="password" id="password" maxlength="20" />
      
      <label>
      <input name="f" type="hidden" id="f" value="1">
      <input id="button" type="submit" name="Submit" value="Login" />
            <?php if ($this->_tpl_vars['msg'] <> ""): ?>
    <span class="messageLogin"> <?php echo $this->_tpl_vars['msg']; ?>
 </span>
    <?php endif; ?>
      </label>
  </form>

</div>