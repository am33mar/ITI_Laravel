<!DOCTYPE html>
<html lang="en">

<x-head>View one course</x-head>
<body>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>