<?php /* Smarty version 2.6.13, created on 2011-09-14 09:50:25
         compiled from marlboro/inbox.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'marlboro/inbox.html', 1, false),array('modifier', 'intval', 'marlboro/inbox.html', 1, false),)), $this); ?>
<div id="sidebar">        <div id="side-menu">            <div class="nav-about">              <h2><a href="index.php?page=about-marlboro-connections" class="about"><span>&nbsp;</span></a></h2>            </div>            <div class="nav-whats">              <h2><a href="index.php?page=news" class="whats"><span>&nbsp;</span></a></h2>            </div>            <div class="nav-code">              <h2><a href="index.php?page=code" class="code"><span>&nbsp;</span></a></h2>            </div>            <div class="nav-badge">                  <h2><a href="#" class="badge"><span>&nbsp;</span></a></h2>            </div>            <div class="nav-reedem">                  <h2><a href="index.php?page=redeem-badge" class="reedem"><span>&nbsp;</span></a></h2>            </div>            <div class="nav-game">                 <h2><a href="#" class="game"><span>&nbsp;</span></a></h2>            </div>        </div>    </div><!-- #sidebar -->    <div id="content">    	<div id="messages">        	<div class="content">            	<div class="messages">                  	<h1><img src="images/messages.png" /></h1>                    <div class="messagebox">                    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>                        <div class="row">                            <div class="entry">                                <p><span class="title-message"><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['message_subject'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</span>                                <a href="index.php?page=message&act=read&id=<?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['message_id'])) ? $this->_run_mod_handler('intval', true, $_tmp) : intval($_tmp)); ?>
">Read</a> <a href="#">Delete</a></p>                            </div>                        </div>                       <?php endfor; endif; ?>                    </div>                </div><!-- .messages -->            </div><!-- .content -->        </div><!-- #messages -->    </div><!-- #content -->	