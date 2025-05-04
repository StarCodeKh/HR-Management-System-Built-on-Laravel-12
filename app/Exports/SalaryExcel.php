<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;

class SalaryExcel implements FromView
{
    public $user_id;
    function __construct($user_id) {
        $this->user_id = $user_id;
    }
    public function view():View
    {
        $user_id =  $this->user_id;
        return view('report_template.salary_excel',compact('user_id'));
    }
}
