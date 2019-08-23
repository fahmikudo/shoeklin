<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;

class SettingsController extends Controller
{
    public function index() {
        $settings = Settings::all();
        return view('settings.index',[
            'settings' => $settings
        ]);
    }

    public function save(Request $request) {
        $data = $request->except('_token');

        foreach ($data as $index => $datax) {
            $settings = Settings::where('key', $index)->first();
            $settings->value = $datax;
            $settings->save();
        }
        $request->session()->flash('message','Simpan data berhasil!');
        return redirect()->route('settings-index');
    }
}
