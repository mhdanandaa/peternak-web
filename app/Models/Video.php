<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Video extends Model
{
    use HasFactory;
    protected $table = "video" ;
    protected $fillable = [
        "video_id",
        "playlist_id",
        "like",
        "created_at",
        "updated_at",
    ];

    public static function getVideosByPlaylistId($playlist_id)
    {
        $videos = Http::get('https://www.googleapis.com/youtube/v3/playlistItems?key=AIzaSyCkzcwSJNguHaybXQyYwZmfcpPEo4fVYQ8&part=snippet,contentDetails&maxResults=50&playlistId='.$playlist_id);
        return $videos;
    }
    public static function getVideoDetailByVideoId($id)
    {
        $video = Http::get('https://www.googleapis.com/youtube/v3/videos?key=AIzaSyCkzcwSJNguHaybXQyYwZmfcpPEo4fVYQ8&part=snippet&maxResults=50&id='.$id);
        return $video;
    }
}
