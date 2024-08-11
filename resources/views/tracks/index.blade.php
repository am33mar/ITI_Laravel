<!DOCTYPE html>
<html lang="en">

<x-head>View All Tracks</x-head>

<body>
    <x-nav></x-nav>

    <p class="display-4 text-center">All Tracks Data</p>
    <table class="table table-secondary  w-50 mt-4 mx-auto">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Branch</th>
            <th class="d-flex justify-content-center pe-4">Actions</th>
        </tr>
        @foreach ($tracks as $track)
        <tr class="d-felx">
            <td>{{$track->id}}</td>
            <td>{{$track->name}}</td>
            <td>{{$track->branch}}</td>
            <td class="d-flex justify-content-evenly pe-4">
                <x-btn-view href="{{route('tracks.view',$track->id)}}">View</x-btn-view>
                <x-btn-update href="{{route('tracks.edit',$track->id)}}">Update</x-btn-update>
                <x-form-delete action="{{route('tracks.destroy',$track->id)}}" method='post'>Delete</x-form-delete>
            </td>
            </td>
        </tr>
        @endforeach

    </table>
    <x-btn-create href="{{route('tracks.create')}}">Create New Track</x-btn-create>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>