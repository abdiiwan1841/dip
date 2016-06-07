<?php if ($this->session->userdata(md5('sukses'))): ?>
  <br>
  <div class="" style="color:green">
    <?=$this->session->userdata(md5('sukses'));?>
  </div>
<?php endif; ?>
<br>
Welcome
