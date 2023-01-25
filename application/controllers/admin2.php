<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin2 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama_pegawai') || $this->session->userdata('roles')=='pegawai'|| $this->session->userdata('role')=='manager') {
            redirect('auth');}

        $this->load->model(array('M_crud'));
        date_default_timezone_set('asia/jakarta');
    }

    public function index()
    {
        $data['user']= $this->db->get_where('tbl_pegawai',
        ['nama_pegawai' => $this->session->userdata('nama_pegawai')])
        ->row_array();
        $data['jumlah']=$this->M_crud->sumpegawai();
        $data['kegiatan']=$this->M_crud->jumlahkegiatan();
        $data['show']=$this->M_crud->sumkegiatan();
        $data['hide']=$this->M_crud->sumkegiatann();
        $this->load->view('admin/dashboard', $data);
    }

    public function karyawan()
    {
        $data['user']= $this->db->get_where('tbl_pegawai',
        ['nama_pegawai' => $this->session->userdata('nama_pegawai')])
        ->row_array();
        $data['pegawai'] = $this->M_crud->getpegawai();
        $this->load->view('admin/pegawai/index', $data);
    }

    public function kegiatan()
    {
        $data['user']= $this->db->get_where('tbl_pegawai',
        ['nama_pegawai' => $this->session->userdata('nama_pegawai')])
        ->row_array();

        if ($this->input->post('submit')) {
            $tgl_awal = $this->input->post('awal');
            $tgl_akhir = $this->input->post('akhir');
            $pegawai = $this->input->post('pegawai');
            $judul = 'Laporan Pesanan Masuk';
               if ($tgl_akhir=="") {
             $tgl_akhir=$tgl_awal;}
          }else{
                $tgl_awal = null;
                $tgl_akhir = null;
                $pegawai = null;
                $judul = 'Laporan kegiatan';
        }

        $data['pegawai'] = $this->M_crud->getpegawai();
        $data['kegiatan'] = $this->M_crud->getkegiatan($tgl_awal, $tgl_akhir,$pegawai);
        $data['awal']= $tgl_awal;
        $data['akhir']= $tgl_akhir;
        $this->load->view('admin/kegiatan/index', $data);
    }

    public function jadwal()
    {
        $data['user']= $this->db->get_where('tbl_pegawai',
        ['nama_pegawai' => $this->session->userdata('nama_pegawai')])
        ->row_array();
        $data['jadwal'] = $this->M_crud->getjadawal();
        $this->load->view('admin/jadwal/index', $data);
    }

    public function absenn()
    {
        $data['user'] = $this->db->get_where(
            'tbl_pegawai',
            ['nama_pegawai' => $this->session->userdata('nama_pegawai')]
        )
            ->row_array();
        $jam = $this->db->query("SELECT jam_masuk, jam_keluar, batas_jam_masuk FROM tbl_jadwal")->row_array();
        $data['jamMasuk'] = $jam['jam_masuk'];

        $data['batas_jam_masuk'] = $jam['batas_jam_masuk'];
        $data['jamKeluar'] = $jam['jam_keluar'];

        $data['pegawai'] = $this->M_crud->getpegawai();
        $data['kegiatan'] = $this->M_crud->getkegiatan();

        $data['absen'] = $this->M_crud->getabsen();

    /*    $data['datas'] = $this->M_crud->getTotalAbsen();*/
        $this->load->view('admin/absen/index', $data);
    }

     public function absen()
    {
        $data['user']= $this->db->get_where('tbl_pegawai',
        ['nama_pegawai' => $this->session->userdata('nama_pegawai')])
        ->row_array();

        if ($this->input->post('submit')) {
            $tgl_awal = $this->input->post('awal');
            $tgl_akhir = $this->input->post('akhir');
            $pegawai = $this->input->post('pegawai');
            $judul = 'Laporan Pesanan Masuk';
               if ($tgl_akhir=="") {
             $tgl_akhir=$tgl_awal;}
          }else{
                $tgl_awal = null;
                $tgl_akhir = null;
                $pegawai = null;
                $judul = 'Laporan Pesanan Masuk';
        }

        $data['absen'] = $this->M_crud->getabsen($tgl_awal, $tgl_akhir,$pegawai);
        /*  var_dump($data['absen']);*/
        $jam = $this->db->query("SELECT jam_masuk, jam_keluar, batas_jam_masuk FROM tbl_jadwal")->row_array();
        $data['jamMasuk'] = $jam['jam_masuk'];

        $data['batas_jam_masuk'] = $jam['batas_jam_masuk'];
        $data['jamMasuk'] = $jam['jam_masuk'];
          $data['title']= 'Laporan Pemesanan Obat RS. UMMI Bogor.pdf';
          $data ['tgl_awal']=$tgl_awal;
          $data ['tgl_akhir']=$tgl_akhir;
          $data ['pegawai']=$pegawai;
          $this->load->view('admin/absen/index', $data);
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


 public function detail_absen()
    {
        $data['user']= $this->db->get_where('tbl_pegawai',
        ['nama_pegawai' => $this->session->userdata('nama_pegawai')])
        ->row_array();

        if ($this->input->post('submit')) {
            $tgl_awal = $this->input->post('awal');
            $tgl_akhir = $this->input->post('akhir');
            $pegawai = $this->input->post('pegawai');
            $judul = 'Laporan Pesanan Masuk';
               if ($tgl_akhir=="") {
             $tgl_akhir=$tgl_awal;}
          }else{
                $tgl_awal = null;
                $tgl_akhir = null;
                $pegawai = null;
                $judul = 'Laporan Pesanan Masuk';
        }

          $data['absen'] = $this->M_crud->detail_absen($tgl_awal, $tgl_akhir,$pegawai);
        /*  var_dump($data['absen']);*/

          $data['title']= 'Laporan Pemesanan Obat RS. UMMI Bogor.pdf';
          $data ['tgl_awal']=$tgl_awal;
          $data ['tgl_akhir']=$tgl_akhir;
          $data ['pegawai']=$pegawai;
          $this->load->view('admin/absen/detail_absen', $data);
    }

    public function cetak_detail(){
    $tgl_awal = $this->input->get('tawal');
    $tgl_akhir = $this->input->get('takhir');
    $pegawai = $this->input->get('pegawai');

         $data ['tgl_awal']=$tgl_awal; 
         $data ['tgl_akhir']=$tgl_akhir;
         $data ['pegawai']=$pegawai;

    $data['absen'] = $this->M_crud->cetak_absenn($tgl_awal, $tgl_akhir,$pegawai); 
    $this->load->view('admin/absen/report',$data); 
       
    } 


    public function save_pegawai()
    {
        
        $data  = array(
            'nama_pegawai'=> htmlspecialchars($this->input->post('pegawai', true)),
            'tempat'=> htmlspecialchars($this->input->post('tempat',true)),
            'tgl_lahir'=> htmlspecialchars($this->input->post('tgl_lahir',true)),
            'alamat'=> htmlspecialchars($this->input->post('alamat',true)),
            'email'=> htmlspecialchars($this->input->post('email',true)),
            'no_hp'=> htmlspecialchars($this->input->post('hp',true)),
            /*'gambar'=>'default.jpg',*/
            'roles' => htmlspecialchars($this->input->post('roles', true)),
            'password'=> "$2y$10$06DxjndRcI5nAcplCpUK..dG6ZehzzrE2uVwh7QDFpPPv1g9UM4I6",
            'jk' => htmlspecialchars($this->input->post('jk',true)),
            'is_active' => 1,
            'created_at' => time()
        );
        $this->db->insert('tbl_pegawai',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        karyawan Berhasi ditambahkan</div>');
        redirect('admin2/karyawan');
    }

     public function save_jadwal()
    {
        $data  = array(
            'jam_masuk'=>$this->input->post('jam_masuk', true),
            'jam_keluar'=> $this->input->post('jam_keluar',true),    
        );
        $this->db->insert('tbl_jadwal',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success outline" role="alert">
        Jadwal berhasi ditambahkan</div>');
        redirect('admin2/jadwal');
    }

     public function save_kegiatan()
    {
        $data  = array(
            'nama_kegiatan'=>$this->input->post('nama_kegiatan'),
            'id_pegawai'=> $this->input->post('pegawai'), 
            'start_date'=>$this->input->post('start_date'),
            'end_date'=> $this->input->post('start_date'), 
        );
         $this->db->insert('tbl_kegiatan',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success outline" role="alert">
        Jadwal berhasi ditambahkan</div>');
        redirect('admin2/kegiatan');
    }

     public function delete_peg($id)
    {
   
    $this->M_crud->delete_pegawai($id);   
     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil Dihapus  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></div>');
        redirect('admin2/karyawan');
        
    }

     public function delete_kegiatan($id)
    {
   
    $this->M_crud->delete_kegiatan($id);   
     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil Dihapus  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></div>');
        redirect('admin2/kegiatan');
        
    }

    public function edit_kegiatan($id)
    {
         $data['user']= $this->db->get_where('tbl_pegawai',
        ['nama_pegawai' => $this->session->userdata('nama_pegawai')])
        ->row_array();
        $data['tes'] = $this->db->get('tbl_pegawai')->result();
        $data['kegiatan']= $this->M_crud->getkegiatanById($id);
        $this->load->view('admin/kegiatan/edit', $data);
        
    }

    function update_kegiatan(){
    $id=$this->input->post('id');
    $id_pegawai=$this->input->post('nama_pegawai'); 
    $nama_kegiatan=$this->input->post('nama_kegiatan');
    $start_date=$this->input->post('start_date');
    $end_date=$this->input->post('end_date');

    $this->M_crud->update_kegiatan($id,$id_pegawai,$nama_kegiatan,$start_date,$end_date);
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil diubah </div>');
        redirect('admin2/kegiatan');

    }

     public function edit_pegawai()
    {
        $id=$this->input->post('id');
        $nama_pegawai=$this->input->post('pegawai');
        $tempat=$this->input->post('tempat');
        $tgl_lahir=$this->input->post('tgl_lahir');
        $alamat=$this->input->post('alamat');
        $email=$this->input->post('email');
        $no_hp=$this->input->post('hp');
        $roles=$this->input->post('roles');
        $pwd="$2y$10$06DxjndRcI5nAcplCpUK..dG6ZehzzrE2uVwh7QDFpPPv1g9UM4I6";
        $nik=$this->input->post('nik');
        $jk=$this->input->post('jk');
        /*$data  = array(
            'nama_pegawai'=> htmlspecialchars($this->input->post('pegawai', true)),
            'tempat'=> htmlspecialchars($this->input->post('tempat',true)),
            'tgl_lahir'=> htmlspecialchars($this->input->post('tgl_lahir',true)),
            'alamat'=> htmlspecialchars($this->input->post('alamat',true)),
            'email'=> htmlspecialchars($this->input->post('email',true)),
            'no_hp'=> htmlspecialchars($this->input->post('hp',true)),
            /*'gambar'=>'default.jpg',
           
            'jk' => htmlspecialchars($this->input->post('jk',true)),
        );*/
        $this->M_crud->update_karyawan($id,$nama_pegawai,$tempat,$tgl_lahir,$alamat,$email,$no_hp,$roles,$nik,$jk);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        karyawan Berhasi ditambahkan</div>');
        redirect('admin2/karyawan');
    }

    public function edit_jadwal($id)
    {
         $data['user']= $this->db->get_where('tbl_pegawai',
        ['nama_pegawai' => $this->session->userdata('nama_pegawai')])
        ->row_array();
        $data['kegiatan']= $this->M_crud->getjadwalById($id);
        $this->load->view('admin/jadwal/editjadwal', $data);
        
    }

    public function edit_peg($id)
    {
         $data['user']= $this->db->get_where('tbl_pegawai',
        ['nama_pegawai' => $this->session->userdata('nama_pegawai')])
        ->row_array();
        $data['peg']= $this->M_crud->getpegawaiById($id);
        $this->load->view('admin/pegawai/edit', $data);
        
    }

    function ubahjadwal(){
    $id=$this->input->post('id');
    $jam_masuk=$this->input->post('jam_masuk'); 
    $batas_jam_masuk=$this->input->post('batas_jam_masuk');
    $jam_keluar=$this->input->post('jam_keluar');
   

    $this->M_crud->update_jadwal($id,$jam_masuk,$batas_jam_masuk,$jam_keluar);
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil diubah </div>');
        redirect('admin2/jadwal');

    }

}
