<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            School Database
        </h1>
    </x-slot>

    <div class="container">
    <h1>Edit subject</h1>
    @if (isset($error))
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>
    @elseif(isset($subject))
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="input_subject_name">Name</label>
                <input type="text" class="form-control" id="input_subject_name" name="name" aria-describedby="emailHelp" placeholder="Student name" value="{{ $subject->name }}">
            </div>

            <div class="form-group">
                <label for="input_students">Students</label>
                <select multiple class="form-control" id="input_students" name="students[]">
                    @foreach($students as $std)
                        @if($subject->students()->find($std->id) !== null)
                            <option value="{{$std->id}}" selected>(id: {{ $std->id }}){{ $std->name }}</option>
                        @else
                            <option value="{{$std->id}}">(id: {{ $std->id }}){{ $std->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    @endif

</x-app-layout>
