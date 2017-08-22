<?php
class news extends App{
	var $Request;
	var $View;
	var $user;
	function __construct($req){
		$this->Request = $req;
		$this->View = new BasicView();
		$this->setVar();
		$this->user = $this->getUserInfo();
	}
	function home(){
		$que = "SELECT * FROM social_news WHERE news_status='1';";
		$this->open(0);
		$rs = $this->fetch($que,1);
		$this->close();
		
		$num = count($rs);
		for($i=0;$i<$num;$i++){
			$date = $this->ago(strtotime($rs[$i]['news_published_date']));
			$rs[$i]['time'] = $date;
		}
		
		$this->View->assign('list',$rs);
		return $this->View->toString(APPLICATION.'/news.html');
	}
	function trade(){
		$que="SELECT * FROM social_tradenews ORDER BY tradenews_date DESC";
		$this->open(0);
		$rs=$this->fetch($que,1);
		$this->close();
		
		$num = count($rs);
		for($i=0;$i<$num;$i++){
			$date = $this->ago(strtotime($rs[$i]['tradenews_date']));
			$rs[$i]['time'] = $date;
		}
		
		$this->View->assign('list',$rs);
		return $this->View->toString(APPLICATION.'/news-trade.html');
	}
	
	function ago($time)
	{
	   $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
	   $lengths = array("60","60","24","7","4.35","12","10");

	   $now = time();

		   $difference     = $now - $time;
		   $tense         = "ago";

	   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
		   $difference /= $lengths[$j];
	   }

	   $difference = round($difference);

	   if($difference != 1) {
		   $periods[$j].= "s";
	   }
		
		if($j > 2){
			return date("d/m", $time);
		}else{
			return "$difference $periods[$j] ago ";
		}
	}
}
