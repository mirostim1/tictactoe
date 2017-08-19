@extends('layouts.app')

@section('scripts')
    <script language="JavaScript">

        var pusher = new Pusher('7b057520b7ec298a9ac0', {
            cluster: 'eu',
            encrypted: true
        });

        var gamePlayChannel = pusher.subscribe('new-game-channel');

        gamePlayChannel.bind('App\\Events\\NewGame', function(data){

            if(data.destinationUserId == '{{ $user->id }}') {
                $('#from').html(data.from);
                $('#new-game-form').attr('action', '/board/' + data.gameId);
                $('#new-game-dialog').modal('show');
            }
        });

        $('#cancel-button').on('click', function(){
            $('.modal').modal('hide');
        });

        $('#close-button').on('click', function(){
            $('.modal').modal('hide');
        });

        $('#play-button').on('click', function(){
            $('#new-game-form').submit();
        });
    </script>
@endsection

@section('content')
<div class="container">
    <div class="row">

        <!-- User info -->
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="picture-avatar">
                        <img class="img-circle img-responsive" src="https://www.gravatar.com/avatar/{{ md5($user->email) }}?d=retro&s=200">
                    </div>
                    <p align="center">
                        Username: <strong>{{ $user->name }}</strong>
                        <br>
                        Score: <strong>{{ $user->score }}</strong>
                    </p>
                </div>
            </div>
        </div><!-- .User info -->

        <!-- List of users -->
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">

                    <!-- Search bar -->
                    <div class="search-bar">
                        <form class="form-inline" method="GET">
                            <label>Search: </label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="search" value="{{ request('search') }}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </form>
                    </div><!-- .Search bar -->

                    <div class="panel-group">
                    @foreach($users as $user)
                        <a class="list-group-item clearfix">
                            <img class="img-circle img-responsive" src="https://www.gravatar.com/avatar/{{ md5($user->email) }}?d=retro&s=50">
                            <span class="user-info">
                                Username: <strong>{{ $user->name }}</strong>
                                <br>
                                Score: <strong>{{ $user->score }}</strong>
                            </span>
                            <form action="/new-game" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <button type="submit" class="btn btn-success pull-right">Play</button>
                            </form>
                        </a>
                    @endforeach
                    </div>
                </div>

                <!-- Pagination -->
                <div class="text-center">
                    {{ $users->links() }}
                </div>
                <!-- .Pagination -->

            </div>
        </div><!-- .List of users -->

    </div>
</div>

<!-- Modal for invite to the new game -->
<div class="modal fade" id="new-game-dialog" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" aria-label="Close" id="close-button">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">New Game</h4>
            </div>
            <div class="modal-body">
                <p><span id="from"></span> invited you to game.</p>
            </div>
            <div class="modal-footer">
                <button type="submit" id="cancel-button" class="btn btn-default pull right">Not Now</button>
                <button type="button" id="play-button" class="btn btn-primary">Play</button>
            </div>
        </div>
    </div>
</div><!-- .Modal -->

<form id="new-game-form" method="get">
    {{ csrf_field() }}
</form>
@endsection