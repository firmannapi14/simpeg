<?php 

use Dompdf\Dompdf;
use Ramsey\Uuid\Uuid;
require 'vendor/autoload.php';
$uuid4 = Uuid::uuid4();
$dompdf = new Dompdf();

function get_absensi($id) {
    include "connection.php";
    $date_now = date('Y-m-d');
    $absensi = mysqli_query($conn, "SELECT * FROM tbl_absensi WHERE created_at LIKE '%$date_now%' AND nik='$id'");
    $count = mysqli_num_rows($absensi);
    if ($count > 0) {
        return mysqli_fetch_array($absensi);
    }
    return false;
}

function check_user_login($id, $password) {
    include "connection.php";
    $pegawai = mysqli_query($conn, "SELECT * FROM tbl_pegawai
                                    JOIN tbl_auth ON tbl_pegawai.id=tbl_auth.id_pegawai
                                    WHERE BINARY tbl_pegawai.nik='$id' AND tbl_auth.password_current_auth='$password'");
    $pimpinan = mysqli_query($conn, "SELECT * FROM tbl_pimpinan
                                    JOIN tbl_auth ON tbl_pimpinan.id=tbl_auth.id_pimpinan
                                    WHERE BINARY tbl_pimpinan.nip='$id' AND tbl_auth.password_current_auth='$password'");
    $count_pegawai = mysqli_num_rows($pegawai);
    $count_pimpinan = mysqli_num_rows($pimpinan);
    if ($count_pegawai > 0) {
        return mysqli_fetch_array($pegawai)['id_pegawai'];
    } else if ($count_pimpinan > 0) {
        return mysqli_fetch_array($pimpinan)['id_pimpinan'];
    }
    return false;
}

function get_user_login($param) {
    include "connection.php";
    $id = encrypt_decrypt('decrypt', $_COOKIE['user_simpeg']);
    // echo $id;
    $pegawai = mysqli_query($conn, "SELECT tbl_pegawai.nik, tbl_pegawai.id as id_user, tbl_pegawai.nama_pegawai as nama, tbl_rules.id as id_rules, tbl_rules.nama_rules FROM tbl_pegawai 
                                    JOIN tbl_rules ON tbl_pegawai.id_rules=tbl_rules.id
                                    WHERE tbl_pegawai.id='$id'") or die (mysqli_error($conn));
    $pimpinan = mysqli_query($conn, "SELECT tbl_pimpinan.nip, tbl_pimpinan.id as id_user, tbl_pimpinan.nama_pimpinan as nama, tbl_rules.id as id_rules, tbl_rules.nama_rules FROM tbl_pimpinan 
                                    JOIN tbl_rules ON tbl_pimpinan.id_rules=tbl_rules.id
                                    WHERE tbl_pimpinan.id='$id'") or die (mysqli_error($conn));
    $count_pegawai = mysqli_num_rows($pegawai);
    $count_pimpinan = mysqli_num_rows($pimpinan);

    if ($count_pegawai > 0) {
        return mysqli_fetch_array($pegawai)[$param];
    } else if ($count_pimpinan > 0) {
        return mysqli_fetch_array($pimpinan)[$param];
    }
}

function get_url() {
    $env = "dev"; // [production, dev]
    $protocol = $env === 'production' ? 'https://' : 'http://';
    $server_name = $_SERVER['HTTP_HOST']; 
    $app = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    return $protocol.$server_name.$app;
}

function url_file() {
    $env = "production"; // [production, dev]
    $path_dev = 'http://localhost:80/simkeu/pages/invoice';
    $path_prod = get_url().'/pages/invoice';
    $final_path = $env === 'dev' ? $path_dev : $path_prod;
    return $final_path;
}

function count_table($name) {
    include "connection.php";
    return mysqli_num_rows(mysqli_query($conn, "SELECT * FROM $name"));
}

function count_table_invoice($param) {
    include "connection.php";
    return mysqli_num_rows(mysqli_query($conn, "SELECT * FROM invoices WHERE product_id='$param' AND deleted_at IS NULL"));
}

function date_ind($param){
    $month = array (1 =>   'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	$split = explode('-', $param);
	return $split[2] . ' ' . $month[ (int)$split[1] ] . ' ' . $split[0];
}

function month_ind($param) {
    $month = [
        "01" => "Januari",
        "02" => "Februari",
        "03" => "Maret",
        "04" => "April",
        "05" => "Mei",
        "06" => "Juni",
        "07" => "Juli",
        "08" => "Agustus",
        "09" => "September",
        "10" => "Oktober",
        "11" => "November",
        "12" => "Desember"
    ];
    return $month[$param];
}

function full_date_ind($param) {
    $day = [
        "Sun" => "Minggu",
        "Mon" => "Senin",
        "Tue" => "Selasa",
        "Wed" => "Rabu",
        "Thu" => "Kamis",
        "Fri" => "Jumat",
        "Sat" => "Sabtu"
    ];
    $month = array (1 =>   'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni','Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	$split = explode('-', $param);
    return $day[$split[0]].', '.$split[1] . ' ' . $month[(int)$split[2]] . ' ' . $split[3];
}

function month_year($a, $b){
    $month = array (1 =>   'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	return $month[$a].' '.$b;
}

function rupiah($param){
	return number_format($param,0,'.',',');
}

function encrypt_decrypt($action, $string) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'xxxxxxxxxxxxxxxxxxxxxxxx';
    $secret_iv = 'xxxxxxxxxxxxxxxxxxxxxxxxx';
    $key = hash('sha256', $secret_key);    
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if( $action == 'decrypt' ) {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}

function label_invoices($param) {
    $tmp = "";
    if ($param == 'Y') {
        $tmp = '<span class="badge badge-success"><i class="fa fa-check"></i></span>';
    } else {
        $tmp = '<span data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top" class="badge badge-danger"><i class="fa fa-spinner fa-pulse"></i></span>';
    }
    return $tmp;
}

function desc_invoices_log($param) {
    include "connection.php";
    $tmp    = "";
    $q      = mysqli_query($conn, "SELECT * FROM invoices WHERE id='$param' AND invoice_log_note IS NOT NULL");
    $data   = mysqli_fetch_array($q);
    $count  = mysqli_num_rows($q);
    if ($count > 0) {
        $tmp = '<p style="padding:0;margin:0;"><span class="badge badge-info">Request Change</span></p>'; 
        $tmp .= '<ol style="padding: 0;margin: 0 0 0 15px;">';
        $tmp .='<li><p style="padding:0;margin:0;">'.$data['invoice_log_note'].' - '.date('d/M/Y', strtotime($data['created_at'])).' '.label_invoices($data['invoice_log_status']).'</p></li>';
        $tmp .= '</ol>';
    } else {
        $tmp = '-';
    }
    return $tmp;
}

function get_romawi($param) {
    $arr = ['', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
    return $arr[ltrim($param, 0)];
}

function role_desc($param) {
    include "connection.php";
    $tmp = "";
    $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM role_login WHERE id=$param"));
    switch($data['id']) {
        case 2:
        $tmp = '<span class="badge badge-info"><i class="fa fa-lock"></i> '.$data['role_login_name'].'</span>';
        break;
        case 3:
        $tmp = '<span class="badge badge-success"><i class="fa fa-lock"></i> '.$data['role_login_name'].'</span>';
        break;
        default:
        $tmp = '<span class="badge badge-warning"><i class="fa fa-lock"></i> '.$data['role_login_name'].'</span>';
        break;
    }
    return $tmp;
}

function description($param1, $param2) {
    include "connection.php";
    $tmp = "";
    if ($param2 === 'PRODUCT002') {
        $get = mysqli_query($conn, "SELECT * FROM invoices
                            JOIN products ON invoices.product_id=products.id
                            JOIN customers ON invoices.customer_id=customers.id
                            JOIN reg ON invoices.reg_id=reg.id
                            WHERE invoices.id='$param1'") or die (mysqli_error($conn));
    } else {
        $get = mysqli_query($conn, "SELECT * FROM invoices
                            JOIN products ON invoices.product_id=products.id
                            JOIN customers ON invoices.customer_id=customers.id
                            WHERE invoices.id='$param1'") or die (mysqli_error($conn));
    }
    $data = mysqli_fetch_array($get);
    switch($data['product_code']) {
        case 'CRG':
            $tmp = '<p style="text-transform:uppercase;">'.$data['invoice_note'].'</p>'.
                    '<p style="text-transform:uppercase;">route:'.$data['invoice_route_from'].' - '.$data['invoice_route_to'].'</p>'.
                    '<p style="text-transform:uppercase;">sebanyak: '.$data['invoice_weight'].' KG</p>'.
                    '<p style="text-transform:uppercase;">periode: '.date('d', strtotime($data['invoice_date_period_1'])).' - '.date_ind($data['invoice_date_period_2']).'</p>';
        break;
        case 'CRT':
            $tmp = '<p style="text-transform:uppercase;">reg: '.$data['reg_name'].'</p>'.
                    '<p style="text-transform:uppercase;">route: '.$data['invoice_route_from'].' - '.$data['invoice_route_to'].'</p>'.
                    '<p style="text-transform:uppercase;">hours: '.$data['invoice_total_hour'].' HOURS</p>';
        break;
        case 'GH':
            $tmp = '<p style="text-transform:capitalize;">'.$data['invoice_note'].'</p>'.
                    '<p style="text-transform:capitalize;">Datang Tanggal '.date_ind($data['invoice_date_period_1']).'</p>'.
                    '<p style="text-transform:capitalize;">Berangkat Tanggal '.date_ind($data['invoice_date_period_2']).'</p>';
        break;
        default:
            $tmp = '<p style="text-transform:uppercase;">'.$data['invoice_note'].'</p>'.
                    '<p style="text-transform:uppercase;">route:'.$data['invoice_route_from'].' - '.$data['invoice_route_to'].'</p>'.
                    '<p style="text-transform:uppercase;">periode: '.date('d', strtotime($data['invoice_date_period_1'])).' - '.date_ind($data['invoice_date_period_2']).'</p>';
        break;
    }
    return $tmp;
}

function penyebut($nilai) {
	$nilai = abs($nilai);
	$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	$temp = "";
	if ($nilai < 12) {
		$temp = " ". $huruf[$nilai];
	} else if ($nilai <20) {
		$temp = penyebut($nilai - 10). " belas";
	} else if ($nilai < 100) {
		$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " seratus" . penyebut($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " seribu" . penyebut($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
	} else if ($nilai < 1000000000) {
		$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
	} else if ($nilai < 1000000000000) {
		$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
	} else if ($nilai < 1000000000000000) {
		$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
	}     
	return $temp;
}

function terbilang($nilai) {
	if($nilai<0) {
		$hasil = "minus ". trim(penyebut($nilai));
	} else {
		$hasil = trim(penyebut($nilai));
	}     		
	return $hasil;
}

function approved_select($param) {
    include "connection.php";
    $tmp = "";
    $count_all = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM invoices WHERE id='$param' AND invoice_log_status='T' AND invoice_log_note IS NOT NULL"));
    $count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM invoices WHERE id='$param' AND invoice_log_status='T'"));
    $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM invoices WHERE id='$param' AND invoice_log_status='T'"));
    if ($count_all > 0) {
        if ($count > 0) $tmp = '<span class="badge badge-danger"><i class="fa fa-remove"></i> not approved</span><select class="form-control approved"><option style="display:none;">- choose -</option><option value="Y'.$data['id'].'">Approved</option><option value="T'.$data['id'].'">Not Approved</option></select>';
    } else {
        if ($count == 0) $tmp = '<span class="badge badge-success"><i class="fa fa-check"></i> approved</span>';
        else $tmp = '-';
    }
    return $tmp;
}

function history_log_print($param) {
    include "connection.php";
    $tmp = "";
    $count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM invoices_print_log WHERE invoice_id='$param'"));
    if ($count > 0) {
        $tmp = '<p style="font-style:italic;font-size:9pt;text-decoration:underline;"><a>'.$count.'x user print</a></p>';
    }
    return $tmp;
}

function date_time($param) {
    return date_ind(date('Y-m-d', strtotime($param))).', Jam '.date('H:i:s', strtotime($param));
}

function history_arsip_invoice($param) {
    include "connection.php";
    $tmp = "";
    $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM invoices WHERE id='$param'"));
    if ($data['invoice_number_rev']) {
        $get = json_decode($data['invoice_log_data'], true);
        $tmp = '<ol style="padding: 0;margin: 0 0 0 15px;">';
        $tmp .='<li><p style="padding:0;margin:0;">'.$data['id'].' - '.date('d/M/Y', strtotime($get['updated_at'])).'<a href="?page=invoiceprint&id='.$data['id'].'&type=L" class="btn btn-primary btn-sm m-1"><i class="fa fa-print"></i> print</a></p></li>';
        $tmp .='<li><p style="padding:0;margin:0;">REV.'.$data['id'].' - '.date('d/M/Y', strtotime($data['updated_at'])).' <span class="badge badge-danger">new <i class="fa fa-star"></i></span> <a href="?page=invoiceprint&id='.$data['id'].'&type=T" class="btn btn-primary btn-sm m-1"><i class="fa fa-print"></i> print</a></p></li>';
        $tmp .= '</ol>';
    } else {
        $tmp = '<ol style="padding: 0;margin: 0 0 0 15px;">';
        $tmp .='<li><p style="padding:0;margin:0;">'.$data['id'].' - '.date('d/M/Y', strtotime($data['updated_at'])).'<a href="?page=invoiceprint&id='.$data['id'].'&type=T"><i class="fa fa-print"></i> print</a></p></li>';
        $tmp .= '</ol>';
    }
    return $tmp;
}

?>