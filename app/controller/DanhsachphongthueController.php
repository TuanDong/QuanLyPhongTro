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
        $total = 0;
        $total = floatval($room_price) * intval($month) + (floatval($number_water) - floatval($water_old)) * floatval($price_water) + (floatval($number_electric) - floatval($electric_old)) * floatval($price_electric) + floatval($money_other);
        
        $filed_room = ['NUMBER_ELECTRIC' => $number_electric,'NUMBER_WATER' => $number_water];
        $result_room = $room->update($id_room,$filed_room);
        $filed_history = ['ID_ROOM' => $id_room,'ID_RENTER' => $id_renter,'DATE_PAY' => $date_pay,'DECRIPTION' => $decription,'PRICE' => $total,'PAY_OTHER' => $money_other,'MONTH' => $month];
        $result_history = $history_money->insert($filed_history);
        $sql = "UPDATE `lits_renter_rom` SET `ELECTRIC_OLD` = '{$electric_old}', `WATER_OLD` = '{$water_old}', `ELECTRIC_NEW` = '{$number_electric}', `WATER_NEW` = '{$number_water}' WHERE `ID_ROOM` ='{$id_room}' AND `ID_RENTER` = '{$id_renter}';";
        $result_renter_room = $RenterRoom->query($sql);
        if ($result_room == 'true' && $result_history == 'true' && is_array($result_renter_room) && empty($result_renter_room)) {
            return $this->JsonResponse(number_format( $total));
        }
        return false;
    }
    public function viewAdd($id_room,$number_electric,$number_water,$page)
    {
        $this->view('danhsachphongthue/viewaddroom',['id_room' => $id_room,'number_electric' => $number_electric, 'number_water' => $number_water,'page' => $page]);
    }
    public function rent()
    {
        $id_room = $_POST['id-room'];
        $name_renter = $_POST['from-field-name-renter'];
        $filed_scmnd = $_POST['from-field-scmnd'];
        $number_phone = $_POST['from-field-number-phone'];
        $decription = $_POST['form-field-textarea'];
        $id_datepicker = $_POST['id-datepicker'];
        $number_electric = $_POST['number-electric'];
        $number_water = $_POST['number-water'];
        $page = $_POST['id-page'];
        $renter = $this->model('NguoithueModel');
        $room = $this->model('PhongModel');
        $RenterRoom = $this->model('PhongthueModel');
        $filed_renter = ['Full_name' => $name_renter,'SCMND' => $filed_scmnd,'PhoneNumber' => $number_phone,'Decription' => $decription,'Status' => 1,'RENTER_DAYIN' => $id_datepicker];
        $filed_room = ['STATUS'=>1];
        $result_renter = $renter->insert($filed_renter);
        $result_room = $room->update($id_room,$filed_room);
        $people = $renter->findFirst(['conditions'=>['Full_name = ?','SCMND = ?'],'bind'=>[$name_renter,$filed_scmnd]]);
        $filed_rentRoom = ['ID_ROOM' => $id_room, 'ID_RENTER' => $people->ID, 'DAY_IN' => $id_datepicker, 'ELECTRIC_OLD' => $number_electric, 'WATER_OLD' => $number_water];
        $result_rentRoom = $RenterRoom->insert($filed_rentRoom);
        if ($result_room == 'true' &&  $result_renter == 'true' && $result_rentRoom == 'true') {
            $listRenterRoom = $RenterRoom->get_data($page);
            $this->view('danhsachphongthue/index',['listRenterRoom' => $listRenterRoom[0],'total_page' => $listRenterRoom[1],'curent_page' => $page, 'success' => 'Thuê Phòng Thành Công !']);
        }else {
            $this->view('danhsachphongthue/viewaddroom',['id_room' => $id_room,'number_electric' => $number_electric, 'number_water' => $number_water,'page' => $page, 'error' => 'Lưu Không Thành Công !']);
        }   
    }
    public function leaver_room()
    {
        $id_room = $_POST['id_room'];
        $id_renter = $_POST['id_renter'];
        $room_rentID = $_POST['room_rentID'];
        $page = $_POST['page'];
        $renter = $this->model('NguoithueModel');
        $room = $this->model('PhongModel');
        $RenterRoom = $this->model('PhongthueModel');
        $filed_room = ['STATUS' => 0];
        $filed_renter = ['Status' => 0, 'RENTER_DAYOUT' => date("d/m/Y")];
        $result_room = $room->update($id_room,$filed_room);
        $result_renter = $renter->update($id_renter,$filed_renter);
        $result_renterRoom = $RenterRoom->delete($room_rentID);
        if ($result_room == 'true' && $result_renter == 'true' && $result_renterRoom == 'true') {
            $listRenterRoom = $RenterRoom->get_data($page);
            $this->view('danhsachphongthue/index',['listRenterRoom' => $listRenterRoom[0],'total_page' => $listRenterRoom[1],'curent_page' => $page, 'success' => 'Đã Chuyển Đi !']);
        } else {
            $listRenterRoom = $RenterRoom->get_data($page);
            $this->view('danhsachphongthue/index',['listRenterRoom' => $listRenterRoom[0],'total_page' => $listRenterRoom[1],'curent_page' => $page, 'error' => 'Thực Hiện Lại Đi !']);
        }
    }
    public function watch_history(){
        $id_room = $_POST['id_room'];
        $history_money = $this->model('HistoryMoneyModel');
        $res = $history_money->find(['conditions'=>['ID_ROOM = ?'],'bind'=>[$id_room]]);
        return $this->JsonResponse($res);
    }
}