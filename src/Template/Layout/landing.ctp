<?php
/**
 * @var \App\View\AppView $apt_key_check
 * @var \App\View\AppView $this
 */
$cakeDescription = 'Media ';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi" xml:lang="vi">
<head id="Head1" prefix="og: http://ogp.me/ns# fb:http://ogp.me/ns/fb# article:http://ogp.me/ns/article#">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Cache-control" content="public">
    <title>Media : view cáo thiết bị</title>
    <link rel="author" href="hoannv"/>
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width"/>
    <link rel="canonical" href="http://wifimedia.vn/"/>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <?php echo $this->Html->css(['back_end/bootstrap.min', 'back_end/font-awesome.min']); ?>
    <?php echo $this->Html->script([
        'back_end/jquery-1.11.0.min',
        'back_end/bootstrap.min',
        'back_end/commom',
        'jquery.validate'
    ]);
    echo $this->Html->script([
        'jquery.min',
        'jquery-ui.min',
        'scrolloverflow.min',
        'jquery.fullpage',
        'md5',
        'examples'
    ]);
    echo $this->Html->css([
        'bootstrap.min',
        'animate',
        'font-awesome.min',
        'animsition.min',
        'main',
        'jquery.fullPage',
        'examples',
        'back_end/my_style'
    ]);
    ?>
</head>
<body>
<div class="body-content">
    <?php echo $this->fetch('content'); ?>
</div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('#fullpage').fullpage({
            verticalCentered: false,
            loopBottom: false,
            afterRender: function () {
                setInterval(function () {
                    $.fn.fullpage.moveSlideRight();
                }, 50000);
            }
        });
    });
</script>

</html>
