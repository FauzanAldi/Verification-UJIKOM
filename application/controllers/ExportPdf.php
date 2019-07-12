<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExportPDF extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('htmltopdf_model');
		$this->load->library('pdf');
	}

	public function index()
	{	
		$id_sekolah = $this->input->post('id_sekolah');
		$id_jurusan_sekolah = $this->input->post('id_jurusan_sekolah');
		// echo $id_sekolah;
		// echo $id_jurusan_sekolah;
		$nama_sekolah=$this->m_entry->edit_data('id_sekolah='.$id_sekolah,'sekolah');
		$jurusan=$this->m_entry->edit_data('id_jurusan_sekolah='.$id_jurusan_sekolah,'jurusan_sekolah')->result();
		foreach ( $nama_sekolah->result() as $row )
 		{
 			$sekul= $row->nama_sekolah;
          }
        foreach ( $jurusan as $row )
 		{
 			$nama_jurusan= $this->m_entry->edit_data('id_jurusan='.$row->id_jurusan,'jurusan');
          }
        foreach ( $nama_jurusan->result() as $row )
 		{
 			$jur= $row->nama_jurusan;
          }
		$html_content = '<h3 align="center" style="margin-top:75px; margin-bottom:30px;">REKAPITULASI HASIL VERIFIKASI</h3><br>
			<table style="margin-left:20px;">
				<tr>
					<td>Nama Sekolah</td>
					<td>:</td>
					<td style="margin-left:20px;">'.$sekul.'</td>
				</tr>
				<tr>
					<td>Jurusan</td>
					<td>:</td>
					<td style="margin-left:20px;">'.$jur.'</td>
				</tr>
			</table';
		$html_content .= $this->htmltopdf_model->fetch_single_details($id_sekolah,$id_jurusan_sekolah);
		$this->pdf->loadHtml($html_content);
		$this->pdf->render();
		$this->pdf->stream("".$id_jurusan_sekolah.".pdf", array("Attachment"=>0));
		$data['customer_data'] = $this->htmltopdf_model->fetch();
		// $this->load->view('htmltopdf', $data);
	}

	// public function details()
	// {
	// 	if($this->uri->segment(3))
	// 	{
	// 		$customer_id = $this->uri->segment(3);
	// 		$data['customer_details'] = $this->htmltopdf_model->fetch_single_details($customer_id);
	// 		$this->load->view('htmltopdf', $data);
	// 	}
	// }

	// public function pdfdetails()
	// {
	// 	if($this->uri->segment(3))
	// 	{
	// 		$customer_id = $this->uri->segment(3);
	// 		$html_content = '<h3 align="center">Convert HTML to PDF in CodeIgniter using Dompdf</h3>';
	// 		$html_content .= $this->htmltopdf_model->fetch_single_details($customer_id);
	// 		$data['customer_data'] = $this->htmltopdf_model->fetch();
	// 		$contoh=$this->load->view('htmltopdf', $data);
	// 		// $this->pdf->loadHtml($html_content);
	// 		$this->pdf->loadHtml($html_content);
	// 		$this->pdf->render();
	// 		$this->pdf->stream("".$customer_id.".pdf", array("Attachment"=>0));
	// 	}
	// }

}

?>
