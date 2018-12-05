<?php if($module::$articles): ?>
	<div class="row">
		<div class="col12">
			<?php foreach($module::$articles as $articleId => $article): ?>
				<div class="block">
					<h4>
						<!-- Le <?php echo date('d M Y à H:i', $article['publishedOn']); ?> -->
						Le <?php echo utf8_encode(strftime('%d %B %Y', $article['publishedOn']));  ?>
						à	<?php echo utf8_encode(strftime('%H:%M', $article['publishedOn'])); ?>
						<div class="blogComment">
							<a href="<?php echo helper::baseUrl() . $this->getUrl(0) . '/' . $articleId; ?>#comment">
								<?php echo count($article['comment']); ?>
							</a>
							<?php echo template::ico('comment-alt', 'left'); ?>
						</div>
					</h4>
					<a href="<?php echo helper::baseUrl() . $this->getUrl(0) . '/' . $articleId; ?>" class="blogPicture">
						<img src="<?php echo helper::baseUrl(false) . 'site/file/thumb/' . $article['picture']; ?>">
					</a>
					<h2>
						<a href="<?php echo helper::baseUrl() . $this->getUrl(0) . '/' . $articleId; ?>">
							<?php echo $article['title']; ?>
						</a>
					</h2>
					<p class="blogContent">
						<?php echo helper::subword(strip_tags($article['content']), 0, 150); ?>...
						<a href="<?php echo helper::baseUrl() . $this->getUrl(0) . '/' . $articleId; ?>">Lire la suite</a>
					</p>
					<p class="signature">
						<?php echo $this->getData(['user', $article['userId'], 'firstname']) . ' ' . $this->getData(['user', $article['userId'], 'lastname']); ?>
					</p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php echo $module::$pages; ?>
<?php else: ?>
	<?php echo template::speech('Aucun article.'); ?>
<?php endif; ?>