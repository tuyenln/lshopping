<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingAddRequest;
use Illuminate\Http\Request;
use App\Setting;
use App\Traits\DeleteModelTrait;

class AdminSettingController extends Controller
{
    use DeleteModelTrait;
    private $settings;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }
    public function index()
    {
        $settings = $this->setting->paginate(5);
        return view('admin.setting.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.setting.add');
    }

    public function store(SettingAddRequest $request)
    {
        $settings = array(
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type
        );
        $this->setting->create($settings);

        return redirect()->route('setting.index');
    }

    public function edit($id)
    {
        $setting = $this->setting->find($id);
        return view('admin.setting.edit', compact( 'setting'));
    }

    public function update(SettingAddRequest $request, $id)
    {
        $settings = array(
            'config_key' => $request->config_key,
            'config_value' => $request->config_value
        );
        $this->setting->find($id)->update($settings);

        return redirect()->route('setting.index');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->setting);
    }
}
