<?php
/**
 * Your Inspiration Themes
 *
 * @package WordPress
 * @subpackage Your Inspiration Themes
 * @author Your Inspiration Themes Team <info@yithemes.com>
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */
?>

<?php if ( $has_thumbnail ): ?>
    <div class="thumbnail span4">
        <?php yit_image( "size=blog_small_image&alt=blogimage" );  ?>

        <?php if( yit_get_option( 'blog-show-date' ) ): ?>
            <div class="blog-small-image-date">
                <span class="month"><?php echo get_the_date( 'M' ) ?></span>
                <span class="day"><?php echo get_the_date( 'd' ) ?></span>
            </div>
        <?php endif ?>
        <?php if( yit_get_option( 'blog-show-comments' ) && comments_open() ) : ?>
            <div class="blog-small-image-comment">
                <?php
                    $icon = yit_get_option('blog-comments-icon');
                    if ( $icon['custom'] != '' ) $comment_icon='<img src="'.$icon['custom'].'" class="comment-icon">';
                    else $comment_icon = '<i class="blog-icon '.$icon['icon'].'"></i>';
                ?>
                <span class="comments"><?php echo $comment_icon ?></span>
                <?php comments_popup_link( __('0', 'yit'), __('1', 'yit'), __('%', 'yit') ); ?>

            </div>
        <?php endif ?>
    </div>
<?php endif ?>