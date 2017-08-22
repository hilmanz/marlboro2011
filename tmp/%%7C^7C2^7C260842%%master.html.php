<?php /* Smarty version 2.6.13, created on 2011-09-29 02:59:08
         compiled from marlboro/master.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->_tpl_vars['meta']; ?>

</head>

<body>
<img src="images/bg.png" alt="" id="bg" />
<div id="maincontent"  class="typeface-js">
	<?php echo $this->_tpl_vars['header']; ?>

    <div id="content">
    <?php echo $this->_tpl_vars['mainContent']; ?>

    </div><!-- #content -->
    
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'marlboro/popup-game.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    
    
	<?php echo $this->_tpl_vars['footer']; ?>

</div><!-- #main-content -->
<?php echo '
<script type="text/javascript">

	'; ?>

	<?php echo $this->_tpl_vars['MOP_EMBED']; ?>

	<?php echo '
</script>
'; ?>

</body>
</html>