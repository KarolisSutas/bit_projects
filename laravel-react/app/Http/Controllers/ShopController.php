<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Models\Shop;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Encoders\WebpEncoder;
use Intervention\Image\Laravel\Facades\Image;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Shop/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShopRequest $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
    
            // 1) Įrašom originalą į public diską: storage/app/public/uploads/...
            $storedPath = $file->storeAs('uploads', $fileName, 'public'); // 'uploads/xxx.jpg'
    
            // 2) Skaitom būtent iš ten, kur įrašėm
            $image = Image::read(storage_path('app/public/' . $storedPath));
    
            // 3) Konvertuojam į webp ir įrašom ten pat (public disk)
            $webpPath = 'uploads/' . pathinfo($fileName, PATHINFO_FILENAME) . '.webp';
            $image->encode(new WebpEncoder(), 90);
            $image->save(storage_path('app/public/' . $webpPath));
    
            // (nebūtina) jei nori – gali trinti originalą:
            // Storage::disk('public')->delete($storedPath);
    
            $filePath = $webpPath; // į DB rašom santykinį kelią be 'public/'
        } else {
            $filePath = null;
        }
    
        Shop::create([
            ...$request->validated(),
            'image_path' => $filePath,
        ]);
    
        return response()->json([
            'success' => true,
            'message' => 'Product created successfully'
        ], 201);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShopRequest $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
