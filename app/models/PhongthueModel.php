<?php
class PhongthueModel extends Model
{
    public $table = 'lits_renter_rom';

    public function get_data($page)
    {
        $sql = "SELECT *,list_room.ID as ID, lits_renter_rom.ID as ROOM_RENT_ID FROM list_room LEFT JOIN lits_renter_rom ON list_room.ID=lits_renter_rom.ID_ROOM LEFT JOIN room_renter ON lits_renter_rom.ID_RENTER = room_renter.ID ORDER BY list_room.ID ASC LIMIT ".($page -1)*12 .", 12";
        $count_sql = "SELECT * FROM list_room";
        $count = count($this->query($count_sql));
        return [$this->query($sql),$count];
    }
}