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

    public function addRenter()
    {
        $this->view('quanlynguoithue/addRenter');
    }
}
