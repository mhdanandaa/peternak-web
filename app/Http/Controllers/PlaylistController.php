<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Video;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function addplaylist(Request $request)
    {
        $request->validate([
            "playlist_id" => ['required', "string"],
            "module_id" => ['required', 'integer'],
        ]);
        try {
            $data = Playlist::addPlaylist($request->playlist_id, $request->module_id);
            return response()->json([
                'status' => 'success',
                'message' => "playlist telah ditambahkan",
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => "error",
                "message" => "Gagal menambahkan playlist",
                "error" => $th->getMessage()
            ]);
        }
    }

    public function playlistPage(Request $request)
    {
        $videos = Video::getVideosByPlaylistId($request->id);
        // echo $videos;
        return view('playlist.playlist', ['videos' => $videos['items'],'playlistId'=>$request->id]);
    }
    public function deletePlaylist(Request $requwst)
    {
        try {
            $deleted = Playlist::deletePlaylistById($requwst->id);
            return response()->json([
                "status" => 'success',
                'message' => "$deleted data deleted"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => "error",
                "message" => "Gagal menghapus playlist",
                "error" => $th->getMessage()
            ]);
        }


    }
}
