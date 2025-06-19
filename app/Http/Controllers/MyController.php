<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
        private $arr = [
            ['id'=> 1,'nama' =>'fachri','kelas' =>'xi rpl 2'],
            ['id'=> 2,'nama' =>'hafizha','kelas' =>'xi rpl 1'],
            ['id'=> 3,'nama' =>'memen','kelas' =>'xi rpl 3'],        
        ];
         public function index()//memberikan daftar data
         {
            $siswa = session('siswa_data' , $this->arr);

            // dd($siswa);
            return view('siswa.index', ['siswa' => $siswa]);
         }
        public function show($id)
        {
            $data = session('siswa_data', $this->arr);
            $siswa = collect(session('siswa_data', $this->arr))->firstWhere('id', $id);
            return view('siswa.show', ['siswa' => $siswa]);
        }
        public function create()
     {
        return view('siswa.create');
     }
     public function store(Request $request)
     {
        $siswa = session('siswa_data',$this->arr);

        //membuat increment id otomatin
        $newId = collect($siswa)->max('id') + 1;

        //tambah data siswa
        $siswa [] = [
            'id' => $newId,
            'kelas' => $request->kelas,
            'nama' => $request->nama,
        ];

        //simpan ke array siswa
        session(['siswa_data' => $siswa]);

        //kembali kehalaman siswa
        return redirect('/siswa');
         }
         public function edit($id)
         {
            $data = session('siswa_data', $this->arr);
            $siswa = collect($data)->firstWhere('id',$id);
            if (! $siswa) {
                abort(404);
            }
            return view('siswa.edit', compact('siswa'));
         }
         public function update(Request $request, $id)
         {
            //mengambil dari data siswa session data_siswa
          $data = session('siswa_data', $this->arr);
          //mencari data siswa berdasarkan id
          foreach($data as &$item) {
          if ($item['id'] == $id) {
            $item['nama'] = $request->nama;
            $item['kelas'] = $request->kelas;
            break;
          }
        }         

         //
         session(['siswa_data' => $data]);
         return redirect('/siswa');
         }
        public function destroy($id)
        {
            $siswa = session('siswa_data', $this->arr);
            //mencari array yang sama dari colimn id
            $index = array_search($id,array_column($siswa, 'id'));

            //hapus data 
            array_splice($siswa, $index, 1);
            session(['siswa_data' => $siswa]);
            return redirect('siswa');
        }
    }