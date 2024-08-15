<!DOCTYPE html>
<html lang="en">

<x-head>View All students</x-head>

<body class="flex flex-col min-h-screen">
    <x-nav></x-nav>
    <p class="display-4 text-center">All Students Data</p>
    <div class="flex-grow">
        <table class="table table-secondary  w-75 mt-4 mx-auto">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Grade</th>
                <th>Gender</th>
                <th class="text-center">Actions</th>
            </tr>
            @foreach ($students as $student)
            <tr class="d-felx">
                <td>{{$student->id}}</td>
                <td>{{$student->name}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->grade}}</td>
                <td>{{$student->gender}}</td>
                <td>
                    <div class="h-full d-flex gap-2">
                        <x-btn-view href="{{route('students.view',$student->id)}}">View</x-btn-view>
                        <x-btn-update href="{{route('students.edit',$student->id)}}">Update</x-btn-update>
                        <x-form-delete action="{{route('students.destroy',$student->id)}}" method='post'>Delete</x-form-delete>
                    </div>
                </td>
            </tr>
            @endforeach

        </table>

        <div class="flex justify-between w-[80%]">
            <x-btn-create href="{{route('students.create')}}">Add New Student</x-btn-create>
            <form action="{{ route('students.generate') }}" method="POST">
                @csrf
                <input type="number" name="count" placeholder="Number of students to generate" class="w-100 p-1 mb-1"> <!-- Number of records to create -->
                <button type="submit" class="btn btn-primary w-100">Generate Students</button>
            </form>
        </div>
    </div>
    <!-- pagination -->
    <div class="bg-gray-100 px-4 py-2">
        <div class="w-full max-w-3xl mx-auto">
            {{$students->links()}}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>