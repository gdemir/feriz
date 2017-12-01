<h4 class="page-title">Aktivasyonlar</h4>

<table class="table table-bordered table-hover" id="activation-dashboard">
	<thead>
		<tr>
			<td width="150"><b>#</b></td>
			<td><b>Aktif</b></td>
			<td><b>Pasif</b></td>
			<td><b>Toplam</b></td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Toplam</td>
			<td><?= $activation_live_count; ?></td>
			<td><?= $activation_dead_count; ?></td>
			<td><?= $activation_live_count + $activation_dead_count;  ?></td>
		</tr>
		<tr>
			<td>İşlem</td>
			<td>
				<a href="/admin/activations/destroy_live" type="submit" class="btn btn-success" onClick="return confirm('Aktif aktivasyonları silmek istediğinizden emin misiniz?');" title="Aktif Sil">
					<i class="fa fa-trash"></i>
				</a>
			</td>
			<td>
				<a href="/admin/activations/destroy_dead" type="submit" class="btn btn-danger" onClick="return confirm('Pasif aktivasyonları silmek istediğinizden emin misiniz?');" title="Pasif Sil">
					<i class="fa fa-trash"></i>
				</a>
			</td>
			<td>
				<a href="/admin/activations/destroy_all" type="submit" class="btn btn-default" onClick="return confirm('Tüm aktivasyonları silmek istediğinizden emin misiniz?');" title="Tümünü Sil">
					<i class="fa fa-trash"></i>
				</a>
			</td>
		</tr>
	</tbody>
</table>

<table id="example" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>İd</th>
			<th>Kullanıcı</th>
			<th>Oluştu</th>
			<th>Düzenlendi</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php if ($activations) { ?>
		<?php foreach ($activations as $activation) { ?>

		<tr>
			<td><?= $activation->id; ?></td>
			<td><?= $activation->user->full_name(); ?></td>
			<td><?= $activation->created_at; ?></td>
			<td><?= $activation->updated_at; ?></td>

			<td>
				<form action="/admin/activations/destroy" method="post">
					<input type="hidden" value="<?= $activation->id; ?>" id="id" name="id"/>
					<button type="submit" class="btn btn-default" onClick="return confirm('Bu kaydı silmek istediğinizden emin misiniz?');" title="Sil">
						<i class="fa fa-trash"></i>
					</button>
				</form>
			</td>
		</tr>

		<?php } ?>
		<?php } else { ?>
		<tr class="text-center"><td colspan="4">Henüz Aktivasyon mevcut değil</td></tr>
		<?php } ?>
	</tbody>
</table>