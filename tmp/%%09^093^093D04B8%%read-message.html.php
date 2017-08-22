<?php /* Smarty version 2.6.13, created on 2011-09-13 17:00:05
         compiled from marlboro/read-message.html */ ?>
<h3>Read message</h3><p>	<a href="index.php?page=message">inbox</a>&nbsp;|&nbsp;	<a href="index.php?page=message&act=send">send</a>&nbsp;|&nbsp;	<a href="index.php?page=message&act=compose">compose</a></p><p>From:&nbsp;<?php echo $this->_tpl_vars['rs']['name']; ?>
</p><p>Subject:&nbsp;<?php echo $this->_tpl_vars['rs']['message_subject']; ?>
</p><p>Send:&nbsp;<?php echo $this->_tpl_vars['rs']['message_date']; ?>
</p><p><?php echo $this->_tpl_vars['rs']['message_text']; ?>
</p>