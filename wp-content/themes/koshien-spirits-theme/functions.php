<?php //子テーマ用関数
if ( !defined( 'ABSPATH' ) ) exit;

//子テーマ用のビジュアルエディタースタイルを適用
add_editor_style();

//以下に子テーマ用の関数を書く
add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'main-contents', [ // 投稿タイプ名の定義
    'labels' => [
      'name'          => 'メインページ', // 管理画面上で表示する投稿タイプ名
      'singular_name' => 'main-content',    // カスタム投稿の識別名
    ],
    'public'        => true,  // 投稿タイプをpublicにするか
    'has_archive'   => false, // アーカイブ機能ON/OFF
    'menu_position' => 5,     // 管理画面上での配置場所
    'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
  ]);
}

//スキン切り替えデモ追加
add_shortcode('skin', function (){
  $skin = isset($_GET['theme-switch']) ? esc_html($_GET['theme-switch']) : null;
  if (empty($skin) && isset($_COOKIE['theme-switch'])) {
    $skin = esc_html($_COOKIE['theme-switch']);
  }
  $url = get_permalink().'?';
  ob_start();
?>
<select id="theme-switch" class="theme-switch-dropdown" onchange="document.cookie = this.options[this.selectedIndex].value;window.document.location.href='<?php echo $url; ?>'+this.options[this.selectedIndex].value;">
  <option value="theme-switch=reset" <?php the_option_selected($skin, null); ?>>▼デザインスキンを選択</option>
  <option value="theme-switch=skin-romado02-fancy_green" <?php the_option_selected($skin, 'skin-romado02-fancy_green'); ?>>テンプレート02・ファンシー緑</option>
  <option value="theme-switch=skin-romado02-chic_blue" <?php the_option_selected($skin, 'skin-romado02-chic_blue'); ?>>テンプレート02・和風青</option>

</select>
<?php
  return ob_get_clean();
});

function get_skin_url(){
  $ts = isset($_SESSION['theme-switch']) ? $_SESSION['theme-switch'] : null;
  if (isset($_GET['theme-switch'])) {
    $_SESSION['theme-switch'] = esc_html($_GET['theme-switch']);
  }
  $gts = isset($_GET['theme-switch']) ? $_GET['theme-switch'] : null;
  $ts = empty($ts) ? $gts : $ts;

  switch ($ts) {
    case 'reset':
      //case 'cocoon-master':
      $_SESSION['theme-switch'] = '';
      return;
      break;

    default:
      $path = get_stylesheet_directory().'/skins/'.$ts;
      if ($ts && file_exists($path)) {
        return esc_url(get_stylesheet_directory_uri().'/skins/'.$ts.'/style.css');
      } else {
        return  esc_url(get_theme_option(OP_SKIN_URL, ''));
      }
      break;
  }
}

//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types){

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );

    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');