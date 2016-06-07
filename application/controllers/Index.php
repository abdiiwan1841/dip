<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */
class Index extends MY_Controller
{

  function __construct() {
    parent::__construct();
  }

  public function index() {
    $data['title']  = "Dashboard";
    $data['sec']    = "webpage";
    $data['file']   = "dashboard";
    $this->admaresites->getPage($data);
  }

  public function dest() {
    mustLogin();
    $this->session->sess_destroy();
    redirect('index');
  }

  public function setting() {
    mustLogin();
    $data['title']  = "Setting Account";
    $data['sec']    = "webpage";
    $data['file']   = "setting";
    $this->admaresites->getPage($data);
  }

  public function data() {
    mustLogin();
    $data['title']    = "Data";
    $data['sec']      = "webpage";
    $data['file']     = "data";
    $data['printer']  = $this->admaresites->getPrinter();
    $data['barang']   = $this->admaresites->getBarang();
    $this->admaresites->getPage($data);
  }

  public function savePrinter() {
    $printer = $this->input->post('printer');
    $this->admaresites->getSavePrinter($printer);
  }

  public function printJS() {
    $id = $this->uri->segment(3);
    $this->load->view('pages/print', $id);
  }

  public function printData() {
    // $this->load->view('pages/print');
    // Nama printer, sesuaikan serinya juga
    $namaPrinter = $this->admaresites->getPrinter();
    foreach ($namaPrinter as $myPrinter) {
      $printer = printer_open($myPrinter->printer);
    }
    printer_set_option($printer, PRINTER_MODE, "RAW"); // mode disobek ( kertas tidak menggulung )
    printer_start_doc($printer);
    printer_start_page($printer);
    $font = printer_create_font("Arial", 18, 17, PRINTER_FW_NORMAL, false, false, false, 0);
    printer_select_font($printer, $font);
    $id = $this->uri->segment(3);
    $dataBarang = $this->db->get_where('barang', array('id_barang'=>$id));
    foreach ($dataBarang as $barang) {
      printer_draw_text($printer, "Print Out Barang", 10, 0);
      printer_draw_text($printer, $barang->barang,55,0);
      printer_draw_text($printer, $barang->quantity,55, 0);
      printer_draw_text($printer, $barang->price,55, 0);
    }
    // $font = printer_create_font("Arial", 100, 80, PRINTER_FW_NORMAL, false, false, false, 0);
    // printer_select_font($printer, $font);
    // printer_draw_text($printer, $nomor, 100, 90);
    // // Header Bon
    // $pen = printer_create_pen(PRINTER_PEN_SOLID, 1, "000000");
    // printer_select_pen($printer,$pen);
    // $font = printer_create_font("Arial", 18, 17, PRINTER_FW_NORMAL, false, false, false, 0);
    // printer_select_font($printer, $font);
    // printer_draw_line($printer, $var_magin_left, 65, 500, 65);
    // printer_draw_text($printer, "STATUS :", $var_magin_left, 230);
    // printer_draw_text($printer, $status, 250, 230);
    // $row +=250;
    // printer_draw_text($printer, "Terima Kasih Kunjungannya", 10, $row);
    // printer_draw_line($printer, $var_magin_left, 300, 500, 300);
    printer_delete_font($font);
    printer_end_page($printer);
    printer_end_doc($printer);
    printer_close($printer);
    redirect('index/data');

    // $handle = printer_open("\\192.168.0.100\Canon MP250 series Printer");
    // if ($handle) {
    //   echo "connected";
    // } else {
    //   echo "not connected";
    // }
  }

  public function tambahBarang() {
    mustLogin();
    $data['title']    = "Tambah Barang";
    $data['sec']      = "webpage";
    $data['file']     = "tambahbarang";
    $this->admaresites->getPage($data);
  }

  public function simpanBarang() {
    $data = array(
      'barang'   => $this->input->post('barang'),
      'quantity' => $this->input->post('quantity'),
      'price'    => $this->input->post('price')
    );

    $this->admaresites->getSaveBarang($data);
  }

  public function deleteData() {
    $id = $this->uri->segment(3);
    $this->admaresites->delete($id);
  }
}
