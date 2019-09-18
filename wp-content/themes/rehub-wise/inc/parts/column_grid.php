<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php 
if (isset($aff_link) && $aff_link == '1') {
    $link = rehub_create_affiliate_link ();
    $target = ' rel="nofollow" target="_blank"';
}
else {
    $link = get_the_permalink();
    $target = '';  
}
global $post;
$price_meta = rehub_option('price_meta_grid');
?>  
<article class="col_item rh-cartbox rewise-box">
<?php echo re_badge_create('tablelabel'); ?> 


    <div class="button_action">
        <div class="floatleft mr5">
            <?php $wishlistadded = __('Added to wishlist', 'rehub_framework');?>
            <?php $wishlistremoved = __('Removed from wishlist', 'rehub_framework');?>
            <?php echo RH_get_wishlist($post->ID, '', $wishlistadded, $wishlistremoved);?>  
        </div>
        <?php if(rehub_option('compare_btn_single') !='') :?>            
            <?php $cmp_btn_args = array(); $cmp_btn_args['class']= 'comparecompact';?>
            <?php if(rehub_option('compare_btn_cats') != '') {
                $cmp_btn_args['cats'] = esc_html(rehub_option('compare_btn_cats'));
            }?>
            <?php echo wpsm_comparison_button($cmp_btn_args); ?> 
        <?php endif;?>                                                            
    </div>       
    <figure>           
        <a href="<?php echo $link;?>"<?php echo $target;?>>
            <?php 
            $showimg = new WPSM_image_resizer();
            $showimg->use_thumb = true;
            $showimg->no_thumb = get_template_directory_uri() . '/images/default/noimage_378_310.png';                                    
            ?>
            <?php if($columns == '3_col') : ?>
                <?php $showimg->height = '180';?>
            <?php elseif($columns == '4_col') : ?>
                <?php $showimg->height = '150';?>  
            <?php elseif($columns == '5_col') : ?>
                <?php $showimg->height = '180';?>   
            <?php elseif($columns == '6_col') : ?>
                <?php $showimg->height = '140';?>                      
            <?php else : ?>
                <?php $showimg->height = '180';?>                                       
            <?php endif ; ?>
            <?php $showimg->show_resized_image(); ?>
        </a>
    </figure>
    <?php do_action( 'rehub_after_grid_column_figure' ); ?>
    <div class="content_constructor">
        <div class="mb10"><?php rehub_format_score('small') ?></div> 
        <h3><a href="<?php echo $link;?>"<?php echo $target;?>><?php the_title();?></a></h3>
        <?php do_action( 'rehub_after_grid_column_title' ); ?>
        <?php do_action( 'rehub_after_grid_column_meta' ); ?>
        <?php if($price_meta !='4'):?>
        <div class="rewise-box-meta floatleft post-meta mb0">
            <?php meta_all( false, false, false, true); ?>
            <div class="store_for_grid">
                <?php WPSM_Postfilters::re_show_brand_tax('list');?>
            </div>               
        </div>
        <div class="rewise-box-price floatright rehub-main-color rehub-main-font"><?php echo get_post_meta($post->ID, 'rehub_offer_product_price', true );?></div>  
        <?php endif;?>         
        <?php do_action( 'rehub_after_grid_column_btn' ); ?>
    </div>                           
</article>