     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="<?php echo site_url() ?>">
             <i class="fas fa-fire"></i>
             <span>Dashboard</span></a>
     </li>
     <li class="nav-item active">
         <a class="nav-link" href="<?php echo site_url('gawe') ?>">
             <i class="far fa-calendar"></i>
             <span>Acara</span></a>
     </li>
     <li class="nav-item active">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
             <i class="far fa-address-book"></i>
             <span>Kontak</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="<?php echo site_url('groups') ?>">Group Kontak</a>
                 <a class="collapse-item" href="<?php echo site_url('kontak') ?>">Kontak</a>
             </div>
         </div>

         <!-- Nav Item - Utilities Collapse Menu -->

         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">

         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>