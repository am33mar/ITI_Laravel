<!DOCTYPE html>
<html lang="en">

<x-head>View one track</x-head>

<body class="mb-5">
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
    <!-- display courses in this track -->
    @if (count($track->courses)>0)
    <p class="display-4 text-center">Courses of the track:</p>
    <table class="table table-secondary  w-75 mt-4 mx-auto">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Total Grade</th>
            <th>Description</th>
            <th class="text-center">Actions</th>
        </tr>
        @foreach ($track->courses as $course)
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
    <p class="display-4 text-center">This track has no courses</p>
    @endif

    <!-- display students enrolled in this track -->
    @if (count($track->students)>0)
    <p class="display-4 text-center">Students of the track:</p>
    <table class="table table-secondary  w-75 mt-4 m-auto">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Grade</th>
            <th>Gender</th>
            <th class="text-center">Actions</th>
        </tr>
        @foreach ($track->students as $student)
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
    <p class="display-4 text-center">This track has no students</p>
    @endif


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>