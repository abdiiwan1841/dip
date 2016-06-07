<?php

function get_path_image($img = '', $size = '')
{
    if (empty($size)) {
        return './assets/foto/'.$img;
    } else {
        $pisah = explode('.', $img);
        $ext = end($pisah);
        $nama_file = $pisah[0];

        return './assets/foto/'.$nama_file.'_'.$size.'.'.$ext;
    }
}

function mustLogin() {
  $CI =& get_instance();
  if (isLogin()) {
    $CI->session->set_flashdata(md5('notification'), "Tidak dapat akses! Harus login dulu");
    redirect('login');
    die;
  }
}

function isLogin() {
  $CI =& get_instance();
  $session = $CI->session->userdata('login_valid')==TRUE;
  if (!$session) {
    redirect('login');
  }
}

?>
