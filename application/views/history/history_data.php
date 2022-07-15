<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  History
  <small>Control Panel</small>
  </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
      <li><a href="#">History</a></li>
      <!-- <li class="active">Blank page</li> -->
    </ol>
</section>

<!-- Main content -->
  <section class="content">

  <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data History</h3>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Detail Kegiatan</th>
                    <tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        if(count($histories->result()) > 0){
                            foreach($histories->result() as $key => $history) { ?>
                            <tr>
                                <td><?=$no++?>.</td>
                                <td><?=date('d M Y H:i:s', strtotime($history->date))?></td>
                                <td><?=$history->name?></td>
                                <td><?=$history->description?></td>
                            <tr>
                    <?php 
                            }
                        }else{
                    ?>
                            <tr>
                                <td colspan="4" style="text-align: center">Tidak ada data</td>
                            <tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    </section>
    <!-- /.content -->