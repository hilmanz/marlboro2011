<?php /* Smarty version 2.6.13, created on 2011-09-20 09:55:44
         compiled from marlboro/traderequestmatch.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'marlboro/traderequestmatch.html', 42, false),)), $this); ?>
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
    	<div id="news">
        	<div class="content" style="position:relative">
        		<div>
        			<h1 style="margin-bottom:0px">your trade request match these people</h1>
        			<p style="margin:0; padding:0;">click on a person to trade your badge</p>
        		</div>
            	<div class="newsfeed">  
               	  <ul id="mycarousel" class="jcarousel jcarousel-skin-tango">
                    
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
					<li>
                        <div class="row" style="margin: 45px 0 70px;padding: 0 14px 0 0;position: relative;">
                        	<img class="profileBadge" alt="" src="<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['img']; ?>
" width="80">
                            <div class="entry" style="height: 17px; margin-left: 100px;">                           	
                            	
                            	<a href="#offerBox" class="toggleBox" no="<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['register_id']; ?>
" style="background: none repeat scroll 0 0 #FFFFFF;border: 1px solid;height: 15px;width: 15px; float:left;margin: 0 10px 0 0;"></a>                               
                               	<p style="float:left; padding: 4px 0 0;"><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</p>
                            </div>
                        </div>
                    </li>
					<?php endfor; endif; ?>
					<!-- END CONTENT LIST -->
					
                  </ul>
                  
                 
                </div>
                
                
                <div id="offerBox" class="requestBadge box-1" style="z-index:751">
                  <div class="profile" style=" margin: 5px 0 0 45px;">  
                  <a class="popup-close toggleBox" no="1"></a>
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
                                <h2>P.INDCHEUNG..CECILLIA..........................<br>
									F0123456788<0IND123456788..................</h2>
                            </div>
                           
                           <img class="trader" alt="trader" src="images/content/trader.png" width="130">
                           <input class="offerTrade" type="button" value="" no="1">
                       </div>
                       </form>
                    </div><!-- .profile-card -->
                    
                    <div class="badge-row" id="profileBadge">
						<!--
                    	<div class="badge-box">
                        	<div class="badge-img">
                            	<img src="images/badge/badge1.png" width="65" />
                            </div>
                            <div class="badge-count">
                            	<span>1</span>
                            </div>
                        </div>
                    	<div class="badge-box">
                        	<div class="badge-img">
                            	<img src="images/badge/badge2.png" width="65" />
                            </div>
                            <div class="badge-count">
                            	<span>5</span>
                            </div>
                        </div>
                    	<div class="badge-box">
                        	<div class="badge-img">
                            	<img src="images/badge/badge3_grey.png" width="65" />
                            </div>
                            <div class="badge-count">
                            	<span>0</span>
                            </div>
                        </div>
                    	<div class="badge-box">
                        	<div class="badge-img">
                            	<img src="images/badge/badge4.png" width="65" />
                            </div>
                            <div class="badge-count">
                            	<span>3</span>
                            </div>
                        </div>
                    	<div class="badge-box">
                        	<div class="badge-img">
                            	<img src="images/badge/badge5_grey.png" width="65" />
                            </div>
                            <div class="badge-count">
                            	<span>0</span>
                            </div>
                        </div>
                    	<div class="badge-box">
                        	<div class="badge-img">
                            	<img src="images/badge/badge6.png" width="65" />
                            </div>
                            <div class="badge-count">
                            	<span>2</span>
                            </div>
                        </div>
                    	<div class="badge-box">
                        	<div class="badge-img">
                            	<img src="images/badge/badge7_grey.png" width="65" />
                            </div>
                            <div class="badge-count">
                            	<span>0</span>
                            </div>
                        </div>
                    	<div class="badge-box">
                        	<div class="badge-img">
                            	<img src="images/badge/badge8.png" width="65" />
                            </div>
                            <div class="badge-count">
                            	<span>4</span>
                            </div>
                        </div>
                    	<div class="badge-box">
                        	<div class="badge-img">
                            	<img src="images/badge/badge9.png" width="65" />
                            </div>
                            <div class="badge-count">
                            	<span>2</span>
                            </div>
                        </div>
                    	<div class="badge-box">
                        	<div class="badge-img">
                            	<img src="images/badge/badge10.png" width="65" />
                            </div>
                            <div class="badge-count">
                            	<span>5</span>
                            </div>
                        </div>
                    	<div class="badge-box">
                        	<div class="badge-img">
                            	<img src="images/badge/badge11.png" width="65" />
                            </div>
                            <div class="badge-count">
                            	<span>3</span>
                            </div>
                        </div>
                    	<div class="badge-box">
                        	<div class="badge-img">
                            	<img src="images/badge/badge12.png" width="65" />
                            </div>
                            <div class="badge-count">
                            	<span>3</span>
                            </div>
                        </div>
						-->
                    </div><!-- .badge-row -->
				</div><!-- .profile -->                  
               </div>
               
			   <div id="badgeRequestConfirm" class="badge-box-medium" style="z-index:751;">
    				<div class="contentBadge">
    					<a class="popup-close toggleBox2"></a>
    					<div class="head" style="border: 0 none;">
    						<h1>confirm trade</h1>
    					</div>
    					<form id="formRequestTradeConfirm2" action="#">
    					<img id="confirmMineImg" class="kiri" alt="mine" src="images/badge/badge<?php echo $this->_tpl_vars['badge']; ?>
-big.png">
    					<img id="confirmYourImg" class="kanan" alt="yours" src="images/badge/badge<?php echo $this->_tpl_vars['want']; ?>
-big.png">
    					<div class="controlTrade">
    						<img alt="Trade" src="images/content/arrow.png">
    						<input class="offerSuccess" type="submit" value="">
    					</div>
    					</form>
    				</div>
    			</div>
    			
    			
    			<div id="badgeRequestSuccess" class="badge-box-medium" style="z-index:751;">
    				<div class="contentBadge">
    					<a class="popup-close toggleBox3"></a>
    					<div class="head" style="border: 0 none;margin: 19px 0 0;">
    						<h1>You Have Obtained <span style="font-size:16px" id="msgSuccess">The Berlin Bahn Badge!</span></h1>
    						<p>This badge has been added to your collection</p>
    					</div>
    					
    					<img alt="badge" src="images/badge/badge12-super.png" style="position: absolute;right: 52px;top: -5px;">
    					
    				</div>
    			</div>
            </div><!-- .content -->
             
            <script>
            <?php echo '
            	$("a.toggleBox").click( function() {
					var no = $(this).attr(\'no\');
					
					var rand = Math.floor((10-4)*Math.random()) + 5;
					$.ajax({
						type: "POST",
						url: \'index.php?page=code&act=getmopprofile&rand=\'+rand,
						data: {\'regid\':no},
						dataType: "json",
						success: function (data) {
							//alert(data);
							if( data.succes > 0 ){
								var profile = data.data;
								$(\'#profileName\').text(profile.name);
								$(\'#profileImg\').attr(\'src\',profile.img);
								$(\'#profileAge\').text(profile.age);
								$(\'#profileCity\').text(profile.city);
								$(\'#profileDate\').text(profile.date);
								sellerId = profile.register_id;
								
								var num = data.data.badge.length;
								var htm=\'\';
								for(var i=0;i<num;i++){
									htm += \'<div class="badge-box">\';
									htm += \'<div class="badge-img">\';
									htm += \'<img src="images/badge/badge\'+(i+1)+\'.png" width="65" />\';
									htm += \'</div>\';
									htm += \'<div class="badge-count">\';
									htm += \'<span>\'+data.data.badge[i]+\'</span>\';
									htm += \'</div>\';
									htm += \'</div>\';
								}
								$(\'#profileBadge\').html(htm);
								
								$("#offerBox").fadeToggle("slow");
								
							}else{
								alert("Failed, please try again!");
							}
						},
						error: function (res, status) {
							if (status === "error") {
								var errorMessage = $.parseJSON(res.responseText);
								alert(errorMessage.Message);
							}
						}
					});
				
				});
				
            	$(".offerTrade").click( function() {
            		var no = $(this).attr(\'no\');
                    $(".box-"+no).fadeOut("slow");
                    $("#badgeRequestConfirm").fadeIn("slow");
            		});
                $(".toggleBox2").click( function() {
                    $("#badgeRequestConfirm").fadeOut("slow");
            		});
				/*
                $(".offerSuccess").click( function() {
            		
                    $("#badgeRequestConfirm").fadeOut("slow");
                    $("#badgeRequestSuccess").fadeIn("slow");
            		});
				*/
                $(".toggleBox3").click( function() {
                    $("#badgeRequestSuccess").fadeOut("slow");
            		});
            '; ?>

			
			confirmMine = <?php echo $this->_tpl_vars['badge']; ?>
;
			confirmYour = <?php echo $this->_tpl_vars['want']; ?>
;
            </script>
            
  		});
        </div><!-- #news -->
    </div><!-- #content -->
    