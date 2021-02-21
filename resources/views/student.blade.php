@extends('template.base')
@section('content')
<div class="row">
    <div class="col-lg-12">
        @if(session()->has('pesan'))
        <div class="alert alert-success">
            {{session()->get('pesan')}}
        </div>
        @endif

        <a href="{{ route('student.create') }}" class="btn btn-primary mb-2">Tambah</a>
        <div class="table-responsive">
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>NIM</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Jurusan</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
                @forelse($student as $mahasiswa)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$mahasiswa->nim}}</td>
                    <td>{{$mahasiswa->name}}</td>
                    <td>{{$mahasiswa->gender}}</td>
                    <td>{{$mahasiswa->departement}}</td>
                    <td>{{$mahasiswa->address}}</td>
                    <td>
                        <form action="{{route('student.destroy', ['id' => $mahasiswa->id])}}" method="post">
                            @method('DELETE')
                            @csrf
                            <a href="{{route('student.edit', ['id' => $mahasiswa->id])}}" class="btn btn-info btn-sm">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>

                @empty
                <tr>
                    <td class="text-center" colspan="7">Data tidak ada!</td>
                </tr>
                @endforelse

            </table>
        </div>
    </div>
</div>
</div>
@endsection