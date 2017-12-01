<h4 class="page-title"><?= t("home.agendas"); ?></h4>
<ol class="breadcrumb text-right">
	<li><a href="/"><?= t("home.link"); ?></a></li>
	<li class="active"><?= t("home.agendas"); ?></li>
</ol>

<h5 class="page-title-sub"><?= t("home.agenda_search"); ?></h5>
<form class="login-form" accept-charset="UTF-8" method="post" action="/home/agendas">
	<div class="row">
		<div class="col-xs-0 col-md-3">
		</div >
		<div class="col-xs-5 col-md-3">
			<input type="text" placeholder="Başlangıç Tarihi" class="form-control" size="50" name="prev_date" id="prev_date" value="<?= $prev_date; ?>"/>
		</div >
		<div class="col-xs-5 col-md-3">
			<input type="text" placeholder="Bitiş Tarihi" class="form-control" size="50" name="next_date" id="next_date" value="<?= $next_date; ?>"/>
		</div>
		<div class="col-xs-2 col-md-3">
			<button type="submit" class="btn btn-primary" style="width:100%"><i class="fa fa-search"></i></button>
		</div>
	</div>
</form>
<hr>
<script type="text/javascript">
$(document).ready(function() {
	$.fn.datepicker.defaults.language = 'tr';
	$("#prev_date").datepicker({
		format: "yyyy-mm-dd"
	});
	$("#next_date").datepicker({
		format: "yyyy-mm-dd"
	});
});
</script>

<?php if ($agendas) { ?>
<?php foreach($agendas as $agenda) { ?>
<?php
$agendaimages = $agenda->all_of_agendaimage;
$agenda_image_first = $agendaimages[0];
?>

<div class="row">

	<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">
		<img src="<?= $agenda_image_first->image; ?>" class="img-thumbnail" data-toggle="modal" data-target="#<?= $agenda_image_first->id; ?>" style="max-height:200px"/>
	</div>

	<div class="modal fade" id="<?= $agenda_image_first->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<img src="<?= $agenda_image_first->image; ?>" class="img-thumbnail" id="<?= $agenda_image_first->id; ?>" style="width:100%"/>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
		<h4 class="label label-default pull-right"><?= $agenda->agenda_date; ?></h4>
		<h3>
			<a href="/home/agendas/show/<?= $agenda->id; ?>"><?= $agenda->subject; ?></a>
		</h3>
		<p><?= substr(h($agenda->content), 0, 550) . "..."; ?></p>
	</div>

</div>
<hr>

<?php } ?>
<?php } ?>

<center>
	<ul class="pagination">
		<li>
			<?php if ($page_prev != 0) { ?>

			<form style="display:inline" action="/home/agendas" accept-charset="UTF-8" method="post">
				<input type="hidden" value="1" name="page" id="page" />
				<input type="hidden" value="<?= $prev_date; ?>" name="prev_date" id="prev_date" />
				<input type="hidden" value="<?= $next_date; ?>" name="next_date" id="next_date" />
				<button class="btn btn-default" aria-label="Previous"><span aria-hidden="true">&#60;</span></button>
			</form>

			<?php } ?>
		</li>
		<li>
			<?php if ($page_prev != 0) { ?>

			<form style="display:inline" action="/home/agendas" accept-charset="UTF-8" method="post">
				<input type="hidden" value="<?= $page_prev; ?>" name="page" id="page" />
				<input type="hidden" value="<?= $prev_date; ?>" name="prev_date" id="prev_date" />
				<input type="hidden" value="<?= $next_date; ?>" name="next_date" id="next_date" />
				<button class="btn btn-default"><span aria-hidden="true">&laquo;</span></button>
			</form>

			<?php } ?>
		</li>
		<?php for ($i = $page; $i < $page_next; $i++) { ?>

		<form style="display:inline" action="/home/agendas" accept-charset="UTF-8" method="post">
			<input type="hidden" value="<?= $i; ?>" name="page" id="page" />
			<input type="hidden" value="<?= $prev_date; ?>" name="prev_date" id="prev_date" />
			<input type="hidden" value="<?= $next_date; ?>" name="next_date" id="next_date" />
			<button class="btn btn-default"><span aria-hidden="true"><?= $i; ?></span></button>
		</form>

		<?php } ?>
		<li>
			<?php if ($page_next <= $page_count) { ?>

			<form style="display:inline" action="/home/agendas" accept-charset="UTF-8" method="post">
				<input type="hidden" value="<?= $page_next; ?>" name="page" id="page" />
				<input type="hidden" value="<?= $prev_date; ?>" name="prev_date" id="prev_date" />
				<input type="hidden" value="<?= $next_date; ?>" name="next_date" id="next_date" />
				<button class="btn btn-default"><span aria-hidden="true">&raquo;</span></button>
			</form>

			<?php } ?>
		</li>
		<li>
			<?php if ($page_next <= $page_count) { ?>

			<form style="display:inline" action="/home/agendas" accept-charset="UTF-8" method="post">
				<input type="hidden" value="<?= $page_count; ?>" name="page" id="page" />
				<input type="hidden" value="<?= $prev_date; ?>" name="prev_date" id="prev_date" />
				<input type="hidden" value="<?= $next_date; ?>" name="next_date" id="next_date" />
				<button class="btn btn-default" aria-label='Next'><span aria-hidden="true">&#62;</span></button>
			</form>

			<?php } ?>
		</li>
	</ul>
	<center>