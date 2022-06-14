<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Validasi Lahan Pertanian
		<small>Control Panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li><a href="#">Validasi Lahan Pertanian</a></li>
		<!-- <li class="active">Blank page</li> -->
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data Lahan Pertanian</h3>
			<div class="pull-right">
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama Pemilik</th>
						<th>Luas</th>
						<th>Meter</th>
						<th>Desa</th>
						<th>Kecamatan</th>
						<th>Latitude</th>
						<th>Longtitude</th>
						<th>Foto</th>
						<th>Action</th>
					<tr>
				</thead>
				<tbody>
					<?php $no = 1;
                    foreach($row->result() as $key => $data) { ?>
					<tr>
						<td><?=$no++?>.</td>
						<td><?=$data->namapemilik?></td>
						<td><?=$data->luas?></td>
						<td><?=$data->meter?></td>
						<td><?=$data->desa?></td>
						<td><?=$data->kecamatan?></td>
						<td><?=$data->latitude?></td>
						<td><?=$data->longtitude?></td>
						<td>
							<img src="<?=$data->foto?>" style="width:100px; height: 80px" />
						</td>
						<td class="text-center" width="160px" style="display:flex">
							<?php if($data->status == 0){ ?>
                                <div class="">
                                    <form action="<?=site_url('validasilahan/accept')?>" method="post">
                                        <input type="hidden" name="id_lahan" value="<?=$data->id_lahan?>">
                                        <button onclick="return confirm('Apakah Anda yakin ingin menerima Data ini?')"
                                            class="btn btn-primary btn-xs">
                                            <i class="fa fa-plus"></i> Terima
                                        </button>
                                    </form>
                                </div>
                            <?php }else{ ?>
                                Terkonfirmasi
                            <?php } ?>
							<div class="" style="margin-left:10px">
								<form action="<?=site_url('validasilahan/delete')?>" method="post">
									<input type="hidden" name="id_lahan" value="<?=$data->id_lahan?>">
									<button onclick="return confirm('Apakah Anda yakin ingin menghapus Data ini?')"
										class="btn btn-danger btn-xs">
										<i class="fa fa-trash"></i> Hapus
									</button>
								</form>
							</div>

						</td>
					<tr>
						<?php 
                    } ?>
				</tbody>
			</table>
		</div>
	</div>

</section>
