<h4 class="page-title"><?= t("home.agendas"); ?></h4>
<ol class="breadcrumb text-right">
  <li><a href="/"><?= t("home.link"); ?></a></li>
  <li><a href="/home/agendas"><?= t("home.agendas"); ?></a></li>
  <li class="active"><?= $agenda->subject; ?></li>
</ol>

<h3 class='label label-default pull-right'><?= $agenda->agenda_date; ?></h3>
<h4 class="page-title-sub"><?= $agenda->subject; ?></h4>
<div class="container" style="display:block; word-wrap:break-word;">

  <p><?= $agenda->content; ?></p>

</div>

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

<hr>

<div id="links">
  <?php $agendaimages = $agenda->all_of_agendaimage; ?>
  <?php if ($agendaimages) { ?>
  <?php foreach($agendaimages as $agendaimage) { ?>
  <a href="<?= $agendaimage->image; ?>" class="img-thumbnail" title="<?= $agenda->subject; ?>">
    <img src="<?= $agendaimage->image; ?>" style="min-width:116px;width:116px;min-height:116px;height:116px;" />
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