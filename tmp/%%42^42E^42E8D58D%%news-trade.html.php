<?php /* Smarty version 2.6.13, created on 2011-09-28 05:11:04
         compiled from marlboro/news-trade.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'marlboro/news-trade.html', 48, false),)), $this); ?>
<div id="sidebar">
        <div id="side-menu">
            <div class="nav-about">
              <h2><a href="index.php?page=about-marlboro-connections" class="about"><span>&nbsp;</span></a></h2>
            </div>
            <div class="nav-whats-active">
              <h2><a href="index.php?page=news" class="whats"><span>&nbsp;</span></a></h2>
              <div class="side-submenu">
                <a href="index.php?page=news">Clues and Hot News</a> 
              	<a href="#" class="active">Connections Activity</a>              
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
    	<div id="trade">
        	<div class="content">
            	<div id="scrollcApp" class="trade-activity" style="position:relative; height: 305px;">  
                	<div class="light"></div>
               	  	<div class="scrollcApp">
                    
					<!-- START CONTENT -->
					<?php $this->assign('num', 0); ?>
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
                        <?php if ($this->_tpl_vars['num']%2 == 0): ?>
                            <div class="entry">
                        <?php else: ?>
                        	<div class="entry2">
                        <?php endif; ?>
                                <p>
                                	<span class="icon_user">&nbsp;</span> 
                                    <span class="activity">
										<!--
                                		<a class="user_name" href="#"><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['seller'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a>
										just traded the <?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['badge_seri'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
 badge with
										<a class="user_name" href="#"><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['buyer'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a>
										-->
										<?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['tradenews_content'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
 - <?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['time']; ?>

									</span>
                                                                    </p>
                            </div>
                        </div>
                    
                    <?php $this->assign('num', $this->_tpl_vars['num']+1); ?>
					<?php endfor; endif; ?>
                   <!-- END CONTENT -->
                  
				  </div>
				  
				  
                </div><!-- .trade-activity -->
                <div id="offerBox" class="requestBadge box-1" style="z-index:751">
                  <div class="profile" style=" margin: 5px 0 0 45px;">  
                  <a id="btnClosePopupProfile" class="popup-close toggleBox" no="1"></a>
               		<div class="profile-card">
                    	<div class="profile-entry">
                         <form id="formOfferTrade">   
                            <div class="photo">
                                <img id="profileImg" src="images/pp.jpg" />
                            </div>
                            <div class="profile-info">
                                <span>Name</span>
                                <h2 id="profileName">Irvan Gondrong</h2>
                                <span>Age</span>
                                <h2 id="profileAge">27</h2>
                                <span>Town</span>
                                <h2 id="profileCity">Tebet</h2>
                                
                                <span>Connections Date</span>
                                <h2 id="profileDate">12 June 2011</h2>
                            </div>
                            
                            <div class="entry-text">
                                <h2 id="profileDescription"></h2>
                            </div>
                           
						   <!--
                           <img class="trader" alt="trader" src="images/content/trader.png" width="130">
                           <input class="offerTrade" type="button" value="" no="1">
							-->
							 </form>
					   </div>
                      
                    </div>
                    <div class="badge-row" id="profileBadge"></div>
				</div>                  
              </div>
                <div style="position:relative;">            	  	
        			<input id="up" type="button" style="bottom: 265px;right: -15px;">
					<input id="down" type="button" style="bottom: 265px;right: -45px;">  
				</div>
				
				
				
				<!-- BAdge POPUP  -->
				<div id="popup">
                                <a class="popup-close">&nbsp;</a>
                                <div class="entry-popup">
                                    <div class="message-text">
                                        <div class="message-entry">
                                            <div style="border: 0 none;margin: 2px 0 0;" class="head">
    											<h1></h1>  
    											<img width="250" id="imgSuccess" style="position: absolute;right: 215px;top: 80px;" src="images/badge/badge12-super.png" alt="badge"> 									
    										</div>
                                        </div>
                                    </div>
                                    <div class="message-menu">
                                        <a href="index.php?page=profile">See My Badges</a>
                                    </div>
                                </div>
                            </div>
                            <script>
    							<?php echo '
								    $(".popup-close").click( function() {
								          $("#popup").fadeOut("slow");
								  		});
								'; ?>

        					</script>
				
            </div><!-- .content -->
        </div><!-- #trade -->
    </div><!-- #content -->
 <div class="page-trade"></div>