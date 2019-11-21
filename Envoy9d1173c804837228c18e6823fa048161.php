<?php $branch = isset($branch) ? $branch : null; ?>
<?php $__container->servers(['aws' => 'ubuntu@3.16.13.217']); ?>
 <?php require_once('vendor/autoload.php'); ?>

<?php
$branch = isser($branch) ? $branch : 'master';

?>


<?php $__container->startTask('test'); ?>
   echo <?php echo $branch; ?>

<?php $__container->endTask(); ?>



<?php $__container->startTask('ls',['on' => 'aws']); ?>
cd /var/www/html
ls -la 
<?php $__container->endTask(); ?>