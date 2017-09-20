
function initialize(){
		var w = $(window).width();//画面(ウィンドウ)の幅、高さを取得
		var h = $(window).height();
		
		
		//console.log('centering : ' + nowModalSyncer + ' ::: cw : ' + ((w - cw)/2) + ' ::: ch : ' + ((h - ch)/2));
		$('.landing ').css({"min-height":$(window).height() - $('.body-content').offset().top});//センタリングを実行する
	

	   if($(window).width() < 768){
			$('.modal-dialog').css({"left": "", "top":"","position":'relative'});//センタリングを実行する
			$('.landing__cover ').css({"left": "", "top":"","position":"relative","margin": "0 auto"});//センタリングを実行する
	   } else {
		   //コンテンツ(#modal-content)の幅、高さを取得
			cw = $('.landing__cover ').outerWidth();//outerWidth({margin:true});
			ch = $('.landing__cover ').outerHeight();//outerHeight({margin:true});
		   	$('.landing__cover ').css({"left": ((w - cw) / 2) + "px", "top": ((h - ch) / 2) + "px","position":'absolute',"margin": ""});//センタリングを実行する
			mw = $('.modal-dialog').outerWidth();
			mh = $('.modal-dialog').outerHeight();
			$('.modal-dialog').css({"left": ((w - mw) / 2) + "px", "top": ((h - mh) / 3) + "px","position":'absolute'});//センタリングを実行する
	   }
}

// initilize after window resize
var id;
$(window).resize( function() {
  clearTimeout(id);
  id = setTimeout(initialize, 500);
});

$(function() {
   // initilize onload
	initialize();
		
});