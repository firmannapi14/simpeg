<div id="" class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
      <h2><span class="fa fa-user"></span> SIMPEG</h2>
    </div>
    <ul class="c-sidebar-nav">
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="?page=beranda">
          <svg class="c-sidebar-nav-icon">
            <use xlink:href="./coreui/icons/sprites/free.svg#cil-speedometer"></use>
          </svg> Beranda</a>
      </li>
      <li class="c-sidebar-nav-title">Menu</li>
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="?page=profile">
          <svg class="c-sidebar-nav-icon">
            <use xlink:href="./coreui/icons/sprites/free.svg#cil-contact"></use>
          </svg> Profile</a>
      </li>
      <?php if (get_user_login('id_rules') === '2' || get_user_login('id_rules') === '1') { ?>
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="?page=absensi">
          <svg class="c-sidebar-nav-icon">
            <use xlink:href="./coreui/icons/sprites/free.svg#cil-calendar-check"></use>
          </svg> Absensi</a>
      </li>
      <?php } ?>
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="?page=logbook">
          <svg class="c-sidebar-nav-icon">
            <use xlink:href="./coreui/icons/sprites/free.svg#cil-book"></use>
          </svg> Logbook</a>
      </li>
      <?php if (get_user_login('id_rules') !== '2') { ?>
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="?page=pegawai">
          <svg class="c-sidebar-nav-icon">
            <use xlink:href="./coreui/icons/sprites/free.svg#cil-user"></use>
          </svg>Pegawai</a>
      </li>
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="?page=pimpinan">
          <svg class="c-sidebar-nav-icon">
            <use xlink:href="./coreui/icons/sprites/free.svg#cil-user"></use>
          </svg>Pimpinan</a>
      </li>
      <?php } ?>
    </ul>
</div>
