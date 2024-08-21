<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Track;
use Illuminate\Support\Facades\Storage;
use App\Models\Course;
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
        return view("tracks.view", compact('track'));
    }
    function deleteTrack($id)
    {
        $track = Track::findOrFail($id);
        // Delete the file from storage if exists
        if ($track->icon) 
            Storage::disk('track_uploads')->delete($track->icon);
        Track::find($id)->delete();
        return to_route('tracks.index');
    }
    function createTrack()
    {
        $courses=Course::all();
        return view('tracks.create',compact('courses'));
    }
    function storeTrack(Request $request)
    {
        $logoPath = $this->saveImage($request);
        $requestData = request()->all();
        $requestData['icon'] = $logoPath;

        $track = Track::create($requestData);
        $track->courses()->attach(array_values($requestData['courses']));
        $track->save();
        return to_route('tracks.index');
    }
    function editTrack($id)
    {
        $track = Track::findOrFail($id);
        $courses = Course::all();
        return view('tracks.update', compact("track","courses"));
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
        $track->courses()->sync(array_values($request['courses']));
        return to_route('tracks.index');
    }
    function generate(Request $request)
    {
        Track::factory()->count($request->count)->create();
        return to_route('tracks.index');
    }
}
