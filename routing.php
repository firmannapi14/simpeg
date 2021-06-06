<?php 

switch(get_user_login('id_rules')) {
    case '1':
        if (isset($_GET['page'])) $page=$_GET['page'];
        else $page="beranda";

        if ($page == "beranda")                     include("pages/dashboard.php");
        elseif ($page == "logout")                  include("pages/logout.php");

        //------------------------------------ ABSENSI ------------------------------------
        elseif ($page == 'absensi')                 include("pages/absensi/absensi.php");

        //------------------------------------ PROFIL ------------------------------------
        elseif ($page == 'profile')                 include("pages/profile/profile.php");
        elseif ($page == 'profileedit')             include("pages/profile/profileedit.php");
        elseif ($page == 'profileeditpro')          include("pages/profile/profileeditpro.php");

        //------------------------------------ LOGBOOK ------------------------------------
        elseif ($page == 'logbook')                 include("pages/logbook/logbook.php");
        elseif ($page == 'logbookadd')              include("pages/logbook/logbookadd.php");
        elseif ($page == 'logbookaddpro')           include("pages/logbook/logbookaddpro.php");
        elseif ($page == 'logbookedit')             include("pages/logbook/logbookedit.php");
        elseif ($page == 'logbookeditpro')          include("pages/logbook/logbookeditpro.php");
        elseif ($page == 'logbookdelete')           include("pages/logbook/logbookdelete.php");

        //------------------------------------ PEGAWAI ------------------------------------
        elseif ($page == 'pegawai')                 include("pages/pegawai/pegawai.php");
        elseif ($page == 'pegawaiadd')              include("pages/pegawai/pegawaiadd.php");
        elseif ($page == 'pegawaiaddpro')           include("pages/pegawai/pegawaiaddpro.php");
        elseif ($page == 'pegawaiedit')             include("pages/pegawai/pegawaiedit.php");
        elseif ($page == 'pegawaieditpro')          include("pages/pegawai/pegawaieditpro.php");
        elseif ($page == 'pegawaidelete')           include("pages/pegawai/pegawaidelete.php");

        //------------------------------------ PIMPINAN ------------------------------------
        elseif ($page == 'pimpinan')                include("pages/pimpinan/pimpinan.php");
        elseif ($page == 'pimpinanadd')             include("pages/pimpinan/pimpinanadd.php");
        elseif ($page == 'pimpinanaddpro')          include("pages/pimpinan/pimpinanaddpro.php");
        elseif ($page == 'pimpinanedit')            include("pages/pimpinan/pimpinanedit.php");
        elseif ($page == 'pimpinaneditpro')         include("pages/pimpinan/pimpinaneditpro.php");
        elseif ($page == 'pimpinandelete')          include("pages/pimpinan/pimpinandelete.php");

        else include("pages/404.php");
    break;
    case '2':
        if (isset($_GET['page'])) $page=$_GET['page'];
        else $page="beranda";

        if ($page == "beranda")                     include("pages/dashboard.php");
        elseif ($page == "logout")                  include("pages/logout.php");

        //------------------------------------ ABSENSI ------------------------------------
        elseif ($page == 'absensi')                 include("pages/absensi/absensi.php");

        //------------------------------------ PROFIL ------------------------------------
        elseif ($page == 'profile')                 include("pages/profile/profile.php");
        elseif ($page == 'profileedit')             include("pages/profile/profileedit.php");
        elseif ($page == 'profileeditpro')          include("pages/profile/profileeditpro.php");

        //------------------------------------ LOGBOOK ------------------------------------
        elseif ($page == 'logbook')                 include("pages/logbook/logbook.php");
        elseif ($page == 'logbookadd')              include("pages/logbook/logbookadd.php");
        elseif ($page == 'logbookaddpro')           include("pages/logbook/logbookaddpro.php");
        elseif ($page == 'logbookedit')             include("pages/logbook/logbookedit.php");
        elseif ($page == 'logbookeditpro')          include("pages/logbook/logbookeditpro.php");
        elseif ($page == 'logbookdelete')           include("pages/logbook/logbookdelete.php");

        //------------------------------------ LOGBOOK ISI ------------------------------------
        elseif ($page == 'logbookisi')              include("pages/logbookisi/logbookisi.php");
        elseif ($page == 'logbookisiadd')           include("pages/logbookisi/logbookisiadd.php");
        elseif ($page == 'logbookisiaddpro')        include("pages/logbookisi/logbookisiaddpro.php");
        elseif ($page == 'logbookisiedit')          include("pages/logbookisi/logbookisiedit.php");
        elseif ($page == 'logbookisieditpro')       include("pages/logbookisi/logbookisieditpro.php");
        elseif ($page == 'logbookisidelete')        include("pages/logbookisi/logbookisidelete.php");


        else include("pages/404.php");
    break;
    case '3':
        if (isset($_GET['page'])) $page=$_GET['page'];
        else $page="beranda";

        if ($page == "beranda")                     include("pages/dashboard.php");
        elseif ($page == "logout")                  include("pages/logout.php");

        //------------------------------------ PROFIL ------------------------------------
        elseif ($page == 'profile')                 include("pages/profilelead/profilelead.php");
        elseif ($page == 'profileedit')             include("pages/profilelead/profileleadedit.php");
        elseif ($page == 'profileeditpro')          include("pages/profilelead/profileleadeditpro.php");

        //------------------------------------ PEGAWAI ------------------------------------
        elseif ($page == 'pegawai')                 include("pages/pegawai/pegawai.php");

        //------------------------------------ PIMPINAN ------------------------------------
        elseif ($page == 'pimpinan')                include("pages/pimpinan/pimpinan.php");

        //------------------------------------ LOGBOOK ------------------------------------
        elseif ($page == 'logbook')                 include("pages/logbooklead/logbooklead.php");
        elseif ($page == 'logbooklihat')            include("pages/logbooklead/logbookleadlihat.php");
        elseif ($page == 'logbooklihatisi')         include("pages/logbooklead/logbookleadlihatisi.php");

        else include("pages/404.php");
    break;
    default:
        if (isset($_GET['page'])) $page=$_GET['page'];
        else $page="beranda";

        if ($page == "beranda")                     include("pages/dashboard.php");
        elseif ($page == "logout")                  include("pages/logout.php");

        //------------------------------------ PROFIL ------------------------------------
        elseif ($page == 'profile')                 include("pages/profilelead/profilelead.php");
        elseif ($page == 'profileedit')             include("pages/profilelead/profileleadedit.php");
        elseif ($page == 'profileeditpro')          include("pages/profilelead/profileleadeditpro.php");

        //------------------------------------ PEGAWAI ------------------------------------
        elseif ($page == 'pegawai')                 include("pages/pegawai/pegawai.php");

        //------------------------------------ PIMPINAN ------------------------------------
        elseif ($page == 'pimpinan')                include("pages/pimpinan/pimpinan.php");

        //------------------------------------ LOGBOOK ------------------------------------
        elseif ($page == 'logbook')                 include("pages/logbooklead/logbooklead.php");
        elseif ($page == 'logbooklihat')            include("pages/logbooklead/logbookleadlihat.php");
        elseif ($page == 'logbooklihatisi')         include("pages/logbooklead/logbookleadlihatisi.php");

        else include("pages/404.php"); 
    break;
}