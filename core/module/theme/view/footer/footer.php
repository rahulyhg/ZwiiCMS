<?php echo template::formOpen('themeFooterForm'); ?>
	<div class="row">
		<div class="col2">
			<?php echo template::button('themeFooterBack', [
				'class' => 'buttonGrey',
				'href' => helper::baseUrl() . 'theme',
				'ico' => 'left',
				'value' => 'Retour'
			]); ?>
		</div>
		<div class="col2 offset8">
			<?php echo template::submit('themeFooterSubmit'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col6">
			<div class="block">
				<h4>Couleur</h4>
				<div class="row">
					<div class="col6">
						<?php echo template::text('themeFooterBackgroundColor', [
							'class' => 'colorPicker',
							'label' => 'Fond',
							'value' => $this->getData(['theme', 'footer', 'backgroundColor'])
						]); ?>
					</div>
					<div class="col6">
						<?php echo template::text('themeFooterTextColor', [
							'class' => 'colorPicker',
							'label' => 'Texte',
							'value' => $this->getData(['theme', 'footer', 'textColor'])
						]); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col6">
			<div class="block">
				<h4>Configuration</h4>
				<div class="row">
					<div class="col6">
						<?php echo template::select('themeFooterPosition', $module::$footerPositions, [
							'label' => 'Position',
							'selected' => $this->getData(['theme', 'footer', 'position'])
						]); ?>
					</div>
					<div class="col6">
						<?php echo template::select('themeFooterHeight', $module::$footerHeights, [
							'label' => 'Hauteur',
							'selected' => $this->getData(['theme', 'footer', 'height'])
						]); ?>
					</div>
				</div>
				<div id="themeFooterPositionOptions" class="displayNone">
					<?php echo template::checkbox('themeFooterMargin', true, 'Aligner le bas de page avec le contenu', [
						'checked' => $this->getData(['theme', 'footer', 'margin'])
					]); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col12">
			<div class="block">
				<h4>Mise en forme du texte</h4>
				<div class="row">
				<div class="col3">
						<?php echo template::select('themeFooterFont', $module::$fonts, [
							'label' => 'Police',
							'selected' => $this->getData(['theme', 'footer', 'font'])
						]); ?>
					</div>
					<div class="col3">
						<?php echo template::select('themeFooterFontSize', $module::$footerFontSizes, [
							'label' => 'Taille',
							'help' => 'Proportionnelle à celle définie dans le site',							
							'selected' => $this->getData(['theme', 'footer', 'fontSize'])
						]); ?>
					</div>
					<div class="col3">
						<?php echo template::select('themeFooterFontWeight', $module::$fontWeights, [
							'label' => 'Style',
							'selected' => $this->getData(['theme', 'footer', 'fontWeight'])
						]); ?>
					</div>																
					<div class="col3">
						<?php echo template::select('themeFooterTextTransform', $module::$textTransforms, [
							'label' => 'Casse',
							'selected' => $this->getData(['theme', 'footer', 'textTransform'])
						]); ?>
					</div>			
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col12">
			<div class="block">
				<h4>Contenu personnalisé</h4>
				<?php echo template::textarea('themeFooterText', [
					'label' => 'Contenu (texte ou HTML)',
					'value' => $this->getData(['theme', 'footer', 'text'])
				]); ?>
				<?php echo template::checkbox('themeFooterLoginLink', true, 'Lien de connexion', [
					'checked' => $this->getData(['theme', 'footer', 'loginLink']),
					'help' => 'Visible seulement sur cette page et lorsque vous n\'êtes pas connecté.'
				]); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col4">
			<div class="block">
				<h4>Contenu personnalisé</h4>
					<?php echo template::select('themeFooterTextPosition', $module::$footerblocks, [
						'label' => 'Emplacement',
						'selected' => $this->getData(['theme', 'footer', 'textPosition'])
					]); ?>
					<?php echo template::select('themeFooterTextAlign', $module::$aligns, [
						'label' => 'Alignement horizontal',
						'selected' => $this->getData(['theme', 'footer', 'textAlign'])
					]); ?>

			</div>		
		</div>	
		<div class="col4">
			<div class="block">
				<h4>Réseaux sociaux</h4>
					<?php echo template::select('themeFooterSocialsPosition', $module::$footerblocks, [
						'label' => 'Emplacement',
						'selected' => $this->getData(['theme', 'footer', 'socialsPosition'])
					]); ?>
					<?php echo template::select('themeFooterSocialsAlign', $module::$aligns, [
						'label' => 'Alignement horizontal',
						'selected' => $this->getData(['theme', 'footer', 'socialsAlign'])
					]); ?>
			</div>
		</div>
		<div class="col4">
			<div class="block">
				<h4>Copyright</h4>
					<?php echo template::select('themeFooterCopyrightPosition', $module::$footerblocks, [
						'label' => 'Emplacement',
						'selected' => $this->getData(['theme', 'footer', 'copyrightPosition'])
					]); ?>	
					<?php echo template::select('themeFooterCopyrightAlign', $module::$aligns, [
						'label' => 'Alignement horizontal',
						'selected' => $this->getData(['theme', 'footer', 'copyrightAlign'])
					]); ?>								
			</div>		
		</div>				
	</div>
<?php echo template::formClose(); ?>