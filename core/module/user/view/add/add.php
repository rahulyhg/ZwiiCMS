<?php echo template::formOpen('userAddForm'); ?>
	<div class="row">
		<div class="col2">
			<?php echo template::button('userAddBack', [
				'class' => 'buttonGrey',
				'href' => helper::baseUrl() . 'user',
				'ico' => 'caret-left',
				'value' => 'Retour'
			]); ?>
		</div>
		<div class="col2 offset8">
			<?php echo template::submit('userAddSubmit'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col6">
			<div class="block">
				<h4>Informations générales</h4>
				<div class="row">
					<div class="col6">
						<?php echo template::text('userAddFirstname', [
							'autocomplete' => 'off',
							'label' => 'Prénom'
						]); ?>
					</div>
					<div class="col6">
						<?php echo template::text('userAddLastname', [
							'autocomplete' => 'off',
							'label' => 'Nom'
						]); ?>
					</div>
				</div>
				<?php echo template::mail('userAddMail', [
					'autocomplete' => 'off',
					'label' => 'Adresse mail'
				]); ?>
				<?php echo template::select('userAddGroup', self::$groupNews, [
					'label' => 'Groupe',
					'selected' => self::GROUP_MEMBER
				]); ?>
				Autorisations :
				<ul id="userAddGroupDescription<?php echo self::GROUP_MEMBER; ?>" class="userAddGroupDescription displayNone">
					<li>Accès aux pages privées membres</li>
				</ul>
				<ul id="userAddGroupDescription<?php echo self::GROUP_MODERATOR; ?>" class="userAddGroupDescription displayNone">
					<li>Accès aux pages privées membres et modérateurs</li>
					<li>Ajout / Édition / Suppression de pages</li>
					<li>Ajout / Édition / Suppression de fichiers</li>
				</ul>
				<ul id="userAddGroupDescription<?php echo self::GROUP_ADMIN; ?>" class="userAddGroupDescription displayNone">
					<li>Accès à toutes les pages privées</li>
					<li>Ajout / Édition / Suppression de pages</li>
					<li>Ajout / Édition / Suppression de fichiers</li>
					<li>Ajout / Édition / Suppression d'utilisateurs</li>
					<li>Configuration du site</li>
					<li>Personnalisation du thème</li>
				</ul>
				<?php echo template::checkbox('userAddSendMail', true, 'Prévenir l\'utilisateur par mail'); ?>
			</div>
		</div>
		<div class="col6">
			<div class="block">
				<h4>Authentification</h4>
				<?php echo template::text('userAddId', [
					'autocomplete' => 'off',
					'label' => 'Identifiant'
				]); ?>
				<?php echo template::password('userAddPassword', [
					'autocomplete' => 'off',
					'label' => 'Mot de passe'
				]); ?>
				<?php echo template::password('userAddConfirmPassword', [
					'autocomplete' => 'off',
					'label' => 'Confirmation'
				]); ?>
			</div>
		</div>
	</div>
<?php echo template::formClose(); ?>