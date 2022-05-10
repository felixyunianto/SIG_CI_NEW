<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  Petugas
  <small>Pengguna</small>
  </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
      <li><a href="#">Petugas</a></li> 
      <!-- <li class="active">Blank page</li> -->
    </ol>
</section>

    <!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Ubah Petugas</h3>
            <div class="pull-right">
                <a href="<?=site_url('petugas')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i>Kembali
                </a>
            </div>
        </div>
        <div class="box-body ">
            <div class="row">
                <div class="col-md-4">
                    <form action="" method="post">
                        <div class="form-group <?=form_error('fullname') ? 'has-error' : null?>">
                            <label>Nama *</label>
                            <input type="hidden" name="id" value="<?=$row->id?>">
                            <input type="text" name="fullname" value="<?=$this->input->post('fullname') ? $this->input->post('fullname') : $row->fullname?>" class="form-control">
                            <?=form_error('fullname')?>
                        </div>
                        <div class="form-group <?=form_error('username') ? 'has-error' : null?>">
                            <label>Username *</label>
                            <input type="text" name="username" value="<?=$this->input->post('username') ? $this->input->post('username') : $row->username?>" class="form-control">
                            <?=form_error('username')?>
                        </div> 
                        <div class="form-group <?=form_error('password') ? 'has-error' : null?>">
                            <label>Password</label><small>Biarkan kosong jika tidak diganti</small>
                            <input type="password" name="password" value="<?=$this->input->post('password')?>" class="form-control">
                            <?=form_error('password')?>
                        </div>
                        <div class="form-group <?=form_error('passconf') ? 'has-error' : null?>">
                            <label>Password Confirmation</label>
                            <input type="password" name="passconf" value="<?=$this->input->post('passconf')?>" class="form-control">
                            <?=form_error('passconf')?>
                        </div>
                        <div class="form-group <?=form_error('email') ? 'has-error' : null?>">
                            <label>Email *</label>
                            <input type="text" name="email" value="<?=$this->input->post('email') ? $this->input->post('email') : $row->email?>" class="form-control">
                            <?=form_error('email')?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"> </i>Save
                            </button>
                            <button type="Reset" class="btn btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>            
        </div>
    </div>

</section>