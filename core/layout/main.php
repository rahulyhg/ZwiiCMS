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
	<link rel="stylesheet" href="<?php echo helper::baseUrl(false); ?>site/data/theme.css?<?php echo md5_file('site/data/theme.css'); ?>">
	<link rel="stylesheet" href="<?php echo helper::baseUrl(false); ?>site/data/custom.css?<?php echo md5_file('site/data/custom.css'); ?>">
</head>
<body>
<?php $layout->showStyle(); ?>
<?php $layout->showBar(); ?>
<?php $layout->showNotification(); ?>
<?php if($this->getData(['theme', 'menu', 'position']) === 'body-first' || $this->getData(['theme', 'menu', 'position']) === 'top' ): ?>
	<!-- Menu dans le fond du site avant la bannière -->
	<nav
	<?php 
	// Détermine si le menu est fixe en haut de page lorsque l'utilisateur n'est pas connecté
    // 
	if($this->getData(['theme', 'menu', 'position']) === 'top' &&
		$this->getData(['theme', 'menu', 'fixed']) === true) {
			if ($this->getUser('password') !== $this->getInput('ZWII_USER_PASSWORD'))
			 	{echo 'id="navfixedlogout"';}
			elseif ($this->getUrl(0) !== 'theme') 
				{echo 'id="navfixedconnected"';} 
		}
	?>
	>
		<div id="toggle"><?php echo template::ico('menu'); ?></div>
		<div id="menu" class="
		<?php if($this->getData(['theme', 'menu', 'position']) === 'top'){echo 'container-large';}else{echo'container';}
		?>">

			<?php $layout->showMenu(); ?>
		</div>
	</nav>
<?php endif; ?>
<?php if($this->getData(['theme', 'header', 'position']) === 'body'): ?>
	<!-- Bannière dans le fond du site -->
	<header>
		<?php	
		if ($this->getData(['theme','header','linkHome'])){
		echo "<a href='" . helper::baseUrl(false) . "'>" ;}	?>
		<?php if(
			$this->getData(['theme', 'header', 'textHide']) === false
			// Affiche toujours le titre de la bannière pour l'édition du thème
			OR ($this->getUrl(0) === 'theme' AND $this->getUrl(1) === 'header')
		): ?>
			<div class="container">
				<span><?php echo $this->getData(['config', 'title']); ?></span>
			</div>
		<?php endif; ?>
		<?php
		if ($this->getData(['theme','header','linkHome'])){echo "</a>";}
		?>	
	</header>
<?php endif; ?>

<?php if($this->getData(['theme', 'menu', 'position']) === 'body-second'): ?>
	<!-- Menu dans le fond du site après la bannière -->
	<nav>
		<div id="toggle"><?php echo template::ico('menu'); ?></div>
		<div id="menu" class="container">
			<?php $layout->showMenu(); ?>
		</div>
	</nav>
