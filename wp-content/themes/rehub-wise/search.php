<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php get_header(); ?>
<?php
if (rehub_option('search_layout') == 'grid'){
    $col_wrap = 'col_wrap_three';
    $columns = '3_col';    
}  
elseif (rehub_option('search_layout') == 'dealgrid'){
    $col_wrap = 'col_wrap_three eq_grid post_eq_grid';
    $columns = '3_col';    
} 
elseif (rehub_option('search_layout') == 'gridfull'  ){
    $col_wrap = 'col_wrap_fifth';
    $columns = '5_col';    
} 
elseif (rehub_option('search_layout') == 'dealgridfull'  ){
    $col_wrap = 'col_wrap_fifth eq_grid post_eq_grid';
    $columns = '5_col';    
} 
else {
   $col_wrap = 'col_wrap_three';
   $columns = '3_col';
} 
$price_meta = rehub_option('price_meta_grid');
$enable_btn = $disable_meta = $exerpt_count = '';
$disable_btn = (rehub_option('rehub_enable_btn_recash') == 1) ? 0 : 1;
$disable_act = (rehub_option('disable_grid_actions') == 1) ? 1 : 0;
$aff_link = (rehub_option('disable_inner_links') == 1) ? 1 : 0;
?>
<!-- CONTENT -->
<div class="rh-container"> 
    <div class="rh-content-wrap clearfix">
          <!-- Main Side -->
          <div class="main-side clearfix<?php if (rehub_option('search_layout') == 'gridfull' || rehub_option('search_layout') == 'dealgridfull') : ?> full_width<?php endif ;?>">
            <?php $cursearch = get_search_query();?>

            <div class="wpsm-title middle-size-title wpsm-cat-title"><h5><span><?php _e('Search results for:', 'rehubchild'); ?></span> <?php echo esc_html($cursearch); ?></h5></div>             
            <?php if (rehub_option('search_layout') == 'list') : ?>
                <div>
            <?php elseif (rehub_option('search_layout') == 'grid') : ?>
                <div class="rh-flex-eq-height <?php echo $col_wrap; ?>">
            <?php elseif (rehub_option('search_layout') == 'gridfull') : ?>
                <div class="rh-flex-eq-height <?php echo $col_wrap; ?>">  
            <?php elseif (rehub_option('search_layout') == 'dealgrid') : ?>
                <div class="rh-flex-eq-height <?php echo $col_wrap; ?>">
            <?php elseif (rehub_option('search_layout') == 'dealgridfull') : ?>
                <div class="rh-flex-eq-height <?php echo $col_wrap; ?>">                               
            <?php else : ?>
                <div class="rh-flex-eq-height <?php echo $col_wrap;?>">    
            <?php endif ;?>
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php if (rehub_option('search_layout') == 'list') : ?>
                    <?php include(rh_locate_template('inc/parts/query_type1.php')); ?>
                <?php elseif (rehub_option('search_layout') == 'grid') : ?>
                    <?php include(rh_locate_template('inc/parts/column_grid.php')); ?>
                <?php elseif (rehub_option('search_layout') == 'gridfull') : ?>
                    <?php include(rh_locate_template('inc/parts/column_grid.php')); ?>
                <?php elseif (rehub_option('search_layout') == 'dealgrid') : ?>
                    <?php include(rh_locate_template('inc/parts/compact_grid.php')); ?>
                <?php elseif (rehub_option('search_layout') == 'dealgridfull') : ?>
                    <?php include(rh_locate_template('inc/parts/compact_grid.php')); ?>                  
                <?php else : ?>
                    <?php include(rh_locate_template('inc/parts/column_grid.php')); ?> 
                <?php endif ;?>              
            <?php endwhile; ?>
            <?php rehub_pagination(); ?>
            <?php else : ?>     
            <h5><?php _e('Sorry. No posts for this search', 'rehubchild'); ?></h5>    
            <?php endif; ?> 
            </div>
            <div class="clearfix"></div>
        </div>  
        <!-- /Main Side -->
        <?php if (rehub_option('search_layout') != 'gridfull' || rehub_option('search_layout') == 'dealgridfull') : ?>
            <!-- Sidebar -->
            <?php get_sidebar(); ?>
            <!-- /Sidebar --> 
        <?php endif ;?>
    </div>
</div>
<!-- /CONTENT -->     
<!-- FOOTER -->
<?php get_footer(); ?>