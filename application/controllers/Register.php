<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */
class Register extends MY_Controller
{

  function __construct() {
    parent::__construct();
  }

  public function index() {
    $data['jk'] = $this->admaresites->getEnum('admaresi_user', 'jk');
    $data['title'] = "Register";
    $data['sec']   = "webpage";
    $data['file']  = "register";
    $this->admaresites->getPage($data);
  }

  public function addUser() {
    $config['upload_path']   = get_path_image();
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['max_size']      = '10000';
    $config['max_width']     = '10000';
    $config['max_height']    = '10000';
    $config['file_name']     = 'user-'.md5($this->input->post('username')).'-'.$this->input->post('image');
    $this->upload->initialize($config);
    $this->upload->data();
    // $foto = $upload_data['file_name'];
    if ($this->upload->do_upload('image')) {
      $data = array(
        'username'  => $this->input->post('username'),
        'password'  => md5($this->input->post('password')),
        'email'     => $this->input->post('email'),
        'nama'      => $this->input->post('nama'),
        'jk'        => $this->input->post('jk'),
        'alamat'    => $this->input->post('alamat'),
        'image'     => 'user-'.md5($this->input->post('username')).'-'.$this->input->post('image')
      );

      if ($this->admaresites->inputUser($data)) {
        $this->session->set_flashdata(md5('sukses'), "Registrasi berhasil, silahkan login");
        // $this->admaresites->getLogin($data['username'], $data['password']);
        redirect('login');
      } else {
        $this->session->set_flashdata(md5('notification'), "Terjadi kesalahan saat mengirim");
        $this->admaresites->purgeData($data);
        redirect('register');
      }
    } else {
      echo $this->upload->display_errors();
    }
  }

  public function validateUsernameExist() {
  	if (array_key_exists('username',$_POST)) {
  		if ($this->usernameexist($this->input->post('username')) == TRUE) {
  			echo json_encode(FALSE);
  		} else {
  			echo json_encode(TRUE);
  		}
  	}
  }

  private function usernameexist($username) {
    $this->db->select('username');
    $this->db->where('username', $username);
    $query = $this->db->get('user');
    if( $query->num_rows() > 0 ) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function validateEmailExist() {
    if (array_key_exists('email', $_POST)) {
      if ($this->emailexist($this->input->post('email'))==TRUE) {
        echo json_encode(FALSE);
      } else {
        echo json_encode(TRUE);
      }
    }
  }

  private function emailexist($email) {
    $this->db->select('email');
    $this->db->where('email', $email);
    $query = $this->db->get('user');
    $num = $query->num_rows();
    if ($num > 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  function add($segment_3 = '')
  {
      $config['upload_path']   = get_path_image();
      $config['allowed_types'] = 'jpg|jpeg|png';
      $config['max_size']      = '0';
      $config['max_width']     = '0';
      $config['max_height']    = '0';
      $config['file_name']     = 'siswa-'.url_title($this->input->post('nama', TRUE), '-', true).'-'.url_title($this->input->post('nis', TRUE), '-', true);
      $this->upload->initialize($config);

      if (!empty($_FILES['userfile']['tmp_name']) AND !$this->upload->do_upload()) {
          $data['error_upload'] = '<span class="text-error">'.$this->upload->display_errors().'</span>';
          $error_upload = true;
      } else {
          $data['error_upload'] = '';
          $error_upload = false;
      }

      if ($this->form_validation->run('siswa/add') == TRUE AND !$error_upload) {
          $nis           = $this->input->post('nis', TRUE);
          $nama          = $this->input->post('nama', TRUE);
          $jenis_kelamin = $this->input->post('jenis_kelamin', TRUE);
          $tahun_masuk   = $this->input->post('tahun_masuk', TRUE);
          $kelas_id      = $this->input->post('kelas_id', TRUE);
          $tempat_lahir  = $this->input->post('tempat_lahir', TRUE);
          $tgl_lahir     = $this->input->post('tgl_lahir', TRUE);
          $bln_lahir     = $this->input->post('bln_lahir', TRUE);
          $thn_lahir     = $this->input->post('thn_lahir', TRUE);
          $agama         = $this->input->post('agama', TRUE);
          $alamat        = $this->input->post('alamat', TRUE);
          $username      = $this->input->post('username', TRUE);
          $password      = $this->input->post('password2', TRUE);

          if (!empty($_FILES['userfile']['tmp_name'])) {
              $upload_data = $this->upload->data();
              $foto = $upload_data['file_name'];
          } else {
              $foto = null;
          }

          # simpan data siswa
          $siswa_id = $this->siswa_model->create(
              $nis,
              $nama,
              $jenis_kelamin,
              $tempat_lahir,
              $tanggal_lahir,
              $agama,
              $alamat,
              $tahun_masuk,
              $foto,
              1
          );

          $this->session->set_flashdata('siswa', get_alert('success', 'Data siswa berhasil disimpan.'));
          redirect('siswa/index/1');

      } else {
          $upload_data = $this->upload->data();
          if (!empty($upload_data) AND is_file(get_path_image($upload_data['file_name']))) {
              unlink(get_path_image($upload_data['file_name']));
          }
      }

      $this->twig->display('tambah-siswa.html', $data);
  }

}
