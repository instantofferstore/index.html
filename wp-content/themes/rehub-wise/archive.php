<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php get_header(); ?>
<?php
if (rehub_option('archive_layout') == 'grid'){
    $col_wrap = 'col_wrap_three';
    $columns = '3_col';    
}  
elseif (rehub_option('archive_layout') == 'dealgrid'){
    $col_wrap = 'col_wrap_three eq_grid post_eq_grid';
    $columns = '3_col';    
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
        <div class="main-side clearfix<?php if (rehub_option('archive_layout') == 'gridfull' || rehub_option('archive_layout') == 'dealgridfull') : ?> full_width<?php endif ;?>">
            <?php
                if(isset($_GET['author_name'])) :
                $curauth = get_userdatabylogin($author_name);
            else :
                $curauth = get_userdata(intval($author));
            endif;?>

            <?php /* If this is a tag archive */ if( is_tag() ) { ?>
            <div class="wpsm-title middle-size-title wpsm-cat-title"><h5><span><?php _e('Tag:', 'rehubchild'); ?></span> <?php single_tag_title(); ?></h5></div>
            <article class='top_rating_text'><?php echo tag_description(); ?></article>				
            <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
            <div class="wpsm-title middle-size-title wpsm-cat-title"><h5><span><?php _e('Archive:', 'rehubchild'); ?></span> <?php the_time('F jS, Y'); ?></h5></div>
            <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
            <div class="wpsm-title middle-size-title wpsm-cat-title"><h5><span><?php _e('Browsing Archive', 'rehubchild'); ?></span> <?php the_time('F, Y'); ?></h5></div>
            <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
            <div class="wpsm-title middle-size-title wpsm-cat-title"><h5><span><?php _e('Browsing Archive', 'rehubchild'); ?></span> <?php the_time('Y'); ?></h5></div>			
            <?php } ?>  
            <?php if (rehub_option('archive_layout') == 'list') : ?>
                <div>
            <?php elseif (rehub_option('archive_layout') == 'grid') : ?>
                <div class="rh-flex-eq-height <?php echo $col_wrap; ?>">
            <?php elseif (rehub_option('archive_layout') == 'gridfull') : ?>
                <div class="rh-flex-eq-height <?php echo $col_wrap; ?>">  
            <?php elseif (rehub_option('archive_layout') == 'dealgrid') : ?>
                <div class="rh-flex-eq-height <?php echo $col_wrap; ?>">
            <?php elseif (rehub_option('archive_layout') == 'dealgridfull') : ?>
                <div class="rh-flex-eq-height <?php echo $col_wrap; ?>">                               
            <?php else : ?>
                <div class="rh-flex-eq-height <?php echo $col_wrap;?>">    
            <?php endif ;?>
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
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
            <?php rehub_pagination(); ?>
            <?php else : ?>		
            <h5><?php _e('Sorry. No posts in this category yet', 'rehubchild'); ?></h5>	
            <?php endif; ?>	
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