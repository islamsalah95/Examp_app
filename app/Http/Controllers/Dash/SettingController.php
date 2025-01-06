<?php

namespace App\Http\Controllers\Dash;

use App\Models\Services;
use App\Models\SubServices;
use Spatie\Sitemap\Sitemap;
use App\Services\UpdateCach;
use Illuminate\Http\Request;
use Spatie\Sitemap\Tags\Url;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:setting-list|setting-create|setting-edit|setting-delete']);
        $this->middleware(['permission:setting-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:setting-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:setting-delete'], ['only' => ['destroy']]);
    }

    public function sitemap()
    {

        // $sitemap = Sitemap::create()
        //     ->add(Url::create('/')->setPriority(1.0)->setChangeFrequency('daily'))
        //     ->add(Url::create('/contact')->setPriority(0.8)->setChangeFrequency('weekly'))
        //     ->add(Url::create('/about')->setPriority(0.8)->setChangeFrequency('weekly'))
        //     ->add(Url::create('/pricing')->setPriority(0.8)->setChangeFrequency('weekly'))
        //     ->add(Url::create('/error')->setPriority(0.8)->setChangeFrequency('weekly'))
        //     ->add(
        //         Services::all()->map(function (Services $service) {
        //             return Url::create(route('service.index', ['service' => $service->id]))
        //                 ->setLastModificationDate($service->updated_at)
        //                 ->setChangeFrequency('weekly')
        //                 ->setPriority(0.7);
        //         })->toArray()
        //     )
        //     ->add(
        //         SubServices::all()->map(function (SubServices $sub_service) {
        //             return Url::create(route('sub_services.index', ['sub_service' => $sub_service->id]))
        //                 ->setLastModificationDate($sub_service->updated_at)
        //                 ->setChangeFrequency('weekly')
        //                 ->setPriority(0.7);
        //         })->toArray()
        //     )
        //     ->writeToFile(public_path('sitemap.xml'));
        // return $sitemap->toResponse(request());
    }


    public function edit()
    {

        $settings = config('setting');
        return view('dash.settings.edit', compact('settings'));
    }


    public function update(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'social_media.*' => 'required|url',
            'contact.email' => 'required|email',
            'contact.phone' => 'required|string|max:20',
            'contact.address' => 'required|string',
            'seo.title' => 'required|string',
            'seo.description' => 'required|string',
            'seo.keywords' => 'required|string',
            'branding.logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Logo validation
            'branding.favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024', // Favicon validation
        ]);

        // Path to the config file
        $configFile = config_path('setting.php');

        // Load the current settings
        $settings = config('setting');

        // Handle file uploads for logo and favicon
        if ($request->hasFile('branding.logo')) {
            $logoPath = $request->file('branding.logo')->store('icons', 'public');
            $validatedData['branding']['logo'] = basename($logoPath);

            // Optionally delete the old logo
            if (file_exists(public_path('storage/icons/' . $settings['branding']['logo']))) {
                unlink(public_path('storage/icons/' . $settings['branding']['logo']));
            }
        }

        if ($request->hasFile('branding.favicon')) {
            $faviconPath = $request->file('branding.favicon')->store('icons', 'public');
            $validatedData['branding']['favicon'] = basename($faviconPath);

            // Optionally delete the old favicon
            if (file_exists(public_path('storage/icons/' . $settings['branding']['favicon']))) {
                unlink(public_path('storage/icons/' . $settings['branding']['favicon']));
            }
        }

        // Merge the validated data into current settings
        $updatedSettings = array_merge($settings, $validatedData);

        // Convert the updated settings into PHP array format
        $configContent = "<?php\n\nreturn " . var_export($updatedSettings, true) . ";\n";

        // Save the updated settings to the config file
        File::put($configFile, $configContent);

        // UpdateCach::settings();

        // Redirect with a success message
        return redirect()->back()->with('message', __('share.message.update'));
    }
}
