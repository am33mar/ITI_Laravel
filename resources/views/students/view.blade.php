<!DOCTYPE html>
<html lang="en">

<x-head>View one student</x-head>

<body class="mb-5">
    <x-nav></x-nav>
    <p class="display-4 text-center">One Student Data</p>
    <table class="table table-secondary  w-75 mt-4 m-auto">
        <tr class="d-felx text-center">
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>grade</th>
            <th>gender</th>
            <th>Track</th>
            <th>Photo</th>
            <th class="m-auto">Actions</th>
        </tr>
        <tr class="text-center align-middle">
            <td>{{$student->id}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->grade}}</td>
            <td>{{$student->gender}}</td>
            @if (isset($student->tracks->name))
            <td>
                <a href="{{route("tracks.view",$student->tracks->id)}}" class="btn btn-primary px-3">
                    {{$student->tracks->name}}
                </a>
            </td>
            @else
            <td>This student has no track</td>
            @endif
            <td>
                <img src="{{asset('images/students/'.$student->image)}}" alt="{{$student->name}}" class="w-[90px] h-[90px] m-auto rounded-circle border-2 border-primary">
            </td>
            <td class="text-center">
                <a href="{{route("students.index")}}">
                    <button class="btn btn-primary px-5">Back</button>
                </a>
            </td>
        </tr>
    </table>
    <!-- show courses -->
    @if(count($student->courses)>0)
    <p class="display-4 text-center">Courses of the student:</p>
    <table class="table table-secondary  w-75 mt-4 mx-auto">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Total Grade</th>
            <th>Description</th>
            <th class="text-center">Actions</th>
        </tr>
        @foreach ($student->courses as $course)
        <tr class="d-felx">
            <td>{{$course->id}}</td>
            <td>{{$course->name}}</td>
            <td>{{$course->total_grade}}</td>
            <td>{{$course->description}}</td>
            <td>
                <div class="h-full d-flex gap-2 justify-center">
                    <x-btn-view href="{{route('courses.show',$course->id)}}">View</x-btn-view>
                    <x-btn-update href="{{route('courses.edit',$course->id)}}">Update</x-btn-update>
                    <x-form-delete action="{{route('courses.destroy',$course->id)}}" method='post'>Delete</x-form-delete>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    @else
    <p class="display-4 text-center">This student has no courses</p>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>