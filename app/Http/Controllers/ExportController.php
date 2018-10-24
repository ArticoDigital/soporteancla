<?php

namespace App\Http\Controllers;


use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{

    public function tickets(Request $inputs)
    {
        return Excel::download(new UsersExport($inputs), 'tickets.xlsx');
    }
}
