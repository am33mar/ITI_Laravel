<form {{$attributes}}>
    @method('DELETE')
    @csrf
    <button class="text-white bg-red-600 py-2 px-4 rounded-lg hover:bg-red-700">{{$slot}}</button>
</form>