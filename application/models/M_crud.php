<?php
class M_crud extends CI_Model
{


    function getjadawal()
    {
        $sql = "SELECT *  FROM tbl_jadwal  ORDER BY id ASC";
        $query = $this->db->query($sql);
        return $result = $query->result();
    }

    function getpegawai()
    {
        $sql = "SELECT *  FROM tbl_pegawai  ORDER BY id ASC";
        $query = $this->db->query($sql);
        return $result = $query->result();
    }

     function getpegawaii()
    {
        $sql = "SELECT *  FROM tbl_pegawai  ORDER BY id ASC";
        $query = $this->db->query($sql);
        return $result = $query->result();
    }

    public function getpegawaiById($id){
        $hasil=$this->db->get_where('tbl_pegawai', ["id"=>$id])->row_array();
        return $hasil;
    }


    function getkegiatan($tgl_awal = null, $tgl_akhir = null, $pegawai = null)
    {
        
        if ($tgl_awal == null or $tgl_awal == "")  $tgl_awal = date('Y/m/d');
        if ($tgl_akhir == null or $tgl_akhir == "") $tgl_akhir = date('Y/m/d');

        if ($pegawai == null) {

         $sql = "SELECT *  FROM tbl_kegiatan k
         JOIN tbl_pegawai p on k.id_pegawai=p.id  AND k.created_at BETWEEN '$tgl_awal' AND '$tgl_akhir'

         ORDER BY k.id_pegawai ASC";

        } else {

            $sql = "SELECT *  FROM tbl_kegiatan k
         JOIN tbl_pegawai p on k.id_pegawai=p.id  AND k.created_at BETWEEN '$tgl_awal' AND '$tgl_akhir' AND k.id_pegawai=$pegawai

         ORDER BY k.id_pegawai ASC";
        }

        $q = $this->db->query($sql);
        return $q->result();
    }

     public function getkegiatanById($id){
        $hasil=$this->db->get_where('tbl_kegiatan', ["id_kegiatan"=>$id])->row_array();
        return $hasil;
    }

     public function getjadwalById($id){
        $hasil=$this->db->get_where('tbl_jadwal', ["id"=>$id])->row_array();
        return $hasil;
    }

     public function delete_kegiatan($id){
        return $this->db->delete('tbl_kegiatan', array("id_kegiatan"=>$id));
    }

    public function delete_pegawai($id){
        return $this->db->delete('tbl_pegawai', array("id"=>$id));
    }


     public function update_kegiatan($id,$id_pegawai,$nama_kegiatan,$start_date,$end_date){

        $data = array(
            'id_kegiatan'=>$id,
            'id_pegawai'=>$id_pegawai,
            'nama_kegiatan'=>$nama_kegiatan,
            'start_date'=>$start_date,
            'end_date' =>$end_date
        );
        $this->db->where('id_kegiatan', $id);
        $this->db->update('tbl_kegiatan', $data);

   }

