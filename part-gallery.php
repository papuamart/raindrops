<?php
/**
 * Template part file part-gallery
 *
 * @package Raindrops
 * @since Raindrops 0.940
 *
 */
?><div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<h2 class="entry-title h2"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'Raindrops' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
</h2>

<div class="entry-meta-gallery">
<?php raindrops_posted_on(); ?>
</div>

<div class="entry-content">
<?php
$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );

$total_images = count( $images );
$image = array_shift( $images );
$attachment_page = $image->post_title;
?>
<div class="gallery-thumb"><?php echo wp_get_attachment_link( $image->ID ,array(150,150),true); ?></div>
<?php the_content( __( 'Continue&nbsp;reading&nbsp;<span class="meta-nav">&rarr;</span>', 'Raindrops' ) ); ?>
<div class="clearfix"></div>

<p style="margin:1em;"><em><?php echo sprintf( __( 'This gallery contains %1$s photographs in all as ', 'Raindrops' ),$total_images).'&nbsp;'.wp_get_attachment_link( $image->ID ,false,true).'&nbsp;'.__('photograph etc.','Raindrops');?></em></p>
</div>

<div class="entry-utility entry-meta">
<?php
$category_id = get_cat_ID( 'Gallery' );
$category_link = get_category_link( $category_id );

printf(
    '<a href="%s" title="%s">%s</a> | ',
    esc_url($category_link),
    esc_attr__( 'View posts in the Gallery category', 'Raindrops' ),
    __( 'More Galleries', 'Raindrops' )
    );
?>
<span class="comments-link">
<?php comments_popup_link( __( 'Leave a comment', 'Raindrops' ), __( '1 Comment', 'Raindrops' ), __( '% Comments', 'Raindrops' ) ); ?>
</span>
<?php edit_post_link( __( 'Edit', 'Raindrops' ), '<span class="edit-link">', '</span>' ); ?>
<?php		raindrops_delete_post_link( __( 'Trash', 'Raindrops' ), '<span class="edit-link">', '</span>' ); ?>
</div>
<?php if(is_single()){  raindrops_prev_next_post('nav-below');}?>

<?php comments_template( '', true ); ?>
</div>