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
    <h1>Teachers list <button type="button" class="btn btn-info"> + Add</button></h1>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Homeroom</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @if( empty($teachers) === false )
                @foreach($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->id }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>
                            @if ($teacher->homeroom)
                                {{ $teacher->homeroom->name }}
                            @else
                                no homeroom
                            @endif
                        </td> {{-- homeroom プロパティ経由で、homeroom のレコードの内容を扱える --}}
                        <td>
                            <a href="{{ asset("/teacher/{$teacher->id}")}}"><button type="button" class="btn btn-primary">Edit</button></a>
                        </td>
                        <td>
                            <form action="{{ asset("/teacher/{$teacher->id}") }}" method="POST">
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
