<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Dashboard
		<small>Control Panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li><a href="#">Dashboard</a></li>
		<!-- <li class="active">Blank page</li> -->
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Dashboard</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
					<i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<!-- =========================================================== -->

			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-aqua">
						<div class="inner">
							<h3>150</h3>

							<p>Validasi Lahan Pertanian</p>
						</div>
						<div class="icon">
							<i class="ion ion-pie-graph"></i>
						</div>
						<a href="<?=site_url('validasilahan')?>" class="small-box-footer">
							More info <i class="fa fa-arrow-circle-right"></i>
						</a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-green">
						<div class="inner">
							<h3>53<sup style="font-size: 20px">%</sup></h3>

							<p>Validasi Komoditas Hasil Panen</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<a href="<?=site_url('validasikomoditas')?>" class="small-box-footer">
							More info <i class="fa fa-arrow-circle-right"></i>
						</a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-yellow">
						<div class="inner">
							<h3>44</h3>

							<p>Input User Admin</p>
						</div>
						<div class="icon">
							<i class="ion ion-person-add"></i>
						</div>
						<a href="<?=site_url('user')?>" class="small-box-footer">
							More info <i class="fa fa-arrow-circle-right"></i>
						</a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-red">
						<div class="inner">
							<h3>65</h3>

							<p>Input Petugas</p>
						</div>
						<div class="icon">
							<i class="ion ion-person-add"></i>
						</div>
						<a href="<?=site_url('petugas')?>" class="small-box-footer">
							More info <i class="fa fa-arrow-circle-right"></i>
						</a>
					</div>
				</div>
				<!-- ./col -->
			</div>
			<!-- /.row -->

			<!-- =========================================================== -->

		</div>
		<!-- /.box-body -->
		<div class="box-footer">

			<!-- =========================================================== -->

			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-md-6">
						<!-- AREA CHART -->
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Chart Produksi</h3>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i
											class="fa fa-times"></i></button>
								</div>
							</div>
							<div class="box-body">
								<form action="">
									<div class="" style="width: 100%;display:flex; justify-content:space-between">
										<div class="" style="display:flex;align-items:center">
											<label for="">Awal : </label>
											<input type="date" name="awal" id="awal-produksi" style="margin-left: 10px">
										</div>
										<div class="" style="display:flex;align-items:center">
											<label for="">Akhir : </label>
											<input type="date" name="akhir" id="akhir-produksi" style="margin-left: 10px">
										</div>
                    <div class="">
                      <button class="btn" id="btnProduksi" style="background : #00C0EF; color: white">submit</button>
                    </div>
									</div>
								</form>
								<div class="chart">
									<canvas id="produksi-chart" style="height:250px"></canvas>
								</div>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->

						<!-- DONUT CHART -->
						<div class="box box-danger">
							<div class="box-header with-border">
								<h3 class="box-title">Chart Provitas</h3>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i
											class="fa fa-times"></i></button>
								</div>
							</div>
							<div class="box-body">
                  <div class="" style="width: 100%;display:flex; justify-content:space-between">
										<div class="" style="display:flex;align-items:center">
											<label for="">Awal : </label>
											<input type="date" name="awal" id="awal-provitas" style="margin-left: 10px">
										</div>
										<div class="" style="display:flex;align-items:center">
											<label for="">Akhir : </label>
											<input type="date" name="akhir" id="akhir-provitas" style="margin-left: 10px">
										</div>
                    <div class="">
                      <button class="btn" id="btnProvitas" style="background : #00C0EF; color: white">submit</button>
                    </div>
									</div>
								<canvas id="provitas-chart" style="height:250px"></canvas>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->

					</div>
					<!-- /.col (LEFT) -->
					<div class="col-md-6">
						<!-- LINE CHART -->
						<div class="box box-info">
							<div class="box-header with-border">
								<h3 class="box-title">Chart Luas Panen</h3>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i
											class="fa fa-times"></i></button>
								</div>
							</div>
							<div class="box-body">
                <div class="" style="width: 100%;display:flex; justify-content:space-between">
                  <div class="" style="display:flex;align-items:center">
                    <label for="">Awal : </label>
                    <input type="date" name="awal" id="awal-luasnpanen" style="margin-left: 10px">
                  </div>
                  <div class="" style="display:flex;align-items:center">
                    <label for="">Akhir : </label>
                    <input type="date" name="akhir" id="akhir-luasnpanen" style="margin-left: 10px">
                  </div>
                  <div class="">
                    <button class="btn" id="btnLuasPanen" style="background : #00C0EF; color: white">submit</button>
                  </div>
                </div>
                <canvas id="luaspanen-chart" style="height:250px"></canvas>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->

						<!-- BAR CHART -->
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title">Chart Luas Tambah Tanam</h3>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i
											class="fa fa-times"></i></button>
								</div>
							</div>
							<div class="box-body">
                <div class="" style="width: 100%;display:flex; justify-content:space-between">
                  <div class="" style="display:flex;align-items:center">
                    <label for="">Awal : </label>
                    <input type="date" name="awal" id="awal-luastambahtanam" style="margin-left: 10px">
                  </div>
                  <div class="" style="display:flex;align-items:center">
                    <label for="">Akhir : </label>
                    <input type="date" name="akhir" id="akhir-luastambahtanam" style="margin-left: 10px">
                  </div>
                  <div class="">
                    <button class="btn" id="btnLuasTambahTanam" style="background : #00C0EF; color: white">submit</button>
                  </div>
                </div>
								<canvas id="luastambahtanam-chart" style="height:250px"></canvas>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->

					</div>
					<!-- /.col (RIGHT) -->
				</div>
				<!-- /.row -->

			</section>
			<!-- /.content -->

			<!-- =========================================================== -->

		</div>
		<!-- /.box-footer-->

	</div>
	<!-- /.box -->

