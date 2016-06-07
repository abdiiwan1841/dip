<br><br>
<a class="waves-effect waves-light btn modal-trigger red" href="#modal1">
  INFO PRINTER
</a>
<br><br>
<?php if ($this->session->flashdata(md5('notification'))) { ?>
  <div class="" style="text-align:center;background-color:#ee6e73;width:100%;padding:10px;color:#fff">
    <?=$this->session->flashdata(md5('notification'))?>
  </div><br><br>
<?php } else if ($this->session->flashdata(md5('sukses'))) { ?>
  <div class="" style="text-align:center;background-color:#26a69a;width:100%;padding:10px;color:#fff">
    <?=$this->session->flashdata(md5('sukses'))?>
  </div><br><br>
<?php } ?>
<!-- Modal Structure -->
<div id="modal1" class="modal">
  <div class="modal-content">
    <h4>Setup Printer</h4>
    <p>
        <span>
            Required:
            <li>PHP < 7</li>
            <li>Mengaktifkan extensi php_printer.dll pada php.ini</li>
          <span>
            <span style="font-size:12px;"><i>
              <span style="color:red">(Location)</span>
              Drivepath://localserverdir/php/php.ini</i></span>
          </span>
        </span>
      <br><br>
      Isikan nama printer
      <span style="float:right;font-style:italic;">
        <b>Status Printer sekarang:</b>
        <?php foreach ($printer as $pr) {
            echo $pr->printer;
        } ?>
      </span>
      <br>
      <form class="" action="<?=site_url('index/savePrinter')?>" method="post">
          <div class="row">
            <div class="input-field col s12">
              <input id="printer" name="printer" type="text" class="validate">
              <label for="printer">Nama Printer</label>
            </div>
          </div>

          <button class="btn waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
          </button>
      </form>
    </p>
  </div>
  <div class="modal-footer">
    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Done</a>
  </div>
</div>
<table class="highlight">
  <thead>
    <tr>
        <th data-field="no">No</th>
        <th data-field="item">Nama Barang</th>
        <th data-field="quantity">Jumlah Barang</th>
        <th data-field="price">Harga Barang</th>
        <th data-field="modify" width="200px"></th>
    </tr>
  </thead>

  <tbody>
    <?php $no=1; foreach ($barang as $data) { ?>
      <tr>
        <?php if ($this->session->flashdata(md5('kosong'))) {
          echo $this->session->flashdata(md5('kosong'));
        } ?>
        <td><?=$no;?></td>
        <td><?=$data->barang?></td>
        <td><?=$data->quantity?></td>
        <td>Rp. <?=number_format($data->quantity*$data->price,'0','.','.')?></td>
        <td>
          <a title="Direct Print" href="<?=site_url('index/printData/'.$data->id_barang)?>" class="btn"> <i class="material-icons">print</i></a>
          <a title="Delete" href="<?=site_url('index/deleteData/'.$data->id_barang)?>" class="btn red"> <i class="material-icons">delete</i></a>
        </td>
      </tr>
    <?php $no++; } ?>
  </tbody>
</table>
<br>
<a href="<?=site_url('index/tambahBarang')?>" class="btn">Tambah Barang</a>
