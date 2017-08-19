<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class GameOver implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $gameId;
    public $userId;
    public $result;
    public $location;
    public $type;

    public function __construct($gameId, $userId, $result, $location, $type)
    {
        $this->gameId = $gameId;
        $this->userId = $userId;
        $this->result = $result;
        $this->location = $location;
        $this->type = $type;
    }

    public function broadcastOn()
    {
        return new Channel('game-over-channel-' . $this->gameId);
    }
}
