<?php /* Smarty version 2.6.13, created on 2011-09-28 08:43:14
         compiled from marlboro/redeem-input.html */ ?>
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
            <div class="nav-badge">
                  <h2><a href="index.php?page=code&act=trade" class="badge"><span>&nbsp;</span></a></h2>
            </div>
            <div class="nav-reedem-active">
                  <h2><a href="index.php?page=code&act=prize" class="reedem"><span>&nbsp;</span></a></h2>
            </div>
            <div class="nav-game">
                 <h2><a href="index.php?page=games" class="game"><span>&nbsp;</span></a></h2>
            </div>
        </div>
    </div><!-- #sidebar -->
    <div id="content">
    	<div id="reedem-form">
        	<div class="content">
            	<div class="reedem-form"> 
                	<h1>You have chosen the exclusive Connections T-shirt. <br /> 
					<span style="font-size:18px">Remember these badges will be removed from your badge collection. Please confirm or update.<br>
					The prize will be delivered within one month to the address below. Please confirm or update with new details.
					</span></h1>
					
                    <div class="redeemform">
                        <form id="formRedeemConfirm" class="reedem-confirm" method="POST">
                            <div class="row">
                                <label>Street</label>
                                <input type="text" name="street" value="<?php echo $this->_tpl_vars['data']['StreetName']; ?>
" />
                            </div>
                            <div class="row">
                                <label>Complex</label>
                                <input type="text" name="complex" value="<?php echo $this->_tpl_vars['data']['complex']; ?>
" />
                            </div>
                            <div class="row">
                                <label>Province</label>
                                <input type="text" name="province" value="<?php echo $this->_tpl_vars['data']['province']; ?>
" />
                            </div>
                            <div class="row">
                                <label>City</label>
                                <!--<input type="text" name="city" value="<?php echo $this->_tpl_vars['kota']; ?>
"/>-->
								<select name="city" class="city">
								<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['city']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
									<option value="<?php echo $this->_tpl_vars['city'][$this->_sections['i']['index']]['city']; ?>
" <?php if ($this->_tpl_vars['kota'] == $this->_tpl_vars['city'][$this->_sections['i']['index']]['city']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['city'][$this->_sections['i']['index']]['city']; ?>
</option>
								<?php endfor; endif; ?>
								</select>
                            </div>
                            <div class="row">
                                <label>Phone</label>
                                <input type="text" name="phone" value="<?php echo $this->_tpl_vars['data']['phone']; ?>
" />
                            </div>
                            <div class="row">
                                <label>Mobile</label>
                                <input type="text" name="mobile" value="<?php echo $this->_tpl_vars['data']['MobilePhone']; ?>
"/>
                            </div>
                            <div class="row">
                                <input type="checkbox" name="agree" />
                                <label class="checkbox">Agree to the <a href="index.php?page=terms-and-condition" target="_blank">terms and conditions</a></label>
                                <input type="hidden" name="prize" value="<?php echo $this->_tpl_vars['prize']; ?>
" />
								<input type="submit" class="btnreedem" value="&nbsp;" />
                            </div>
                        </form>
                        <div class="require-badges">
                        	
							<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['require']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
							<div class="box">
                            	<a href="javascript:void(0);"><img src="images/badge/badge<?php echo $this->_tpl_vars['require'][$this->_sections['i']['index']]; ?>
.png" /></a>
                                <?php if ($this->_tpl_vars['require'][$this->_sections['i']['index']] == $this->_tpl_vars['have'][$this->_sections['i']['index']]): ?>
								<span class="checklist">&nbsp;</span>
								<?php endif; ?>
							</div>
                        	<?php endfor; endif; ?>
							
                        </div>
                    </div>
                </div><!-- .reedem-form -->
            </div><!-- .content -->
        </div><!-- #reedem-form -->
		
		<div id="popupError" style="display:none;width:250px;height:100px;position:absolute;background:#fff;left:50%;margin-left:-125px;top:300px;border:2px solid #000;padding:10px;">
			<p>Lorem ipsum</p>
			<input id="popupClose" type="button" value="close" />
		</div>
		
		<script type="text/javascript">
		redeemAllow = <?php echo $this->_tpl_vars['allow']; ?>
;
		</script>
		
    </div><!-- #content -->