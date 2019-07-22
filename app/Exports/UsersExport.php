<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Models\Ticket;
use App\Models\TicketState;

class UsersExport implements FromView
{
    private $inputs;

    /**
     * ExportController constructor.
     * @param $inputs
     */
    public function __construct($inputs)
    {
        $this->inputs = $inputs;
    }

    public function view(): View
    {
        $tickets = Ticket::with(['ticketState', 'ServiceSubcategory.serviceCategory', 'user'])->searchExcel($this->inputs);
        return view('exports.tickets', compact('tickets'));
    }

}
