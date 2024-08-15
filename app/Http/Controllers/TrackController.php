<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Track;
use Illuminate\Support\Facades\Storage;

class TrackController extends Controller
{
    function saveImage($request)
    {
        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            // file path in 'images/tracks_images'
            $filePath = $image->store('tracks_images', 'track_uploads');
            return $filePath;
        }
        return null;
    }


    function index()
    {
        $tracks=Track::orderBy('created_at',"desc")->paginate(5);
        return view("tracks.index", ["tracks" => $tracks]);
    }
    function viewTrack($id)
    {
        $track = Track::findOrFail($id);
        return view("tracks.view", ["track" => $track]);
    }
    function deleteTrack($id)
    {
        $track = Track::findOrFail($id);
        // Delete the file from storage if exists
        if ($track->icon) 
            Storage::disk('track_uploads')->delete($track->icon);
        Track::find($id)->delete();
        $tracks=Track::orderBy('created_at',"desc")->paginate(5);
        return view("tracks.index", ["tracks" => $tracks]);
    }
    function createTrack()
    {
        return view('tracks.create');
    }
    function storeTrack(Request $request)
    {
        $logoPath = $this->saveImage($request);
        $requestData = request()->all();
        $requestData['icon'] = $logoPath;

        $track = new Track();
        $track->name = $requestData['name'];
        $track->branch = $requestData['branch'];
        $track->number_courses = $requestData['number_courses'];
        $track->icon = $requestData['icon'];
        $track->save();
        return to_route('tracks.index');
    }
    function editTrack($id)
    {
        $track = Track::findOrFail($id);
        return view('tracks.update', compact("track"));
    }
    function updateTrack(Request $request, $id)
    {
        $track = Track::findOrFail($id);
        $newData = $request->except(['_token', '_method']);
        // handling image update
        if ($request->hasFile('icon')) {
            // Delete the old image if it exists
            if ($track->icon) 
                Storage::disk('track_uploads')->delete($track->icon);
            // Save the new image
            $newImagePath = $this->saveImage($request);
            $newData['icon'] = $newImagePath;
        }
        $track->update($newData);
        return to_route('tracks.index');
    }
    function generate(Request $request)
    {
        Track::factory()->count($request->count)->create();
        return to_route('tracks.index');
    }
}
