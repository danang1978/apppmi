<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruModel;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->GuruModel = new GuruModel();
        $this->middleware('auth');
    }

    public  function index ()
    {
        $data = [
            'guru'=> $this->GuruModel->allData(),
        ];

        return view('v_guru', $data);
            }

    public function detail($id_guru)
    {
        if (!$this->GuruModel->detailData($id_guru)) {
            abort(404);
        }
        $data = [
            'guru'=> $this->GuruModel->detailData($id_guru),
        ]; 
        return view('v_detailguru', $data);
    }

    public function add()
    {
        return view('v_addguru');
    }

    public function insert()
    {
        Request()->validate([
            'nip' => 'required|unique:tbl_guru,nip|min:4|max:5',
            'nama_guru' => 'required',
            'mapel' => 'required',
            'foto_guru' => 'required|mimes:jpg,jpeg,bmp,png|max:1024',
        ], [
            'nip.required' =>'NIP Wajib Diisi !!',
            'nip.unique' => 'NIP ini Sudah Ada !!',
            'nip.min' => 'NIP Minimal 4 !!',
            'nip.max' => 'NIP Maksimal 5 !!',
            'nama_guru.required' => 'Nama Wajib Diisi !!',
            'mapel.required' => 'Mapel Wajib Diisi !!',
            'foto_guru.required' => 'Foro Wajib Diisi !!',
            'foto_guru.mimes' => 'Format File jpg,jpeg,bmp,png !!',
            'foto_guru.max' => '1000 Mb !!',
        ]);
        $file = Request()->foto_guru;
        $fileName = Request()->nip.'.' . $file->extension();
        $file->move(public_path('foto_guru'), $fileName);
        
        $data = [
            'nip' => Request()->nip,
            'nama_guru' => Request ()->nama_guru,
            'mapel' => Request ()->mapel,
            'foto_guru' => $fileName,
        ];
        
        $this->GuruModel->addData($data);
        return redirect()->route('guru')->with('pesan','Data Berhasil Ditambahkan !!');

    }

    public function edit($id_guru)
    {
        if (!$this->GuruModel->detailData($id_guru)) {
            abort(404);
        }
        $data = [
            'guru'=> $this->GuruModel->detailData($id_guru),
        ]; 
        return view('v_editguru', $data);
    }

    public function update($id_guru)
    {
        Request()->validate([
            'nip' => 'required|min:4|max:5',
            'nama_guru' => 'required',
            'mapel' => 'required',
            'foto_guru' => 'mimes:jpg,jpeg,bmp,png|max:1024',
        ], [
            'nip.required' =>'NIP Wajib Diisi !!',
            'nip.min' => 'NIP Minimal 4 !!',
            'nip.max' => 'NIP Maksimal 5 !!',
            'nama_guru.required' => 'Nama Wajib Diisi !!',
            'mapel.required' => 'Mapel Wajib Diisi !!',
        ]);
        if (Request()->foto_guru <> "")
        {
            $file = Request()->foto_guru;
            $fileName = Request()->nip.'.' . $file->extension();
            $file->move(public_path('foto_guru'), $fileName);
            
            $data = [
                'nip' => Request()->nip,
                'nama_guru' => Request ()->nama_guru,
                'mapel' => Request ()->mapel,
                'foto_guru' => $fileName,
            ];
            $this->GuruModel->editData($id_guru, $data);
        } else {
            $data = [
                'nip' => Request()->nip,
                'nama_guru' => Request ()->nama_guru,
                'mapel' => Request ()->mapel,
            ];
            $this->GuruModel->editData($id_guru, $data);
        }
        return redirect()->route('guru')->with('pesan','Data Berhasil Di Edit !!');

    }

    public function delete($id_guru)
    {
        $guru= $this->GuruModel->detailData($id_guru);
        if ($guru->foto_guru<> ""){
            unlink(public_path('foto_guru').'/'.$guru->foto_guru);
        }
        $this->GuruModel->deleteData($id_guru);
        return redirect()->route('guru')->with('pesan','Data Berhasil Di Hapus !!');
    }
}
