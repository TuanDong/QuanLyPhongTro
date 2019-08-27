<?php
class PhongthueModel extends Model
{
    public $table = 'lits_renter_rom';

    public function get_data()
    {
        $sql = "SELECT * FROM list_room 
        LEFT JOIN lits_renter_rom ON list_room.ID=lits_renter_rom.ID_ROOM 
        LEFT JOIN room_renter ON lits_renter_rom.ID = room_renter.ID ";
        return $this->query($sql);
    }
}