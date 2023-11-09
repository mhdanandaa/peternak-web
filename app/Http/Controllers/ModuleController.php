<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ModuleController extends Controller
{
    public function homePage()
    {
        $modules = Module::getModuleByParentNName('primary');
        $module = Module::getModuleByName('primary');
        return view("welcome.welcome", ['modules' => $modules, 'module' => $module,'moduleNames'=>['primary']]);
    }
    public function modulePage(Request $request)
    {
        $moduleNames = $request->module ? explode('/', $request->module) : ['primary'];
        $module = Module::getModuleByName(last($moduleNames));
        $modules = Module::getModuleByParentNName(last($moduleNames));
        $playlistIds = Playlist::getPlaylistByModuleId($module->id);
        $playlist = Playlist::getPlaylistDetailByPlaylistIds($playlistIds);
        return view('module.module', ['modules' => $modules, 'module' => $module,'playlist'=>$playlist['items'],'moduleNames'=>$moduleNames]);
    }
    public function dashboardPage(Request $request)
    {
        try {
            $moduleNames = $request->module ? explode('/', $request->module) : ['primary'];
            $moduleName = last($moduleNames);
            $module = Module::getModuleByName($moduleName);
            if ($module == null) {
                $module = Module::addModule('primary', "Selamat Datang", "Selamat Datang di Peternak Web", "");
                $module = Module::getModuleByName($moduleName);
            }
            $children = Module::getModuleByParentNName($moduleName);
            if (Auth::user()->role == 'admin') {
                $playlistIds = Playlist::getPlaylistByModuleId($module->id);
                $playlist = Playlist::getPlaylistDetailByPlaylistIds($playlistIds);
                return view("dashboard.dashboard-admin", ["children" => $children, 'module' => $module, 'playlist' => $playlist['items'],'moduleNames'=>$moduleNames]);
            } else {
                return view("dashboard.dashboard", ['modules' => $children, 'module' => $module,'moduleNames'=>$moduleNames]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                "status" => "error",
                "message" => "Gagal",
                "error" => $th->getMessage()
            ]);
        }
    }
    public function addModule(Request $request)
    {
        $request->validate([
            "name" => ["string", 'required'],
            "title" => ["string", 'required'],
            "description" => ["string", 'required'],
            "parent_name" => ["string", 'required'],
        ]);
        try {
            $module = Module::addModule($request->name, $request->title, $request->description, $request->parent_name);
            if ($module) {
                return response()->json(["status" => "success", "message" => "Berhasil Menambahkan Modul"]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                "status" => "error",
                "message" => "Gagal menembahkan module",
                "error" => $th->getMessage()
            ]);
        }
    }
    public function deleteModule(Request $request)
    {
        try {
            $module = Module::destroy($request->id);
            return response()->json(["status" => "success", "message" => "Berhasil menghapus Modul"]);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => "error",
                "message" => "Gagal menghapus module",
                "error" => $th->getMessage()
            ]);
        }
    }
    public function updateModule(Request $request)
    {
        $request->validate([
            "id" => ['integer', "required"],
            "title" => ["string", 'required'],
            "description" => ["string", 'required'],
        ]);
        try {
            $module = Module::updateModuleById($request->id, $request->title, $request->description);
            return response()->json(["status" => "success", "message" => "Berhasil mengupdate Modul"]);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => "error",
                "message" => "Gagal mengupdate module",
                "error" => $th->getMessage()
            ]);
        }
    }
}
