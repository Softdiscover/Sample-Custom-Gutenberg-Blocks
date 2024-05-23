<?php


function softdiscover_child_theme_activation()
{
	if (!is_plugin_active('genesis-custom-blocks/genesis-custom-blocks.php')) {

		add_action('admin_notices', 'display_missing_plugin_alert');
	}
	$blocks = get_posts(
		[
			'post_type'   => 'genesis_custom_block',
			'name' => 'test-custom-blocks',
			'numberposts' => 1,
			'post_status' => 'any',
			'fields'      => 'ids',
		]
	);

	if (count($blocks) > 0) {
		return;
	}
	
	//inserting custom block
	wp_insert_post(
		[
			'post_title'   => __('Test Custom Blocks', 'mycustom'),
			'post_name'    => 'test-custom-blocks',
			'post_status'  => 'publish',
			'post_type'    => 'genesis_custom_block',
			'post_content' => wp_json_encode(
				[
					"genesis-custom-blocks/test-custom-blocks" => [
						"name" => "test-custom-blocks",
						"title" => "Test Custom Blocks",
						"excluded" => [],
						"icon" => "assignment_ind",
						"category" => [
							"icon" => null,
							"slug" => "text",
							"title" => "Text"
						],
						"keywords" => [],
						"fields" => [
							"image-1" => [
								"location" => "editor",
								"width" => "50",
								"help" => "Enter image",
								"name" => "image-1",
								"label" => "image 1",
								"order" => 0,
								"control" => "image",
								"type" => "integer"
							],
							"image-2" => [
								"location" => "editor",
								"width" => "50",
								"help" => "Enter image",
								"name" => "image-2",
								"label" => "image 2",
								"order" => 1,
								"control" => "image",
								"type" => "integer"
							],
							"image-1-alt-text" => [
								"location" => "editor",
								"width" => "50",
								"help" => "Provide descriptive alt text for image",
								"default" => "",
								"placeholder" => "",
								"maxlength" => "",
								"name" => "image-1-alt-text",
								"label" => "Image 1 alt text",
								"control" => "text",
								"type" => "string",
								"order" => 2
							],
							"image-2-alt-text" => [
								"location" => "editor",
								"width" => "50",
								"help" => "Provide descriptive alt text for image",
								"default" => "",
								"placeholder" => "",
								"maxlength" => "",
								"name" => "image-2-alt-text",
								"label" => "Image 2 alt text",
								"control" => "text",
								"type" => "string",
								"order" => 3
							],
							"title-1" => [
								"location" => "editor",
								"width" => "50",
								"help" => "Enter Title",
								"default" => "",
								"placeholder" => "",
								"maxlength" => "",
								"name" => "title-1",
								"label" => "title 1",
								"control" => "text",
								"type" => "string",
								"order" => 4
							],
							"title-2" => [
								"location" => "editor",
								"width" => "50",
								"help" => "Enter title",
								"default" => "",
								"placeholder" => "",
								"maxlength" => "",
								"name" => "title-2",
								"label" => "title 2",
								"control" => "text",
								"type" => "string",
								"order" => 5
							],
							"description-1" => [
								"location" => "editor",
								"width" => "50",
								"help" => "Enter description",
								"default" => "",
								"placeholder" => "",
								"maxlength" => "",
								"number_rows" => 4,
								"new_lines" => "autop",
								"name" => "description-1",
								"label" => "Description 1",
								"order" => 6,
								"control" => "textarea",
								"type" => "string"
							],
							"description-2" => [
								"location" => "editor",
								"width" => "50",
								"help" => "Enter description",
								"default" => "",
								"placeholder" => "",
								"maxlength" => "",
								"number_rows" => 4,
								"new_lines" => "autop",
								"name" => "description-2",
								"label" => "Description 2",
								"order" => 7,
								"control" => "textarea",
								"type" => "string"
							],
							"link-1" => [
								"location" => "editor",
								"width" => "50",
								"help" => "Enter link ",
								"default" => "",
								"placeholder" => "",
								"name" => "link-1",
								"label" => "Link 1",
								"order" => 8,
								"control" => "url",
								"type" => "string"
							],
							"link-2" => [
								"location" => "editor",
								"width" => "50",
								"help" => "Enter link",
								"default" => "",
								"placeholder" => "",
								"name" => "link-2",
								"label" => "Link 2",
								"order" => 9,
								"control" => "url",
								"type" => "string"
							]
						]
					]
				]
			),
		]
	);
}

function display_missing_plugin_alert()
{
?>
	<div class="notice notice-error is-dismissible">
		<p><?php esc_html_e('Genesis Custom BLocks plugin is missing. Please activate it to use this child theme.', 'mycustom'); ?></p>
	</div>
<?php
}

add_action('after_switch_theme', 'softdiscover_child_theme_activation');
