<!DOCTYPE html>
<html lang="en">

<x-head>View one track</x-head>

<body>
    <x-nav></x-nav>

    <p class="display-4 text-center">One Track Data</p>
    <table class="table table-secondary  w-75 mt-4 m-auto">
        <tr class="d-felx text-center">
            <th>ID</th>
            <th>Name</th>
            <th>Branch</th>
            <th>Courses</th>
            <th>Photo</th>
            <th class="m-auto">Actions</th>
        </tr>
        <tr class="text-center align-middle">
            <td>{{$track->id}}</td>
            <td>{{$track->name}}</td>
            <td>{{$track->branch}}</td>
            <td>{{$track->number_courses}}</td>
            <td>
                <img src="{{asset('images/tracks/'.$track->icon)}}" alt="{{$track->name}}" class="w-[90px] h-[90px] m-auto rounded-circle border-2 border-primary">
            </td>
            <td class="text-center">
                <a href="{{route("tracks.index")}}" class="">
                    <button class="btn btn-primary px-5">Back</button>
                </a>
            </td>
        </tr>

    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>