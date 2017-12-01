<h4 class="page-title"><?= t("home.albums"); ?></h4>
<ol class="breadcrumb text-right">
  <li><a href="/"><?= t("home.link"); ?></a></li>
  <li class="active"><?= t("home.albums"); ?></li>
</ol>

<style>
  .thumbnail {
    position: relative;
    overflow: hidden;
  }

  .caption {
    position: absolute;
    top: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.2);
    width: 100%;
    height: 100%;
    padding: 2%;
    display: none;
    text-align: center;
    color: #fff !important;
    z-index: 2;
  }
</style>

<script type="text/javascript">
  $( document ).ready(function() {

    $('.thumbnail').hover(
      function(){
        $(this).find('.caption').fadeToggle("slow"); //.fadeIn(250)
      },
      function(){
        $(this).find('.caption').fadeToggle("slow"); //.fadeOut(205)
      }
      );
  });
</script>

<div class="container-fluid">

  <div class="row">
    <?php if ($albums) { ?>
    <?php foreach ($albums as $album) { ?>

    <?php $albumimage_first = Albumimage::load()->where("album_id", $album->id)->first(); ?>
    <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12 animated zoomIn" style="margin-bottom: 20px">
      <a href="/home/albums/show/<?= $album->id; ?>" style="color:white">
        <div class="thumbnail">
          <img src="<?= $albumimage_first->image; ?>" alt="..." class="img-responsive" style="height:150px" />
          <div class="caption">
            <h3><i class="fa fa-search fa-3x"></i></h3>
          </div>
        </div>
      </a>
      <div class="margin-top:5px"><center><?= $album->name; ?></center></div>
    </div>

    <?php } ?>
    <?php } ?>
  </div>

</div>