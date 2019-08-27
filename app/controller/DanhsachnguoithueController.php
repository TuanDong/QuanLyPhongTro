<?php
class DanhsachnguoithueController extends Controller 
{
    public function index()
    {
        $renter = $this->model('NguoithueModel');
        $list_people = $renter->get_all();
        $this->view('quanlynguoithue/quanlynguoithue',['listPeople'=>$list_people]);
    }
}
