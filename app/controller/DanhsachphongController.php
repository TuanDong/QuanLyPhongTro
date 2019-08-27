<?php
class DanhsachphongController extends Controller
{
    public function index()
    {
        $room = $this->model('PhongModel');
        $list_room = $room->get_all();
        $this->view('quanlyphong/danhsachphong',['listRoom'=>$list_room]);
    }
}
