<h4 class="page-title"><?= t("home.albums"); ?></h4>
<ol class="breadcrumb text-right">
  <li><a href="/"><?= t("home.link"); ?></a></li>
  <li><a href="/home/albums"><?= t("home.albums"); ?></a></li>
  <li class="active"><?= $album->name; ?></li>
</ol>

<h3 class='label label-default pull-right'><?= $album->album_date; ?></h3>
<h4 class="page-title-sub text-center"><?= $album->name; ?></h4>

<!-- The Gallery as lightbox dialog, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery">
  <div class="slides"></div>
  <h3 class="title"></h3>
  <a class="prev">‹</a>
  <a class="next">›</a>
  <a class="close">×</a>
  <a class="play-pause"></a>
  <ol class="indicator"></ol>
</div>

<div id="links">
  <?php if ($albumimages) { ?>
  <?php foreach($albumimages as $albumimage) { ?>
  <a href="<?= $albumimage->image; ?>" class="img-thumbnail animated flipInY" title="<?= $album->name; ?>">
    <img src="<?= $albumimage->image; ?>" style='min-width:200px;width:200px;min-height:200px;height:200px;'>
  </a>
  <?php } ?>
  <?php } ?>
</div>

<script>
  document.getElementById('links').onclick = function (event) {
    event = event || window.event;
    var target = event.target || event.srcElement,
    link = target.src ? target.parentNode : target,
    options = {index: link, event: event},
    links = this.getElementsByTagName('a');
    blueimp.Gallery(links, options);
  };
</script>
<script>
  blueimp.Gallery(
    document.getElementById('links').getElementsByTagName('a'),
    {
      container: '#blueimp-gallery-carousel',
      carousel: true
    }
    );
  </script>