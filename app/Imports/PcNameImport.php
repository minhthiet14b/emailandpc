<?php

namespace App\Imports;


use App\Models\PcName;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PcNameImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        // dd($row);
        $year_used = "";
        $datey = date("Y");
        if(isset($row['year_used'])){
            if($row['year_used'] < 100 && $row['year_used'] > 0){
                $datey = $datey - $row['year_used'];
                $year_used = strtotime($datey.'-01-01');
            }
        }
         if (isset($row['network_name'])) {
            $data = ([
                'network_name' => $row['network_name'],
                'ip_address' => $row['ip_address'],
                'model' => $row['model'],
                'processor' => $row['processor'],
                'total_HDD' => $row['total_hdd'],
                'operating_system' => $row['operating_system'],
                'ram' => $row['ram'],
                'hark_disk' => $row['hark_disk'],
                'motherboard_summary' => $row['motherboard_summary'],
                'description' => $row['description'],
                'current_user' => $row['current_user'],
                'status' => $row['status'],
                'monitors_summary' => $row['monitors_summary'],
                'screen_size' => $row['screen_size'],
                'year_used' => $year_used,
                'location' => $row['location'],
            ]);
            return new PcName($data);
        }
        return null;
    }
}
