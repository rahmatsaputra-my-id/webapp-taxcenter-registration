<?php  

/**
 * summary
 */
class Dashboard extends CI_Controller
{
    /**
     * summary
     */
    public function __construct()
    {
      parent::__construct();
      $this->load->model('M_data');
    }

    public function index()
    {
      // 
      $data['title'] = 'Administrator | Relawan Pajak';
      $data['body'] = 'admin/pages/dashboard';
      $data['list'] = $this->M_data->show_list();
      $data['relawan_data'] = $this->M_data->fetch_data();
      if (! $this->session->userdata('is_login')) redirect('user/login');
      
      // panggil view
      $this->load->view('admin/admintemplate', $data);
    }

    public function exportcsv()
    {
      $file_name = 'daftar_relawan_pajak_'.date('Ymd').'.csv'; 
      header("Content-Description: File Transfer"); 
      header("Content-Disposition: attachment; filename=$file_name"); 
      header("Content-Type: application/csv;");
     
      // get data 
      $relawan_data = $this->M_data->fetch_data();

      // file creation 
      $file = fopen('php://output', 'w');
   
      $header = array("NPM","Nama lengkap", "Alamat", "Email", "Password", "Nomor Telpon", "IPK", "Semester", "Fakultas", "Jurusan", "Kelas" ); 
      fputcsv($file, $header);
      foreach ($relawan_data->result_array() as $key => $value)
      { 
        fputcsv($file, $value); 
      }
      fclose($file); 
      exit; 
    }

    public function exportexcel()
    {
      include APPPATH.'third_party/PHPExcel/PHPExcel.php';

      $excel = new PHPExcel();

      $excel->getProperties()->setCreator('Fachri Reza Setiadiputra')                 
          ->setLastModifiedBy('Taxgundar')                 
          ->setTitle("Data Relawan Pajak")                 
          ->setSubject("Relawan")                 
          ->setDescription("Laporan Semua Data Relawan Pajak")                 
          ->setKeywords("Data Relawan");

       $style_col = array(
        'font' => array('bold' => true),
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        ),
        'borders' => array(
          'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
        )
       );
       $style_row = array(
        'allignment' => array(
          'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        ),

        'borders'=>array(
          'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
        )
       );

    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA RELAWAN PAJAK"); // Set kolom A1 dengan tulisan "DATA RELAWAN PAJAK"
    $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "NPM"); // Set kolom B3 dengan tulisan "NPM"
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA LENGKAP");
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "ALAMAT");
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "FAKULTAS");
    $excel->setActiveSheetIndex(0)->setCellValue('F3', "JURUSAN");
    $excel->setActiveSheetIndex(0)->setCellValue('G3', "KELAS");
    $excel->setActiveSheetIndex(0)->setCellValue('H3', "SEMESTER");
    $excel->setActiveSheetIndex(0)->setCellValue('I3', "IPK");
    $excel->setActiveSheetIndex(0)->setCellValue('J3', "EMAIL");
    $excel->setActiveSheetIndex(0)->setCellValue('K3', "NOMOR TELPON");
    $excel->setActiveSheetIndex(0)->setCellValue('L3', "PERNAH MENJADI RELAWAN PAJAK?");

    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);

    // Panggil function view yang ada di M_DATA untuk menampilkan semua data MAHASISWA
    $siswa = $this->M_data->show_list();

    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($siswa as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->npm);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama_lengkap);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->alamat);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->fakultas);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->jurusan);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->kelas);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->semester);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->ipk);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->email);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->telepon);
      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->status);
      
      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }

    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(92); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(6);
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(7);
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(35);
    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Data Relawan Pajak");
    $excel->setActiveSheetIndex(0);

    // Proses file ke excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Data Relawan Pajak.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');

    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
    }

    public function download()
    {

    $id = $this->uri->segment(4);
    $fileInfo = $this->M_data->download($id);

    $source_file = file_get_contents(base_url() . 'files/' . $fileInfo['file']);
    $file_name = $fileInfo['file'];
    ob_clean();
    force_download($file_name, $source_file);
    }

    // public function show_update_data()
    // { 
    //   $id = $this->uri->segment(3);
    //   $data['title'] = 'Administrator|Relawan Pajak';
    //   $data['body'] = 'admin/pages/edit';
    //   $data['list'] = $this->M_data->show_list();      
    //   $data['update'] = $this->M_data->show_update_data($id);
    //   // panggil view
    //   $this->load->view('admin/admintemplate', $data);
    // }

    // public function save_update($id)
    // {

    // }  

    public function delete($id)
    { 
      // panggil model untuk proses delete
      $this->M_data->delete($id);

      $this->session->set_flashdata('success','data berhasil dihapus');
      // kembali pada adminregisterdata
      redirect('admin/dashboard/index');
    }
}    
?>