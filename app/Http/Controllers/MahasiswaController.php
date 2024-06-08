<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Http\Requests\MahasiswaRequest;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::get();
        
        return view('mahasiswa.index',compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit',compact('mahasiswa'));
    }

    public function store(MahasiswaRequest $request)
    {
        $data = $request->all();
        if($request->foto)
        {
            $nama_file = $request->foto->getClientoriginalName();
            $data['foto'] = $nama_file;
            $request->file('foto')->move('storage/foto/',$nama_file);
        }
        mahasiswa::create($data);
        return redirect()->route('mahasiswa.index');
        // dd($request->all());
    }

    public function destroy($id)
    {
        $data = mahasiswa::findOrFail($id);
        $data->delete();

        return redirect()->route('mahasiswa.index');
    }

    public function update(MahasiswaRequest $request,$id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);
        $data = $request->all();
        if($request->foto)
        {
            $nama_file = $request->foto->getClientoriginalName();
            $data['foto'] = $nama_file;
            $request->file('foto')->move('storage/foto/',$nama_file);
        }
        $mahasiswa->update($data);
        return redirect()->route('mahasiswa.index');
        // dd($request->all());
    }

    public function print()
    {
        $mahasiswa = Mahasiswa::get();
        
        return view('mahasiswa.print',compact('mahasiswa'));
    }

    public function search(Request $request)
        {
            $request->flash();
            if(isset($request->keyword))
            {
                $mahasiswa = Mahasiswa::where('nama','LIKE','%'.$request->keyword.'%')
                ->orWhere('npm','LIKE','%'.$request->keyword.'%')
                ->get();

                return view('mahasiswa.index',compact('mahasiswa'));
            }else{
                return redirect()->route('mahasiswa.index'); 
            }
        }
}
