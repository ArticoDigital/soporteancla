<?php

namespace App\Http\Middleware;

use App\Models\Ticket;
use Closure;

class TicketForUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param Ticket $ticket
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        $ticket = $request->route()->parameter('ticket');

        if ($user->roles[0]->name == 'Admin')
            return $next($request);
        if (auth()->user()->id != $ticket->user_id) {
            abort('404');
        }
        return $next($request);
    }
}
