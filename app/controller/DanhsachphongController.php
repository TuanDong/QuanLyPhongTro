<?php
class DanhsachphongController extends Controller
{
    public function index()
    {
        $room = $this->model('PhongModel');
        $list_room = $room->get_all();
        $price = $this->model('PriceModel')->get_all();
        Session::set('PRICE',$price);
        $this->view('quanlyphong/danhsachphong',['listRoom'=>$list_room]);
    }

    public function updatePrice()
    {
        $priceElectric = $_POST['priceElectric'];
        $priceWater = $_POST['priceWater'];
        $id = $_POST['id'];
        $price = $this->model('PriceModel');
        Session::set('PRICE',$price->get_all());
        $results = $price->update($id,['PRICE_ELECTRIC' => $priceElectric,'PRICE_WATER' => $priceWater]);
        return $this->JsonResponse($results);
    }

    public function romdetail($id)
    {
        $room = $this->model('PhongModel');
        $roomObj = $room->findByID($id);
        $this->view('quanlyphong/phongdetail',['roomObj'=>$roomObj,'ID' =>$id]);
    }

    public function deleteRoom($id)
    {
        $room = $this->model('PhongModel');
        $results = $room->delete($id);
        if ($results == 'true') {
            $list_room = $room->get_all();
            $this->view('quanlyphong/danhsachphong',['listRoom'=>$list_room,'success' => 'Xoá thành công']);
        } else {
            $list_room = $room->get_all();
            $this->view('quanlyphong/danhsachphong',['listRoom'=>$list_room,'error' => 'Xoá không thành công']);
        }
        
    }

    public function addview()
    {
        $this->view('quanlyphong/addroom');
    }

    public function insertRoom()
    {
        $room = $this->model('PhongModel');
        
        var_dump($_POST['from-field-name-room']);

    }
}
