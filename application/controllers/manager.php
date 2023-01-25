<?php
defined('BASEPATH') or exit('No direct script access allowed');

class manager extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama_pegawai') || $this->session->userdata('roles')=='pegawai'|| $this->session->userdata('roles')=='admin') {
            redirect('auth');}

        $this->load->model(array('M_crud','M_User'));
        date_default_timezone_set('asia/jakarta');   
    }

   /* public function index()
    {
        $data['user']= $this->db->get_where('tbl_pegawai',
        ['nama_pegawai' => $this->session->userdata('nama_pegawai')])
        ->row_array();
        $this->load->view('manager/dashboard', $data);
    }*/

    public function index()
    {
        $data['user']= $this->db->get_where('tbl_pegawai',
        ['nama_pegawai' => $this->session->userdata('nama_pegawai')])
        ->row_array();
        /*$data['kegiatan'] = $this->M_crud->getkegiatan();
       /* var_dump($data['kegiatan']);
        die();*/
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

        $this->load->view('manager/kegiatan/index', $data);
    }

    public function nilai_kegiatan($id)
    {
         $data['user']= $this->db->get_where('tbl_pegawai',
        ['nama_pegawai' => $this->session->userdata('nama_pegawai')])
        ->row_array();
        $data['kegiatan']= $this->M_User->getkegiatanById($id);
        $this->load->view('manager/kegiatan/nilaikegiatan', $data);
        
    }

     function update_kegiatan()
    {
        
        $id = $this->input->post('id');
        $nilai = $this->input->post('nilai');
        $status = '1';
        $this->M_User->nilai_kegiatan($id,$nilai,$status );
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil diubah </div>');
        redirect('manager/index');
    }

     public function rekap()
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
        $jam = $this->db->query("SELECT jam_masuk, jam_keluar, batas_jam_masuk FROM tbl_jadwal")->row_array();
        $data['jamMasuk'] = $jam['jam_masuk'];
        $data['batas_jam_masuk'] = $jam['batas_jam_masuk'];

          $data['absen'] = $this->M_User->getabsen($tgl_awal, $tgl_akhir,$pegawai);
          $data['jamMasuk'] = $jam['jam_masuk'];
          $data ['tgl_awal']=$tgl_awal;
          $data ['tgl_akhir']=$tgl_akhir;
          $data ['pegawai']=$pegawai;
          $this->load->view('manager/rekap', $data);
    }

    public function cetakk(){
    $tgl_awal = $this->input->get('tawal');
    $tgl_akhir = $this->input->get('takhir');
    $pegawai = $this->input->get('pegawai');
    if ($tgl_akhir=="") {
             $tgl_akhir=$tgl_awal;}
         $data ['tgl_awal']=$tgl_awal; 
         $data ['tgl_akhir']=$tgl_akhir;
         $data ['pegawai']=$pegawai;

    $data['absen'] = $this->M_crud->cetak_absen($tgl_awal, $tgl_akhir,$pegawai);
    $data['kegiatan'] = $this->M_crud->getkegiatan($tgl_awal, $tgl_akhir,$pegawai); 
    $this->load->view('admin/absen/report',$data); 
       
} 


}
