<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Play implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $gameId;
    public $type;
    public $location;
    public $userId;
    public $destinationUserId;

    public function __construct($gameId, $type, $location, $userId, $destinationUserId)
    {
        $this->gameId = $gameId;
        $this->type = $type;
        $this->location = $location;
        $this->userId = $userId;
        $this->destinationUserId = $destinationUserId;
    }

    public function broadcastOn()
    {
        return new Channel('game-channel-' . $this->gameId);
    }
}
