<?php
/**
 * @var \App\View\AppView $apt_key_check
 * @var \App\View\AppView $this
 */
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="icon" type="image/ico" href="assets/images/favicon.ico" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Media : Mirkotic login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="expires" content="-1" />
    <?php echo $this->Html->script([
        'jquery.min',
        'jquery-ui.min',
        'scrolloverflow.min',
        'jquery.fullpage',
        'md5',
        'vendor/modernizr-2.8.3-respond-1.4.2.min'
    ]);
    echo $this->Html->css([
        'bootstrap.min',
        'animate',
        'font-awesome.min',
        'animsition.min',
        'main',
    ]);
    ?>

    <style type="text/css">
        body {color: #737373; font-size: 10px; font-family: verdana;}
        textarea,input,select {
            background-color: #FDFBFB;
            border: 1px solid #BBBBBB;
            padding: 2px;
            margin: 1px;
            font-size: 14px;
            color: #808080;
        }

        a, a:link, a:visited, a:active { color: #AAAAAA; text-decoration: none; font-size: 10px; }
        a:hover { border-bottom: 1px dotted #c1c1c1; color: #AAAAAA; }
        img {border: none;}
        td { font-size: 14px; color: #7A7A7A; }
    </style>

</head>
    <body id="minovate" class="appWrapper">
    <?php echo $this->fetch('content'); ?>
    </body>
<?php echo $this->Html->script([
    'vendor/bootstrap.min',
    'vendor/jRespond.min',
    'vendor/jquery.sparkline.min',
    'vendor/jquery.slimscroll.min',
    'vendor/jquery.animsition.min',
    'vendor/screenfull.min',
    'vendor/main',

]) ?>
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>
<script>
//    $(window).load(function(){});
</script>
</html>
