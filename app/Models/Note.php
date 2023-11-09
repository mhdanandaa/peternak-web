<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $table = "note" ;
    protected $fillable = [
        "video_id",
        "user_id",
        "title",
        "description",
    ];
    public static function updateNote($user_id,$video_id,$title,$note)
    {
        $note = Note::updateOrCreate(
            ['video_id' => $video_id, 'user_id' => $user_id],
            ['title' => $title, 'description' => $note]
        );
        return true;
    }
    public static function getNoteByVideoId($video_id,$user_id)
    {
        $notes = Note::where([
            'video_id'=>$video_id,
            'user_id'=>$user_id,
        ])->get()->first();
        return $notes;
    }
}
