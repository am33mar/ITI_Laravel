<!DOCTYPE html>
<html lang="en">

<x-head>View one course</x-head>

<body class="mb-5">
    <x-nav></x-nav>
    <p class="display-4 text-center">One Course Data</p>
    <table class="table table-secondary  w-75 mt-4 m-auto">
        <tr class="d-felx text-center">
            <th>ID</th>
            <th>Name</th>
            <th>Total Grade</th>
            <th>Description</th>
            <th class="m-auto">Actions</th>
        </tr>
        <tr class="text-center align-middle">
            <td>{{$course->id}}</td>
            <td>{{$course->name}}</td>
            <td>{{$course->total_grade}}</td>
            <td>{{$course->description}}</td>
            <td class="text-center">
                <a href="{{route("courses.index")}}">
                    <button class="btn btn-primary px-5">Back</button>
                </a>
            </td>
        </tr>
    </table>
    <!-- tracks of course -->
    @if(count($course->tracks)>0)
    <p class="display-4 text-center">Tracks of course:</p>
    <table class="table table-secondary  w-50 mt-4 mx-auto">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Branch</th>
            <th class="text-center">Actions</th>
        </tr>
        @foreach ($course->tracks as $track)
        <tr class="d-felx">
            <td>{{$track->id}}</td>
            <td>{{$track->name}}</td>
            <td>{{$track->branch}}</td>
            <td>
                <div class="h-full d-flex gap-2 justify-center">
                    <x-btn-view href="{{route('tracks.view',$track->id)}}">View</x-btn-view>
                    <x-btn-update href="{{route('tracks.edit',$track->id)}}">Update</x-btn-update>
                    <x-form-delete action="{{route('tracks.destroy',$track->id)}}" method='post'>Delete</x-form-delete>
                </div>
            </td>
            </td>
        </tr>
        @endforeach
    </table>
    @else
    <p class="display-4 text-center">This course has no track</p>
    @endif
    <!-- students of course -->
    @if(count($course->students)>0)
    <p class="display-4 text-center">Students of course:</p>
    <table class="table table-secondary  w-75 mt-4 mx-auto">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Grade</th>
            <th>Gender</th>
            <th class="text-center">Actions</th>
        </tr>
        @foreach ($course->students as $student)
        <tr class="d-felx">
            <td>{{$student->id}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->grade}}</td>
            <td>{{$student->gender}}</td>
            <td>
                <div class="h-full d-flex gap-2 justify-center">
                    <x-btn-view href="{{route('students.view',$student->id)}}">View</x-btn-view>
                    <x-btn-update href="{{route('students.edit',$student->id)}}">Update</x-btn-update>
                    <x-form-delete action="{{route('students.destroy',$student->id)}}" method='post'>Delete</x-form-delete>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    @else
    <p class="display-4 text-center">This course has no students</p>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>