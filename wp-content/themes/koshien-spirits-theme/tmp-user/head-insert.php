<?php
//ヘッダー部分（<head></head>内）にタグを挿入したいときは、このテンプレートに挿入（ヘッダーに挿入する解析タグなど）
//子テーマのカスタマイズ部分を最小限に抑えたい場合に有効なテンプレートとなります。
//例：<script type="text/javascript">解析コード</script>
?>
<?php if (!is_user_administrator()) :
//管理者を除外してカウントする場合は以下に挿入?>
<?php endif; ?>
<?php //全ての訪問者をカウントする場合は以下に挿入?>
<link rel='stylesheet' id='koshien-spirits-theme-css'
  href='<?php echo get_stylesheet_directory_uri() ?>/library/css/base.min.css?ver=<?php echo date('U'); ?>'
  media='all' />
<link rel="SHORTCUT ICON" href="https://koshien-spirits.com/favicon.ico" />