<?php endif; ?>
<!-- Site -->
<div id="site" class="container">
	<?php if($this->getData(['theme', 'menu', 'position']) === 'site-first'): ?>
		<!-- Menu dans le site avant la bannière -->
		<nav>
			<div id="toggle"><?php echo template::ico('menu'); ?></div>
			<div id="menu" class="container">
				<?php $layout->showMenu(); ?>
			</div>
		</nav>
	<?php endif; ?>
	<?php if(
		$this->getData(['theme', 'header', 'position']) === 'site'
		// Affiche toujours la bannière pour l'édition du thème
		OR (
			$this->getData(['theme', 'header', 'position']) === 'hide'
			AND $this->getUrl(0) === 'theme'
		)
	): ?>
		<!-- Bannière dans le site -->
		<?php	
		if ($this->getData(['theme','header','linkHome'])){
		echo "<a href='" . helper::baseUrl(false) . "'>" ;}	?>
		<header <?php if($this->getData(['theme', 'header', 'position']) === 'hide'): ?>class="displayNone"<?php endif; ?>>
			<?php if(
				$this->getData(['theme', 'header', 'textHide']) === false
				// Affiche toujours le titre de la bannière pour l'édition du thème
				OR ($this->getUrl(0) === 'theme' AND $this->getUrl(1) === 'header')
			): ?>
			<div class="container">
				<span><?php echo $this->getData(['config', 'title']); ?></span>
			</div>
			<?php endif; ?>
		</header>
		<?php
		if ($this->getData(['theme','header','linkHome'])){echo "</a>";}	?>
		<?php endif; ?>
	<?php if(
		$this->getData(['theme', 'menu', 'position']) === 'site-second' ||
		$this->getData(['theme', 'menu', 'position']) === 'site'
		// Affiche toujours le menu pour l'édition du thème
		OR (
			$this->getData(['theme', 'menu', 'position']) === 'hide'
			AND $this->getUrl(0) === 'theme'
		)
	): ?>
	<!-- Menu dans le site après la bannière -->
	<nav <?php if($this->getData(['theme', 'menu', 'position']) === 'hide'): ?>class="displayNone"<?php endif; ?>>
		<div id="toggle"><?php echo template::ico('menu'); ?></div>
		<div id="menu" class="container">
			<?php $layout->showMenu(); ?>
		</div>
	</nav>
	<?php endif; ?>
	<!-- Corps de page -->
	<section>
	<?php 
		// Gabarit :
		// Récupérer la config de la page courante
		$blocks = explode('-',$this->getData(['page',$this->getUrl(0),'block']));
		// Initialiser
		$blockleft=$blockright="";
		switch (sizeof($blocks)) {
			case 1 :  // une colonne
				$content    = 'col'. $blocks[0] ; 
				break;			
			case 2 :  // 2 blocks 
				if ($blocks[0] < $blocks[1]) { // détermine la position de la colonne
					$blockleft = 'col'. $blocks[0];
					$content    = 'col'. $blocks[1] ;
				} else {
					$content    = 'col' . $blocks[0];
					$blockright  = 'col' . $blocks[1];						
				}
			break;
			case 3 :  // 3 blocks
					$blockleft  = 'col' . $blocks[0];
					$content    = 'col' . $blocks[1];
					$blockright = 'col' . $blocks[2];	
		}
		// Page pleine pour la configuration des modules et l'édition des pages
		//	($this->getData(['page', $this->getUrl(2), 'moduleId']) == '' &&
		//	$this->getUrl(1) == 'config' ||  // Configuration d'un module en page pleine
		//	$this->getUrl(1) == 'data'   ||  // données de formulaire en page pleine
		//	$this->getUrl(1) == 'comment'    // données des commentaires en page pleine		
		if (sizeof($blocks) === 1 ||
		    !empty($this->getUrl(1)) ) { // Pleine page en mode configuration
				$layout->showContent();
		} else {
		?>
		<div class="row">
			<?php if ($blockleft !== "") :?> <div class="<?php echo $blockleft; ?>" id="contentleft">
			<?php
			 echo $this->getData(['page',$this->getData(['page',$this->getUrl(0),'barLeft']),'content']);
			 ?></div> <?php endif; ?>
			<div class="<?php echo $content; ?>" id="contentsite"><?php $layout->showContent(); ?></div>
			<?php if ($blockright !== "") :?> <div class="<?php echo $blockright; ?>" id="contentright">
			<?php echo $this->getData(['page',$this->getData(['page',$this->getUrl(0),'barRight']),'content']);
			?></div> <?php endif; ?>	
		</div>
		<?php } ?>
	</section>
	<!-- footer -->
	<?php if(
		$this->getData(['theme', 'footer', 'position']) === 'site'
		// Affiche toujours le pied de page pour l'édition du thème
		OR (
			$this->getData(['theme', 'footer', 'position']) === 'hide'
			AND $this->getUrl(0) === 'theme'
		)
	): ?>
		<!-- Pied de page dans le site -->
		
		<footer <?php if($this->getData(['theme', 'footer', 'position']) === 'hide'): ?>class="displayNone"<?php endif; ?>>
			<div class="container">
				<div class="row" id="footersite">
					<div class="col4" id="footersiteLeft"> <!-- bloc gauche -->						
						<?php
							if($this->getData(['theme', 'footer', 'textPosition']) === 'left') {
								$layout->showFooterText();} 
						?>	
						<?php
							if($this->getData(['theme', 'footer', 'socialsPosition']) === 'left') {
								$layout->showSocials(); } 
						?>	
						<?php
							if($this->getData(['theme', 'footer', 'copyrightPosition']) === 'left') {
								$layout->showCopyright(); } 
						?>	
					</div>
					<div class="col4" id="footersiteCenter"> <!-- bloc central -->						
						<?php
							if($this->getData(['theme', 'footer', 'textPosition']) === 'center') {
								$layout->showFooterText(); } 
						?>	
						<?php
							if($this->getData(['theme', 'footer', 'socialsPosition']) === 'center') {
								$layout->showSocials(); } 
						?>	
						<?php
							if($this->getData(['theme', 'footer', 'copyrightPosition']) === 'center') {
								$layout->showCopyright(); } 
						?>	
					</div>				
					<div class="col4" id="footersiteRight"> <!-- bloc droite -->						
						<?php
							if($this->getData(['theme', 'footer', 'textPosition']) === 'right') {
								$layout->showFooterText(); } 
						?>	
						<?php
							if($this->getData(['theme', 'footer', 'socialsPosition']) === 'right') {
								$layout->showSocials(); } 
						?>	
						<?php
							if($this->getData(['theme', 'footer', 'copyrightPosition']) === 'right') {
								$layout->showCopyright(); } 
						?>	
					</div>			
				</div>
			</div>
		</footer>
	<?php endif; ?>
