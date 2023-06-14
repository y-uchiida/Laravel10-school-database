<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            School Database
        </h1>
    </x-slot>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <h1>
        Homerooms list
        <a href="{{ asset('/homeroom/add')}}"><button type="button" class="btn btn-info"> + Add</button></a>
    </h1>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Teacher</th>
            <th scope="col">Students</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @if( empty($homerooms) === false )
                @foreach($homerooms as $homeroom)
                    <tr>
                        <td>{{ $homeroom->id }}</td>
                        <td>{{ $homeroom->name }}</td>
                        <td>
                            @if ($homeroom->teacher)
                                {{ $homeroom->teacher->name }}
                            @else
                                no teacher
                            @endif
                        </td>

                        <td>
                            <ul>
                                @forelse($homeroom->students as $student)
                                    <li>(ID: {{$student->id}}){{$student->name}}</li>
                                @empty
                                    no students
                                @endforelse
                            </ul>
                        </td>

                        <td>
                            <a href="{{ asset("/homeroom/{$homeroom->id}")}}"><button type="button" class="btn btn-primary">Edit</button></a>
                        </td>
                        <td>
                            <form action="{{ asset("/homeroom/{$homeroom->id}") }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
      </table>

</x-app-layout>
