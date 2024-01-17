<?php

namespace App\Exports;

use App\Models\PcName;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PcNameExport implements FromQuery, WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function query()
    {
        return PcName::select('network_name', 'ip_address','model','processor','total_HDD','operating_system',
        'ram','hark_disk','motherboard_summary','description','current_user','status','monitors_summary',
        'screen_size','year_used','location')->orderBy('network_name','ASC');
    }
    public function headings(): array
    {
        // Define the column headers
        return [
            'Network name',
            'IP address',
            'Model',
            'Processor',
            'Total HDD (GB)',
            'Operating system',
            'RAM total (GB)',
            'Hard disk drives summary',
            'Motherboard summary',
            'Description',
            'Current user',
            'Online status',
            'Monitors summary',
            'Screen size',
            'Year used',
            'Location',
        ];
    }
    public function map($row): array
    {
        // Process each row before exporting
        // You can manipulate the values, format dates, etc.
        return [
            $row->network_name,
            $row->ip_address,
            $row->model,
            $row->processor,
            $row->total_HDD,
            $row->operating_system,
            $row->ram,
            $row->hark_disk,
            $row->motherboard_summary,
            $row->description,
            $row->current_user,
            $row->status,
            $row->monitors_summary,
            $row->screen_size,
            date("Y") - date("Y", $row->year_used),
            $row->location,
        ];
    }
}
