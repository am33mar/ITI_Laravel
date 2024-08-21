<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Track;
use Illuminate\Support\Facades\Storage;
use App\Models\Course;

class TrackController extends Controller
{
    private function saveImage(Request $request)
    {
        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $filePath = $image->store('tracks_images', 'track_uploads');
            return $filePath;
        }
        return null;
    }

    // get all tracks => GET /api/tracks
    public function index()
    {
        $tracks = Track::orderBy('created_at', 'desc')->paginate(5);
        return response()->json($tracks);
    }

    // get one track => GET /api/tracks/{id}
    public function show($id)
    {
        $track = Track::findOrFail($id);
        return response()->json($track);
    }

    // create track => POST /api/tracks
    public function store(Request $request)
    {
        $logoPath = $this->saveImage($request);

        $track = Track::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'icon' => $logoPath,
        ]);

        if ($request->has('courses')) {
            $courseIds = $request->input('courses');
            $track->courses()->attach($courseIds);
        }

        return response()->json($track, 201);
    }

    // update track => PUT/PATCH /api/tracks/{id}
    public function update(Request $request, $id)
    {
        $track = Track::findOrFail($id);

        $newData = $request->only(['name', 'description']);

        if ($request->hasFile('icon')) {
            if ($track->icon) {
                Storage::disk('track_uploads')->delete($track->icon);
            }
            $newImagePath = $this->saveImage($request);
            $newData['icon'] = $newImagePath;
        }

        $track->update($newData);

        if ($request->has('courses')) {
            $courseIds = $request->input('courses');
            $track->courses()->sync($courseIds);
        }

        return response()->json($track);
    }

    // dete track => DELETE /api/tracks/{id}
    public function destroy($id)
    {
        $track = Track::findOrFail($id);

        if ($track->icon) {
            Storage::disk('track_uploads')->delete($track->icon);
        }

        $track->delete();

        return response()->json(null, 204);
    }

    // create fake track => POST /api/trackss/generate
    public function generate(Request $request)
    {
        $count = $request->input('count', 10); // Default to 10 if count is not provided
        $tracks = Track::factory()->count($count)->create();
        return response()->json($tracks, 201);
    }
}
