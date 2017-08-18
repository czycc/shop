<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Coin_log;
use App\Models\Shop_user;

class CoinChange
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $quantity;
    public $type ;
    public $event;
    public $openid;

    /**
     * CoinChange constructor.
     * @param $openid
     * @param $quantity
     * @param string $type
     * @param $event
     */
    public function __construct($openid, $quantity, $event, $type)
    {
        $log = new Coin_log;
        $log->openid = $openid;
        $log->type=$type;
        $log->event=$event;
        $log->quantity=$quantity;
        $log->save();
        return 'true';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
