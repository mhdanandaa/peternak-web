<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Playlist extends Model
{
    use HasFactory;
    protected $table = "playlist";
    protected $fillable = [
        "playlist_id",
        "module_id",
    ];

    public static function addPlaylist($playlist_id, $module_id)
    {
        $playlist = Http::get('https://www.googleapis.com/youtube/v3/playlists?key=AIzaSyCkzcwSJNguHaybXQyYwZmfcpPEo4fVYQ8&part=snippet&id='.$playlist_id);
        if (count($playlist['items']) > 0) {
            $data = Playlist::create([
                'playlist_id' => $playlist_id,
                'module_id' => $module_id,
            ]);
            return $data;
        } 
        throw new \PHPUnit\Framework\Exception("gagal");
    }
    public static function getPlaylistByModuleId($module_id)
    {
        return Playlist::where('module_id', $module_id)->get()->toArray();
    }
    public static function getPlaylistDetailByPlaylistIds($playlistIds)
    {
        $playlistIdList = join(',', array_map(function ($data) {
            return $data['playlist_id'];
        }, $playlistIds));
        $playlist = Http::get("https://www.googleapis.com/youtube/v3/playlists?key=AIzaSyCkzcwSJNguHaybXQyYwZmfcpPEo4fVYQ8&part=snippet&maxResults=50&id=" . $playlistIdList);
        $newPlaylist = [];
        $newPlaylist['items'] = array_map(function ($item, $i) use ($playlistIds) {
            $item['playlistDatabaseId'] = $playlistIds[$i]['id'];
            return $item;
        }, $playlist['items'], array_keys($playlist['items']));
        return $newPlaylist;
    }
    public static function deletePlaylistById($id)
    {
        return Playlist::destroy($id);
    }
}
