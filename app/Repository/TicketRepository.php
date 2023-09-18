<?php
/**
 * Created by PhpStorm.
 * User: andry
 * Date: 16.9.23
 * Time: 20.53
 */

namespace App\Repository;
use App\Models\Ticket;


class TicketRepository
{
    public function load($ticketID)
    {
        return Ticket::find()->where(['id' => $ticketId])->one();
    }
    public function save($ticket){/*...*/}
    public function update($ticket){/*...*/}
    public function delete($ticket){/*...*/}
}
