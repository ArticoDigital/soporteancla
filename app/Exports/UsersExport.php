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

    /**
     * @return View
     */
    public function view(): View
    {
        return view('exports.tickets', [
            'tickets' => $this->tickets()
        ]);
    }


    public function tickets()
    {
        $inputs = $this->inputs;
        $inputs['state'] = (empty($inputs['state'])) ?
            TicketState::where('isActive', '=', 1)->select('id')->get()->toArray() :
            [$inputs['state']];
        if (!empty($inputs['dates'])) {
            $datev = explode(" a ", $inputs['dates']);

            if (!isset($datev[1])) {
                $datev[1] = $datev[0];
            }


            $tickets = (auth()->user()->hasRole('Support')) ?
                Ticket::with(['ticketState', 'ServiceSubcategory', 'user','city'])
                    ->whereIn('ticket_state_id', $inputs['state'])
                    ->where('user_id', auth()->user()->id)
                    ->whereDate('created_at', '>=', $datev[0])
                    ->whereDate('created_at', '<=', $datev[1])
                    ->orderBy('created_at', 'desc')
                    ->get() :
                Ticket::with(['ticketState', 'ServiceSubcategory', 'user','city'])
                    ->whereIn('ticket_state_id', $inputs['state'])
                    ->whereDate('created_at', '>=', $datev[0])
                    ->whereDate('created_at', '<=', $datev[1])
                    ->orderBy('created_at', 'desc')
                    ->get();
        } else {
            $tickets = (auth()->user()->hasRole('Support')) ?
                Ticket::with(['ticketState', 'ServiceSubcategory', 'user'],'city')
                    ->whereIn('ticket_state_id', $inputs['state'])
                    ->where('user_id', auth()->user()->id)
                    ->orderBy('created_at', 'desc')
                    ->get() :
                Ticket::with(['ticketState', 'ServiceSubcategory', 'user'],'city')
                    ->whereIn('ticket_state_id', $inputs['state'])
                    ->orderBy('created_at', 'desc')
                    ->get();
        }

        return $tickets;
    }
}
