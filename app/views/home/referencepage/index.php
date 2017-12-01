<h4 class="page-title"><?= t("home.references"); ?></h4>
<ol class="breadcrumb text-right">
  <li><a href="/"><?= t("home.link"); ?></a></li>
  <li class="active"><?= t("home.references"); ?></li>
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
    <?php if ($references) { ?>
    <?php foreach ($references as $reference) { ?>

    <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12 animated zoomIn" style="margin-bottom: 20px">
      <a data-toggle="modal" data-target="#<?= $reference->id; ?>" style="color:white">
        <div class="thumbnail">
          <img src="<?= $reference->image; ?>" alt="..." class="img-responsive" style="height:150px" />
          <div class="caption">
            <h3><i class="fa fa-search fa-3x"></i></h3>
          </div>
        </div>
      </a>
      <div class="margin-top:5px"><center><?= $reference->name; ?></center></div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="<?= $reference->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button" aria-hidden="true">×</button>
          </div>

          <div class="modal-body">
            <div class="row">
              <div class="col-md-3 col-sm-6"><img src="<?= $reference->image; ?>" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"/></div>
              <div class="col-md-9 col-sm-6">
                <h5 class="page-title"><?= $reference->name; ?></h5>
                <p><?= $reference->content; ?></p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <?php } ?>
    <?php } ?>
  </div>

</div>