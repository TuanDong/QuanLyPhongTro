<?php
class DanhsachnguoithueController extends Controller 
{
    public function index()
    {
        $renter = $this->model('NguoithueModel');
        $list_people = $renter->get_all();
        $this->view('quanlynguoithue/quanlynguoithue',['listPeople'=>$list_people]);
    }

    public function renterdetail($id)
    {
        $renter = $this->model('NguoithueModel');
        $result =  $renter->findByID($id);
        $this->view('quanlynguoithue/renterdetail',['renter'=>$result]);
    }

    public function deleteRenter($id)
    {
        $renter = $this->model('NguoithueModel');
        $result = $renter->delete($id);
        if ($result == 'true') {
            $list_people = $renter->get_all();
            $this->view('quanlynguoithue/quanlynguoithue',['listPeople'=>$list_people,'success' => 'Xoá Thành Công']);
        } else {
            $list_people = $renter->get_all();
            $this->view('quanlynguoithue/quanlynguoithue',['listPeople'=>$list_people,'error' => 'Xoá Không Thành Công']);
        }
    }

    public function addRenter()
    {
        $this->view('quanlynguoithue/addRenter');
    }

    public function insertRenter()
    {
        $renter = $this->model('NguoithueModel');
        $filed = ['Full_name' => $_POST['from-field-name-renter'],'SCMND' => $_POST['from-field-scmnd'],'PhoneNumber' => $_POST['from-field-number-phone'],'Decription' => $_POST['form-field-textarea'],'Status' => 0,'RENTER_DAYIN' => date("d/m/Y")];
        $result = $renter->insert($filed);
        if ($result == 'true') {
            $list_people = $renter->get_all();
            $this->view('quanlynguoithue/quanlynguoithue',['listPeople'=>$list_people,'success' => 'Thêm Thành Công']);
        } else {
            $this->view('quanlynguoithue/addRenter',['error' => 'Thêm Không Thành Công']);
        }
        
    }

    public function updateview($id)
    {
        $renter = $this->model('NguoithueModel');
        $result =  $renter->findByID($id);
        $this->view('quanlynguoithue/addRenter',['renterObj'=>$result]);
    }
    
    public function updateRenter()
    {
        $renter = $this->model('NguoithueModel');
        $filed = ['Full_name' => $_POST['from-field-name-renter'],'SCMND' => $_POST['from-field-scmnd'],'PhoneNumber' => $_POST['from-field-number-phone'],'Decription' => $_POST['form-field-textarea'],'Status' => 0];
        $id = $_POST['from-field-id-renter'];
        $result = $renter->update($id,$filed);
        if ($result == 'true') {
            $list_people = $renter->get_all();
            $this->view('quanlynguoithue/quanlynguoithue',['listPeople'=>$list_people,'success' => 'Sửa Thông Tin Thành Công']);
        } else {
            $this->view('quanlynguoithue/addRenter',['error' => 'Lỗi Sửa Thông Tin']);
        }
        
    }
}
