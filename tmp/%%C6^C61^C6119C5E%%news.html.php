<?php /* Smarty version 2.6.13, created on 2011-09-28 05:11:13
         compiled from marlboro/news.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'marlboro/news.html', 42, false),array('modifier', 'strip_tags', 'marlboro/news.html', 42, false),)), $this); ?>

<div id="sidebar">
        <div id="side-menu">
            <div class="nav-about">
              <h2><a href="index.php?page=about-marlboro-connections" class="about"><span>&nbsp;</span></a></h2>
            </div>
            <div class="nav-whats-active">
              <h2><a href="index.php?page=news" class="whats"><span>&nbsp;</span></a></h2>
              <div class="side-submenu">
                <a href="#" class="active">Clues and Hot News</a>     
              	<a href="index.php?page=news&act=trade">Connections Activity</a>
              </div>
            </div>
            <div class="nav-code">
              <h2><a href="index.php?page=code" class="code"><span>&nbsp;</span></a></h2>
            </div>
            <div class="nav-badge">
                  <h2><a href="index.php?page=code&act=trade" class="badge"><span>&nbsp;</span></a></h2>
            </div>
            <div class="nav-reedem">
                  <h2><a href="index.php?page=code&act=prize" class="reedem"><span>&nbsp;</span></a></h2>
            </div>
            <div class="nav-game">
                 <h2><a href="index.php?page=games" class="game"><span>&nbsp;</span></a></h2>
            </div>
        </div>
    </div><!-- #sidebar -->
  
    <div id="content">
    	<div id="news">
        	<div class="content" style="position:relative;">
            	<div id="scrollcApp" class="newsfeed" style="height: 320px;">  
               	 	<div class="scrollcApp">
                    
					<!-- START CONTENT LIST -->
					<?php unset($this->_sections['i']);
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
?>
					
                        <div class="row">
                            <div class="entry">
                                <p>
									<span class="time"><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['time']; ?>
</span>
									<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['news_brief'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

									<a class="detail" href="#" no="<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['news_id']; ?>
">Details &raquo;</a></p>
									
                            </div>
                        </div>
                    
					<?php endfor; endif; ?>
                    

					<!-- END CONTENT LIST -->
					
                  
                	</div>
                </div><!-- .newsfeed -->
                <div style="position:relative;">            	  	
        			<input id="up" type="button" style=" bottom: 275px;right: -35px;">
					<input id="down" type="button" style="bottom: 275px; right: -65px;">  
				</div>
                <?php unset($this->_sections['i']);
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
?>
                  <div class="badge-box-medium news-<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['news_id']; ?>
" style="z-index:760; width: 515px; padding-top:15px;">
                                <a class="popup-close detail" no="<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['news_id']; ?>
" style="right: -9px;top: -25px;">&nbsp;</a>
                                <div>
                                    <p><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['news_content'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</p>
                                </div>
                  </div>
                  <?php endfor; endif; ?>
            </div><!-- .content -->
        </div><!-- #news -->
    </div><!-- #content -->
	<script>
	<?php echo '
	$(".detail").click( function() {
		var no = $(this).attr(\'no\');
        $(".news-"+no).fadeToggle("slow");
        
		});
	'; ?>

	</script>
   <div class="page-news"></div>