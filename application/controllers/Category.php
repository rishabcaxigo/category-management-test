<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

	public $html;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Category_Model');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data = array();
		$data['CategoryDetails'] = $this->Category_Model->Category_Details();
		$data['Type'] = 0;
		$Max_ID = $this->Category_Model->getMaxID();
		$data['Max_ID'] = (!empty($Max_ID[0]->ID) ? $Max_ID[0]->ID : 1);
		$this->html = '';
		$this->getTree();
		$data['tree'] = $this->html;
		// echo '<pre>';
		// print_r($this->html);
		// die;
		$this->load->view('category_view', $data);
	}

	public function AddCategory($ParentID = null)
	{
		$data = array();
		$data['Type'] = (isset($ParentID) && !empty($ParentID) ? $ParentID : 0);
		$data['CategoryDetails'] = $this->Category_Model->Category_Details();
		$Max_ID = $this->Category_Model->getMaxID();
		$data['Max_ID'] = (!empty($Max_ID[0]->ID) ? $Max_ID[0]->ID : 1);
		$this->html = '';
		$this->getTree();
		$data['tree'] = $this->html;
		// echo '<pre>';
		// print_r($this->html);
		// die;
		$this->load->view('category_view', $data);
	}

	public function EditCategory($ID)
	{
		$data = array();
		$data['CategoryData'] = $this->Category_Model->Category_Details($ID);
		$data['CategoryDetails'] = $this->Category_Model->Category_Details();

		// echo '<pre>';print_r($data['CategoryData'][0]->Image );die/
		$this->html = '';
		$this->getTree(0, 0, $ID);
		$data['ID'] = $ID;
		$data['tree'] = $this->html;
		$Max_ID = $this->Category_Model->getMaxID();
		$data['Max_ID'] = (!empty($Max_ID[0]->ID) ? $Max_ID[0]->ID : 1);
		$this->load->view('category_view', $data);
	}
	public function SaveCategory()
	{
		if (!empty($this->input->post('AddProduct'))) {
			$CategoryArray = array();
			$CategoryArray['Name'] = $this->input->post('CategoryName');
			$CategoryArray['MetaTag'] = $this->input->post('MetaTag');
			$CategoryArray['MetaTitle'] = $this->input->post('MetaTitle');
			$CategoryArray['CreatedOn'] = date("Y-m-d H:i:s");
			$CategoryArray['MetaDescription'] = $this->input->post('MetaDescription');
			$CategoryArray['MasterCategoryID'] =  ($this->input->post('Type') === 0 ? 0 : $this->input->post('Type'));
			$CategoryArray['Searchable'] = (!empty($this->input->post('Searchable')) ? 1 : 0);
			$CategoryArray['Status'] = (!empty($this->input->post('Status')) ? 1 : 0);
			$today = date("Ymd");
			$rand = strtoupper(substr(uniqid(sha1(time())), 0, 4));
			if (!empty($_FILES["DefaultImage"]["name"])) {
				$filename = $_FILES["DefaultImage"]["name"];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);

				// if (in_array($ext, $allowed)) {
				$ImageName = "Image_" . $today . $rand . "." . $ext;
				$CategoryArray['Image'] = IMAGE_PATH_Read . $ImageName;
				move_uploaded_file($_FILES["DefaultImage"]["tmp_name"], IMAGE_PATH_Write . $ImageName);
				// } else {
				// 	$FileError = TRUE;
				// 	$this->session->set_userdata('admin_messageRed', 'Please Check the file format');
				// }
			}

			$inserted = $this->Category_Model->Insert_Category($CategoryArray);
			redirect(base_url() . 'Category');
		} else if (!empty($this->input->post('DeleteProduct'))) {
			// echo "here";die;
			$ID = $this->input->post('ID');
			$CategoryArray['Deleted'] = 1;
			$updated = $this->Category_Model->Update_Category($ID, $CategoryArray);
			// $deleted = $this->Category_Model->Delete_Category($ID);
			redirect(base_url() . 'Category');
		} else if (!empty($this->input->post('EditProduct'))) {
			$ID = KEY($this->input->post('EditProduct'));

			$CategoryArray = array();
			$CategoryArray['Name'] = $this->input->post('CategoryName');
			$CategoryArray['MetaTag'] = $this->input->post('MetaTag');
			$CategoryArray['MetaTitle'] = $this->input->post('MetaTitle');
			$CategoryArray['CreatedOn'] = date("Y-m-d H:i:s");
			$CategoryArray['MetaDescription'] = $this->input->post('MetaDescription');
			$CategoryArray['MasterCategoryID'] =  ($this->input->post('Type') === 0 ? 0 : $this->input->post('Type'));
			$CategoryArray['Searchable'] = (!empty($this->input->post('Searchable')) ? 1 : 0);
			$CategoryArray['Status'] = (!empty($this->input->post('Status')) ? 1 : 0);
			$today = date("Ymd");
			$rand = strtoupper(substr(uniqid(sha1(time())), 0, 4));
			if (!empty($_FILES["DefaultImage"]["name"])) {
				$filename = $_FILES["DefaultImage"]["name"];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);

				// if (in_array($ext, $allowed)) {
				$ImageName = "Image_" . $today . $rand . "." . $ext;
				$CategoryArray['Image'] = IMAGE_PATH_Read . $ImageName;
				move_uploaded_file($_FILES["DefaultImage"]["tmp_name"], IMAGE_PATH_Write . $ImageName);
				// } else {
				// 	$FileError = TRUE;
				// 	$this->session->set_userdata('admin_messageRed', 'Please Check the file format');
				// }
			}

			$updated = $this->Category_Model->Update_Category($ID, $CategoryArray);
			redirect(base_url() . 'Category');
		} else {
			redirect(base_url() . 'Category');
		}
	}

	private function getTree($parentid = 0, $flag = 0, $ID = null)
	{



		$CategoryDetails = $this->Category_Model->Category_Details(null, $parentid);
		// echo '<pre>';print_r($CategoryDetails);die;
		if (!empty($CategoryDetails) && $flag == 1) {
			$this->html .= '<ul>';
		}
		foreach ($CategoryDetails as $key => $value) {
			$class = ($value->MasterCategoryID != 0) ? "SubGroup" : "MainGroup";
			$selectclass = ($value->ID === $ID) ? "selectedCategory" : '';
			$this->html .= "<li class=" . $class . "'><a href='/Category/EditCategory/" . $value->ID . "' class='CategoryAll " . $selectclass . "' catid='" . $value->ID . "' subcatid='" . $value->MasterCategoryID . "'>" . $value->Name . "</a>";
			// if ($value->MasterCategoryID != 0) {
			$this->getTree($value->ID, 1);
			// if($key)
			// }
		}


		if (!empty($CategoryDetails) && $flag == 1) {
			$this->html .= '</ul>';
		}
	}
}