    public function update_karyawan($id,$nama_pegawai,$tempat,$tgl_lahir,$alamat,$email,$no_hp,$roles,$nik,$jk){

        $data = array(
            'id'=>$id,
            'nama_pegawai'=>$nama_pegawai,
            'tempat'=>$tempat,           
            'tgl_lahir'=>$tgl_lahir,
            'alamat'=>$alamat,             
            'email'=>$email,            
            'no_hp'=>$no_hp,
            'roles'=>$roles,
            'nik'=>$nik,
            'jk'=>$jk       
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_pegawai', $data);

   }

    public function update_jadwal($id,$jam_masuk,$batas_jam_masuk,$jam_keluar){
        $data = array(
            'id'=>$id,
            'jam_masuk'=>$jam_masuk,
            'batas_jam_masuk'=>$batas_jam_masuk,
            'jam_keluar'=>$jam_keluar
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_jadwal', $data);

   }

    function getabsen($tgl_awal = null, $tgl_akhir = null, $pegawai = null)
    {
        if ($tgl_awal == null or $tgl_awal == "")  $tgl_awal = date('Y/m/d');
        if ($tgl_akhir == null or $tgl_akhir == "") $tgl_akhir = date('Y/m/d');

        if ($pegawai == null) {

            $sql = "SELECT a.jam_masuk, a.jam_keluar, p.nama_pegawai, a.lokasi,a.tgl_absen, a.status_absen,a.image,p.roles FROM tbl_absensi a JOIN tbl_pegawai p ON p.id = a.id_pegawai  AND a.tgl_absen BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY a.tgl_absen ASC";
        } else {

            $sql = "SELECT p.nama_pegawai,a.jam_keluar,a.jam_masuk,a.lokasi, a.tgl_absen, a.status_absen ,a.image,p.roles  FROM tbl_absensi a
                JOIN tbl_pegawai p on p.id = a.id_pegawai AND a.tgl_absen BETWEEN '$tgl_awal' AND '$tgl_akhir' AND a.id_pegawai=$pegawai ORDER BY a.tgl_absen ASC";
        }

        $q = $this->db->query($sql);
        return $q->result();
    }

     function printabsen($tgl_awal = null, $tgl_akhir = null, $pegawai = null)
    {
       
    }

    function detail_absen($tgl_awal = null, $tgl_akhir = null, $pegawai = null)
    {
        if ($tgl_awal == null or $tgl_awal == "")  $tgl_awal = date('Y/m/d');
        if ($tgl_akhir == null or $tgl_akhir == "") $tgl_akhir = date('Y/m/d');

        if ($pegawai == null) {


            $sql = "SELECT count(p.nama_pegawai) as jumlah_absen, p.nama_pegawai,a.tgl_absen, a.status_absen FROM tbl_absensi a JOIN tbl_pegawai p ON p.id = a.id_pegawai  AND a.tgl_absen BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY p.nama_pegawai ";
        } else {

            $sql = "SELECT count(p.nama_pegawai) as jumlah_absen,p.nama_pegawai, a.tgl_absen, a.status_absen  FROM tbl_absensi a
                JOIN tbl_pegawai p on p.id = a.id_pegawai AND a.tgl_absen BETWEEN '$tgl_awal' AND '$tgl_akhir' AND a.id_pegawai=$pegawai ORDER BY p.nama_pegawai";
        }
        //echo $querinya;
        //die();
        $q = $this->db->query($sql);
        return $q->result();
    }

    function cetak_absen($tgl_awal = null, $tgl_akhir = null, $pegawai = null)
    {
         if ($tgl_awal == null or $tgl_awal == "")  $tgl_awal = date('Y/m/d');
        if ($tgl_akhir == null or $tgl_akhir == "") $tgl_akhir = date('Y/m/d');

        if ($pegawai == null) {

            $sql = "SELECT a.jam_masuk, a.jam_keluar, COUNT(a.id_pegawai) as jumlah, p.nama_pegawai,a.tgl_absen, a.status_absen,a.image,p.roles FROM tbl_absensi a JOIN tbl_pegawai p ON p.id = a.id_pegawai  AND a.tgl_absen BETWEEN '$tgl_awal' AND '$tgl_akhir' GROUP BY p.nama_pegawai ";
        } else {

            $sql = "SELECT COUNT(a.id_pegawai) as jumlah,p.nama_pegawai,a.jam_keluar,a.jam_masuk, a.tgl_absen, a.status_absen ,a.image,p.roles  FROM tbl_absensi a
                JOIN tbl_pegawai p on p.id = a.id_pegawai AND a.tgl_absen BETWEEN '$tgl_awal' AND '$tgl_akhir' AND a.id_pegawai=$pegawai GROUP BY p.nama_pegawai";
        }

        $q = $this->db->query($sql);
        return $q->result();
    }


    public function sumpegawai()
    {
        $hasil = $this->db->select('*');
        $this->db->from('tbl_pegawai');

        return $hasil->count_all_results();
    }

     public  function jumlahkegiatan()
    {
        $hasil = $this->db->select('*');
        $this->db->from('tbl_kegiatan');
        $tgl = date('Y-m-d');
        return $hasil->count_all_results();
    }

    public  function sumkegiatan()
    {
        $hasil = $this->db->select('*');
        $this->db->from('tbl_kegiatan');
        $tgl = date('Y-m-d');
        $st = '0';
    
        $this->db->where('status_kegiatan', $st);
        return $hasil->count_all_results();
    }

    public  function sumkegiatann()
    {
        $hasil = $this->db->select('*');
        $this->db->from('tbl_kegiatan');
       
        $st = '1ss';
      ;
        $this->db->where('status_kegiatan', $st);
        return $hasil->count_all_results();
    }



   /* //funciont/kegiatan karyawan
    public function getkegiatan_karyawan($index_data = NULL)
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
             $this->db->where('pesanan.status',$proses);
        $this->db->where('pesanan.tanggal',$tgl);

            $query = $this->db->get();
            return $query->result();
        }
    }

    public function uploadkegiatan($id)
    {

        $q = $this->db->query("SELECT p.nama_pegawai,a.start_date,a.end_date,a.nama_kegiatan,a.id_kegiatan  FROM tbl_kegiatan a
        JOIN tbl_pegawai p on p.id = a.id_pegawai  where a.id_kegiatan=$id");
        return $q->result_array();
    }


    function upload_kegiatan($id, $rincian, $surat_keg, $status)
    {

        $data = array(
            'id_kegiatan' => $id,
            'rincian_kegiatan' => $rincian,
            'surat_kegiatan' => $surat_keg,
            'status_kegiatan' => $status
        );

        $this->db->where('id_kegiatan', $id);
        $this->db->update('tbl_kegiatan', $data);
    }
*/


    function getTotalAbsen()
    {
        $total_absen_masuk = $this->db->query("SELECT COUNT(keterangan) as total_absen_masuk FROM tbl_absensi where status_absen = 1 and keterangan='absen masuk'")->row_array()['total_absen_masuk'];

        $total_absen_keluar = $this->db->query("SELECT COUNT(keterangan) as total_absen_keluar FROM tbl_absensi where status_absen = 1 and keterangan='absen keluar'")->row_array()['total_absen_keluar'];

        /*$total = $total_absen_keluar + $total_absen_keluar;*/
        $karyawan = $this->db->query("SELECT * FROM tbl_absensi group by id_pegawai ")->result();

        $data = [
            'total_absen_masuk' => $total_absen_masuk,
            'total_absen_keluar' => $total_absen_keluar,
            'total' => $total_absen_masuk + $total_absen_keluar,
            'karyawan' => $karyawan
        ];
        return $data;
    }
}
