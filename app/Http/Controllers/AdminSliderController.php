<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use Illuminate\Http\Request;
use App\Slider;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Log;

class AdminSliderController extends Controller
{
    use StorageImageTrait;
    use DeleteModelTrait;
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }
    public function index() {
        $sliders = $this->slider->latest()->paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create() {
        return view('admin.slider.add');
    }

    public function store(SliderAddRequest $request)
    {
        try {
            $slideData = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $imageData = $this->storageTraitUpload($request,  'image_path', 'slider');

            if (!empty($imageData)) {
                $slideData['image_name'] = $imageData['file_name'];
                $slideData['image_path'] = $imageData['file_path'];
            }

            $this->slider->create($slideData);

            return redirect()->route('slider.index');

        } catch (\Exception $exception) {
            Log::error("Error: " . $exception->getMessage() . '----Line:' . $exception->getLine());
        }

    }

    public function edit($id)
    {
        $slider = $this->slider->find($id);
        return view('admin.slider.edit', compact( 'slider'));
    }

    public function update(Request $request, $id)
    {
        try {
            $slideData = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $imageData = $this->storageTraitUpload($request,  'image_path', 'slider');

            if (!empty($imageData)) {
                $slideData['image_name'] = $imageData['file_name'];
                $slideData['image_path'] = $imageData['file_path'];
            }

            $this->slider->find($id)->update($slideData);

            return redirect()->route('slider.index');

        } catch (\Exception $exception) {
            Log::error("Error: " . $exception->getMessage() . '----Line:' . $exception->getLine());
        }
    }

    public function delete($id) {
        return $this->deleteModelTrait($id, $this->slider);
    }
}
