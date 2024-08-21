    <!DOCTYPE html>
    <html lang="en">

    <x-head>View All courses</x-head>

    <body class="flex flex-col min-h-screen">
        <x-nav></x-nav>
        <p class="display-4 text-center">All Courses Data</p>
        <div class="flex-grow">
            <table class="table table-secondary  w-75 mt-4 mx-auto">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Total Grade</th>
                    <th>Description</th>
                    <th class="text-center">Actions</th>
                </tr>
                @foreach ($courses as $course)
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
            <div class="px-[20%] flex justify-around g-4 border-t-2 border-gray-200 pt-2">
                <x-btn-create href="{{route('courses.create')}}">Add New Course</x-btn-create>
                <!-- generation -->
                <form action="{{ route('courses.generate') }}" method="POST" class="text-center w-[50%]">
                    @csrf
                    <input type="number" name="count" placeholder="Number of courses to generate" class="w-75 p-1 mb-1 border"> <!-- Number of records to create -->
                    <button type="submit" class="btn btn-primary w-75">Generate Courses</button>
                </form>
            </div>

        </div>
        
        <!-- pagination -->
        <div class="bg-gray-100 px-4 py-2">
            <div class="w-full px-[10%]">
                {{$courses->links()}}
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>