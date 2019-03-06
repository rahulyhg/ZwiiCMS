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
	<link rel="stylesheet" href="<?php echo (helper::baseUrl(false)).self::DATA_DIR; ?>theme.css?<?php echo md5_file(self::DATA_DIR.'theme.css'); ?>">
	<link rel="stylesheet" href="<?php echo (helper::baseUrl(false)).self::DATA_DIR; ?>custom.css?<?php echo md5_file(self::DATA_DIR.'custom.css'); ?>"></head>
<body>
<?php $layout->showStyle(); ?>
<?php $layout->showContent(); ?>
<?php $layout->showScript(); ?>
</body>
</html>