<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\modeldaerah;

class Riwayat extends BaseController
{
    protected $modeldaerah;
    public function __construct()
    {
        $this->modeldaerah = new modeldaerah();
    }
    public function index()
    {
        $komik = $this->modeldaerah->getdaerah();
        // dd($komik);
        // $komik =$this->komikmodel->findAll();
        $data = [
            'title' => 'riwayat gubernur',
            'daerah' => $this->modeldaerah->getdaerah()
        ];

        return view('gubernur/index', $data);
    }
    public function detail($slug)
    {
        // $komik = $this->komikmodel->getkomik($slug);
        // dd($komik);
        $data = [
            'title' => 'detail riwayat gubernur',
            'daerah' => $this->modeldaerah->getdaerah($slug)
        ];

        return view('gubernur/detail', $data);
    }
    public function create()
    {
        session();
        $data = [
            'title' => 'form tambah riwayat gubernur',
            'validation' => \Config\Services::validation()
            // 'validation' =>  \config\Services::validation()
        ];

        return view('gubernur/create', $data);

    }

    public function save()
    {

        //validaton 
        if (
            !$this->validate([
                'nama_gubernur' => 'required|is_unique[daerah.nama_gubernur]']
            )
        ) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('/riwayat/create');
        }
        $filegambar = $this->request->getFile('foto');

        if ($filegambar->getError() == 4) {
            $namagambar = 'default.jpeg';
        } else {

            // ambil nama filegambar
            $namagambar = $filegambar->getRandomName();
            //   pindahkan ke folder "img"  
            $filegambar->move('img', $namagambar);
        }

        $slug = url_title($this->request->getVar('nama_gubernur'), '-', true);
        $this->modeldaerah->save([
            'nama_gubernur' => $this->request->getVar('nama_gubernur'),
            'slug' => $slug,
            'tahun_menjabat' => $this->request->getVar('tahun_menjabat'),
            'periode' => $this->request->getVar('periode'),
            'wakil_gubernur' => $this->request->getVar('wakil_gubernur'),
            'asal_partai' => $this->request->getVar('asal_partai'),
            'foto' => $namagambar
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
        return redirect()->to('/riwayat');
        //  dd($this->request->getVar());
    }
    public function edit($slug)
    {
        $data = [
            'title' => 'edit  riwayat gubernur',
            'validation' => \Config\Services::validation(),
            'daerah' => $this->modeldaerah->getdaerah($slug),
        ];

        return view('gubernur/edit', $data);
    }

    public function update($id)
    {



        $filegambar = $this->request->getFile('foto');

        if ($filegambar->getError() == 4) {
            $namagambar = $this->request->getvar('gambarlama');
        } else {
            $namagambar = $filegambar->getRandomName();
            $filegambar->move('img', $namagambar);
            unlink('img/' . $this->request->getVar('gambarlama'));
        }

        $slug = url_title($this->request->getVar('nama_gubernur'), '_', true);
        $this->modeldaerah->save([
            'id' => $id,
            'nama_gubernur' => $this->request->getVar('nama_gubernur'),
            'slug' => $slug,
            'tahun_menjabat' => $this->request->getVar('tahun_menjabat'),
            'periode' => $this->request->getVar('periode'),
            'wakil_gubernur' => $this->request->getVar('wakil_gubernur'),
            'asal_partai' => $this->request->getVar('asal_partai'),
            'foto' => $namagambar

        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/riwayat');
    }
    public function delete($id)
    {
        // cari gambar berdasarkan id
        $daerah = $this->modeldaerah->find($id);

        // cek jika file gambarnya default.jpeg
        if ($daerah['foto'] != 'default.jpeg') {

            // hapus gambar
            unlink('img/' . $daerah['foto']);
        }

        $this->modeldaerah->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus.');
        return redirect()->to('/riwayat');

    }

    public function landing_page()
    {
        return view('tampilan/landing-page');
    }
    public function home()
    {
        return view('tampilan/home');
    }
    public function about()
    {
        return view('tampilan/about');
    }
    // public function coba()
    // {
    //     return view('gubernur/coba');
    // }
}
