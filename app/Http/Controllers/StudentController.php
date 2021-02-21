<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function index()
    {
        $data['student'] = Student::all();
        return view('student', $data);
    }

    public function create()
    {
        $data['gender'] = ['L', 'P'];
        $data['departement'] = ['S1 RPL', 'S1 Informatika', 'S1 Sistem Informasi'];

        return view('student_create', $data);
    }

    // request menangkap value dari form
    public function store(Request $request)
    {
        // untuk validasi inputan pada form
        $request->validate([
            'nim' => 'required|size:8, unique:students',
            'name' => 'required|min:3|max:50',
            'gender' => 'required|in:P,L',
            'departement' => 'required',
            'address' => '',
        ]);

        // create data menggunakan metode eloquent
        $student = new Student();
        $student->nim = $request->nim;
        $student->name = $request->name;
        $student->gender = $request->gender;
        $student->departement = $request->departement;
        $student->address = $request->address;
        $student->save();

        return redirect(route('student.index'))->with('pesan', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['gender'] = ['L', 'P'];
        $data['departement'] = ['S1 RPL', 'S1 Informatika', 'S1 Sistem Informasi'];
        $data['student'] = Student::find($id);

        return view('student_edit', $data);
    }


    // fungsi untuk mengupdate data
    // menerima id sebagai acuan data yang akan diupdate
    public function update(Request $request, $id)
    {
        // untuk validasi inputan pada form
        $request->validate([
            'nim' => 'required|size:8, unique:students',
            'name' => 'required|min:3|max:50',
            'gender' => 'required|in:P,L',
            'departement' => 'required',
            'address' => '',
        ]);

        // mencari data mahasiswa dengan id tertentu
        $student = Student::find($id);

        $student->nim = $request->nim;
        $student->name = $request->name;
        $student->gender = $request->gender;
        $student->departement = $request->departement;
        $student->address = $request->address;
        $student->save();

        // berpindah halaman beserta mengirimkan feedback kepada user
        return redirect(route('student.index'))->with('pesan', 'Data berhasil diupdate');
    }

    // fungsi untuk menghapus data
    // menerima id sebagai acuan data yang akan dihapus
    public function destroy($id)
    {
        // mencari data mahasiswa dengan id tertentu
        $student = Student::find($id);

        // untuk menghapus data yang diinginkan
        $student->delete();

        // berpindah halaman beserta mengirimkan feedback kepada user
        return redirect(route('student.index'))->with('pesan', 'Data berhasil dihapus!');
    }
}
