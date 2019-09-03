<?php
class DanhsachphongthueController extends Controller
{
    public function index($page=1)
    {
        $RenterRoom = $this->model('PhongthueModel');
        $listRenterRoom = $RenterRoom->get_data($page);
        $this->view('danhsachphongthue/index',['listRenterRoom' => $listRenterRoom[0],'total_page' => $listRenterRoom[1],'curent_page' => $page]);
    }
}