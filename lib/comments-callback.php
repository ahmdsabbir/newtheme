<?php
if( ! function_exists( '_themename_comment_callback' ) ):
function _themename_comment_callback($comment, $args, $depth) {
    ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

    <!-- parent div container-->
<<<<<<< HEAD
  <div class="comment-parent">
    <!-- commentators image, name and comment time  and also replay container starts-->

    <div class="comment-img-container">
=======
  <div class="commnentator">
    <!-- commentators image, name and comment time  and also replay container starts-->

    <div class="commnentator-img-container">
>>>>>>> 3215e3b32c3c2da66c91248245a18e1401c66fbb
      <?php echo get_avatar($comment,$size='80',$default='http://0.gravatar.com/avatar/36c2a25e62935705c5565ec465c59a70?s=32&d=mm&r=g' ); ?>
    </div>

    <!-- Approval MSG-->
    <?php if ($comment->comment_approved == '0') : ?>
        <em><?php esc_html_e('Your comment is awaiting moderation.','5balloons_theme') ?></em>
        <br />
    <?php endif; ?>
    <!-- Approval MSG-->

<<<<<<< HEAD
    <div class="comment-name-meta"><!-- commentator meta and name container-->
      
     <div>
          <strong><?php echo get_comment_author() ?></strong>
     </div>

     <div>
          <time>
        <?php printf(/* translators: 1: date and time(s). */ esc_html__('%1$s at %2$s' , '5balloons_theme'), get_comment_date(),  get_comment_time()) ?>
      </time>
     </div>
=======
    <div class="commentator-name-meta"><!-- commentator meta and name container-->
      
      <strong><?php echo get_comment_author() ?></strong>

      <time>
        <?php printf(/* translators: 1: date and time(s). */ esc_html__('%1$s at %2$s' , '5balloons_theme'), get_comment_date(),  get_comment_time()) ?>
      </time>
>>>>>>> 3215e3b32c3c2da66c91248245a18e1401c66fbb

    </div><!-- commentator meta and name container end -->

    <span class="comment-reply">
      <a href="#"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></a>
    </span>

  </div> <!-- commentators image, name and comment time  and also replay container ends-->

<<<<<<< HEAD
   <div class="comment-text">
    <?php comment_text() ?>
  </div> 
  
  

<?php
        }
endif;
=======
  <p>
    <?php comment_text() ?>
  </p>

<?php
        }
endif;
>>>>>>> 3215e3b32c3c2da66c91248245a18e1401c66fbb
