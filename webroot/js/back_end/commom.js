
function initialize(){
		var w = $(window).width();//画面(ウィンドウ)の幅、高さを取得
		var h = $(window).height();
		
		
		//console.log('centering : ' + nowModalSyncer + ' ::: cw : ' + ((w - cw)/2) + ' ::: ch : ' + ((h - ch)/2));
		$('.landing ').css({"min-height":$(window).height() - $('.body-content').offset().top});//センタリングを実行する
	   if($(window).width() < 768){
			$('.modal-dialog').css({"left": "", "top":"","position":'relative'});//センタリングを実行する
			$('.landing__cover ').css({"left": "", "top":"","position":"relative","margin": "0 auto"});//センタリングを実行する
	   } else {
           $('.modal-dialog').css({"left": "", "top":"","position":'relative'});//センタリングを実行する
           	var mw = $('.modal-dialog').outerWidth();
           	var mh = $('.modal-dialog').outerHeight();
			var cw = $('.landing__cover ').outerWidth();//outerWidth({margin:true});
			var ch = $('.landing__cover ').outerHeight();//outerHeight({margin:true});
           // $('.modal-dialog').css({"left": "", "top":"","position":'relative'});//センタリングを実行する
           $('.landing__cover ').css({"left": "", "top": ((h - ch) / 3) + "px" ,"position":"relative","margin": "0 auto"});//センタリングを実行する
           // $('.modal-dialog').css({"left": "", "top":"","position":'relative'});//センタリングを実行する
           // $('.modal-dialog ').css({"left": "", "top": ((h - mh) / 3) + "px" ,"position":"relative","margin": "0 auto"});//センタリングを実行する
		   //コンテンツ(#modal-content)の幅、高さを取得
           //
		   // var mw = $('.modal-dialog').outerWidth();
		   // var mh = $('.modal-dialog').outerHeight();
		   	// $('.landing__cover ').css({"left": ((w - cw) / 2) + "px", "top": ((h - ch) / 2) + "px","position":'absolute',"margin": ""});//センタリングを実行する
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
