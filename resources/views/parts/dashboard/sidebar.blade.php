<div class="figure">
    <a><img src="{{$user->photo}}" alt="{{$user->name}}" /></a>
</div>
<div class="usercontent">
    <h3 style="color:#1d89e4">{{$user->name}}</h3>
    <h4><span>{{$user->city->name}}</span> - <span>{{$user->created_at->diffForHumans()}}</span></h4>
</div>
<div class="tabs-list mobile-hidden d-flex flex-column mt-3">
    <div class="item mb-2">
        <a href="{{route('frontend.dashboard.all')}}" class="btn btn-border category @if ($active=='ads' ) active @endif btn-block d-flex align-items-center justify-content-center">
            <div class="icon ml-2 position-relative">
                <i class="fa fa-flag"></i>
            </div>
            {{__('frontend.dashboard.myads')}}
        </a>
    </div>
    <div class="item mb-2">
        <a href="{{route('frontend.dashboard.chats')}}" class="btn btn-border category @if ($active=='chats' ) active @endif btn-block d-flex align-items-center justify-content-center">
            <div class="icon ml-2 position-relative">
                <i class="fa fa-comment"></i>
            </div>
            {{__('frontend.dashboard.mychats')}}
        </a>
    </div>
    <div class="item mb-2">
        <a href="{{route('frontend.dashboard.ratings')}}" class="btn btn-border category @if ($active=='ratings'
            ) active @endif btn-block d-flex align-items-center justify-content-center">
            <div class="icon ml-2 position-relative">
                <i class="fa fa-thumbs-up"></i>
            </div>
            {{__('frontend.dashboard.myratings')}}
        </a>
    </div>
    <div class="item mb-2">
        <a href="{{route('frontend.dashboard.favorites')}}" class="btn btn-border category @if ($active=='favorites' ) active @endif btn-block d-flex align-items-center
            justify-content-center">
            <div class="icon ml-2 position-relative">
                <i class="fa fa-heart"></i>
            </div>
            {{__('frontend.dashboard.myfavorites')}}
        </a>
    </div>
    <div class="item mb-2">
        <a href="{{route('frontend.dashboard.notifications')}}" class="btn btn-border category @if ($active=='notifications'
            ) active @endif btn-block d-flex align-items-center justify-content-center">
            <div class="icon ml-2 position-relative">
                <i class="fa fa-bell"></i>
            </div>
            {{__('frontend.dashboard.notifications')}}
        </a>
    </div>
    <div class="item mb-2">
        <a href="{{route('frontend.dashboard.account')}}" class="btn btn-border category @if ($active=='account'
            ) active @endif btn-block d-flex align-items-center justify-content-center">
            <div class="icon ml-2 position-relative">
                <i class="fa fa-user"></i>
            </div>
            {{__('frontend.dashboard.myaccount_data')}}
        </a>
    </div>
</div>
<div id="owl-demo2" class="owl-carousel owl-theme dashboard-carousel desktop-hidden">
    <div class="item">
        <a href="{{route('frontend.dashboard.all')}}" class="btn btn-border category d-flex @if ($active=='ads' ) active @endif">
            <div class="icon ml-2 position-relative">
                <div class="circle">{{$user->no_ads}}</div>
                <i class="fa fa-flag"></i>
            </div>
            {{__('frontend.dashboard.myads')}}
        </a>
    </div>
    <div class="item">
        <a href="{{route('frontend.dashboard.chats')}}" class="btn btn-border category d-flex @if ($active=='chats' ) active @endif">
            <div class="icon ml-2 position-relative">
                <div class="circle">{{$user->no_chats}}</div>
                <i class="fa fa-comment"></i>
            </div>
            {{__('frontend.dashboard.mychats')}}
        </a>
    </div>
    <div class="item">
        <a href="{{route('frontend.dashboard.ratings')}}" class="btn btn-border category d-flex @if ($active=='ratings' ) active @endif">
            <div class="icon ml-2 position-relative">
                <div class="circle">{{$user->no_ratings}}</div>
                <i class="fa fa-thumbs-up"></i>
            </div>
            {{__('frontend.dashboard.myratings')}}
        </a>
    </div>
    <div class="item">
        <a href="{{route('frontend.dashboard.favorites')}}" class="btn btn-border category d-flex @if ($active=='favorites' ) active @endif">
            <div class="icon ml-2 position-relative">
                <div class="circle">{{$user->no_favorites}}</div>
                <i class="fa fa-heart"></i>
            </div>
            {{__('frontend.dashboard.myfavorites')}}
        </a>
    </div>
    <div class="item">
        <a href="{{route('frontend.dashboard.notifications')}}" class="btn btn-border category d-flex @if ($active=='notifications' ) active @endif">
            <div class="icon ml-2 position-relative">
                <div class="circle">{{app('notificationsCount')}}</div>
                <i class="fa fa-bell"></i>
            </div>
            {{__('frontend.dashboard.notifications')}}
        </a>
    </div>
    <div class="item">
        <a href="{{route('frontend.dashboard.account')}}" class="btn btn-border category d-flex" @if ($active=='account' ) active @endif>
            <div class="icon ml-2 position-relative">
                <i class="fa fa-user"></i>
            </div>
            {{__('frontend.dashboard.myaccount')}}
        </a>
    </div>
</div>
