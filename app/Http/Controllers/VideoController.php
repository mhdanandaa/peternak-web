<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function addLike(Request $request)
    {
    }
    public function videoSavedPage(Request $request) {
        return view('video.saved');
    }
    public function videoPage(Request $request)
    {
        $videosPlaylist = Video::getVideosByPlaylistId($request->playlist_id);
        $video = [];
        foreach ($videosPlaylist['items'] as $key => $value) {
            if ($value['contentDetails']['videoId'] == $request->video_id) {
                $video = $value;
            }
        }
        $note = Note::getNoteByVideoId($request->video_id,Auth::user()->id);
        // var_dump($note);die();
        return view('video.video', [
            'video' => $video,
            'playlistId'=>$request->playlist_id,
            'videosPlaylist' => $videosPlaylist['items'],
            'note'=>($note ?? ['title'=>null,'description'=>null]),
        ]);
    }
}