</section>
<!-- /.content -->

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script>
  let btnProduksi = document.getElementById('btnProduksi');
  btnProduksi.addEventListener('click', function(e) {
    e.preventDefault();

    let awal = document.getElementById('awal-produksi');
    let akhir = document.getElementById('akhir-produksi');
    console.log("AWAL ", awal.value);
    console.log("Akhir ", akhir.value);
    getDataProduksi(awal.value, akhir.value)
  })

  // Produksi Chart
  function getDataProduksi(awal = null, akhir = null) {
    var ctxProduksi = document.getElementById('produksi-chart').getContext('2d');

    let url = "<?php echo base_url() ?>/api/Chart/getChartProduksi";
    
    if(awal != null && akhir != null){
      url = `<?php echo base_url() ?>/api/Chart/getChartProduksi?awal=${awal}&akhir=${akhir}`;
    }

    $.ajax({
      method: 'GET',
      url : url,
      success : function(res) {
        res = JSON.parse(res);
        let labels = res.map(function(item) {
          return item['namakomoditas'];
        })
        let data = res.map(function(item) {
          return item['jumlah']
        })
        var produksiChart = new Chart(ctxProduksi, {
        type: 'doughnut',
        data: {
          labels,
          datasets: [{
            label: 'Jumlah Komoditas',
            backgroundColor: '#ADD8E6',
            borderColor: '#93C3D2',
            data
          }]
        }
      })
      }
    })
    
    
  }

  getDataProduksi();

  let btnProvitas = document.getElementById('btnProvitas');

  btnProvitas.addEventListener('click', function(e) {
    e.preventDefault();

    let awal = document.getElementById('awal-provitas');
    let akhir = document.getElementById('akhir-provitas');
    getDataProvitas(awal.value, akhir.value)
  })

  // Provitas Chart
  function getDataProvitas(awal = null, akhir = null) {
    var ctxProvitas = document.getElementById('provitas-chart').getContext('2d');

    let url = "<?php echo base_url() ?>/api/Chart/getChartProvitas";
    
    if(awal != null && akhir != null){
      url = `<?php echo base_url() ?>/api/Chart/getChartProvitas?awal=${awal}&akhir=${akhir}`;
    }

    $.ajax({
      method: 'GET',
      url : url,
      success : function(res) {
        res = JSON.parse(res);
        console.log(res);
        let labels = res.map(function(item) {
          return item['namakomoditas'];
        })
        let data = res.map(function(item) {
          return item['jumlah']
        })
        var provitasChart = new Chart(ctxProvitas, {
        type: 'doughnut',
        data: {
          labels,
          datasets: [{
            label: 'Jumlah Komoditas',
            backgroundColor: '#ADD8E6',
            borderColor: '#93C3D2',
            data
          }]
        }
      })
      }
    })
    
    
  }

  getDataProvitas();

  // Luas Panen
  let btnLuasPanen = document.getElementById('btnLuasPanen');

  btnLuasPanen.addEventListener('click', function(e) {
    e.preventDefault();

    let awal = document.getElementById('awal-luaspanen');
    let akhir = document.getElementById('akhir-luaspanen');
    getDataLuasPanen(awal.value, akhir.value)
  })

  // LuasPanen Chart
  function getDataLuasPanen(awal = null, akhir = null) {
    var ctxLuasPanen = document.getElementById('luaspanen-chart').getContext('2d');

    let url = "<?php echo base_url() ?>/api/Chart/getChartLuaspanen";
    
    if(awal != null && akhir != null){
      url = `<?php echo base_url() ?>/api/Chart/getChartLuaspanen?awal=${awal}&akhir=${akhir}`;
    }

    $.ajax({
      method: 'GET',
      url : url,
      success : function(res) {
        res = JSON.parse(res);
        let labels = res.map(function(item) {
          return item['namakomoditas'];
        })
        let data = res.map(function(item) {
          return item['jumlah']
        })
        var provitasChart = new Chart(ctxLuasPanen, {
        type: 'doughnut',
        data: {
          labels,
          datasets: [{
            label: 'Jumlah Komoditas',
            backgroundColor: '#ADD8E6',
            borderColor: '#93C3D2',
            data
          }]
        }
      })
      }
    })
    
  }

  getDataLuasPanen();


  // Luas Panen
  let btnLuasTambahTanam = document.getElementById('btnLuasTambahTanam');

  btnLuasTambahTanam.addEventListener('click', function(e) {
    e.preventDefault();

    let awal = document.getElementById('awal-luastambahtanam');
    let akhir = document.getElementById('akhir-luastambahtanam');
    getDataLuasTambahTanam(awal.value, akhir.value)
  })

  // LuasTambahTanam Chart
  function getDataLuasTambahTanam(awal = null, akhir = null) {
    var ctxLuasTambahTanam = document.getElementById('luastambahtanam-chart').getContext('2d');

    let url = "<?php echo base_url() ?>/api/Chart/getChartLuasTambahTanam";
    
    if(awal != null && akhir != null){
      url = `<?php echo base_url() ?>/api/Chart/getChartLuasTambahTanam?awal=${awal}&akhir=${akhir}`;
    }

    $.ajax({
      method: 'GET',
      url : url,
      success : function(res) {
        res = JSON.parse(res);
        let labels = res.map(function(item) {
          return item['namakomoditas'];
        })
        let data = res.map(function(item) {
          return item['jumlah']
        })
        var provitasChart = new Chart(ctxLuasTambahTanam, {
        type: 'doughnut',
        data: {
          labels,
          datasets: [{
            label: 'Jumlah Komoditas',
            backgroundColor: '#ADD8E6',
            borderColor: '#93C3D2',
            data
          }]
        }
      })
      }
    })
    
  }

  getDataLuasTambahTanam();


</script>
