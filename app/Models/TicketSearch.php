<?php
/**
 * Created by PhpStorm.
 * User: juan2ramos
 * Date: 12/28/18
 * Time: 22:43
 */

namespace App\Models;


class TicketSearch
{
    private $query;
    private $data;

    public function __construct($query, $data)
    {
        $this->data = $data;
        $this->query = $query;

        $this->ticketStates();
        $this->isUserSupport();
        $this->existDate();
        $this->existCategory();
        $this->existId();
        $this->existName();
    }

    private function isUserSupport()
    {
        if (auth()->user()->hasRole('Support')) {
            $this->query->where('user_id', auth()->user()->id);
        }
    }

    private function existCategory()
    {
        if (!empty($this->data['category'])) {

            $subcategoriesIds = ServiceSubcategory::whereHas('serviceCategory', function ($query) {
                $query->where('id', '=', $this->data['category']);
            })->select('id')->get()->toArray();

            $this->query->whereIn('service_subcategory_id', $subcategoriesIds);
        }

    }

    private function existId()
    {
        if (!empty($this->data['id'])) {
            $this->query->where('id', $this->data['id']);
        }
    }
    private function existName()
    {
        if (!empty($this->data['name'])) {
            $this->query->where('name', 'like', '%' . $this->data['name'] . '%');
        }
    }

    private function existDate()
    {
        if (empty($this->data['dates'])) {
            return false;
        }

        $dateArray = explode(" a ", $this->data['dates']);
        if (!isset($dateArray[1])) {
            $dateArray[1] = $dateArray[0];
        }
        $this->query->whereDate('created_at', '>=', $dateArray[0])
            ->whereDate('created_at', '<=', $dateArray[1]);

    }

    private function ticketStates()
    {
        $ticketStates = (empty($this->data['state'])) ?
            TicketState::where('isActive', '=', 1)->select('id')->get()->toArray() :
            [$this->data['state']];

        $this->query->whereIn('ticket_state_id', $ticketStates);
    }
}