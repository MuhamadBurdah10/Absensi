<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{

    function getpegawai()
    {
        $sql = "SELECT *  FROM tbl_pegawai  ORDER BY id ASC";
        $query = $this->db->query($sql);
        return $result = $query->result();
    }

      public function getkegiatan($index_data = NULL)
    {
        $hasil = $this->db->select('tbl_pegawai.*,
        tbl_kegiatan.id_kegiatan,
        tbl_kegiatan.nama_kegiatan,
        tbl_kegiatan.start_date,
        tbl_kegiatan.end_date,
        tbl_kegiatan.surat_kegiatan,
        tbl_kegiatan.rincian_kegiatan,
        tbl_kegiatan.nilai_kegiatan,
        tbl_kegiatan.status_kegiatan
        ');
        $this->db->join('tbl_kegiatan', 'tbl_kegiatan.id_pegawai=tbl_pegawai.id');
        $this->db->from('tbl_pegawai');

        if ($index_data != NULL) {
            $this->db->where('tbl_kegiatan.id_pegawai', $index_data);
            /* $this->db->where('pesanan.status',$proses);
        $this->db->where('pesanan.tanggal',$tgl);*/

            $query = $this->db->get();
            return $query->result();
        }
    }

     function getabsen($tgl_awal = null, $tgl_akhir = null, $pegawai = null)
    {
        if ($tgl_awal == null or $tgl_awal == "")  $tgl_awal = date('Y/m/d');
        if ($tgl_akhir == null or $tgl_akhir == "") $tgl_akhir = date('Y/m/d');

        if ($pegawai == null) {
            $sql = "SELECT a.jam_masuk,a.jam_keluar,a.image, a.id_pegawai, p.nama_pegawai, a.tgl_absen, a.status_absen FROM tbl_absensi a JOIN tbl_pegawai p ON p.id = a.id_pegawai  AND a.tgl_absen BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY a.id_pegawai ";
        } else {
            $sql = "SELECT a.jam_masuk,a.jam_keluar,a.image, a.id_pegawai, p.nama_pegawai, a.tgl_absen, a.status_absen  FROM tbl_absensi a
                JOIN tbl_pegawai p on p.id = a.id_pegawai AND a.tgl_absen BETWEEN '$tgl_awal' AND '$tgl_akhir' AND a.id_pegawai=$pegawai ORDER BY a.id_pegawai";
        }
        //echo $querinya;
        //die();
        $q = $this->db->query($sql);
        return $q->result();
    }

   
    function getabsen_karywan( $index_data, $tgl_awal = null, $tgl_akhir = null)
    {
            if ($tgl_awal == null or $tgl_awal == "")  $tgl_awal = date('Y/m/d');
            if ($tgl_akhir == null or $tgl_akhir == "") $tgl_akhir = date('Y/m/d');

            $sql = "SELECT p.nama_pegawai,a.jam_masuk,a.jam_keluar,a.status_absen,a.image,a.lokasi, a.tgl_absen, a.status_absen  FROM tbl_absensi a
                JOIN tbl_pegawai p on p.id = a.id_pegawai AND a.id_pegawai=$index_data AND a.tgl_absen BETWEEN '$tgl_awal' AND '$tgl_akhir'";
       
        $q = $this->db->query($sql);
        return $q->result();
    }

    function getkegiatanById($id)
    {
         $q = $this->db->query("SELECT p.nama_pegawai,a.rincian_kegiatan,a.start_date,a.end_date,a.nama_kegiatan,a.id_kegiatan,a.surat_kegiatan  FROM tbl_kegiatan a
        JOIN tbl_pegawai p on p.id = a.id_pegawai  where a.id_kegiatan=$id");
        return $q->result_array();
    }

    public function insert_kegiatan($kegiatan,$id_pegawai,$start_date,$end_date,$rincian,$surat,$date){
        $data = array(
            'id_pegawai'=>$id_pegawai,
            'nama_kegiatan'=>$kegiatan,
            'start_date'=>$start_date,
            'end_date' =>$end_date,
            'rincian_kegiatan' => $rincian,
            'surat_kegiatan' => $surat,
            'created_at'=>$date
        );
        $this->db->insert('tbl_kegiatan', $data);

   }

    function upload_kegiatan($id,$kegiatan,$start_date,$end_date,$rincian,$surat,$date)
    {
        $data = array(
            'id_kegiatan' => $id,
            'nama_kegiatan'=>$kegiatan,
            'start_date'=>$start_date,
            'end_date' =>$end_date,
            'rincian_kegiatan' => $rincian,
            'surat_kegiatan' => $surat,

        );

        $this->db->where('id_kegiatan', $id);
        $this->db->update('tbl_kegiatan', $data);
    }

//manager
     function nilai_kegiatan($id,$nilai,$status)
    {
        $data = array(
            'id_kegiatan' => $id,
            'status_kegiatan'=>$status,
            'nilai_kegiatan' => $nilai
        );

        $this->db->where('id_kegiatan', $id);
        $this->db->update('tbl_kegiatan', $data);
    }

 /* function getabsen_karywanc( $index_data)
    {
       
            $sql = "SELECT p.nama_pegawai,a.image,a.jam_masuk,a.jam_keluar, a.tgl_absen, a.status_absen  FROM tbl_absensi a
                JOIN tbl_pegawai p on p.id = a.id_pegawai AND a.id_pegawai=$index_data ORDER BY p.nama_pegawai";
       
        //echo $querinya;
        //die();
        $q = $this->db->query($sql);
        return $q->result();
    }*/


        
    }

