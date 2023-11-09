<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function updateNote(Request $request)
    {
        $request->validate([
            'title'=>['required',"string"],
            'note'=>['required',"string"],
        ]);
        try {
            $note = Note::updateNote(Auth::user()->id, $request->video_id, $request->title, $request->note);
            if ($note) {
                return response()->json(["status" => "success", "message" => "Berhasil menyimpan catatan"]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                "status" => "error",
                "message" => "Gagal menyimpan catatan", 
                "error"=>$th->getMessage()
            ]);
        }
    }
}
