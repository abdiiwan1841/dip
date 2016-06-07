<?php

if ($file) {
  if (file_exists('application/views/pages/'.$file.'.php')==TRUE) {
    $this->load->view('pages/'.$file);
  } else {
    echo "Halaman tidak ditemukan";
  }
} else {
  echo "Halaman tidak ditemukan";
}

?>
