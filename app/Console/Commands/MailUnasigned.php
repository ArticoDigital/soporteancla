<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ticket;
use Illuminate\Support\Facades\Log;
use App\User;
use App\Notifications\ListUnasignedTickets;
use Illuminate\Support\Facades\Notification;


class MailUnasigned extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:unasigned';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar correos a administrador de tickets no asignados';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $ticketsunaigned=Ticket::with(['ticketState', 'ServiceSubcategory', 'user'])
            ->where('ticket_state_id', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        if(isset($ticketsunaigned) && count($ticketsunaigned) > 0){
          Notification::send(User::role('Admin')->get(), new ListUnasignedTickets($ticketsunaigned));
          Log::info($ticketsunaigned);
        }
    }
}
