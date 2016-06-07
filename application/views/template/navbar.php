<div class="navbar-fixed">
  <ul id="dropdown1" class="dropdown-content">
   <li><a href="<?=site_url('index/dest')?>">Logout</a></li>
  </ul>
  <ul id="dropdown2" class="dropdown-content">
   <li><a href="<?=site_url('index/dest')?>">Logout</a></li>
  </ul>
   <nav>
     <div class="container">
     <div class="nav-wrapper">
       <a href="<?=site_url('')?>" class="brand-logo">DiP</a>
       <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
       <ul class="right hide-on-med-and-down">
         <li class="waves-effect"><a href="<?=base_url('')?>">Home</a></li>
         <?php if ($this->session->userdata('login_valid')==FALSE): ?>
           <?php if ($this->uri->segment(1)=="login") { ?>
             <li><a href="<?=site_url('register')?>">Regiter</a></li>
           <?php } else if($this->uri->segment(1)=="register") { ?>
             <li><a href="<?=site_url('login')?>">Login</a></li>
           <?php } else { ?>
             <li><a href="<?=site_url('login')?>">Login</a></li>
             <li><a href="<?=site_url('register')?>">Regiter</a></li>
          <?php } ?>
         <?php endif; ?>
         <?php if ($this->session->userdata('login_valid')==TRUE) { ?>
           <li>
             <a href="<?=base_url('index/data')?>">Data</a>
           </li>
           <li>
             <a class="dropdown-button" href="#!" data-activates="dropdown1">
                   <img src="<?=base_url('assets/foto/'.$this->session->userdata('image'))?>" alt="" style="width:40px;height:40px;border-radius:50px;float:left;margin-top:10px;margin-right:10px;" />
              <?=$this->session->userdata('nama')?>
               <i class="material-icons right">arrow_drop_down</i>
             </a>
           </li>
         <?php } ?>
       </ul>
       <ul class="side-nav" id="mobile-demo">
         <li><a href="<?=base_url('')?>">Home</a></li>
         <?php if ($this->session->userdata('login_valid')==FALSE): ?>
           <?php if ($this->uri->segment(1)=="login") { ?>
             <li><a href="<?=site_url('register')?>">Regiter</a></li>
           <?php } else if($this->uri->segment(1)=="register") { ?>
             <li><a href="<?=site_url('login')?>">Login</a></li>
           <?php } else { ?>
             <li><a href="<?=site_url('login')?>">Login</a></li>
             <li><a href="<?=site_url('register')?>">Regiter</a></li>
          <?php } ?>
         <?php endif; ?>
         <?php if ($this->session->userdata('login_valid')==TRUE) { ?>
           <li>
             <a href="<?=base_url('index/data')?>">Data</a>
           </li>
           <li>
             <a class="dropdown-button" href="#!" data-activates="dropdown2">
                   <img src="<?=base_url('assets/foto/'.$this->session->userdata('image'))?>" alt="" style="width:40px;height:40px;border-radius:50px;float:left;margin-top:10px;margin-right:10px;" />
              <?=$this->session->userdata('nama')?>
               <i class="material-icons right">arrow_drop_down</i>
             </a>
           </li>
         <?php } ?>
       </ul>
     </div>
   </div>
   </nav>
 </div>
