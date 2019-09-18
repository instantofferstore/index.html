<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php
$theme_options =  array(
	'title' => __('Theme Options', 'rehubchild'),
	'page' => 'Rehub Theme Options',
	'logo' => '',
	'menus' => array(
		array(
			'title' => __('General Options', 'rehubchild'),
			'name' => 'menu_1',
			'icon' => 'font-awesome:fa-microchip',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('General Options', 'rehubchild'),
					'fields' => array(
					
						array(
							'type' => 'select',
							'name' => 'archive_layout',
							'label' => __('Select Archives and Index Layout', 'rehubchild'),
							'description' => __('Select what kind of post string layout you want to use for blog, archives', 'rehubchild'),
							'items' => array(							
								array(
									'value' => 'dealgrid',
									'label' => __('Deal Grid layout', 'rehubchild'),
								),
								array(
									'value' => 'dealgridfull',
									'label' => __('Full width Deal Grid layout', 'rehubchild'),
								),	
								array(
									'value' => 'grid',
									'label' => __('Simple Grid layout', 'rehubchild'),
								),
								array(
									'value' => 'gridfull',
									'label' => __('Full width Simple Grid layout', 'rehubchild'),
								),
								array(
									'value' => 'list',
									'label' => __('List layout', 'rehubchild'),
								),								
							),
							'default' => array(
								'dealgrid',
							),
						),
						array(
							'type' => 'select',
							'name' => 'category_layout',
							'label' => __('Select Category Layout', 'rehubchild'),
							'description' => __('Select what kind of post string layout you want to use for categories', 'rehubchild'),
							'items' => array(
								array(
									'value' => 'dealgrid',
									'label' => __('Deal Grid layout', 'rehubchild'),
								),
								array(
									'value' => 'dealgridfull',
									'label' => __('Full width Deal Grid layout', 'rehubchild'),
								),	
								array(
									'value' => 'grid',
									'label' => __('Simple Grid layout', 'rehubchild'),
								),
								array(
									'value' => 'gridfull',
									'label' => __('Full width Simple Grid layout', 'rehubchild'),
								),	
								array(
									'value' => 'list',
									'label' => __('List layout', 'rehubchild'),
								),																															
							),
							'default' => array(
								'dealgrid',
							),
						),
						array(
							'type' => 'select',
							'name' => 'search_layout',
							'label' => __('Select Search Layout', 'rehubchild'),
							'description' => __('Select what kind of post string layout you want to use for search pages', 'rehubchild'),
							'items' => array(							
								array(
									'value' => 'dealgrid',
									'label' => __('Deal Grid layout', 'rehubchild'),
								),
								array(
									'value' => 'dealgridfull',
									'label' => __('Full width Deal Grid layout', 'rehubchild'),
								),	
								array(
									'value' => 'grid',
									'label' => __('Simple Grid layout', 'rehubchild'),
								),
								array(
									'value' => 'gridfull',
									'label' => __('Full width Simple Grid layout', 'rehubchild'),
								),
								array(
									'value' => 'list',
									'label' => __('List layout', 'rehubchild'),
								),																															
							),
							'default' => array(
								'list',
							),
						),	
						array(
							'type' => 'select',
							'name' => 'post_layout_style',
							'label' => __('Post layout', 'rehubchild'),
							'default' => 'normal_post',
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'rehub_get_post_layout_array',
									),
								),
							),
							'default' => array(
								'default',
							),
						),
						array(
							'type' => 'select',
							'name' => 'width_layout',
							'label' => __('Select Width Style', 'rehub_framework'),
							'items' => array(
								array(
									'value' => 'regular',
									'label' => __('Regular (1200px)', 'rehub_framework'),
								),								
								array(
									'value' => 'extended',
									'label' => __('Extended (1530px)', 'rehub_framework'),
								),	
								array(
									'value' => 'compact',
									'label' => __('Compact (adsense banners optimized)', 'rehub_framework'),
								),																						
							),
							'default' => array(
								'regular',
							),						
						),
						array(
							'type' => 'select',
							'name' => 'enable_pagination',
							'label' => __('Select pagination type for categories', 'rehubchild'),
							'description' => __('Choose number of posts per page in Settings - Reading settings. Recommended number - 12', 'rehubchild'),
							'items' => array(
								array(
									'value' => '1',
									'label' => __('Simple Pagination', 'rehubchild'),
								),	
								array(
									'value' => '2',
									'label' => __('Infinite scroll', 'rehubchild'),
								),															
								array(
									'value' => '3',
									'label' => __('Next page button', 'rehubchild'),
								),																																
							),
							'default' => array(
								'1',
							),
						),																	
						array(
							'type' => 'textarea',
							'name' => 'category_filter_panel',
							'label' => __('Category filter panel', 'rehubchild'),		
							'description' => __('You can add additional filter panel in category pages (working only in Recash and Rewise). Add each filter from next line. Example: Title:meta_key:DESC. In most cases, you will need next filter panel code. <br /><br />Show all:all:DESC<br />Best price:rehub_main_product_price:ASC<br />Hottest:post_hot_count:DESC<br />Popular:rehub_views:DESC<br />Price range:price:0-100:DESC<br /><br />To show hottest deals sorted by date, use<br />Hottest:hot:DESC<br /><br />To show deals and coupons sorted by expiration date<br />Expired soon:expiration:ASC<br /><br /><a href="http://rehubdocs.wpsoul.com/docs/rehub-theme/list-of-important-meta-fields/" target="_blank">Check other important fields</a>', 'rehubchild'),											
						),														
						array(
							'type' => 'toggle',
							'name' => 'rehub_enable_btn_recash',
							'label' => __('Enable button in default deal grid layout?', 'rehubchild'),		
							'default' => 0,							
						),	
						array(
							'type' => 'select',
							'name' => 'price_meta_grid',
							'label' => __('Show in default grid price area', 'rehubchild'),
							'items' => array(
								array(
									'value' => '1',
									'label' => __('User logo + Price', 'rehubchild'),
								),	
								array(
									'value' => '2',
									'label' => __('Brand logo + Price', 'rehubchild'),
								),	
								array(
									'value' => '3',
									'label' => __('Only Price', 'rehubchild'),
								),	
								array(
									'value' => '4',
									'label' => __('Nothing', 'rehubchild'),
								),																																			
							),
							'default' => array(
								'1',
							),
						),	
						array(
							'type' => 'toggle',
							'name' => 'disable_inner_links',
							'label' => __('Enable affiliate links from title and image in grid?', 'rehub_framework'),
							'default' => 0,							
						),												
						array(
							'type' => 'toggle',
							'name' => 'disable_grid_actions',
							'label' => __('Disable comment and thumbs actions in categories?', 'rehubchild'),		
							'default' => 0,							
						),					
						array(
							'type' => 'textarea',
							'name' => 'rehub_custom_css',
							'label' => __('Custom CSS', 'rehubchild'),
							'description' => __('Write your custom CSS here', 'rehubchild'),
						),						
						array(
							'type' => 'textarea',
							'name' => 'rehub_analytics',
							'label' => __('js code in footer', 'rehubchild'),
							'description' => __('Enter your Analytics code or any html, js code', 'rehubchild'),
						),
						array(
							'type' => 'textarea',
							'name' => 'rehub_analytics_header',
							'label' => __('Js code for header (analytics)', 'rehub_framework'),						
						),						
						array(
							'type' => 'toggle',
							'name' => 'rehub_enable_front_vc',
							'label' => __('Enable frontend in visual composer?', 'rehubchild'),
							'default' => '0',
						),	
						array(
					        'type' => 'slider',
					        'name' => 'hot_max',
					        'label' => __('Hottest value', 'rehubchild'),
					        'description' => __('After hot metter reach this value, scale will have hot image and 100% fill + will be used in hottest filter', 'rehubchild'),
					        'min' => '5',
					        'max' => '500',
					        'step' => '5',
					        'default' => '10',
    					),
						array(
					        'type' => 'slider',
					        'name' => 'hot_min',
					        'label' => __('Coldest value', 'rehubchild'),
					        'description' => __('After hot metter reach this value, scale will have cold image and 100% fill of cold', 'rehubchild'),
					        'min' => '-500',
					        'max' => '-10',
					        'step' => '5',
					        'default' => '-10',
    					),											
					),
				),
			),
		),
		array(
			'title' => __('Appearance/Color', 'rehubchild'),
			'name' => 'menu_6',
			'icon' => 'font-awesome:fa-edit',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Color schema of website', 'rehubchild'),
					'fields' => array(
						array(
							'type' => 'color',
							'name' => 'rehub_custom_color',
							'label' => __('Custom color schema', 'rehub_framework'),
							'description' => __('Default theme color schema is red, but you can set your own main color (it will be used under white text)', 'rehub_framework'),
							'format' => 'hex',
							'default'=> '#10a2ef',							
						),						
						array(
							'type' => 'color',
							'name' => 'rehub_sec_color',
							'label' => __('Custom secondary color', 'rehubchild'),
							'description' => __('Set secondary color (for search buttons, tabs, etc).', 'rehubchild'),
							'format' => 'hex',
							'default'=> '#111111',							

						),							
						array(
							'type' => 'color',
							'name' => 'rehub_btnoffer_color',
							'label' => __('Set offer buttons color', 'rehubchild'),
							'format' => 'hex',
							'default'=> '#43c801',						
						),	
						array(
							'type' => 'color',
							'name' => 'rehub_color_link',
							'label' => __('Custom color for links inside posts', 'rehubchild'),
							'format' => 'hex',	
						),											
					),
				),
				array(
					'type' => 'section',
					'title' => __('Layout settings', 'rehubchild'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'rehub_sidebar_left',
							'label' => __('Set sidebar to left side?', 'rehub_framework'),
							'default' => '0',
						),	
						array(
							'type' => 'toggle',
							'name' => 'rehub_body_block',
							'label' => __('Enable boxed version?', 'rehub_framework'),
							'default' => '0',
						),																	
						array(
							'type' => 'color',
							'name' => 'rehub_color_background',
							'label' => __('Background Color', 'rehubchild'),
							'format' => 'hex',
						),
						array(
							'type' => 'upload',
							'name' => 'rehub_background_image',
							'label' => __('Background Image', 'rehubchild'),
							'description' => __('Upload a background image. This field works only if you set also background color in field above', 'rehubchild'),
							'default' => '',
						),
						array(
							'type' => 'select',
							'name' => 'rehub_background_repeat',
							'label' => __('Background Repeat', 'rehubchild'),
							'items' => array(
								array(
									'value' => 'repeat',
									'label' => __('Repeat', 'rehubchild'),
								),
								array(
									'value' => 'no-repeat',
									'label' => __('No Repeat', 'rehubchild'),
								),
								array(
									'value' => 'repeat-x',
									'label' => __('Repeat X', 'rehubchild'),
								),
								array(
									'value' => 'repeat-y',
									'label' => __('Repeat Y', 'rehubchild'),
								),
							),
							'default' => array(
								'repeat',
							),
						),
						array(
							'type' => 'select',
							'name' => 'rehub_background_position',
							'label' => __('Background Position', 'rehubchild'),
							'items' => array(
								array(
									'value' => 'left',
									'label' => 'Left',
								),
								array(
									'value' => 'center',
									'label' => 'Center',
								),
								array(
									'value' => 'right',
									'label' => 'Right',
								),
							),
						),
						array(
							'type' => 'textbox',
							'name' => 'rehub_background_offset',
							'label' => __('Set offset', 'rehubchild'),
							'description' => __('Set offset from top for background (with px) for avoid header overlap', 'rehubchild'),
							'validation' => 'numeric',
						),
						array(
							'type' => 'toggle',
							'name' => 'rehub_background_fixed',
							'label' => __('Fixed Background Image?', 'rehubchild'),
							'description' => __('The background is fixed with regard to the viewport.', 'rehubchild'),
						),
						array(
							'type' => 'toggle',
							'name' => 'rehub_sized_background',
							'label' => __('Fit size?', 'rehubchild'),
							'description' => __('Set background image width and height to fit the size of window', 'rehubchild'),
						),												
						array(
							'type' => 'textbox',
							'name' => 'rehub_branded_bg_url',
							'label' => __('Url for branded background', 'rehubchild'),
							'description' => __('Insert url that will be display on background', 'rehubchild'),
							'default' => '',
							'validation' => 'url',
						),																			
					),
				),				
			),
		),
	)
);

$theme_options_common = include(get_template_directory() . '/admin/option/option_common.php');
foreach ($theme_options_common as $theme_options_add) {
    $theme_options['menus'][] = $theme_options_add;
}

return $theme_options;

/**
 *EOF
 */