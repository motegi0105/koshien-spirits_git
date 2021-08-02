<?php //通常ページとAMPページの切り分け
/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 * @Template Name: メインページ
 */
if (!defined('ABSPATH')) {
    exit;
}

if (!is_amp()) {
    get_header();
} else {
    get_template_part('tmp/amp-header');
}
?>

<?php
$postID = get_the_ID();   // 閲覧中のページ=メインページのIDを取得）
$args = array(
  'exclude' => $postID,   // 閲覧中のページ=メインページを除外する
  'post_type' => 'main-contents',  // 固定ページを指定
  'posts_per_page' => -1, // 取得件数：全件取得
);

$myposts = get_posts($args);
foreach ($myposts as $post):
  setup_postdata($post);
?>

<section id="<?php echo esc_attr($post->post_name); ?>">
  <div class="section-in">
    <h2 class="section-title"><?php the_title(); ?>
    </h2>
    <?php the_content(); ?>
  </div>
</section>

<?php
endforeach;
wp_reset_postdata();
?>

<?php get_footer();
