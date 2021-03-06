<?php /* Smarty version 2.6.13, created on 2011-09-29 02:19:26
         compiled from marlboro/home.html */ ?>

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
            <div class="nav-reedem">
                  <h2><a href="index.php?page=code&act=prize" class="reedem"><span>&nbsp;</span></a></h2>
            </div>
            <div class="nav-game">
                 <h2><a href="index.php?page=games" class="game"><span>&nbsp;</span></a></h2>
            </div>
        </div>
    </div><!-- #sidebar -->
    	<div id="welcome" style="z-index:-2;">
        	<div class="content relative" style="padding-left: 15px;">
                <h1>Get Your passport ready!</h1>
                <span class="title">Berlin, Istanbul and New York</span>
                <p>are well known for their art, style and modern flair.</p>
                <p style="margin-bottom:10px">The best in nightlife, private tours and other unique experiences await you.</p>
                <a href="#videoPlay" >
                	<img class="toggleBox" alt="video" src="images/content/video.png" width="170px">
                </a>
                            	
            	<div id="videoPlay" class="badge-box-medium" style="left: 0;top: 30px;">
    				<div class="contentBadge">
    					<a class="popup-close toggleBox absolute" style="right: 7px;top: -37px;"></a>
    					 <a href="video/Video.m4v" style="display: block;height: 290px;left: -12px;margin: 0 auto;position: absolute;top: 10px;width: 535px;" id="player"> </a> 
    					 
		<!-- this will install flowplayer inside previous A- tag. -->
		<script language="JavaScript">
			flowplayer("player", "flowplayer/flowplayer-3.2.7.swf");
		</script>
		

		
    				</div>
    			</div>
    			
            </div>
            <div class="welcome-menu" style="width:125px">
           		<a href="index.php?page=prizes">Prizes</a>
           		<a href="index.php?page=howtoplay">How to Play</a>
           		<a href="index.php?page=terms-and-condition">Terms and Conditions</a>
            </div>
            
        </div><!-- #welcome -->
    <div class="page-welcome"></div>
    
    <script>
    <?php echo '
    $(".toggleBox").click( function() {
        $("#videoPlay").fadeToggle("slow");
		});
    '; ?>

    </script>