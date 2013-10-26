<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) { ?>
			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
			<?php return;
		}
	}
	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!-- Start editing here. -->

<?php if ($comments) : ?>
	<h3><?php comments_number('No Comments', 'One Comment', '% Comments' );?> on &#8220;<?php the_title(); ?>&#8221;</h3>

	<ul class="commentlist" style="-moz-padding-start: 0;">

	<?php foreach ($comments as $comment) : ?>

		<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
		
			<p class="comment-info" style="margin-top: 20px;font-size:10px;"><?php echo get_avatar( $comment, 32 ); ?>
			<?php comment_author_link() ?><br />
			<?php if ($comment->comment_approved == '0') : echo "<em>Your comment is awaiting moderation.</em>"; endif; ?>
			</p>

			<?php comment_text() ?>

            <p class="comment-info" style="font-size:10px;"><?php comment_date('m-d-y') ?> &#187;
			<?php comment_time() ?> &#187;
			<?php edit_comment_link('edit','',''); ?>
            </p>
		</li>

		<?php $oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : ''; ?>

	<?php endforeach; ?>

	</ul>

	<?php else : // this is displayed if there are no comments so far ?>

		<?php if ('open' == $post->comment_status) : ?>

		<?php else : ?>
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<h3>Leave a Comment</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>

<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

 <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p>

<?php else : ?>

 <p class="clearfix" style="margin-bottom:0px;padding-bottom:0px;"><label for="author"><strong>Name:</strong> <?php if ($req) echo "(required)"; ?></label></p>
 <p class="clearfix" style="margin-top:0px;padding-top:0px;"><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" /></p>

 <p class="clearfix" style="margin-bottom:0px;padding-bottom:0px;"><label for="email"><strong>Email:</strong> (<?php if ($req) echo "required"; ?>)</label></p>
 <p class="clearfix" style="margin-top:0px;padding-top:0px;"><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" /></p>

 <p class="clearfix" style="margin-bottom:0px;padding-bottom:0px;"><label for="url"><strong>Website:</strong></label></p>
 <p style="margin-top:0px;padding-top:0px;"><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /></p>

<?php endif; ?>

 <p class="clearfix" style="margin-bottom:0px;padding-bottom:0px;"><label for="comment"><strong>Comment:</strong></label></p>
 <p style="margin-top:0px;padding-top:0px;"><textarea name="comment" id="comment" cols="50%" rows="10" tabindex="4"></textarea></p>

 <p class="clearfix"><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" /></p>
 <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; endif; ?>
