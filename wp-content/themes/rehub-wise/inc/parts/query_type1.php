<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php global $post;?>
<div class="news-community clearfix<?php echo rh_expired_or_not($post->ID, 'class');?>">
   <div class="button_action">
        <div class="floatleft mr5">
            <?php $wishlistadded = __('Added to wishlist', 'rehub_framework');?>
            <?php $wishlistremoved = __('Removed from wishlist', 'rehub_framework');?>
            <?php echo RH_get_wishlist($post->ID, '', $wishlistadded, $wishlistremoved);?> 
        </div>
        <?php if(rehub_option('compare_btn_single') !='' && 'post' == get_post_type($post->ID)) :?>
            <span class="compare_for_grid floatleft">
                <?php $cmp_btn_args = array();$cmp_btn_args['class']= 'comparecompact';?>
                <?php if(rehub_option('compare_btn_cats') != '') {
                    $cmp_btn_args['cats'] = esc_html(rehub_option('compare_btn_cats'));
                }?>
                <?php echo wpsm_comparison_button($cmp_btn_args); ?>
            </span>
        <?php endif;?>                                                                       
    </div> 
	<div class="newscom_wrap_table">		
    <div class="featured_newscom_left">
    	<div>
        <figure><?php echo re_badge_create('tablelabel'); ?>
        <?php 
            $offer_price_old = get_post_meta($post->ID, 'rehub_offer_product_price_old', true );
            $offer_price_old = apply_filters('rehub_create_btn_price_old', $offer_price_old);
            if(!empty($offer_price_old)){
                $offer_price = get_post_meta($post->ID, 'rehub_offer_product_price', true );
                $offer_price = apply_filters('rehub_create_btn_price', $offer_price);
                if ( !empty($offer_price)) {
                    $offer_pricesale = (float)rehub_price_clean($offer_price); //Clean price from currence symbols
                    $offer_priceold = (float)rehub_price_clean($offer_price_old); //Clean price from currence symbols
                    if ($offer_priceold !='0' && is_numeric($offer_priceold) && $offer_priceold > $offer_pricesale) {
                        $off_proc = 0 -(100 - ($offer_pricesale / $offer_priceold) * 100);
                        $off_proc = round($off_proc);
                        echo '<span class="grid_onsale">'.$off_proc.'%</span>';
                    }
                }
            }

        ?>        
        <a href="<?php the_permalink();?>">
        <?php 
            $showimg = new WPSM_image_resizer();
            $showimg->use_thumb = true;
            $height_figure_single = apply_filters( 're_news_figure_height', 138 );
            $showimg->height = $height_figure_single;
            $showimg->width = $height_figure_single;
            $showimg->crop = false;         
            $showimg->show_resized_image();                                    
        ?>
        </a>
        </figure> 
        </div>          
 
		<?php do_action( 'rehub_after_left_list_thumb_figure' ); ?> 
                               
    </div>
    <div class="newscom_detail">
    	<div class="newscom_head">
		    <?php echo rh_expired_or_not($post->ID, 'span');?><h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
		    <?php do_action( 'rehub_after_left_list_thumb_title' ); ?>
		    
	        <div class="meta post-meta">
				<?php rh_post_header_meta( true, true, false, false, true ); ?>                               
	        </div>
        </div>
	    
	    <p><?php kama_excerpt('maxchar=160'); ?></p>
        <?php rehub_format_score('small') ?>
	    <?php do_action( 'rehub_after_left_list_thumb' ); ?>  

		<?php $content = $post->post_content; ?>
    </div>
    <?php $price = get_post_meta($post->ID, 'rehub_offer_product_price', true );?>          
    <?php if ($price):?>
    	<div class="newscom_btn_block"> 
	    	<div class="rewise-box-price rehub-main-color rehub-main-font mb10"><?php echo get_post_meta($post->ID, 'rehub_offer_product_price', true );?></div>
			<a href="<?php the_permalink();?>" class="btn_offer_block rh-deal-compact-btn"><?php _e('Check all prices', 'rehubchild');?></a>
		</div>        	 	    	
    <?php endif;?>    	          
    </div> 
</div>