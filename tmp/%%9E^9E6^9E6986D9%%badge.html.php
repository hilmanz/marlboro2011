<?php /* Smarty version 2.6.13, created on 2011-09-20 09:54:08
         compiled from marlboro/badge.html */ ?>
<div id="sidebar">
        <div id="side-menu">
            <div class="nav-about">
              <h2><a href="index.php?page=about-marlboro-connections" class="about"><span>&nbsp;</span></a></h2>
            </div>
            <div class="nav-whats">
              <h2><a href="index.php?page=news" class="whats"><span>&nbsp;</span></a></h2>
            </div>
            <div class="nav-code">
              <h2><a href="index.php?page=code" class="code"><span>&nbsp;</span></a></h2>
            </div>
            <div class="nav-badge-active">
                  <h2><a href="#" class="badge"><span>&nbsp;</span></a></h2>
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
    	<div id="badge">
    		<div class="content">
    			<div class="badge-trade">
    				 <a href="#listBadgeRequest" class="btn-badgetrade toggleBox"></a>
    			</div>
    <!-- POPUP 1  -->			
    			<div id="listBadgeRequest" class="requestBadge">
    				<div class="contentBadge">
    					<a class="popup-close toggleBox"></a>
    					<div class="head">
    						<h3>BADGE TRADE</h3>
    						<p>Select a badge from left to trade with a badge on the right</p>
    					</div>
    					<form id="formRequestTrade">
    					<div class="badgeKiri">
    					<p>My Badges</p>
							<?php $this->assign('num', 1); ?>
							<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['have']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    						<div class="badge-box">
                        		<div class="badge-img">
                            		<img src="images/badge/badge<?php if ($this->_tpl_vars['have'][$this->_sections['i']['index']] == 0):  echo $this->_tpl_vars['num']; ?>
_grey<?php else:  echo $this->_tpl_vars['have'][$this->_sections['i']['index']];  endif; ?>.png" />
                            	</div>
                            	<div class="badge-cek">
									<?php if ($this->_tpl_vars['have'][$this->_sections['i']['index']] > 0): ?>
                            		 <input type="checkbox" name="have_<?php echo $this->_tpl_vars['have'][$this->_sections['i']['index']]; ?>
" id="checkbox" onclick="javascript:trade.haveSelect(<?php echo $this->_tpl_vars['num']; ?>
);" />
									<?php endif; ?>
								</div>
                        	</div>
							<?php $this->assign('num', $this->_tpl_vars['num']+1); ?>
							<?php endfor; endif; ?>
                        	
    					</div>
    					
    					<div class="badgeKanan">
    					<p>What I Need</p>
    						<div class="badge-box">
                        		<div class="badge-img">
                            		<img src="images/badge/badge1.png" />
                            	</div>
                            	<div class="badge-cek">
                            		 <input type="checkbox" name="req_1" id="checkbox" onclick="javascript:trade.reqSelect(1);" />
                            	</div>
                        	</div>
                        	<div class="badge-box">
                        		<div class="badge-img">
                            		<img src="images/badge/badge2.png" />
                            	</div>
                            	<div class="badge-cek">
                            		 <input type="checkbox" name="req_2" id="checkbox" onclick="javascript:trade.reqSelect(2);" />
                            	</div>
                        	</div>
                        	<div class="badge-box">
                        		<div class="badge-img">
                            		<img src="images/badge/badge3.png" />
                            	</div>
                            	<div class="badge-cek">
                            		 <input type="checkbox" name="req_3" id="checkbox" onclick="javascript:trade.reqSelect(3);" />
                            	</div>
                        	</div>
                        	<div class="badge-box">
                        		<div class="badge-img">
                            		<img src="images/badge/badge4.png" />
                            	</div>
                            	<div class="badge-cek">
                            		 <input type="checkbox" name="req_4" id="checkbox" onclick="javascript:trade.reqSelect(4);" />
                            	</div>
                        	</div>
                        	<div class="badge-box">
                        		<div class="badge-img">
                            		<img src="images/badge/badge5.png" />
                            	</div>
                            	<div class="badge-cek">
                            		 <input type="checkbox" name="req_5" id="checkbox" onclick="javascript:trade.reqSelect(5);" />
                            	</div>
                        	</div>
                        	<div class="badge-box">
                        		<div class="badge-img">
                            		<img src="images/badge/badge6.png" />
                            	</div>
                            	<div class="badge-cek">
                            		 <input type="checkbox" name="req_6" id="checkbox" onclick="javascript:trade.reqSelect(6);" />
                            	</div>
                        	</div>
                        	<div class="badge-box">
                        		<div class="badge-img">
                            		<img src="images/badge/badge7.png" />
                            	</div>
                            	<div class="badge-cek">
                            		 <input type="checkbox" name="req_7" id="checkbox" onclick="javascript:trade.reqSelect(7);" />
                            	</div>
                        	</div>
                        	<div class="badge-box">
                        		<div class="badge-img">
                            		<img src="images/badge/badge8.png" />
                            	</div>
                            	<div class="badge-cek">
                            		 <input type="checkbox" name="req_8" id="checkbox" onclick="javascript:trade.reqSelect(8);" />
                            	</div>
                        	</div>
                        	<div class="badge-box">
                        		<div class="badge-img">
                            		<img src="images/badge/badge9.png" />
                            	</div>
                            	<div class="badge-cek">
                            		 <input type="checkbox" name="req_9" id="checkbox" onclick="javascript:trade.reqSelect(9);" />
                            	</div>
                        	</div>
                        	<div class="badge-box">
                        		<div class="badge-img">
                            		<img src="images/badge/badge10.png" />
                            	</div>
                            	<div class="badge-cek">
                            		 <input type="checkbox" name="req_10" id="checkbox" onclick="javascript:trade.reqSelect(10);" />
                            	</div>
                        	</div>
                        	<div class="badge-box">
                        		<div class="badge-img">
                            		<img src="images/badge/badge11.png" />
                            	</div>
                            	<div class="badge-cek">
                            		 <input type="checkbox" name="req_11" id="checkbox" onclick="javascript:trade.reqSelect(11);" />
                            	</div>
                        	</div>
                        	<div class="badge-box">
                        		<div class="badge-img">
                            		<img src="images/badge/badge12.png" />
                            	</div>
                            	<div class="badge-cek">
                            		 <input type="checkbox" name="req_12" id="checkbox" onclick="javascript:trade.reqSelect(12);" />
                            	</div>
                        	</div>
    					</div>
    					<div class="controlTrade">
    						<img alt="Trade" src="images/content/arrow.png">
    						<input class="request" type="submit" value="">
    					</div>
    					</form>
    				</div>
    			</div>
    			
   <!-- POPUP 2  -->
    			<div id="badgeRequest" class="badge-box-medium">
    				<div class="contentBadge">
    					<a class="popup-close toggleBox2"></a>
    					<div class="head" style="border: 0 none;">
    						<h1>confirm badge request</h1>
    					</div>
    					<form id="formRequestTradeConfirm" action="#">
    					<img id="confirmMineImg" class="kiri" alt="mine" src="images/badge/badge9-big.png">
    					<img id="confirmYourImg" class="kanan" alt="yours" src="images/badge/badge12-big.png">
    					<div class="controlTrade">
    						<img alt="Trade" src="images/content/arrow.png">
    						<input class="submitted" type="submit" value="">
    					</div>
    					</form>
    				</div>
    			</div>
    <!-- POPUP 3  -->
    			<div id="badgeSubmitted" class="badge-box-medium">
    				<div class="contentBadge">
    					<a class="popup-close toggleBox3"></a>
    					<div class="head" style="border: 0 none;">
    						<h1>your request has been submitted!</h1>
    						<p>your trade request has been posted on marlboro connections</p>
    					</div>
    					<form id="formSubmitted" action="index.php?page=code&act=traderequestmatch">
    					<div class="controlTrade">
    						<input type="hidden" name="page" value="code">
    						<input type="hidden" name="act" value="traderequestmatch">
							<input type="hidden" name="want" value="">
							<input type="hidden" name="badge" value="">
    						<input type="submit" value="">
    					</div>
    					</form>
    				</div>
    			</div>
    			
    		</div>
    	</div>
    </div><!-- #content -->
    <script>
    <?php echo '
    $(".toggleBox").click( function() {
          $(".requestBadge").fadeToggle("slow");
  		});
	
	/*	
    $(".request").click( function() {
        $(".requestBadge").fadeOut("slow");
        $("#badgeRequest").fadeIn("slow");
		});
	*/
	
    $(".toggleBox2").click( function() {
        $("#badgeRequest").fadeOut("slow");
		});
/*		
    $(".submitted").click( function() {
        $("#badgeRequest").fadeOut("slow");
        $("#badgeSubmitted").fadeIn("slow");
		});
*/
    $(".toggleBox3").click( function() {
        $("#badgeSubmitted").fadeOut("slow");
		});
    '; ?>

    </script>