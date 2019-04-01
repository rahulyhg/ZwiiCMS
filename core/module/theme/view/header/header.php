<?php echo template::formOpen('themeHeaderForm'); ?>
	<div class="row">
		<div class="col2">
			<?php echo template::button('themeHeaderBack', [
				'class' => 'buttonGrey',
				'href' => helper::baseUrl() . 'theme',
				'ico' => 'caret-left',
				'value' => 'Retour'
			]); ?>
		</div>
		<div class="col2 offset8">
			<?php echo template::submit('themeHeaderSubmit'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col6">
			<div class="block">
				<h4>Couleurs</h4>
				<div class="row">
					<div class="col6">
						<?php echo template::text('themeHeaderBackgroundColor', [
							'class' => 'colorPicker',
							'help' => 'Le curseur horizontal règle le niveau de transparence.',					
							'label' => 'Fond',
							'value' => $this->getData(['theme', 'header', 'backgroundColor'])
						]); ?>
					</div>
					<div class="col6">
						<?php echo template::text('themeHeaderTextColor', [
							'class' => 'colorPicker',
							'help' => 'Le curseur horizontal règle le niveau de transparence.',							
							'label' => 'Texte',
							'value' => $this->getData(['theme', 'header', 'textColor'])
						]); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col6">
			<div class="block">
				<h4>Image</h4>
				<?php
				$imageFile = file_exists(self::FILE_DIR.'source/'.$this->getData(['theme', 'header', 'image'])) ? $this->getData(['theme', 'header', 'image']) : "";
				echo template::file('themeHeaderImage', [
					'label' => 'Fond',
					'type' => 1,
					'value' => $imageFile
				]); ?>
				<div id="themeHeaderImageOptions" class="displayNone">
					<div class="row">
						<div class="col6">
							<?php echo template::select('themeHeaderImageRepeat', $module::$repeats, [
								'label' => 'Répétition',
								'selected' => $this->getData(['theme', 'header', 'imageRepeat'])
							]); ?>
						</div>
						<div class="col6">
							<?php echo template::select('themeHeaderImagePosition', $module::$imagePositions, [
								'label' => 'Position',
								'selected' => $this->getData(['theme', 'header', 'imagePosition'])
							]); ?>
						</div>
					</div>
					<div class="row">
						<div class="col6">
							<?php echo template::checkbox('themeHeaderTextHide', true, 'Cacher le titre du site', [
								'checked' => $this->getData(['theme', 'header', 'textHide'])
							]); ?>
						</div>
						<div class="col6">
							<?php echo template::select('themeHeaderImageContainer', $module::$headerWide, [
								'label' => 'Adaptation',
								'selected' => $this->getData(['theme', 'header', 'imageContainer'])
							]); ?>
						</div>
					</div>
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
						<?php echo template::select('themeHeaderFont', $module::$fonts, [
							'label' => 'Police',
							'selected' => $this->getData(['theme', 'header', 'font'])
						]); ?>
					</div>
					<div class="col3">
						<?php echo template::select('themeHeaderFontSize', $module::$headerFontSizes, [
							'label' => 'Taille',
							'help' => 'Proportionnelle à celle définie dans le site.',
							'selected' => $this->getData(['theme', 'header', 'fontSize'])
						]); ?>
					</div>
					<div class="col3">
						<?php echo template::select('themeHeaderFontWeight', $module::$fontWeights, [
							'label' => 'Style',
							'selected' => $this->getData(['theme', 'header', 'fontWeight'])
						]); ?>
					</div>															
					<div class="col3">
						<?php echo template::select('themeHeaderTextTransform', $module::$textTransforms, [
							'label' => 'Casse',
							'selected' => $this->getData(['theme', 'header', 'textTransform'])
						]); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col12">
			<div class="block">
				<h4>Configuration</h4>
				<div class="row">
					<div class="col4">
						<?php echo template::select('themeHeaderPosition', $module::$headerPositions, [
							'label' => 'Position',
							'selected' => $this->getData(['theme', 'header', 'position'])
						]); ?>
					</div>
					<div class="col4">
						<?php echo template::select('themeHeaderHeight', $module::$headerHeights, [
							'label' => 'Hauteur',
							'selected' => $this->getData(['theme', 'header', 'height'])
						]); ?>
					</div>
					<div class="col4">
						<?php echo template::select('themeHeaderTextAlign', $module::$aligns, [
							'label' => 'Alignement du contenu',
							'selected' => $this->getData(['theme', 'header', 'textAlign'])
						]); ?>
					</div>
					
				</div>
				<!-- menu image -->
				<div id="themeHeaderShow" class="displayNone">				
					<?php echo template::checkbox('themeHeaderlinkHome', true, 'Bannière cliquable', [
								'checked' => $this->getData(['theme', 'header', 'linkHome'])
							]); ?>
				</div>
				<!-- menu image -->	

				<div id="themeHeaderPositionOptions" class="displayNone">
					<?php echo template::checkbox('themeHeaderMargin', true, 'Aligner la bannière avec le contenu', [
						'checked' => $this->getData(['theme', 'header', 'margin'])
					]); ?>
				</div>

			</div>
		</div>
	</div>
<?php echo template::formClose(); ?>
