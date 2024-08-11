<!DOCTYPE html>
<html lang="en">

<x-head>View All students</x-head>

<body>
    <x-nav></x-nav>
    <p class="display-4 text-center">All Students Data</p>
    <table class="table table-secondary  w-75 mt-4 m-auto">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Grade</th>
            <th>Gender</th>
            <th class="d-flex justify-content-center pe-4">Actions</th>
        </tr>
        @foreach ($students as $student)
        <tr class="d-felx">
            <td>{{$student->id}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->grade}}</td>
            <td>{{$student->gender}}</td>
            <td class="d-flex justify-content-evenly pe-4">
                <x-btn-view href="{{route('students.view',$student->id)}}">View</x-btn-view>
                <x-btn-update href="{{route('students.edit',$student->id)}}">Update</x-btn-update>
                <x-form-delete action="{{route('students.destroy',$student->id)}}" method='post'>Delete</x-form-delete>
            </td>
        </tr>
        @endforeach

    </table>
    <x-btn-create href="{{route('students.create')}}">Add New Student</x-btn-create>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>