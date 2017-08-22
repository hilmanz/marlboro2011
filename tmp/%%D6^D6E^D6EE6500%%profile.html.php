<?php /* Smarty version 2.6.13, created on 2011-09-13 18:21:59
         compiled from marlboro/profile.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'marlboro/profile.html', 42, false),)), $this); ?>
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
                  <h2><a href="#" class="badge"><span>&nbsp;</span></a></h2>
            </div>
            <div class="nav-reedem">
                  <h2><a href="index.php?page=redeem-badge" class="reedem"><span>&nbsp;</span></a></h2>
            </div>
            <div class="nav-game">
                 <h2><a href="#" class="game"><span>&nbsp;</span></a></h2>
            </div>
        </div>
    </div><!-- #sidebar -->
<div id="content">
    	<div id="profile">
        	<div class="content">
            	<div class="profile">  
               		<div class="profile-card">
                    	<div class="profile-entry">
                            <div class="photo">
                                <img src="images/pp.jpg" />
                            </div>
                            <div class="profile-info">
                                <span>Name</span>
                                <h2><?php echo $this->_tpl_vars['name']; ?>
</h2>
                                <span>City</span>
                                <h2><?php echo $this->_tpl_vars['kota']; ?>
</h2>
                                <span>Sex</span>
                                <h2><?php echo $this->_tpl_vars['sex']; ?>
</h2>
                                <span>Age</span>
                                <h2><?php echo $this->_tpl_vars['age']; ?>
</h2>
                                <span>Connections Date</span>
                                <h2><?php echo ((is_array($_tmp=$this->_tpl_vars['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</h2>
                            </div>
                            <div class="profile-menu">
                                <a id="btn-popup" href="#">Change Photo</a>
                                <?php if ($this->_tpl_vars['param'] == ''): ?><a href="index.php?page=profile&act=edit<?php echo $this->_tpl_vars['param']; ?>
">Edit Profile</a><?php endif; ?>
                            </div>
                            <div class="entry-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor adipiscing nunc</p>
                            </div>
                            <div id="popup">
                                <a class="popup-close">&nbsp;</a>
                                <div class="entry-popup">
                                    <div class="last-photo">
                                        <div class="photo">
                                            <img src="images/pp.jpg" />
                                        </div>
                                        <h1>Change Photo</h1>
                                	</div>
                                    <form class="upload-photo">
                                    	<input type="file" />
                                    </form>
                                </div>
                            </div>
                            <div id="backgroundPopup"></div>
                       </div>
                    </div><!-- .profile-card -->
                    <div class="gift">
                    	<img src="images/badge/kado.png" />
                        <a href="index.php?page=redeem-badge">Redeem Badge</a>
                    </div>
                    <div class="badge-row">
                    	<div class="badge-box">
                        	<div class="badge-img">
                            	<img src="images/badge/badge1.png" />
                            </div>
                            <div class="badge-count">
                            	<span>1</span>
                            </div>
                        </div>
                    	<div class="badge-box">
                        	<div class="badge-img">
                            	<img src="images/badge/badge2.png" />
                            </div>
                            <div class="badge-count">
                            	<span>5</span>
                            </div>
                        </div>
                    	<div class="badge-box">
                        	<div class="badge-img">
                            	<img src="images/badge/badge3_grey.png" />
                            </div>
                            <div class="badge-count">
                            	<span>0</span>
                            </div>
                        </div>
                    	<div class="badge-box">
                        	<div class="badge-img">
                            	<img src="images/badge/badge4.png" />
                            </div>
                            <div class="badge-count">
                            	<span>3</span>
                            </div>
                        </div>
                    	<div class="badge-box">
                        	<div class="badge-img">
                            	<img src="images/badge/badge5_grey.png" />
                            </div>
                            <div class="badge-count">
                            	<span>0</span>
                            </div>
                        </div>
                    	<div class="badge-box">
                        	<div class="badge-img">
                            	<img src="images/badge/badge6.png" />
                            </div>
                            <div class="badge-count">
                            	<span>2</span>
                            </div>
                        </div>
                    	<div class="badge-box">
                        	<div class="badge-img">
                            	<img src="images/badge/badge7_grey.png" />
                            </div>
                            <div class="badge-count">
                            	<span>0</span>
                            </div>
                        </div>
                    	<div class="badge-box">
                        	<div class="badge-img">
                            	<img src="images/badge/badge8.png" />
                            </div>
                            <div class="badge-count">
                            	<span>4</span>
                            </div>
                        </div>
                    	<div class="badge-box">
                        	<div class="badge-img">
                            	<img src="images/badge/badge9.png" />
                            </div>
                            <div class="badge-count">
                            	<span>2</span>
                            </div>
                        </div>
                    	<div class="badge-box">
                        	<div class="badge-img">
                            	<img src="images/badge/badge10.png" />
                            </div>
                            <div class="badge-count">
                            	<span>5</span>
                            </div>
                        </div>
                    	<div class="badge-box">
                        	<div class="badge-img">
                            	<img src="images/badge/badge11.png" />
                            </div>
                            <div class="badge-count">
                            	<span>3</span>
                            </div>
                        </div>
                    	<div class="badge-box">
                        	<div class="badge-img">
                            	<img src="images/badge/badge12.png" />
                            </div>
                            <div class="badge-count">
                            	<span>3</span>
                            </div>
                        </div>
                    </div><!-- .badge-row -->
                </div><!-- .profile -->
            </div><!-- .content -->
        </div><!-- #profile -->
    </div><!-- #content -->
<!--
<p><a href="index.php?page=profile&act=tradesummary<?php echo $this->_tpl_vars['param']; ?>
">Trade Summary</a></p>
<?php if ($this->_tpl_vars['param'] == ''): ?><p><a href="index.php?page=profile&act=edit<?php echo $this->_tpl_vars['param']; ?>
">Edit Profile</a></p><?php endif; ?>
<p><a href="index.php?page=profile&act=badges<?php echo $this->_tpl_vars['param']; ?>
"><?php if ($this->_tpl_vars['param'] == ''): ?>My <?php endif; ?>Badges</a></p>
-->