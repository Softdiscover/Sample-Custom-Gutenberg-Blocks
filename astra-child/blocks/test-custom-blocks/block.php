<div class="test-block-container">
	<div class="image-wrap">
		<div class="block-img active" data-side="1">
			<img src="<?php block_field('image-1'); ?>" alt="<?php block_field('image-1-alt-text'); ?>" data-tooltip="<?php echo esc_attr('Click here for more info', 'cpschool'); ?>">
		</div>
		<div class="block-img" data-side="2">
			<img src="<?php block_field('image-2'); ?>" alt="<?php block_field('image-2-alt-text'); ?>" data-tooltip="<?php echo esc_attr('Click here for more info', 'cpschool'); ?>">
		</div>
	</div>
	<div class="text-wrap">
		<div class="sides side1 active">
			<div class="content">
				<p class="title"><?php block_field('title-1'); ?></p>
				<?php block_field('description-1'); ?>
                <?php block_field('other-description1'); ?>
                
			</div>
			<div class="read-more">
				<a href="<?php block_field('link-1'); ?>"><?php echo esc_html('Read More', 'cpschool'); ?></a>
			</div>
		</div>
		<div class="sides side2">
			<div class="content">
				<p class="title"><?php block_field('title-2'); ?></p>
				<?php block_field('description-2'); ?>
                <?php block_field('other-description-2'); ?>
			</div>
			<div class="read-more">
				<a href="<?php block_field('link-2'); ?>"><?php echo esc_html('Read More', 'cpschool'); ?></a>
			</div>
		</div>
	</div>
</div>
<script>
	jQuery(document).ready(function($) {
		"use strict";
		$('.block-img').each(function() {
			var altText = $(this).find('img').attr('data-tooltip');
			var altDiv = $('<div class="img-tooltip">' + altText + '</div>');
			$(this).append(altDiv);
		});

		$(".block-img").hover(function() {
			if (!$(this).hasClass('active')) $(this).find('.img-tooltip').stop().fadeTo(300, 1);
		}, function() {
			if (!$(this).hasClass('active')) $(this).find('.img-tooltip').stop().fadeTo(300, 0);
		});

		$(".block-img").click(function() {
			var $clickedBlock = $(this);
			var $inactive = $(".block-img").not($clickedBlock);
			var $parentBlock = $inactive.parent().parent();
			$(this).find('.img-tooltip').stop().fadeTo(300, 0);

			$inactive.removeClass("active").css("width", "30%");
			$parentBlock.find('.side' + $inactive.data("side")).removeClass("active");

			$clickedBlock.addClass("active").css("width", "70%");;
			$parentBlock.find('.side' + $clickedBlock.data("side")).addClass("active");

		});
	});
</script>