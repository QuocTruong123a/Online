<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
class SettingController extends Controller
{
    private $setting;
    public function __construct(Setting $setting)
    {
        $this -> setting = $setting;
    }
    public function list(){
        $setting = $this -> setting->paginate(5);
        return view('Admins.seting.list',compact('setting'));
    }
    public function create(){
        return view('Admins.seting.add');
    }
    public function store(Request $request){
        $this -> setting ->create([
            'config_key' => $request -> config_key,
            'config_value' => $request -> config_value
        ]);
        return redirect('admin/setting/list');
    }
    public function edit($id){
        $setting = $this -> setting -> find($id);
        return view('Admins.seting.edit',compact('setting'));
    }
    public function update(Request $request, $id){
        $this -> setting-> find($id) ->update ([
            'config_key' => $request -> config_key,
            'config_value' => $request -> config_value
        ]);
        return redirect('admin/setting/list');
    }
    public function delete($id){
        $this -> setting -> find($id) -> delete();
        return redirect('admin/setting/list');
    }
}
