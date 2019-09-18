<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php get_header(); ?>
<?php $catID = get_query_var( 'cat' );?>
<?php $enable_pagination = (rehub_option('enable_pagination')) ? rehub_option('enable_pagination') : '1';?>
<?php if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; } ?>
<?php 
if ($enable_pagination =='2'){
    $infinitescrollwrap = ' re_aj_pag_auto_wrap';
}     
elseif ($enable_pagination =='3') {
    $infinitescrollwrap = ' re_aj_pag_clk_wrap';
} 
else {
    $infinitescrollwrap = '';
} 
$show = get_option('posts_per_page');
if (rehub_option('category_layout') == 'grid'){
    $col_wrap = 'col_wrap_three';
    $columns = '3_col';    
    if($show == 10){$show = 12;}
}  
elseif (rehub_option('category_layout') == 'dealgrid'){
    $col_wrap = 'col_wrap_three eq_grid post_eq_grid';
    $columns = '3_col';    
    if($show == 10){$show = 12;}
} 
elseif (rehub_option('category_layout') == 'gridfull'  ){
    $col_wrap = 'col_wrap_fifth';
    $columns = '5_col';    
} 
elseif (rehub_option('category_layout') == 'dealgridfull'  ){
    $col_wrap = 'col_wrap_fifth eq_grid post_eq_grid';
    $columns = '5_col';    
} 
else {
   $col_wrap = 'col_wrap_three';
   $columns = '3_col';
   if($show == 10){$show = 12;}
} 
$containerid = 'rh_loop_' . uniqid();
$price_meta = rehub_option('price_meta_grid');
$ajaxoffset = $show; 
$args = array(
    'posts_per_page' => $show,
    'cat' => $catID,
    'ignore_sticky_posts'=> 1,
    'paged' => $paged,
);
$disable_btn = (rehub_option('rehub_enable_btn_recash') == 1) ? 0 : 1;
$disable_act = (rehub_option('disable_grid_actions') == 1) ? 1 : 0;
$aff_link = (rehub_option('disable_inner_links') == 1) ? 1 : 0;
$additional_vars = array('exerpt_count'=> '', 'disable_meta'=>'', 'enable_btn'=>'', 'disable_btn'=>$disable_btn, 'disable_act'=>$disable_act, 'price_meta' => $price_meta, 'aff_link'=>$aff_link);
$jsonargs = json_encode($args);
$json_innerargs = json_encode($additional_vars);
$cat_filter_panel = rehub_option('category_filter_panel');

?>

