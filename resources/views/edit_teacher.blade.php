<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            School Database
        </h1>
    </x-slot>

        <h1>Edit teacher</h1>
    @if (isset($error))
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>
    @elseif(isset($teacher))
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="input_teacher_name">Name</label>
                <input type="text" class="form-control" id="input_teacher_name" name="name" placeholder="Teacher name" value="{{ $teacher->name }}">
            </div>
            <div class="form-group">
                <label for="input_homeroom">Homeroom</label>
                @if ($teacher->homeroom)
                    <select class="form-control" id="input_homeroom" name="homeroom" value="{{ $teacher->homeroom->id }}">
                @else
                    <select class="form-control" id="input_homeroom" name="homeroom">
                @endif
                    @foreach($homerooms as $hr)
                        @if( ($teacher->homeroom !== null) && $hr->id == $teacher->homeroom->id)
                            <option value="{{$hr->id}}" selected>{{ $hr->name }}</option>
                        @else
                            <option value="{{$hr->id}}">{{ $hr->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    @endif

</x-app-layout>
