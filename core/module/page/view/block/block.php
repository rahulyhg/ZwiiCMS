<?php echo template::formOpen('pageblockEditForm'); ?>
<div class="row">
	<div class="col2">
			<?php $href = helper::baseUrl() . $this->getUrl(2); ?>
      <?php if ($this->getData(['page', $this->getUrl(2), 'moduleId']) === 'redirection')$href = helper::baseUrl(); ?>
			<?php echo template::button('pageblockEditBack', [
				'class' => 'buttonGrey',
				'href' => $href,
				'ico' => 'left',
				'value' => 'Retour'
			]); ?>
		</div>
		<div class="col2 offset8">
			<?php echo template::submit('pageblockEditSubmit'); ?>
		</div>
	</div>
<div class='row'>
	<div class="col6">						
		<?php echo template::textarea('pageBlockLeftContent', [
				'label' => 'Barre latérale de gauche :',
				'class' => 'editorWysiwyg',
				'value' => $this->getData(['page','blockLeft', 'content'])
		]); ?>
	</div>			
	<div class="col6">
		<?php echo template::textarea('pageBlockRightContent', [
				'label' => 'Barre latérale de droite :',
				'class' => 'editorWysiwyg',
				'value' => $this->getData(['page','blockRight', 'content'])
			]); ?>
	</div>	
</div>
<?php echo template::formClose(); ?>
