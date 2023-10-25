
<div class="roomList">
    <div class="mobile-menu">
        <form action="{{route('index')}}" method="POST" class="header__search">
            @csrf
            <label>
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                    viewBox="0 0 32 32">
                    <title>search</title>
                    <path
                        d="M32 30.586l-10.845-10.845c1.771-2.092 2.845-4.791 2.845-7.741 0-6.617-5.383-12-12-12s-12 5.383-12 12c0 6.617 5.383 12 12 12 2.949 0 5.649-1.074 7.741-2.845l10.845 10.845 1.414-1.414zM12 22c-5.514 0-10-4.486-10-10s4.486-10 10-10c5.514 0 10 4.486 10 10s-4.486 10-10 10z">
                    </path>
                </svg>
                <input name="q" placeholder="Search for topics" />
            </label>
        </form>
        <div class="mobile-menuItems">
            <a class="btn btn--main btn--pill" href="{%url 'topics'%}">Browse Topics</a>
            <a class="btn btn--main btn--pill" href="{%url 'activity'%}">Recent Activities</a>
        </div>
    </div>
    <div class="roomList__header">
        <div>
            <h2>Study Room</h2>
            <p> Rooms available</p>
        </div>
        <a class="btn btn--main" href="{{route('rooms.create')}}">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                <title>add</title>
                <path
                    d="M16.943 0.943h-1.885v14.115h-14.115v1.885h14.115v14.115h1.885v-14.115h14.115v-1.885h-14.115v-14.115z">
                </path>
            </svg>
            Create Room
        </a>
    </div>

    @foreach ($rooms as $room)
    
    <div class="roomListRoom">
        <div class="roomListRoom__header">
            <a href="{{route('profile.edit', auth()->user()->id)}}" class="roomListRoom__author">
                <div class="avatar avatar--small">
                    <img src="https://randomuser.me/api/portraits/women/11.jpg" />
                </div>
                <span>{{$room->user_name}}</span>
            </a>
            <div class="roomListRoom__actions">
                <span>{{$room->created_at}}</span>
            </div>
        </div>
        <div class="roomListRoom__content">
            <a href="{{route('rooms.show' , $room->id)}}">{{$room->name}}</a>
            <p>
                {{$room->description}}
            </p>
        </div>
        <div class="roomListRoom__meta">
            <a href="room.html" class="roomListRoom__joined">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                    <title>user-group</title>
                    <path
                        d="M30.539 20.766c-2.69-1.547-5.75-2.427-8.92-2.662 0.649 0.291 1.303 0.575 1.918 0.928 0.715 0.412 1.288 1.005 1.71 1.694 1.507 0.419 2.956 1.003 4.298 1.774 0.281 0.162 0.456 0.487 0.456 0.85v4.65h-4v2h5c0.553 0 1-0.447 1-1v-5.65c0-1.077-0.56-2.067-1.461-2.584z">
                    </path>
                    <path
                        d="M22.539 20.766c-6.295-3.619-14.783-3.619-21.078 0-0.901 0.519-1.461 1.508-1.461 2.584v5.65c0 0.553 0.447 1 1 1h22c0.553 0 1-0.447 1-1v-5.651c0-1.075-0.56-2.064-1.461-2.583zM22 28h-20v-4.65c0-0.362 0.175-0.688 0.457-0.85 5.691-3.271 13.394-3.271 19.086 0 0.282 0.162 0.457 0.487 0.457 0.849v4.651z">
                    </path>
                    <path
                        d="M19.502 4.047c0.166-0.017 0.33-0.047 0.498-0.047 2.757 0 5 2.243 5 5s-2.243 5-5 5c-0.168 0-0.332-0.030-0.498-0.047-0.424 0.641-0.944 1.204-1.513 1.716 0.651 0.201 1.323 0.331 2.011 0.331 3.859 0 7-3.141 7-7s-3.141-7-7-7c-0.688 0-1.36 0.131-2.011 0.331 0.57 0.512 1.089 1.075 1.513 1.716z">
                    </path>
                    <path
                        d="M12 16c3.859 0 7-3.141 7-7s-3.141-7-7-7c-3.859 0-7 3.141-7 7s3.141 7 7 7zM12 4c2.757 0 5 2.243 5 5s-2.243 5-5 5-5-2.243-5-5c0-2.757 2.243-5 5-5z">
                    </path>
                </svg>
                room.participants.count Joined
            </a>
            <p class="roomListRoom__topic">{{$room->topic}}</p>
        </div>
    </div>
    @endforeach
</div>
