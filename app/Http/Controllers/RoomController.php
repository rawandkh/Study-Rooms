<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Resources\RoomResource;
use  App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{

   
public function index(Request $request){

    $rooms = Room::all();
    $topics= Topic::withcount('rooms')->limit(5)->get();
    $topics_count=Topic::count();
    $rooms_count=Room::count();
   
      if (isset($_GET['topic_id'])) {
        # code...
        $id=$_GET['topic_id'];
        $rooms=Room::where('topic_id',$id)->get();
        foreach ($rooms as $room) {
            $user = User::find($room->user_id);
            $topic=Topic::find($room->topic_id);
            $room['user_name'] = $user->name;
            $room['topic']=$topic->name;
            $results[] = ($room);
            $rooms = RoomResource::collection($results);
       
    
  
   
        }
  
}
elseif (isset($_GET['name']) ) {
    $rooms=$this->search($_GET['name']);
    foreach ($rooms as $room) {
        $user = User::find($room->user_id);
        $topic=Topic::find($room->topic_id);
        $room['user_name'] = $user->name;
        $room['topic']=$topic->name;
        $results[] = ($room);
        $rooms = RoomResource::collection($results);
      
    }
}
else {
    foreach ($rooms as $room) {
        $user = User::find($room->user_id);
        $topic=Topic::find($room->topic_id);
        $room['user_name'] = $user->name;
        $room['topic']=$topic->name;
        $results[] = ($room);
        $rooms = RoomResource::collection($results);
      
    }
    }

return view('index',compact('rooms','topics','topics_count','rooms_count'));
}
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topics=Topic::all();
        return view('rooms.create-room',compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $user=  User::find(Auth::id());  // هون بحط هيك مشان ما ضيق user_id ع fillable
    
     $topic=Topic::where('slug', $request->topic)->first();
      if ($user) {
      $user->room()->create([
            'name'=>$request->name,
            'description'=>$request->description,
            'topic_id'=>$topic->id
            ]);
            print_r($topic);
            return to_route('index');
      } else {
        return to_route('login');
      }
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $room=Room::with('user','topic')->where('id',$id)->first();
        return view('rooms.room' , compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $room=Room::with('user','topic')->where('id',$id)->first();
        return view('rooms.edit_room',compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $room=Room::find($id);
        if ($room) {
            if ($room->user_id===Auth::id()) {
                # code...
          
            $room->update([
                'name'=>$request->name ?? $room->name,
                'description'=>$request->description ?? $room->description,
            ]);
            return to_route('index');
        }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete( string $id){
        $room=Room::with('user','topic')->where('id',$id)->first();
       
        return view('rooms.delete_room', compact('room'));
    }
    public function destroy(string $id)
    {
        $room=Room::find($id);
        if ($room) {
            if ($room->user_id===Auth::id()) {
                $room->delete();
                return to_route('index');
            }
        }
    }
    public function search($name){
        $rooms = Room::where('name', 'LIKE', "%$name%")->get();
        return $rooms;
    }
}
