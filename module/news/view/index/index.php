<?php if($module::$news): ?>
	<div class="row">
		<div class="col12">
			<?php foreach($module::$news as $newsId => $news): ?>
				<div class="block">
					<h4>
						Le <?php echo utf8_encode(strftime('%d %B %Y', $news['publishedOn'])); ?>
						à  <?php echo utf8_encode(strftime('%H:%M', $news['publishedOn'])); ?>
					</h4>
					<h2><?php echo $news['title']; ?></h2>
					<?php echo $news['content']; ?>
					<p class="signature">
						<?php echo $this->getData(['user', $news['userId'], 'firstname']) . ' ' . $this->getData(['user', $news['userId'], 'lastname']); ?>
					</p>
					<div class="clearBoth"></div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php echo $module::$pages; ?>
<?php else: ?>
	<?php echo template::speech('Aucune news.'); ?>
<?php endif; ?>