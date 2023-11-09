<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = "module";
    protected $fillable = [
        "name",
        "title",
        "description",
        "parent_name"
    ];

    use HasFactory;
    public static function getModuleByName($name)
    {
        return Module::where("name", $name)->first();
    }
    public static function getModuleByParentNName($name)
    {
        return Module::where("parent_name", $name)->get();
    }
    public static function addModule($name, $title, $description, $parent_name)
    {
        Module::create([
            "name" => $name,
            "title" => $title,
            "description" => $description,
            "parent_name" => $parent_name
        ]);
        return true;
    }
    public static function updateModuleById($id, $title, $description)
    {
        Module::where('id', $id)->update(
            [
                "title" => $title,
                "description" => $description,
            ]
        ); 
        return true;
    }
}
