<?php
class DanhsachphongthueController extends Controller
{
    public function index()
    {
        $RenterRoom = $this->model('PhongthueModel');
        $listRenterRoom = $RenterRoom->get_data();
        $this->view('danhsachphongthue/index',['listRenterRoom' => $listRenterRoom]);
    }
}