</div>
<?php if($this->getData(['theme', 'footer', 'position']) === 'body'): ?>
	<!-- Pied de page dans le fond du site -->
	<footer>
		<div class="container-large">
			<div class="row" id="footerbody">
				<div class="col4" id="footerbodyLeft"> <!-- bloc gauche -->						
					<?php
						if($this->getData(['theme', 'footer', 'textPosition']) === 'left') {
							$layout->showFooterText(); } 
					?>	
					<?php
						if($this->getData(['theme', 'footer', 'socialsPosition']) === 'left') {
							$layout->showSocials(); } 
					?>	
					<?php
						if($this->getData(['theme', 'footer', 'copyrightPosition']) === 'left') {
							$layout->showCopyright(); } 
					?>	
				</div>
				<div class="col4" id="footerbodyCenter"> <!-- bloc central -->						
					<?php
						if($this->getData(['theme', 'footer', 'textPosition']) === 'center') {
							$layout->showFooterText(); } 
					?>	
					<?php
						if($this->getData(['theme', 'footer', 'socialsPosition']) === 'center') {
							$layout->showSocials(); } 
					?>	
					<?php
						if($this->getData(['theme', 'footer', 'copyrightPosition']) === 'center') {
							$layout->showCopyright(); } 
					?>	
				</div>				
				<div class="col4" id="footerbodyRight"> <!-- bloc droite -->						
					<?php
						if($this->getData(['theme', 'footer', 'textPosition']) === 'right') {
							$layout->showFooterText(); } 
					?>	
					<?php
						if($this->getData(['theme', 'footer', 'socialsPosition']) === 'right') {
							$layout->showSocials(); } 
					?>	
					<?php
						if($this->getData(['theme', 'footer', 'copyrightPosition']) === 'right') {
							$layout->showCopyright();} 
					?>	
				</div>
			</div>
		</div>
	</footer>
<?php endif; ?>
<!-- Lien remonter en haut -->
<div id="backToTop"><?php echo template::ico('up'); ?></div>
<?php $layout->showAnalytics(); ?>
<?php $layout->showScript(); ?>
</body>
</html>