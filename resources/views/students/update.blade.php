<!DOCTYPE html>
<html lang="en">

<x-head>Edit Student</x-head>

<body>
    <x-nav></x-nav>
    <h1 class="text-center my-4 display-4">Update student</h1>
    <form enctype="multipart/form-data" method="post" action="{{route('students.update',$student->id)}}" class=" border p-2 bordered w-75 m-auto">
        @csrf
        @method('PUT')
        <!-- name -->
        <div class="mb-3 mx-4">
            <label for="name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="name" value="{{$student->name}}">
        </div>
        <!-- email -->
        <div class="mb-3 mx-4">
            <label for="email" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="email" value="{{$student->email}}">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <!-- grade -->
        <div class="mb-3 mx-4">
            <label for="grade" class="form-label">Grade </label>
            <input name="grade" type="number" class="form-control" id="grade" value="{{$student->grade}}">
        </div>
        <!-- gender -->
        <label class="form-check-label mb-3 mx-4" for="flexRadioDefault1">
            Gender
        </label>
        <div class="form-check mx-4">
            <input name="gender" class="form-check-input" type="radio" id="flexRadioDefault1" value="male" {{$student->gender=="male"?"checked":""}}>
            <label class="form-check-label" for="flexRadioDefault1">
                male
            </label>
        </div>
        <div class="form-check mb-3 mx-4">
            <input name="gender" class="form-check-input" type="radio" id="flexRadioDefault2" value="female" {{$student->gender=="female"?"checked":""}}>
            <label class="form-check-label" for="flexRadioDefault2">
                Female
            </label>
        </div>
        <!-- image -->
        <div class="mb-3 mx-4">
            <label for="image" class="form-label">Image </label>
            <div class="d-flex align-items-center mt-2">
                <!-- display current image -->
                <img id="current-image" src="{{ asset('images/students/' . $student->image) }}" alt="{{ $student->name }}" class="d-inline w-[40px] h-[40px] rounded-circle border-2 border-primary me-2">
                <!-- input image -->
                <input name="image" type="file" class="form-control" id="image" accept="image/*">
            </div>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-24 mx-4 mb-4 rounded">Update</button>
    </form>

    <!-- script to update image preview -->
    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            var fileInput = event.target;
            var file = fileInput.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = document.getElementById('current-image');
                    img.src = e.target.result;
                    img.style.display = 'inline';
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>


</html>