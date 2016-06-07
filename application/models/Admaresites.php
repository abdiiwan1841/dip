<?php

/**
 *
 */
class Admaresites extends CI_Model
{

  public function getPage($data='') {
    if ($data['sec']=="webpage") {
      $this->load->view('index', $data, FALSE);
    } else {
      echo "Halaman tidak ditemukan";
    }
  }

  public function getLogin($username, $password) {
    $t = $this->db->get_where('user', array('username' => $username, 'password' => $password));
    $n = $t->num_rows();
    $r = $t->row();

    if ($n === 1) {
      if ($r->status=="Aktif") {
        $this->createSession($r);
        redirect('index');
      } else {
        $this->session->set_flashdata(md5('notification'), "Akun anda tidak aktif");
        redirect('login');
      }
    } else {
      $this->session->set_flashdata(md5('notification'), "Username dan Password tidak terdaftar");
      redirect('login');
    }
  }

  private function createSession($r='') {
    $session = array(
      'nama'        => $r->nama,
      'email'       => $r->email,
      'image'       => $r->image,
      'login_valid' => TRUE
    );
    return $this->session->set_userdata($session);
  }

  function getEnum($table, $field){
	 $query = "SHOW COLUMNS FROM ".$table." LIKE '$field'";
	 $row = $this->db->query("SHOW COLUMNS FROM ".$table." LIKE '$field'")->row()->Type;
	 $regex = "/'(.*?)'/";
	        preg_match_all( $regex , $row, $enum_array );
	        $enum_fields = $enum_array[1];
	        foreach ($enum_fields as $key=>$value)
	        {
	            $enums[$value] = $value;
	        }
	 return $enums;
	}

  public function inputUser($data) {
    return $this->db->insert('user', $data);
  }

  public function purgeData($data) {
    return $this->db->delete('user', $data);
  }

  public function getBarang() {
    $get = $this->db->get('barang');
    if ($get->num_rows === 0) {
      $this->session->set_flashdata(md5('kosong'), "Data kosong");
      redirect('index/data');
    } else {
      return $get->result();
    }
  }

  public function getPrinter() {
    return $get = $this->db->get('printer')->result();
    // $r = $get->row();
    // if ($get->num_rows()) {
    //   $data = array(
    //     'printer' => $r->printer
    //   );
    //   return $this->session->set_userdata($data);
    // }
  }

  public function getSavePrinter($printer) {
    $this->db->empty_table('printer');
    $data = array('printer' => $this->input->post('printer'));
    if ($this->db->insert('printer', $data)) {
      redirect('index/data');
    }
  }

  public function getSaveBarang($data) {
    if ($this->db->insert('barang', $data)) {
      $this->session->set_flashdata(md5('sukses'), "Barang berhasil disimpan");
      redirect('index/data');
    } else {
      $this->session->set_flashdata(md5('notification'), "Terjadi kesalahan, barang gagal disimpan");
      redirect('index/data');
    }
  }

  public function delete($id) {
    $where = $this->db->where('id_barang', $id);
    if ($this->db->delete('barang', $where)) {
      redirect('index/data');
    } else {
      $this->session->set_flashdata(md5('notification'), "Barang gagal dihapus");
      redirect('index/data');
    }
  }
}
