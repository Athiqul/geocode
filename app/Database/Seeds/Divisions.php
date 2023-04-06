<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Divisions extends Seeder
{
    public function run()
    {
        //
        $query="INSERT INTO `divisions` (`div_id`, `en_name`, `bn_name`) VALUES
        (1, 'Dhaka', 'ঢাকা'),
        (2, 'Chittagong', 'চট্টগ্রাম'),
        (3, 'Rajshahi', 'রাজশাহী'),
        (4, 'Khulna', 'খুলনা'),
        (5, 'Barisal', 'বরিশাল'),
        (6, 'Rangpur', 'রংপুর'),
        (7, 'Sylhet', 'সিলেট'),
        (8, 'Mymensingh', 'ময়মনসিংহ');";
        $this->db->query($query);
    }
}
