<p class="hide-if-no-js">
    <a title="Set Footer Image" href="javascript:;" id="set-footer-thumbnail">Set featured image</a>
</p>

<div id="featured-footer-image-container" class="hidden">
    <img src="<?php echo get_post_meta( $post->ID, 'footer-thumbnail-src', true ); ?>" alt="">
</div>

<p class="hide-if-no-js hidden">
    <a title="Remove Footer Image" href="javascript;" id="remove-footer-thumbnail">Remove Featured Footer Image</a>
</p><!-- /.hide-if-no-js -->

<p id="featured-footer-image-meta">
    <input type="hidden" id="footer-thumbnail-src" name="footer-thumbnail-src" value="<?php echo esc_attr( get_post_meta( $post->ID, 'footer-thumbnail-src', true ) ); ?>" />
    <input type="hidden" id="footer-thumbnail-title" name="footer-thumbnail-title" value="<?php echo esc_attr( get_post_meta( $post->ID, 'footer-thumbnail-title', true ) ); ?>" />
    <input type="hidden" id="footer-thumbnail-alt" name="footer-thumbnail-alt" value="<?php echo esc_attr( get_post_meta( $post->ID, 'footer-thumbnail-alt', true ) ); ?>" />
</p><!-- #featured-footer-image-meta -->
