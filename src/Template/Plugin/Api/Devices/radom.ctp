<?php
/**
 *
 * @var $strRandom
 */
$this->layout = 'landing';
?>

<div class="container">
    <div class="text-center number"><?php echo $strRandom;?></div>
</div>
<style>
    .number {
        color: red;
        font-size: 20px;
        left: 50%;
        top: 10%;
        position: absolute;
    }
</style>