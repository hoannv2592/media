<?php
/**
 * @var \App\View\AppView $apt_key_check
 * @var \App\View\AppView $this
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi" xml:lang="vi">
<head id="Head1" prefix="og: http://ogp.me/ns# fb:http://ogp.me/ns/fb# article:http://ogp.me/ns/article#">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Cache-control" content="public">
    <title></title>
    <meta name="description" content=""/>
    <meta name="keywords" content="Điện "/>
    <meta name="COPYRIGHT" content="Design By Quyenhhit"/>
    <meta name="DEVELOPER" content="Design By Quyenhhit"/>
    <meta name="dc.language" content="VN"/>
    <meta name="dc.source" content="http://wifimedia.vn/"/>
    <meta name="dc.relation" content="http://wifimedia.vn/"/>
    <meta name="dc.title" content=""/>
    <meta name="dc.keywords" content=""/>
    <meta name="dc.subject" content=""/>
    <meta name="dc.description" content=""/>
    <link rel="author" href="wifimedia.vn"/>

    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width"/>
    <link rel="canonical" href="http://wifimedia.vn/"/>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <link type='image/x-icon' href='http://wifimedia.vn/favicon.ico' rel='icon'/>
    <meta http-equiv='content-language' content='vi'/>

    <meta name='CODE_LANGUAGE' content='PHP'/>
    <meta http-equiv='REFRESH' content='3600'/>
    <?php echo $this->Html->css(['back_end/bootstrap.min', 'back_end/font-awesome.min']); ?>
    <?php echo $this->Html->script(['back_end/jquery-1.11.0.min', 'back_end/bootstrap.min', 'back_end/commom','jquery.validate']); ?>
</head>
<body>
<div class="body-content">
    <?php echo $this->fetch('content'); ?>
</div>
</body>
</html>
