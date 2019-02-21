<?php $layout = new layout($this); ?>
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $layout->showMetaTitle(); ?>
	<?php $layout->showMetaDescription(); ?>
	<?php $layout->showMetaType(); ?>	
	<?php $layout->showMetaImage(); ?>		
	<?php $layout->showFavicon(); ?>
	<?php $layout->showVendor(); ?>
	<link rel="stylesheet" href="<?php echo helper::baseUrl(false); ?>core/layout/common.css">
	<link rel="stylesheet" href="<?php echo helper::baseUrl(false); ?>core/layout/blank.css">
	<link rel="stylesheet" href="<?php echo helper::baseUrl(false); ?>site/data/theme.css?<?php echo md5_file('site/data/theme.css'); ?>">
	<link rel="stylesheet" href="<?php echo helper::baseUrl(false); ?>site/data/custom.css?<?php echo md5_file('site/data/custom.css'); ?>"></head>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">	
<body>
<?php $layout->showStyle(); ?>
<?php $layout->showContent(); ?>
<?php $layout->showScript(); ?>
</body>
</html>