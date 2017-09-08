/*_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/
 
 jQuery Functions
 
 _/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/ */
(function ($)
{
    //---------------------------------------------------------------------
    $(function ()
    {
        $.ASconf.commonSelfLink();
    });
    //---------------------------------------------------------------------
    $.ASconf =
            {
                randomLogo: function () {
                    var _max = 7, // 最大枚数
                            _r = Math.floor(Math.random() * (_max)) + 1;
                    var _logo = '/partner/img/common/logo_header_' + _r + '.png';
                    $('header .inner h1 img').attr('src', _logo);
                    $('footer a.logo img').attr('src', _logo);
                },
                commonSelfLink: function () {
                    var c = $.extend({
                        selfLinkClass: 'current',
                        selfLinkClassActive: 'active'
                    });
                    $.ASconf.selfLinkClass = '.' + c.selfLinkClass;
                    $.ASconf.theUrl = location.href.replace(location.hash, '');
                    var theUrl = $.ASconf.theUrl.replace(/(\/|\#)$/, '/');
                    $('a[href]').each(function () {
                        var i = document.createElement('span');
                        i.innerHTML = '<a href="' + $(this).attr('href') + '" /> ';
                        var absolutePath = i.firstChild.href.replace(/(\/|\#)$/, '/');
                        if (absolutePath === theUrl) {
                            $(this).addClass(c.selfLinkClass).removeAttr('href');
                            $(this).parent().addClass(c.selfLinkClassActive);
                            // $(this).fadeTo(0, 0.4);
                        }
                    });
                },
                //---------------------------------------------------------------------
                commonGnav: function () {
                    $(".gnavi > li").hover(function () {
                        if (!$(this).hasClass('current'))
                            $(this).addClass('selected');
                        if ($(this).children('ul').length)
                            $(this).children('ul').stop(true, false).slideDown("fast");
                    }, function () {
                        if (!$(this).hasClass('current'))
                            $(this).removeClass('selected');
                        if ($(this).children('ul').length)
                            $(this).children('ul').stop(true, false).slideUp("fast");
                    });
                    if ($('body').hasClass('g1'))
                        $('.gnavi .g1').addClass('current');
                    if ($('body').hasClass('g2'))
                        $('.gnavi .g2').addClass('current');
                    if ($('body').hasClass('g3'))
                        $('.gnavi .g3').addClass('current');
                    if ($('body').hasClass('g4'))
                        $('.gnavi .g4').addClass('current');
                    if ($('body').hasClass('g5'))
                        $('.gnavi .g5').addClass('current');
                    if ($('body').hasClass('g6'))
                        $('.gnavi .g6').addClass('current');
                    if ($('body').hasClass('g7'))
                        $('.gnavi .g7').addClass('current');
                }
                ,
                //---------------------------------------------------------------------
                allAccordion: function ()
                {
                    $("#searchControl dt , .companyPlus dt").on("click", function () {
                        $(this).toggleClass("open").next().slideToggle();
                    });
                }
                ,
                //---------------------------------------------------------------------
                detailAccordion: function ()
                {
                    $("#detailAccordion dd:first").css("display", "block");
                    $("#detailAccordion dt").on("click", function () {
                        $(this).toggleClass("open").next().slideToggle();
                    });
                }
                ,
                //---------------------------------------------------------------------
                profileAccordion: function ()
                {
                    $("td.jobGroup_inner p:first-child").on("click", function () {
                        $(this).toggleClass("open").next().slideToggle();
                    });
                }
                ,
                //---------------------------------------------------------------------
                anchorPlus: function ()
                {
                    $('body').append('<div class="scrollAnchor"><img class="scrollTop" src="/img/anchor_top.gif"><img class="scrollBottom" src="/img/anchor_bottom.gif"></div>');
                    //
                    $('.scrollTop').click(function () {
                        $('body, html').animate({scrollTop: 0}, 500);
                        return false;
                    });
                    $('.scrollBottom').click(function () {
                        $('body, html').animate({scrollTop: $('footer').offset().top}, 500);
                        return false;
                    });

                    function visibleCheck() {
                        if ($(window).height() > $('body').height()) {
                            $('.scrollAnchor').hide();
                        } else {
                            $('.scrollAnchor').show();
                        }
                    }
                    visibleCheck();
                    $(window).resize(visibleCheck);
                }
                ,
                //---------------------------------------------------------------------
                searchPlus: function ()
                {
                    var litotal = 0;
                    if ($('.partner').length) {
                        $('body').append('<div class="searchPanelJust"><p class="companyName"><span class="f1">' + name_client + '</span><span class="f2">の ' + project_name + ' に合うパートナーを検索します。</span></p><ul><li class="hit"><p class="ttl">検索ヒット数</p><p> ' + ttl_count + '</p><span>件</span></li><li class="all"><span>/ </span><p>' + all_count + '</p><span>件</span></li></ul></div>');
                        $('.searchPanelJust ul li').each(function () {
                            litotal += $(this).width();
                        });
                        $('.searchPanelJust ul').css('width', litotal + 1);
                    } else if ($('.project').length) {
                        $('body').append('<div class="searchPanelJust"><p class="companyName"><span class="f1">パートナー<span>' + name_partner + '</span><span class="san">さん</span></span><span class="f2">に合う案件を検索します。</span></p><ul><li class="hit"><p class="ttl">検索ヒット数</p><p>' + ttl_count + '</p><span>件</span></li><li class="all"><span>/ </span><p>' + all_count + '</p><span>件</span></li></ul></div>');
                        $('.searchPanelJust ul li').each(function () {
                            litotal += $(this).width();
                        });
                        $('.searchPanelJust ul').css('width', litotal + 1);
                    } else {
                        $('body').append('<div class="searchPanel"><p class="ttl">検索ヒット数</p><ul class="clearfix" style="text-align: center"><li class="hit" style="margin-right: 20px;"><p>' + ttl_count + '</p><span>件</span></li><li class="all" style="margin-right: 20px;"><span>/ </span><p>' + all_count + '</p><span>件</span></li></ul></div>');
                    }
                    $('.searchPanel, .searchPanelJust').click(function () {
                        $('body, html').animate({scrollTop: $('.result').offset().top - 68}, 500);
                        return false;
                    });
                }
                ,
                //---------------------------------------------------------------------
                commonBtnRollover: function ()
                {
                    $('main a, .gnavi > li > ul > li a, .logOut a, .scrollAnchor img, .modal-content a').not('.current, .noFade').each(function ()
                    {
                        $(this).hover(function ()
                        {
                            $(this).stop(true, false).fadeTo('fast', 0.5);
                        }
                        , function ()
                        {
                            $(this).stop(true, false).fadeTo('fast', 1);
                        });
                    });
                }
                ,
                //---------------------------------------------------------------------
                smoothScroll: function ()
                {
                    new function () {

                        var attr = "class";
                        var attrPatt = /noSmooth/;
                        var d = document;//document short cut

                        /*
                         *add Event
                         -------------------------------------------------*/
                        function addEvent(elm, listener, fn) {
                            try { // IE
                                elm.addEventListener(listener, fn, false);
                            } catch (e) {
                                cu
                                elm.attachEvent(
                                        "on" + listener
                                        , function () {
                                            fn.apply(elm, arguments)
                                        }
                                );
                            }
                        }

                        /*
                         *Start SmoothScroll
                         -------------------------------------------------*/
                        function SmoothScroll(a, hash) {
                            if ($('#' + hash).length)
                            {
                                var e = $('#' + hash);
                            } else {
                                return;
                            }

                            //Move point
                            var _w = window.innerWidth;
                            if (_w > 640) {
                                var end = e.offset().top;/* adjust */
                            } else {
                                var end = e.offset().top;/* adjust */
                            }
                            var docHeight = d.documentElement.scrollHeight;
                            var winHeight = window.innerHeight || d.documentElement.clientHeight
                            if (docHeight - winHeight < end) {
                                var end = docHeight - winHeight;
                            }

                            //Current Point
                            var start = window.pageYOffset || d.documentElement.scrollTop || d.body.scrollTop || 0;

                            var flag = (end < start) ? "up" : "down";

                            function scrollMe(start, end, flag)
                            {
                                setTimeout(function ()
                                {
                                    if (flag == "up" && start >= end)
                                    {
                                        start = start - (start - end) / 20 - 1;
                                        window.scrollTo(0, start)
                                        scrollMe(start, end, flag);
                                    } else if (flag == "down" && start <= end)
                                    {
                                        start = start + (end - start) / 20 + 1;
                                        window.scrollTo(0, start)
                                        scrollMe(start, end, flag);
                                    } else {
                                        scrollTo(0, end);
                                    }
                                    return;
                                }, 10);
                            }
                            scrollMe(start, end, flag);
                        }

                        /*
                         *Add SmoothScroll
                         -------------------------------------------------*/
                        addEvent(window, "load", function ()
                        {
                            var anchors = d.getElementsByTagName("a");

                            $('a').each(function (n)
                            {
                                if ($(this).attr('href') != undefined)
                                {
                                    if (!attrPatt.test(anchors[n].getAttribute(attr)) && anchors[n].href.replace(/\#[a-zA-Z0-9_]+/, "") == location.href.replace(/\#[a-zA-Z0-9_]+/, ""))
                                    {
                                        var hrefStr = $(this).attr('href');
                                        $(this).attr('rel', hrefStr);
                                        $(this).attr('href', 'javascript:void(0)');
                                        $(this).click(function ()
                                        {
                                            var hash = $(this).attr('rel').replace(/.*\#/, "");
                                            SmoothScroll($(this), hash);
                                        });
                                    }
                                }
                            });
                        });
                    };
                }
                ,
                //---------------------------------------------------------------------
                commonTabChange: function ()
                {
                    $('.tab li').click(function () {
                        var num = $('.tab li').index(this);
                        $('.inner').addClass('tabContentNone');
                        $('.tabInner .inner').eq(num).removeClass('tabContentNone');
                        $('.tab li').removeClass('select');
                        $(this).addClass('select');
                    });
                    if ($('.tab2').length) {
                        $('.tab2 li').click(function () {
                            var num = $('.tab2 li').index(this);
                            $('.inner2').addClass('tabContentNone');
                            $('.tabInner .inner2').eq(num).removeClass('tabContentNone');
                            $('.tab2 li').removeClass('select');
                            $(this).addClass('select');
                        });
                    }
                }
                ,
                //---------------------------------------------------------------------
                nameWidth: function ()
                {
                    function widthChange() {
                        if ($('header .setting p').length) {
                            var _name = $('header .setting p');
                            if ($('header .gnavi .g6').length) {
                                var _w = $('header .gnavi').width() - $('header .gnavi .g1').width() - $('header .gnavi .g2').width() - $('header .gnavi .g3').width() - $('header .gnavi .g4').width() - $('header .gnavi .g5').width() - $('header .gnavi .g6').width() - 140;
                            } else {
                                var _w = $('header .gnavi').width() - $('header .gnavi .g1').width() - $('header .gnavi .g2').width() - $('header .gnavi .g3').width() - $('header .gnavi .g4').width() - $('header .gnavi .g5').width() - 140;
                            }
                            _name.css('max-width', _w + 'px');
                        }
                    }
                    $(window).resize(widthChange);
                    widthChange();
                }
                ,
                //---------------------------------------------------------------------
                inputImg: function ()
                {
                    var setFileInput = $('.imgInput');

                    setFileInput.each(function () {
                        var selfFile = $(this),
                                selfInput = $(this).find('input[type=file]');

                        selfInput.change(function () {
                            var file = $(this).prop('files')[0],
                                    fileRdr = new FileReader(),
                                    selfImg = selfFile.find('.imgView');

                            if (!this.files.length) {
                                if (0 < selfImg.size()) {
                                    selfImg.remove();
                                    return;
                                }
                            } else {
                                if (file.type.match('image.*')) {
                                    if (!(0 < selfImg.size())) {
                                        selfFile.prepend('<img alt="" class="imgView">');
                                    }
                                    var prevElm = selfFile.find('.imgView');
                                    fileRdr.onload = function () {
                                        prevElm.attr('src', fileRdr.result);
                                    }
                                    fileRdr.readAsDataURL(file);
                                } else {
                                    if (0 < selfImg.size()) {
                                        selfImg.remove();
                                        return;
                                    }
                                }
                            }
                        });
                    });
                }
                ,
                //---------------------------------------------------------------------
                modalWindow: function ()
                {
                    var nowModalSyncer = null;
                    var modalClassSyncer = "modal-open";
                    var modals = document.getElementsByClassName(modalClassSyncer);
                    //for (var i = 0, l = modals.length; l > i; i++) {
                    $(document).on('click', ".modal-open", function () {
                        //modals[i].onclick = function () {
                        this.blur();//ボタンからフォーカスを外す
                        var target = this.getAttribute("data-target");//ターゲットとなるコンテンツを確認
                        if (typeof (target) == "undefined" || !target || target == null) {
                            return false;//ターゲットが存在しなければ終了
                        }
                        nowModalSyncer = document.getElementById(target);//コンテンツとなる要素を取得
                        if (nowModalSyncer == null) {
                            return false;//ターゲットが存在しなければ終了
                        }
                        //if($("#modal-overlay")[0]) return false;//新しくモーダルウィンドウを起動しない
                        if ($("#modal-overlay")[0]) {
                            $(".modal-content").hide();
                            //$(".modal-content").fadeOut("fast");//現在のモーダルウィンドウを削除して新しく起動する
                            $("#modal-overlay").remove();//現在のモーダルウィンドウを削除して新しく起動する
                        }
                        $("body").append('<div id="modal-overlay"></div>');
                        $("#modal-overlay").fadeIn("fast");
                        centeringModalSyncer();//コンテンツをセンタリングする
                        $(nowModalSyncer).fadeIn(100);
                        $("#modal-overlay, .modal-close").unbind().click(function () {
                            $("#" + target + ", #modal-overlay").fadeOut("fast", function () {
                                $('#modal-overlay').remove();
                            });
                            nowModalSyncer = null;//現在のコンテンツ情報を削除
                        });
                        return false;//hrefの挙動を抑制
                    });
                    //}

                    $(window).resize(centeringModalSyncer);
                    function centeringModalSyncer() {
                        if (nowModalSyncer == null)
                            return false;//モーダルウィンドウが開いてなければ終了
                        var w = $(window).width();//画面(ウィンドウ)の幅、高さを取得
                        var h = $(window).height();
                        //コンテンツ(#modal-content)の幅、高さを取得
                        var cw = $(nowModalSyncer).outerWidth();//outerWidth({margin:true});
                        var ch = $(nowModalSyncer).outerHeight();//outerHeight({margin:true});
                        //console.log('centering : ' + nowModalSyncer + ' ::: cw : ' + ((w - cw)/2) + ' ::: ch : ' + ((h - ch)/2));
                        $(nowModalSyncer).css({"left": ((w - cw) / 2) + "px", "top": ((h - ch) / 2) + "px"});//センタリングを実行する
                    }
                }
                ,
                photoBackground: function ()
                {
                    if ($('.photoCircle').length) {
                        $('.photoCircle').each(function () {
                            var _pi = $(this).data('img');
                            $(this).css('background-image', 'url(' + _pi + ')');
                        });
                    }
                }
                ,
                saveAlert: function ()
                {
                    $('.save').each(function () {
                        $(this).click(function () {
                            if (!$('.saveWin').length) {
                                var _win = $('body').append('<div class="saveWin">保存しました</div>');
                                $('.saveWin').hide();
                                $('.saveWin').fadeTo(800, 1).fadeTo(4000, 0, function () {
                                    $(this).remove();
                                });
                            }
                        });
                        return false;
                    });
                }
                ,
                //---------------------------------------------------------------------
                tableScrolll: function ()
                {
                    var target = $('.tableWp .table_headding');
                    var fixPos = $('header .gnavi').height();
                    var defLeft = parseInt(target.css('left'));/* NaN : MacSafari*/
                    function thFix() {
                        target.each(function (n) {
                            topPos = $(this).offset().top - $(this).prop('offsetHeight') - $(window).scrollTop();
                            bottomPos = $(this).offset().top - $(this).prop('offsetHeight') - $(window).scrollTop() + $(this).next().height() - 50;
                            if ((topPos <= fixPos) && (bottomPos >= fixPos)) {
                                $(this).addClass('fix');
                                $(this).next().css('margin-top', $(this).prop('offsetHeight'));
                                $('.searchPanel').stop().fadeTo(300, 0);
                                $('.searchPanelJust').stop().fadeTo(300, 0);
                            } else {
                                $(this).removeClass('fix');
                                $(this).next().css('margin-top', '');
                                $('.searchPanel').stop().fadeTo(300, 1);
                                $('.searchPanelJust').stop().fadeTo(300, 1);
                            }

                            /*
                             $(this).find('tr th').each(function(m){
                             $(this).width(target.eq(n).next().find('tr:first-child td').eq(m).width());
                             });
                             */
                            $(this).css({
                                left: -$(window).scrollLeft() + 10
                            });
                        });
                    }
                    $(window).on('orientationchange resize scroll', thFix);
                }
            }
//---------------------------------------------------------------------
})(jQuery);