<!-- CONTENT -->
<div class="rh-container"> 
    <div class="rh-content-wrap clearfix">
        <!-- Main Side -->
        <div class="main-side clearfix<?php if (rehub_option('category_layout') == 'gridfull' || rehub_option('category_layout') == 'dealgridfull') : ?> full_width<?php endif ;?>">
            <div class="wpsm-title middle-size-title wpsm-cat-title"><h5><?php single_cat_title(); ?></h5></div>
            <?php if( !is_paged()) : ?><article class='top_rating_text post'><?php echo category_description(); ?></article><?php endif ;?>

            <?php if ($cat_filter_panel): //Adding custom filter panel?>
                <?php $cat_filter_panel = explode(PHP_EOL, $cat_filter_panel);?>
                <?php $prepare_filter = array();?>
                <?php foreach ($cat_filter_panel as $key => $values) {
                    $values = explode(':', $values);
                    if ($values[1]=='hot'){
                        $filtertype = 'hot';
                    }
                    elseif($values[1]=='all'){
                        $filtertype = 'all';
                    }
                    elseif($values[1]=='expiration'){
                        $filtertype = 'expirationdate';
                    }                    
                    else{
                        $filtertype = 'meta';                        
                    }
                    if ($values[1]=='price'){
                        $prepare_filter[] = array (
                            'filtertitle' => trim($values[0]),
                            'filtertype' => 'pricerange',
                            'filterorder'=> trim($values[3]),  
                            'filterpricerange' => trim($values[2]),  
                            'filterorderby' => 'price',                     
                        );                        
                    } 
                    else{
                        $prepare_filter[] = array (
                            'filtertitle' => trim($values[0]),
                            'filtertype' => $filtertype,
                            'filterorder'=> trim($values[2]),  
                            'filtermetakey' => trim($values[1]),                        
                        );
                    } 
                }?>
                <?php $prepare_filter = urlencode(json_encode($prepare_filter));?>
                <?php rehub_vc_filterpanel_render($prepare_filter, $containerid);?>
            <?php endif;?>

            <?php if (rehub_option('category_layout') == 'list') : ?>
                <div class="<?php echo $infinitescrollwrap;?>" data-filterargs='<?php echo $jsonargs;?>' data-template="query_type1" id="<?php echo $containerid;?>">
            <?php elseif (rehub_option('category_layout') == 'grid') : ?>
                <div class="rh-flex-eq-height <?php echo $col_wrap; echo $infinitescrollwrap;?>" data-filterargs='<?php echo $jsonargs;?>' data-template="column_grid" id="<?php echo $containerid;?>" data-innerargs='<?php echo $json_innerargs;?>'>
            <?php elseif (rehub_option('category_layout') == 'gridfull') : ?>
                <div class="rh-flex-eq-height <?php echo $col_wrap; echo $infinitescrollwrap;?>" data-filterargs='<?php echo $jsonargs;?>' data-template="column_grid" id="<?php echo $containerid;?>" data-innerargs='<?php echo $json_innerargs;?>'>  
            <?php elseif (rehub_option('category_layout') == 'dealgrid') : ?>
                <div class="rh-flex-eq-height <?php echo $col_wrap; echo $infinitescrollwrap;?>" data-filterargs='<?php echo $jsonargs;?>' data-template="compact_grid" id="<?php echo $containerid;?>" data-innerargs='<?php echo $json_innerargs;?>'>
            <?php elseif (rehub_option('category_layout') == 'dealgridfull') : ?>
                <div class="rh-flex-eq-height <?php echo $col_wrap; echo $infinitescrollwrap;?>" data-filterargs='<?php echo $jsonargs;?>' data-template="compact_grid" id="<?php echo $containerid;?>" data-innerargs='<?php echo $json_innerargs;?>'>                               
            <?php else : ?>
                <div class="rh-flex-eq-height <?php echo $col_wrap; echo $infinitescrollwrap;?>" data-filterargs='<?php echo $jsonargs;?>' data-template="column_grid" id="<?php echo $containerid;?>" data-innerargs='<?php echo $json_innerargs;?>'>    
            <?php endif ;?>
            <?php 
            $args = apply_filters('rh_category_args_query', $args);
            $wp_query = new WP_Query($args);
            do_action('rh_after_category_args_query', $wp_query);
            if ( $wp_query->have_posts() ) : ?>
                <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                    <?php if (rehub_option('category_layout') == 'list') : ?>
                        <?php include(rh_locate_template('inc/parts/query_type1.php')); ?>
                    <?php elseif (rehub_option('category_layout') == 'grid') : ?>
                        <?php include(rh_locate_template('inc/parts/column_grid.php')); ?>
                    <?php elseif (rehub_option('category_layout') == 'gridfull') : ?>
                        <?php include(rh_locate_template('inc/parts/column_grid.php')); ?>
                    <?php elseif (rehub_option('category_layout') == 'dealgrid') : ?>
                        <?php include(rh_locate_template('inc/parts/compact_grid.php')); ?>
                    <?php elseif (rehub_option('category_layout') == 'dealgridfull') : ?>
                        <?php include(rh_locate_template('inc/parts/compact_grid.php')); ?>                  
                    <?php else : ?>
                        <?php include(rh_locate_template('inc/parts/column_grid.php')); ?>	
                    <?php endif ;?>
                <?php endwhile; ?>
                <?php if ($enable_pagination == '1' || $enable_pagination == '' ) :?>
                    <div class="pagination"><?php rehub_pagination();?></div>
                <?php elseif ($enable_pagination == '2' || $enable_pagination == '3' ) :?> 
                    <div class="re_ajax_pagination"><span data-offset="<?php echo $ajaxoffset;?>" data-containerid="<?php echo $containerid;?>" class="re_ajax_pagination_btn def_btn"><?php _e('Show next', 'rehubchild') ?></span></div>      
                <?php endif ;?>                

            <?php else : ?>		
                <h5><?php _e('Sorry. No posts in this category yet', 'rehubchild'); ?></h5>			   
            <?php endif; wp_reset_query(); ?>
            </div>
            <div class="clearfix"></div>
            <?php  $cat_data = get_option("category_$catID");?> 
            <?php if(!empty($cat_data['cat_second_description'])):?>
                <?php $cat_seo_description = $cat_data['cat_second_description'];?>
                <article class="cat_seo_description post"><?php echo do_shortcode($cat_seo_description);?></article>
            <?php endif;?>                     	
        </div>	
        <!-- /Main Side -->
        <?php if (rehub_option('category_layout') == 'gridfull' || rehub_option('category_layout') == 'dealgridfull') : ?>
        <?php else:?>
            <!-- Sidebar -->
            <?php get_sidebar(); ?>
            <!-- /Sidebar --> 
        <?php endif ;?>
    </div>
</div>
<!-- /CONTENT -->     
<!-- FOOTER -->
<?php get_footer(); ?>