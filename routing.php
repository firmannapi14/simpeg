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

        //------------------------------------ CUSTOMER ------------------------------------
        elseif ($page == 'customer')                include("pages/customer/customer.php");
        elseif ($page == 'customeradd')             include("pages/customer/customeradd.php");
        elseif ($page == 'customeraddpro')          include("pages/customer/customeraddpro.php");
        elseif ($page == 'customeredit')            include("pages/customer/customeredit.php");
        elseif ($page == 'customereditpro')         include("pages/customer/customereditpro.php");
        elseif ($page == 'customerdelete')          include("pages/customer/customerdelete.php");

        //------------------------------------ PRODUCT ------------------------------------
        elseif ($page == 'product')                 include("pages/product/product.php");
        elseif ($page == 'productadd')              include("pages/product/productadd.php");
        elseif ($page == 'productaddpro')           include("pages/product/productaddpro.php");
        elseif ($page == 'productedit')             include("pages/product/productedit.php");
        elseif ($page == 'producteditpro')          include("pages/product/producteditpro.php");
        elseif ($page == 'productdelete')           include("pages/product/productdelete.php");

        //------------------------------------ USER ------------------------------------
        elseif ($page == 'user')                    include("pages/user/user.php");
        elseif ($page == 'useradd')                 include("pages/user/useradd.php");
        elseif ($page == 'useraddpro')              include("pages/user/useraddpro.php");
        elseif ($page == 'useredit')                include("pages/user/useredit.php");
        elseif ($page == 'usereditpro')             include("pages/user/usereditpro.php");
        elseif ($page == 'userdelete')              include("pages/user/userdelete.php");

        //------------------------------------ REG ------------------------------------
        elseif ($page == 'reg')                     include("pages/reg/reg.php");
        elseif ($page == 'regadd')                  include("pages/reg/regadd.php");
        elseif ($page == 'regaddpro')               include("pages/reg/regaddpro.php");
        elseif ($page == 'regedit')                 include("pages/reg/regedit.php");
        elseif ($page == 'regeditpro')              include("pages/reg/regeditpro.php");
        elseif ($page == 'regdelete')               include("pages/reg/regdelete.php");

        //------------------------------------ INVOICE ------------------------------------
        elseif ($page == 'invoice')                 include("pages/invoice/invoice.php");
        elseif ($page == 'invoiceadd')              include("pages/invoice/invoiceadd.php");
        elseif ($page == 'invoiceaddpro1')          include("pages/invoice/invoiceaddpro1.php");
        elseif ($page == 'invoiceaddpro2')          include("pages/invoice/invoiceaddpro2.php");
        elseif ($page == 'invoiceaddpro3')          include("pages/invoice/invoiceaddpro3.php");
        elseif ($page == 'invoiceaddpro4')          include("pages/invoice/invoiceaddpro4.php");
        elseif ($page == 'invoiceedit1')            include("pages/invoice/invoiceedit1.php");
        elseif ($page == 'invoiceeditpro1')         include("pages/invoice/invoiceeditpro1.php");
        elseif ($page == 'invoiceedit2')            include("pages/invoice/invoiceedit2.php");
        elseif ($page == 'invoiceeditpro2')         include("pages/invoice/invoiceeditpro2.php");
        elseif ($page == 'invoiceedit3')            include("pages/invoice/invoiceedit3.php");
        elseif ($page == 'invoiceeditpro3')         include("pages/invoice/invoiceeditpro3.php");
        elseif ($page == 'invoiceedit4')            include("pages/invoice/invoiceedit4.php");
        elseif ($page == 'invoiceeditpro4')         include("pages/invoice/invoiceeditpro4.php");

        elseif ($page == 'invoicechangereqpro1')    include("pages/invoice/invoicechangereqpro1.php");
        elseif ($page == 'invoicechangereqpro2')    include("pages/invoice/invoicechangereqpro2.php");
        elseif ($page == 'invoicechangereqpro3')    include("pages/invoice/invoicechangereqpro3.php");
        elseif ($page == 'invoicechangereqpro4')    include("pages/invoice/invoicechangereqpro4.php");
        elseif ($page == 'invoiceprint')            include("pages/invoice/invoiceprint.php");

        else include("pages/404.php"); 
    break;
}