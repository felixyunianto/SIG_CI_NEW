<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('user_m');
		$this->load->model('api/AuthModel');
	}

	public function login()
	{
		check_already_login();
		$this->load->view('login');
	}
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])) {
			$this->load->model('user_m');
			$query = $this->user_m->login($post);
			if($query->num_rows() > 0){
				$row = $query->row();
				$params = array(
					'user_id' => $row->user_id
				);
				$this->session->set_userdata($params);
				echo "<script>
					alert('Selamat, anda berhasil login');
					window.location='".site_url('dashboard')."';
				</script>";
			} else {
				echo "<script>
					alert('Maaf, anda gagal login. username atau password anda salah!');
					window.location='".site_url('auth/login')."';
				</script>";
			}
		}
	}
	public function logout()
	{
		$params = array('user_id');
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}

	public function forgotPassword() {
		$this->load->view('forgot-password');
	}

	public function validateEmailOrUsername(){
		$username = $this->input->post('username');

		$user = $this->user_m->validateEmailOrUsername($username);

		if($user){
			$six_digit_random_number = random_int(100000, 999999);
			$this->load->config('email');
			$this->load->library('email');

			$from = 'no-reply@myapp.com';

			$this->email->from($from);
            $this->email->to($user[0]['email']);
            $this->email->subject('Reset Password SIG Pertanian');
            $this->email->message('<h3>Link for change password</h3><p>Dont share it to another</p><h1><a href="'.base_url().'auth/changePassword?email='.$user[0]['email'].'" target="_blank">Click here</a></h1>');

			if($this->email->send()){
				echo "<script>
						alert('Link untuk mengganti password sudah dikirim ke email, mohon cek email anda, Terimakasih');
						window.location='".site_url('auth/login')."';
					</script>";
				
			}else{
				echo "<script>
					alert('Terjadi kesalahan, harap coba lagi nanti.');
					window.location='".site_url('auth/login')."';
				</script>";
			}
			
		}else{
			echo "<script>
					alert('Maaf, username atau email tidak terdaftar!');
					window.location='".site_url('auth/forgotPassword')."';
				</script>";
		}
	}

	public function changePassword(){
		$this->load->view('change-password');
	}

	public function processChangePassword(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$confPassword =  $this->input->post('confirm-password');

		if($password != $confPassword){
			echo "<script>
					alert('Maaf, password dan konfirmasi password tidak sama!');
					window.location='".site_url('auth/changePassword?email='.$email.'')."';
				</script>";
		}else{
			$user = $this->user_m->changePassword($email, $password);
			if($user){
				echo "<script>
					alert('Password berhasil diubah');
					window.location='".site_url('auth/login')."';
				</script>";
			}else{
				echo "<script>
					alert('Maaf, Terjadi kesalahan,harap coba lagi nanti!');
					window.location='".site_url('auth/changePassword?email='.$email.'')."';
				</script>";
			}
		}
	}
}
