<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#regisv").validate({
      rules: {
        barang: {
          required: true
        },
        quantity: {
          required: true
        },
        price: {
          required: true
        }
      },
      messages: {
        barang: {
          required: "Nama Barang harus diisi"
        },
        quantity: {
          required: "Quantity harus diisi"
        },
        price: {
          required: "Harga harus diisi"
        }
      },
      errorElement: 'span',
      errorLabelContainer: '.error'
    });
  });
</script>
<style media="screen">
  .error {
    font-size: 12px;
    color: red;
  }
</style>
<br><br>
<div class="container">
   <div class="card-panel hoverable" style="width:60%;margin:0 auto;">
     <!-- <form id="regisv" action="<?=base_url('register/addUser')?>" method="post"> -->
     <?php
      $attributes = array(
        'id' => 'regisv'
      );
     ?>
     <?=form_open_multipart('index/simpanBarang', $attributes)?>

      <div class="row">
        <div class="input-field col s12">
          <input placeholder="Barang" id="barang" name="barang" type="text" class="validate">
          <label for="nama">Nama Barang</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input placeholder="Quantity" id="quantity" name="quantity" type="number" class="validate">
          <label for="email">Quantity</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input placeholder="Harga Satua" id="price" name="price" type="text" class="validate">
          <label for="username">Harga Satuan</label>
        </div>
      </div>
      <br>
        <span style="float:right;">
          <input type="submit" name="submit" value="Simpan" class="waves-effect waves-light btn">
        </span>

        <span style="color:#fff">
          <label for="test5">.</label>
        </span>

     </form>
   </div>
</div>

<br><br>
