<?php
defined('BASEPATH') or exit('No direct script access allowed');

class karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form'); 
        $this->load->library('form_validation');
        if (!$this->session->userdata('nama_pegawai') || $this->session->userdata('roles') == 'admin' || $this->session->userdata('role') == 'manager') {
            redirect('auth');
        }

        $this->load->model(array('M_crud','M_User'));
        date_default_timezone_set('asia/jakarta');
    }

    public function index()
    {

        $data['user'] = $this->db->get_where(
            'tbl_pegawai',
            ['nama_pegawai' => $this->session->userdata('nama_pegawai')],
            ['email' => $this->session->userdata('email')]
        )
            ->row_array();

        //get data jam masuk dan keluar
        $jam = $this->db->query("SELECT jam_masuk, jam_keluar, batas_jam_masuk FROM tbl_jadwal")->row_array();
        $data['jamMasuk'] = $jam['jam_masuk'];
        $data['batas_jam_masuk'] = $jam['batas_jam_masuk'];
        $data['jamKeluar'] = $jam['jam_keluar'];
        $data['user'] = $this->db->get_where(
            'tbl_pegawai',
            ['nama_pegawai' => $this->session->userdata('nama_pegawai')]
        )
            ->row_array();
        $this->load->view('karyawan/dashboard', $data);
    }

    public function lokasi(){


    $latitude   = $_POST['lat'];
    $longitude  = $_POST['long'];

 $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' . trim($latitude) . ',' . trim($longitude) . '&sensor=false';
  $json = @file_get_contents($url);
  $data = json_decode($json);
  $status = $data->status;
  var_dump($status);
  die();
  if ($status == "OK")
    return $data->results[0]->formatted_address;
  else
    return false;
}

    /*if (!empty($latitude) && !empty($longitude)) {

        $gmap = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($latitude).','.$longitude.'&sensor=false';
        // curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $gmap);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT,3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
        $response = curl_exec($ch);
        curl_close($ch);
        // end curl
        $data = json_decode($response);

        if ($response) {
            echo json_encode($data->results[0]->formatted_address);
        }else{
            echo json_encode(false);
        }
    }*/
    

     function udate_profile()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('namaKaryawan');
        $tempat = $this->input->post('namaKaryawan');
        $nik = $this->input->post('nik');
        $alamat = $this->input->post('alamat');
        $hp = $this->input->post('hp');
        $tgl_lahir= $this->input->post('tgl_lahir');

        $data = [
            'id' => $id,
            'nama_pegawai' => $nama,
            'tgl_lahir' => $tgl_lahir,
            'alamat' => $alamat,
            'no_hp' => $hp,  
            'nik' =>$nik  
        ];

        $this->db->update('tbl_pegawai', $data, array('id' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-success outline" role="alert">
        Data Berhasil Diubah</div>');
        redirect('karyawan/index');
    }



     public function absenku()
    {

        $data['user'] = $this->db->get_where(
            'tbl_pegawai',
            ['nama_pegawai' => $this->session->userdata('nama_pegawai')],
            ['email' => $this->session->userdata('email')]
        )
            ->row_array();
        $data['absen'] = $this->M_User->getabsen_karywan($data['user']['id']);
        //get data jam masuk dan keluar
        $jam = $this->db->query("SELECT jam_masuk, jam_keluar, batas_jam_masuk FROM tbl_jadwal")->row_array();
        $data['jamMasuk'] = $jam['jam_masuk'];
        $data['batas_jam_masuk'] = $jam['batas_jam_masuk'];
        $data['jamKeluar'] = $jam['jam_keluar'];
        $data['user'] = $this->db->get_where(
            'tbl_pegawai',
            ['nama_pegawai' => $this->session->userdata('nama_pegawai')]
        )
            ->row_array();
        $this->load->view('karyawan/absenku', $data);
    }


    public function kegiatan()
    {
        $data['user'] = $this->db->get_where(
            'tbl_pegawai',
            ['nama_pegawai' => $this->session->userdata('nama_pegawai')],
        )
            ->row_array();

        $data['pegawai'] = $this->M_User->getpegawai();
        $data['kegiatan'] = $this->M_User->getkegiatan($data['user']['id']);
        $this->load->view('karyawan/kegiatan', $data);
    }


    public function save_kegiatan()
    {
        $kegiatan = $this->input->post('nama_kegiatan');
        $id_pegawai= $this->input->post('pegawai');
        $start_date= $this->input->post('start_date');
        $end_date =$this->input->post('end_date');

        $surat = $_FILES['surat']['name'];
        $dir_upload = "./assets/surat/";
        // ubah spasi menjadi -
        $surat = str_replace(" ", "-", $surat);
        move_uploaded_file ($_FILES['surat']['tmp_name'],$dir_upload.$surat);
        $rincian = $this->input->post('rincian');
        $date= date('Y-m-d');

        $this->M_User->insert_kegiatan($kegiatan,$id_pegawai,$start_date,$end_date,$rincian,$surat,$date);
        $this->session->set_flashdata('message', '<div class="alert alert-success outline" role="alert">
        Jadwal berhasi ditambahkan</div>');
        redirect('karyawan/kegiatan');
    }

     public function upload_kegiatan($id)
    {
         $data['user']= $this->db->get_where('tbl_pegawai',
        ['nama_pegawai' => $this->session->userdata('nama_pegawai')])
        ->row_array();
        $data['tes'] = $this->db->get('tbl_pegawai')->result();
        $data['kegiatan']= $this->M_User->getkegiatanById($id);
        $this->load->view('karyawan/upload', $data);
        
    }


    function update_kegiatan()
    {
        $id = $this->input->post('id');
        $kegiatan = $this->input->post('nama_kegiatan');
        $start_date= $this->input->post('start_date');
        $end_date =$this->input->post('end_date');
        $rincian = $this->input->post('rincian');
       
        $surat = $_FILES['surat']['name'];
        $dir_upload = "./assets/surat/";
        // ubah spasi menjadi -
        $surat = str_replace(" ", "-", $surat);
        move_uploaded_file ($_FILES['surat']['tmp_name'],$dir_upload.$surat);
        $date= date();

       
        $this->M_User->upload_kegiatan($id,$kegiatan,$start_date,$end_date,$rincian,$surat,$date);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil diubah </div>');
        redirect('karyawan/kegiatan');
    }

    function download($filename, $folder)
   {
    $dir = 'assets/surat/';
      $file = $dir . $filename;
      if (file_exists($file)) {
         header('Content-Description: File Transfer');
         header('Content-Type: application/octet-stream');
         header('Content-Disposition: attachment; filename=' . basename($file));
         header('Content-Transfer-Encoding: binary');
         header('Expires: 0');
         header('Cache-Control: private');
         header('Pragma: private');
         header('Content-Length: ' . filesize($file));
         ob_clean();
         flush();
         readfile($file);
         exit;
      } else {
         echo 'file tidak ditemukan';
      }
   }


    function save_absen()
    {
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $jamMasuk = $this->input->post('jamMasuk');
        $jamKeluar = $this->input->post('jamKeluar');
        $batas_jam_masuk = $this->input->post('batas_jam_masuk');
        $absen = $this->input->post('absen');
        $getjam= $this->input->post('getjam');
        $tgl_absen= date('Y-m-d');
        $kota= "Bogor, Indonesia";
//mendefinisikan folder
        /*define('UPLOAD_DIR', './assets/img/');*/
    
        
        //menangkap variabel
        $img        = $this->input->post('image');
        $img        = str_replace('data:image/jpeg;base64,', '', $img);
        $img        = str_replace(' ', '+', $img);
        //resource gambar diubah dari encode
        $data       = base64_decode($img);
        //menamai file, file dinamai secara random dengan unik
        $file       = uniqid() . '.jpg';
        //memindahkan file ke folder upload
        /*file_put_contents(UPLOAD_DIR.$file, $data);*/
        file_put_contents(FCPATH.'./assets/img/'.$file,$data);

        if($getjam >= $jamMasuk && $getjam <= $batas_jam_masuk){
        $data = [
            'id_pegawai' => $id,
            'id_jadwal' => 9,
            'tgl_absen' => date('Y-m-d'),
            'jam_masuk' => $getjam,
            'jam_keluar' => '0', 
            'image'    => $file,             
            'status_absen' => 1,
            'lokasi' =>$kota,
        ];

        /*var_dump($data);
        die();*/

        $this->db->insert('tbl_absensi', $data);
        
        }else{
            $data = [
            'jam_keluar' => $getjam,

        ];
        $this->db->update('tbl_absensi', $data, array('id_pegawai' => $id, 'tgl_absen' =>$tgl_absen));
        $this->session->set_flashdata('message', '<div class="alert alert-success outline" role="alert">
        Berhasil Melakukan</div>');
        redirect('karyawan/absenku');
        }

    }

    public function rekap()
    {
        $data['user'] = $this->db->get_where(
            'tbl_pegawai',
            ['nama_pegawai' => $this->session->userdata('nama_pegawai')]
        )
            ->row_array();

        if ($this->input->post('submit')) {
            $tgl_awal = $this->input->post('awal');
            $tgl_akhir = $this->input->post('akhir');
           /* var_dump($tgl_akhir);
            die();*/
            $judul = 'Laporan Pesanan Masuk';
               if ($tgl_akhir=="") {
             $tgl_akhir=$tgl_awal;}
          }else{
                $tgl_awal = null;
                $tgl_akhir = null;
                $judul = 'Laporan Pesanan Masuk';
        }
        
        $data['absen'] = $this->M_User->getabsen_karywan($data['user']['id'], $tgl_awal, $tgl_akhir);
       /* var_dump($data['absen']);
        die();*/
       
        $jam = $this->db->query("SELECT jam_masuk, jam_keluar, batas_jam_masuk FROM tbl_jadwal")->row_array();
        $data['jamMasuk'] = $jam['jam_masuk'];
        $data['tawal']= $tgl_awal;
        $data['takhir']= $tgl_akhir;

        $data['batas_jam_masuk'] = $jam['batas_jam_masuk'];
        $data['jamKeluar'] = $jam['jam_keluar'];
        $this->load->view('karyawan/rekap', $data);
    }

    public function cetakk(){
    $tgl_awal = $this->input->get('tawal');
    $tgl_akhir = $this->input->get('takhir');
    $pegawai = $this->input->get('pegawai');
         $data ['tgl_awal']=$tgl_awal; 
         $data ['tgl_akhir']=$tgl_akhir;
         $data ['pegawai']=$pegawai;
    $data['pegawai'] = $this->M_crud->getpegawai();
    $data['absen'] = $this->M_crud->cetak_absen($tgl_awal, $tgl_akhir,$pegawai);
    $data['kegiatan'] = $this->M_crud->getkegiatan($tgl_awal, $tgl_akhir,$pegawai); 
    $this->load->view('admin/absen/report',$data); 
       
} 

}

 /* $data['pegawai'] = $this->M_crud->getpegawai();
        $data['kegiatan'] = $this->M_crud->getkegiatan();*/
        /* $data['datas'] = $this->M_crud->getTotalAbsen($data['user']['id']);*/
        /*$data['absen'] = $this->M_crud->getabsen($tgl_awal, $tgl_akhir);*/
/*
 if ($absen >= $jamMasuk && $absen <= $batas_jam_masuk) {
            $keterangan = 'absen masuk';
            $status = '1';
        } else if ($absen > $batas_jam_masuk && $absen < $jamKeluar) {
            $keterangan = 'absen masuk';
            $status = '0';
        } else {
            $keterangan = 'absen keluar';
            $status = '1';
        }*/