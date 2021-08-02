<script>
  //スムーズスクロール
  jQuery(function($) {
    $('a[href*=#]').click(function() {
      var speed = 500;
      var href = $(this).attr('href');
      var url = location.protocol + '//' + location.hostname + location.pathname;
      href = href.replace(url, '');
      var target = $(href == '#' || href == '' ? 'html' : href);
      if (target.size() < 1) return true;
      var position = target.offset().top;
      $('html, body').animate({
        scrollTop: position
      }, speed, 'swing');
      return false;
    });
  });
</script>
<?php
//フッター部分に解析タグを挿入したいときはこのテンプレートに挿入
//子テーマのカスタマイズ部分を最小限に抑えたい場合に有効なテンプレートとなります。
?>
<?php if (!is_user_administrator()) :
//管理者を除外してカウントする場合は以下に挿入?>

<?php endif; ?>
<?php //全ての訪問者をカウントする場合は以下に挿入
