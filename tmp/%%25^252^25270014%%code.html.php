<?php /* Smarty version 2.6.13, created on 2011-09-19 13:41:15
         compiled from marlboro/code.html */ ?>
<div id="sidebar">
        <div id="side-menu">
            <div class="nav-about">
              <h2><a href="index.php?page=about-marlboro-connections" class="about"><span>&nbsp;</span></a></h2>
            </div>
            <div class="nav-whats">
              <h2><a href="index.php?page=news" class="whats"><span>&nbsp;</span></a></h2>
            </div>
            <div class="nav-code-active">
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
    	<div id="code">
        	<div class="content">
            	<div class="input-code">
                	<form id="formInputCode" class="code" action="index.php?page=code&act=submit" method="POST">
                    	<label>Input your [Connections Code] here to unlock a badge</label>
                        <div class="row">
                        	<div class="code1">
                            	<input type="text" name="code" />
                            </div>
                        </div>
                    	<div class="row">
                        	<div class="code2">
                            	<img src="captcha.php" />
                            </div>
                            <div class="submit-code">
                            	<input type="text" name="captcha" />
                                <!--<input id="btn-popup" class="btn-submit" type="button" value="&nbsp;" />-->
								<input type="submit" />
								<b><?php echo $this->_tpl_vars['err']; ?>
</b>
                            </div>
                        </div>
                        <div class="row">
                        	<a href="index.php?page=howtoplay">learn how to play</a> | <a href="index.php?page=code&act=yourbadges">see your badges</a>
                        </div>
                    </form>
                </div>
                            <div id="popup" >
                                <a class="popup-close">&nbsp;</a>
                                <div class="entry-popup">
                                    <div class="message-text">
                                        <div class="message-entry">
                                            <img src="images/message-text.png" />
                                        </div>
                                    </div>
                                    <div class="message-menu">
                                        <a href="index.php?page=profile">See My Badges</a>
                                    </div>
                                </div>
                            </div>
                            <div id="backgroundPopup"></div>
            </div><!-- .content -->
        </div><!-- #code -->
    </div><!-- #content -->