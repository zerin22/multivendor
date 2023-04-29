<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
// use Intervention\Image\ImageManager;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        return view('settings.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */

    public function image_settings($image)
    {
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $location = 'uploads/settings/';
        $final_image = $location.$name_gen;
        return $final_image;
    }
    public function update(Request $request, Setting $setting)
    {
        if($request->logo_header)
        {
            if($setting->logo_header != 'uploads/settings/logo_header.png'){
                unlink($setting->logo_header);
            }
            $logo_header = $request->file('logo_header');
            $final_logo_header= $this->image_settings($logo_header);
            Image::make($logo_header)->resize(125, 30)->save($final_logo_header);
            $setting->update([
                'logo_header' => $final_logo_header,
            ]);
        }

        if($request->logo_footer)
        {
            if($setting->logo_footer != 'uploads/settings/logo_footer.png'){
                unlink($setting->logo_footer);
            }
            $logo_footer = $request->file('logo_footer');
            $final_logo_footer= $this->image_settings($logo_footer);
            Image::make($logo_footer)->resize(125, 30)->save($final_logo_footer);

            $setting->update([
                'logo_footer' => $final_logo_footer,
            ]);
        }

        if($request->favicon)
        {
            if($setting->favicon != 'uploads/settings/favicon.jpg'){
                unlink($setting->favicon);
            }
            $favicon = $request->file('favicon');
            $final_favicon= $this->image_settings($favicon);
            Image::make($favicon)->resize(16, 16)->save($final_favicon);

            $setting->update([
                'favicon' => $final_favicon,
            ]);
        }

        $setting->update([
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'footer_description' => $request->footer_description,
            'store_address' => $request->store_address,
            'store_email' => $request->store_email,
            'store_phone' => $request->store_phone,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
        ]);

        return redirect()->back()->with('success', 'Setting Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
