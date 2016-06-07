<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#regisv").validate({
      rules: {
        nama: {
          required: true,
          minlength: 10
        },
        email: {
          required: true,
          email: true,
          remote: {
            url: "<?=base_url()?>/register/validateEmailExist",
            type: "post",
            data: {
              email: function() {
                return $("#email").val();
              }
            }
          }
        },
        username: {
          required: true,
          minlength: 5,
          remote: {
            url: "<?=base_url()?>/register/validateUsernameExist",
            type: "post",
            data: {
              username: function() {
                return $("#username").val();
              }
            }
          }
        },
        password: {
          required: true,
          minlength: 5
        },
        alamat: {
          required: true
        },
        jk: {
          required: true
        },
        image: {
          required: true
        }
      },
      messages: {
        nama: {
          required: "Nama harus diisi",
          minlength: "Minimal nama harus 10 karakter"
        },
        email: {
          required: "Email harus diisi",
          email: "Email harus diisi dalam format alamat email",
          remote: "Email telah digunakan"
        },
        username: {
          required: "Username harus diisi",
          minlength: "Minimal username harus 5 karakter",
          remote: "Username telah digunakan"
        },
        password: {
          required: "Password harus diisi",
          minlength: "Minimal password harus 5 karakter"
        },
        alamat: {
          required: "Alamat harus diisi"
        },
        jk: {
          required: "Alamat harus diisi"
        },
        image: {
          required: "Foto harus diisi"
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
     <?=form_open_multipart('register/addUser', $attributes)?>
       <?php if ($this->session->flashdata(md5('notification'))) { ?>
         <div class="" style="text-align:center;background-color:#ee6e73;width:100%;padding:10px;color:#fff">
           <?=$this->session->flashdata(md5('notification'))?>
         </div><br><br>
       <?php } else if ($this->session->flashdata(md5('sukses'))) { ?>
         <div class="" style="text-align:center;background-color:#26a69a;width:100%;padding:10px;color:#fff">
           <?=$this->session->flashdata(md5('sukses'))?>
         </div><br><br>
       <?php } ?>

      <div class="row">
        <div class="input-field col s12">
          <input placeholder="Nama" id="nama" name="nama" type="text" class="validate">
          <label for="nama">Nama</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input placeholder="Email" id="email" name="email" type="text" class="validate">
          <label for="email">Email</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input placeholder="Username" id="username" name="username" type="text" class="validate">
          <label for="username">Username</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input placeholder="Password" id="password" name="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>

      <div class="row">
          <div class="input-field col s12">
            <textarea id="alamat" name="alamat" class="materialize-textarea"></textarea>
            <label for="alamat">Alamat</label>
          </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <select id="jk" name="jk" required>
            <option value="" disabled selected>Pilih Jenis Kelamin</option>
            <?php
            foreach ($jk as $data) { ?>
              <option value="<?=$data;?>"><?=$data;?></option>
            <?php } ?>
          </select>
          <label>Jenis Kelamin</label>
        </div>
      </div>

      <div class="file-field input-field">
        <div class="btn">
          <span>Foto</span>
          <input type="file" name="image" required>
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text" name="image" placeholder="Upload foto">
        </div>
      </div>
      <br>
        <span style="float:right;">
          <input type="submit" name="submit" value="Register" class="waves-effect waves-light btn">
        </span>

        <span style="color:#fff">
          <label for="test5">.</label>
        </span>

     </form>
   </div>
</div>

<br><br>
