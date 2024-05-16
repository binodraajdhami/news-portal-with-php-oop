<?php include_once('./includes/header.php'); ?>

<section class="feature-news">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<?php $feature_news_by_category_fashions = $newsData->get_single_news_by_category_id(61); ?>
				<div class="feature-news-content">
					<div class="feature-news-content-thumbnail">
						<img src="./admin/images/<?php echo $feature_news_by_category_fashions->feature_image; ?>" width="100%">
					</div>
					<a href="news.php?news_slug=<?php echo $feature_news_by_category_fashions->slug; ?>">
						<h4><?php echo $feature_news_by_category_fashions->name; ?></h4>
					</a>
					<span>By: <?php echo $feature_news_by_category_fashions->created_by; ?></span> |
					<span><?php echo date_format(date_create($feature_news_by_category_fashions->created_at),"d M, Y"); ?></span>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="row">
					<div class="col-lg-12">
						<?php $feature_news_by_category_gadges = $newsData->get_single_news_by_category_id(62); ?>
						<div class="feature-news-content">
							<div class="feature-news-content-thumbnail">
								<img src="./admin/images/<?php echo $feature_news_by_category_gadges->feature_image; ?>" width="100%">
							</div>
							<a href="news.php?news_slug=<?php echo $feature_news_by_category_gadges->slug; ?>">
								<h4><?php echo $feature_news_by_category_gadges->name; ?></h4>
							</a>
							<span>By: <?php echo $feature_news_by_category_gadges->created_by; ?></span> |
							<span><?php echo date_format(date_create($feature_news_by_category_gadges->created_at),"d M, Y"); ?></span>
						</div>
					</div>
					<div class="col-lg-6">
						<?php $feature_news_by_category_travels = $newsData->get_single_news_by_category_id(60); ?>
						<div class="feature-news-content">
							<div class="feature-news-content-thumbnail">
								<img src="./admin/images/<?php echo $feature_news_by_category_travels->feature_image; ?>" width="100%">
							</div>
							<a href="news.php?news_slug=<?php echo $feature_news_by_category_travels->slug; ?>">
								<h4><?php echo $feature_news_by_category_travels->name; ?></h4>
							</a>
							<span>By: <?php echo $feature_news_by_category_travels->created_by; ?></span> |
							<span><?php echo date_format(date_create($feature_news_by_category_travels->created_at),"d M, Y"); ?></span>
						</div>
					</div>
					<div class="col-lg-6">
						<?php $feature_news_by_category_lifestyles = $newsData->get_single_news_by_category_id(59); ?>
						<div class="feature-news-content">
							<div class="feature-news-content-thumbnail">
								<img src="./admin/images/<?php echo $feature_news_by_category_lifestyles->feature_image; ?>" width="100%">
							</div>
							<a href="news.php?news_slug=<?php echo $feature_news_by_category_lifestyles->slug; ?>">
								<h4><?php echo $feature_news_by_category_lifestyles->name; ?></h4>
							</a>
							<span>By: <?php echo $feature_news_by_category_lifestyles->created_by; ?></span> |
							<span><?php echo date_format(date_create($feature_news_by_category_lifestyles->created_at),"d M, Y"); ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include_once('./includes/footer.php'); ?>