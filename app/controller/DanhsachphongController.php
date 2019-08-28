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
}
