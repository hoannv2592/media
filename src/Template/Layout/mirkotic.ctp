<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Background images - fullPage.js</title>
    <meta name="author" content="Alvaro Trigo Lopez" />
    <meta name="description" content="fullPage full-screen backgrounds." />
    <meta name="keywords"  content="fullpage,jquery,demo,screen,fullscreen,backgrounds,full-screen" />
    <meta name="Resource-type" content="Document" />
    <style>

        /* Style for our header texts
        * --------------------------------------- */
        h1{
            font-size: 5em;
            font-family: arial,helvetica;
            color: #fff;
            margin:0;
            padding:0;
        }

        /* Centered texts in each section
        * --------------------------------------- */
        .section{
            text-align:center;
        }


        /* Backgrounds will cover all the section
        * --------------------------------------- */
        .section{
            background-size: cover;
        }
        .slide{
            background-size: cover;
        }

        /* Defining each section background and styles
        * --------------------------------------- */
        #section0{
            background-image: url(imgs/bg1.jpg);
        }
        #section0 h1{
            top: 50%;
            transform: translateY(-50%);
            position: relative;
        }
        #section2{
            background-image: url(imgs/bg3.jpg);
            padding: 6% 0 0 0;
        }
        #section3{
            background-image: url(imgs/bg4.jpg);
            padding: 6% 0 0 0;
        }
        #section3 h1{
            color: #000;
        }


        /*Adding background for the slides
        * --------------------------------------- */
        #slide1{
            background-image: url('/upload/files/28.jpg');
            padding: 6% 0 0 0;
        }
        #slide2{
            background-image: url('/upload/files/30.jpg');
            padding: 6% 0 0 0;
        }
        #slide3{
            background-image: url('/upload/files/2017-11-05-1751502.jpg');
            padding: 6% 0 0 0;
        }
        /* Bottom menu
        * --------------------------------------- */
        #infoMenu li a {
            color: #fff;
        }
    </style>

    <?php echo $this->Html->css(['back_end/bootstrap.min', 'back_end/font-awesome.min']); ?>
    <?php echo $this->Html->script(['back_end/jquery-1.11.0.min', 'back_end/bootstrap.min', 'back_end/commom','jquery.validate']); ?>
    <?php echo $this->Html->script([
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
    ]);
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#fullpage').fullpage({
                verticalCentered: false,
                loopBottom: false,
                afterRender: function () {
                    setInterval(function () {
                        $.fn.fullpage.moveSlideRight();
                    }, 5000);
                }
            });
        });
    </script>

</head>
<body>
<div id="fullpage">
    <div class="section" id="section1">
        <div class="slide" id="slide1"><h1>Slide Backgrounds</h1></div>
        <div class="slide" id="slide2"><h1>Totally customizable</h1></div>
        <div class="slide" id="slide3"><h1>Totally customizable</h1></div>
    </div>
</div>
</body>
</html>