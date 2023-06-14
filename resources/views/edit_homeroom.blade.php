<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            School Database
        </h1>
    </x-slot>

        <h1>Edit homeroom</h1>
    @if (isset($error))
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>
    @elseif(isset($homeroom))
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="input_homeroom_name">Name</label>
                <input type="text" class="form-control" id="input_homeroom_name" name="name" placeholder="Homeroom name" value="{{ $homeroom->name }}">
            </div>
            <div class="form-group">
                <label for="input_teacher">Teacher</label>
                @if ($homeroom->teacher !== null)
                    <select class="form-control" id="input_teacher" name="teacher" value="{{ $homeroom->teacher->id }}">
                @else
                    <select class="form-control" id="input_teacher" name="teacher" value="">
                @endif
                    @foreach($teachers as $tch)
                        @if($homeroom->teacher !== null && $tch->id == $homeroom->teacher->id)
                            <option value="{{$tch->id}}" selected>{{ $tch->name }}</option>
                        @else
                            <option value="{{$tch->id}}">{{ $tch->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="input_student">Students</label>
                <select multiple class="form-control" id="input_student" name="students[]">
                    @foreach($students as $std)
                        @if($homeroom->students()->find($std->id) !== null)
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
