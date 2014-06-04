<?php if(!defined('IN_MP')){die('Access denied!');} ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head><title><?php echo t('TIPS');?></title>
<meta charset="utf-8" />
<link rel="stylesheet" href="<?php echo './themes/'.ZFramework::app()->theme.'/scripts/';?>blueprint/screen.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="<?php echo './themes/'.ZFramework::app()->theme.'/scripts/';?>blueprint/print.css" type="text/css" media="print" />
<!--[if lt IE 8]><link rel="stylesheet" href="<?php echo './themes/'.ZFramework::app()->theme.'/scripts/';?>blueprint/ie.css" type="text/css" media="screen, projection" /><![endif]-->
<?php
if($redirect==true)
{
echo "<meta http-equiv='Refresh' content='$time_delay;URL=$redirect_url' />";
}
?>
<style type='text/css'>
    .container{
        border:1px solid #ccc;
        text-align: center;
}
</style>
</head>
<body>
    <div class="container">
        <h2><?php echo t('MESSAGE');?></h2>

<?php
echo '<pre>';
print_r($msg);
echo '</pre>';
?>
            <br /><?php echo (ZFramework::app()->copyright_info)?htmlspecialchars_decode(ZFramework::app()->copyright_info):"Powered by YuanPad";?>

    </div>
</body></html>
