<?php
namespace App\Composer;

use Illuminate\View\View;
use App\Sale;
use App\Ticket;
use App\ETicket\CommonStr;

class AnalyticsViewComposer
{

    public function compose(View $view)
    {
        $total = Sale::all()->sum('cost');

        $view->with(['total' => $total]);
    }
}

