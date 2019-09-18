<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php get_header(); ?>
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
if (rehub_option('archive_layout') == 'grid'){
    $col_wrap = 'col_wrap_three';
    $columns = '3_col';   
    if($show == 10){$show = 12;} 
}  
elseif (rehub_option('archive_layout') == 'dealgrid'){
    $col_wrap = 'col_wrap_three eq_grid post_eq_grid';
    $columns = '3_col'; 
    if($show == 10){$show = 12;}   
} 
elseif (rehub_option('archive_layout') == 'gridfull'  ){
    $col_wrap = 'col_wrap_fifth';
    $columns = '5_col';    
} 
elseif (rehub_option('archive_layout') == 'dealgridfull'  ){
    $col_wrap = 'col_wrap_fifth eq_grid post_eq_grid';
    $columns = '5_col';    
} 
else {
   $col_wrap = 'col_wrap_three';
   $columns = '3_col';
    if($show == 10){$show = 12;}
} 
$containerid = 'rh_loop_' . uniqid();
$ajaxoffset = $show; 
$price_meta = rehub_option('price_meta_grid');
$args = array(
    'posts_per_page' => $show,
    'ignore_sticky_posts'=> 1,
    'paged' => $paged
);
$enable_btn = $disable_meta = $exerpt_count = '';
$disable_btn = (rehub_option('rehub_enable_btn_recash') == 1) ? 0 : 1;
$disable_act = (rehub_option('disable_grid_actions') == 1) ? 1 : 0;
$aff_link = (rehub_option('disable_inner_links') == 1) ? 1 : 0;
$additional_vars = array('exerpt_count'=> '', 'disable_meta'=>'', 'enable_btn'=>'', 'disable_btn'=>$disable_btn, 'disable_act'=>$disable_act, 'price_meta' => $price_meta, 'aff_link'=>$aff_link);
$jsonargs = json_encode($args);
$json_innerargs = json_encode($additional_vars);


?>

<!-- CONTENT -->
<div class="rh-container"> 
    <div class="rh-content-wrap clearfix">
        <!-- Main Side -->
        <div class="main-side clearfix<?php if (rehub_option('archive_layout') == 'gridfull' || rehub_option('archive_layout') == 'dealgridfull') : ?> full_width<?php endif ;?>">
            <?php if (rehub_option('archive_layout') == 'list') : ?>
                <div class="<?php echo $infinitescrollwrap;?>" data-filterargs='<?php echo $jsonargs;?>' data-template="query_type1" id="<?php echo $containerid;?>">
            <?php elseif (rehub_option('archive_layout') == 'grid') : ?>
                <div class="rh-flex-eq-height <?php echo $col_wrap; echo $infinitescrollwrap;?>" data-filterargs='<?php echo $jsonargs;?>' data-template="column_grid" id="<?php echo $containerid;?>" data-innerargs='<?php echo $json_innerargs;?>'>
            <?php elseif (rehub_option('archive_layout') == 'gridfull') : ?>
                <div class="rh-flex-eq-height <?php echo $col_wrap; echo $infinitescrollwrap;?>" data-filterargs='<?php echo $jsonargs;?>' data-template="column_grid" id="<?php echo $containerid;?>" data-innerargs='<?php echo $json_innerargs;?>'>  
            <?php elseif (rehub_option('archive_layout') == 'dealgrid') : ?>
                <div class="rh-flex-eq-height <?php echo $col_wrap; echo $infinitescrollwrap;?>" data-filterargs='<?php echo $jsonargs;?>' data-template="compact_grid" id="<?php echo $containerid;?>" data-innerargs='<?php echo $json_innerargs;?>'>
            <?php elseif (rehub_option('archive_layout') == 'dealgridfull') : ?>
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
                    <?php if (rehub_option('archive_layout') == 'list') : ?>
                        <?php include(rh_locate_template('inc/parts/query_type1.php')); ?>
                    <?php elseif (rehub_option('archive_layout') == 'grid') : ?>
                        <?php include(rh_locate_template('inc/parts/column_grid.php')); ?>
                    <?php elseif (rehub_option('archive_layout') == 'gridfull') : ?>
                        <?php include(rh_locate_template('inc/parts/column_grid.php')); ?>
                    <?php elseif (rehub_option('archive_layout') == 'dealgrid') : ?>
                        <?php include(rh_locate_template('inc/parts/compact_grid.php')); ?>
                    <?php elseif (rehub_option('archive_layout') == 'dealgridfull') : ?>
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
        </div>  
        <!-- /Main Side -->
        <?php if (rehub_option('archive_layout') == 'gridfull' || rehub_option('archive_layout') == 'dealgridfull') : ?>
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