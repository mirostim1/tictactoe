@extends('layouts.app')

@section('scripts')
<script language="JavaScript">
    function checkResult() {
        var win = false;

        // Checking Top Row
        if($('#block-1.player-{{ $playerType }}:checked').length &&
           $('#block-2.player-{{ $playerType }}:checked').length &&
           $('#block-3.player-{{ $playerType }}:checked').length) {
            win = true;
        }
        // Checking Middle Row
        else if($('#block-4.player-{{ $playerType }}:checked').length &&
                $('#block-5.player-{{ $playerType }}:checked').length &&
                $('#block-6.player-{{ $playerType }}:checked').length) {
            win = true;
        }
        // Checking Bottom Row
        else if($('#block-7.player-{{ $playerType }}:checked').length &&
                $('#block-8.player-{{ $playerType }}:checked').length &&
                $('#block-9.player-{{ $playerType }}:checked').length) {
            win = true;
        }
        // Checking Left Column
        else if($('#block-1.player-{{ $playerType }}:checked').length &&
                $('#block-4.player-{{ $playerType }}:checked').length &&
                $('#block-7.player-{{ $playerType }}:checked').length) {
            win = true;
        }
        // Checking Center Column
        else if($('#block-2.player-{{ $playerType }}:checked').length &&
                $('#block-5.player-{{ $playerType }}:checked').length &&
                $('#block-8.player-{{ $playerType }}:checked').length) {
            win = true;
        }
        // Checking Right Column
        else if($('#block-3.player-{{ $playerType }}:checked').length &&
                $('#block-6.player-{{ $playerType }}:checked').length &&
                $('#block-9.player-{{ $playerType }}:checked').length) {
            win = true;
        }
        // Checking Diagonal Left To Right
        else if($('#block-1.player-{{ $playerType }}:checked').length &&
                $('#block-5.player-{{ $playerType }}:checked').length &&
                $('#block-9.player-{{ $playerType }}:checked').length) {
            win = true;
        }
        // Checking Diagonal Right To Left
        else if($('#block-3.player-{{ $playerType }}:checked').length &&
                $('#block-5.player-{{ $playerType }}:checked').length &&
                $('#block-7.player-{{ $playerType }}:checked').length) {
            win = true;
        }

        if(!win) {
            if ($('input[type=radio]:checked').length == 9) {
                return 'tie';
            }
        } else {
            return 'win';
        }

        return false;
    }

    var pusher = new Pusher('7b057520b7ec298a9ac0', {
        cluster: 'eu',
        encrypted: false
    });
    var gamePlayChannel = pusher.subscribe('game-channel-{{$id}}');
    var gameOverChannel = pusher.subscribe('game-over-channel-{{$id}}');

    gamePlayChannel.bind('App\\Events\\Play', function(data){
        $('#block-' + data.location).removeClass('player-{{$playerType}}').addClass('player-' + data.type);
        $('#block-' + data.location).attr('checked', true);

        if('{{$user->id}}' == data.userId) {
            $("input[type=radio]").attr('disabled', true);
            $('.profile-username').html('Waiting on Player 2 ...');
        } else {
            $("input[type=radio]").removeAttr('disabled');
            $('.profile-username').html('You are next!');
        }
    });

    gameOverChannel.bind('App\\Events\\GameOver', function(data){
        $('#block-' + data.location).removeClass('player-{{$playerType}}').addClass('player-' + data.type);
        $('#block-' + data.location).attr('checked', true);

        if(data.result == 'win' && '{{$user->id}}' == data.userId) {
            $('.profile-username').html('You Win!');

            $.ajax({
                url: '/add-score/{{$user->id}}',
                method: 'POST',
                data: {
                    _token: $('input[name=_token]').val()
                },
                success: function(data){
                    //
                }
            });
        } else if(data.result == 'win' && '{{$user->id}}' != data.userId) {
            $('.profile-username').html('You Loose!');
        }

        if(data.result == 'tie' && '{{$user->id}}' == data.userId) {
            $('.profile-username').html('It\'s a Tie!');
        } else if(data.result == 'tie' && '{{$user->id}}' != data.userId){
            $('.profile-username').html('It\'s a Tie!');
        }

        $('#exit-button').show();
    });

    $(document).ready(function(){
        $('input[type=radio]').on('click', function(){
            var result = checkResult();

            if(!result){
                $('input[type=radio]').attr('disabled', true);

                $.ajax({
                    url: '/play/{{$nextTurn->game_id}}',
                    method: 'POST',
                    data: {
                        location: $(this).val(),
                        _token: $('input[name=_token]').val()
                    },
                    success: function(data){
                        //
                    }
                });
            }
            else{
                if(result == 'win'){
                    $('.profile-username').html('You Win!');
                    $('input[type=radio]').attr('disabled', true);
                }
                else{
                    $('.profile-username').html('It\'s a tie!');
                    $('input[type=radio]').attr('disabled', true);
                }
                $('#exit-button').show();

                $.ajax({
                    url: '/game-over/{{$nextTurn->game_id}}',
                    method: 'POST',
                    data: {
                        location: $(this).val(),
                        result: result,
                        _token: $('input[name=_token]').val()
                    },
                    success: function(data){
                        //
                    }
                });
            }
        });
    });
</script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile-info" >
                    <div class="profile-username text-center" style="font-size:2.5rem; color:white">
                        {{  $user->id == $nextTurn->player_id ? 'You are next!' : 'Waiting on Player 2 ...' }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tic-tac-toe">
                    @foreach($locations as $index => $location)
                        <input type="radio"
                               class="player-{{ $location['checked'] ? $location['type'] : $playerType }}
                               {{ $location['class'] }}" id="block-{{ $index }}"
                               value="{{ $index }}" {{ $location['checked'] ? 'checked': ''  }}
                               {{ $user->id != $nextTurn->player_id ? 'disabled' : '' }} />
                        <label for="block-{{ $index }}"></label>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <a id="exit-button" href="{{ url('/home') }}" class="btn btn-primary" style="display:none">Exit Game</a>
            </div>
        </div>
    </div>

    {{ csrf_field() }}
@endsection