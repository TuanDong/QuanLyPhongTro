<?php
class DanhsachphongthueController extends Controller
{
    public function index($page=1)
    {
        $RenterRoom = $this->model('PhongthueModel');
        $listRenterRoom = $RenterRoom->get_data($page);
        $this->view('danhsachphongthue/index',['listRenterRoom' => $listRenterRoom[0],'total_page' => $listRenterRoom[1],'curent_page' => $page]);
    }
    public function payAll()
    {
        $id_room = $_POST['id'];
        $id_renter = $_POST['idRenter'];
        $date_pay = $_POST['date_pay'];
        $month = $_POST['month'] == 0 ? 1 : $_POST['month'];
        $number_electric = $_POST['number_electric'];
        $number_water = $_POST['number_water'];
        $money_other = $_POST['money_other'];
        $decription = $_POST['decription'];
        $water_old = $_POST['water_old'];
        $electric_old = $_POST['electric_old'];
        $room_price = $_POST['room_price'];
        $price_water = Session::get('PRICE')[0]->PRICE_WATER;
        $price_electric = Session::get('PRICE')[0]->PRICE_ELECTRIC;
        $RenterRoom = $this->model('PhongthueModel');
        $room = $this->model('PhongModel');
        $history_money = $this->model('HistoryMoneyModel');
        $total = number_format(floatval($room_price) * intval($month) + (floatval($number_water) - floatval($water_old)) * floatval($price_water) + (floatval($number_electric) - floatval($electric_old)) * floatval($price_electric) + floatval($money_other));
        
        $filed_room = ['NUMBER_ELECTRIC' => $number_electric,'NUMBER_WATER' => $number_water];
        // $result = $room->update($id,$filed_room);
        $filed_history = ['ID_ROOM' => $id_room,'ID_RENTER' => $id_renter,'DATE_PAY' => $date_pay,'DECRIPTION' => $decription,'PRICE' => $total];
        // $result = $history_money->insert($filed_history);

        return $this->JsonResponse($total);
    }
}