@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row text-center">
        <div class="col-md-12">
            <div class="panel user-list">
                <div class="panel-heading p-4">
                    <h2>All Members</h2>
                    <div class="pull-right"> </div>
                </div>

                <div class="panel-body">
                    <div class="list-group p-4">
                       @foreach($users as $user)
                       @if($user->id != Auth::user()->id)
                        <div class="list-group-item mb-1" style="background: rgba(29, 29, 29, 0.8);"> 
                            <form class=" d-flex align-items-center" method="post" action="#">
                                <img src="{{$user->avatar}}" style="width: 5vw;height: 5vw;">
                                <a class="pl-3" href="/user/profile/{{$user->id}}">{{$user->name}}</a>
                                
                                @if(Auth::user()->is_following($user->id))
                                <div class="ml-auto">
                                    <a href="/user/unfollow/{{$user->id}}" class="btn btn-danger"> Unfollow </a>
                                </div>
                                @else
                                <div class="ml-auto">
                                    <a href="/user/follow/{{$user->id}}" class="btn btn-primary"> Follow</a>
                                </div>
                                @endif
                            </form>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    {{ $users->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection