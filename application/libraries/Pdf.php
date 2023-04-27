<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
class Pdf extends Dompdf{

    public $filename;
    public function __construct(){
      parent::__construct();
      $this->filename = "laporan.pdf";
    }

    protected function ci(){return get_instance();}

    public function load_view($view, $data = array()){
      $html = $this->ci()->load->view($view, $data, TRUE);
			$this->set_option('defaultMediaType', 'screen');
			$this->set_option('defaultFont', 'Arial');
			$this->set_option('isHtml5ParserEnabled', true);
			$this->set_option('isPhpEnabled', true);
			$this->set_option('debugPng', true);
			$this->set_option('debugCss', true);
			$this->set_option('isRemoteEnabled', true);
      $this->load_html($html);
			
			$this->render();
      $this->stream($this->filename, array("Attachment" => 0));
    }
}