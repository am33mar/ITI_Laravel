<!DOCTYPE html>
<html lang="en">

<x-head>View one student</x-head>
<body>
    <x-nav></x-nav>
    <p class="display-4 text-center">One Student Data</p>
    <table class="table table-secondary  w-75 mt-4 m-auto">
        <tr class="d-felx text-center">
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>grade</th>
            <th>gender</th>
            <th>Photo</th>
            <th class="m-auto">Actions</th>
        </tr>
        <tr class="text-center align-middle">
            <td>{{$student->id}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->grade}}</td>
            <td>{{$student->gender}}</td>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>