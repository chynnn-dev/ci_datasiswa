<?php

namespace App\Controllers;

use App\Models\SekolahModel;

class Sekolah extends BaseController
{
    protected $SekolahModel;

    public function __construct()
    {
        $this->SekolahModel = new SekolahModel();
    }

    public function index()
    {
        $current = $this->request->getVar('page_sekolah')? $this->request->getVar('page_sekolah'):1;
        $cari= $this->request->getVar('cari');
        if($cari){
            $sekolah= $this->SekolahModel->findSekolah($cari);
        }else{
            $sekolah = $this->SekolahModel;
        }
        $data = [
            'title' => 'Laporan Data Siswa',
            'sekolah' => $this->SekolahModel->paginate(2, 'sekolah'),
            'pager' => $this->SekolahModel->pager,
            'current' => $current
        ];

        return view('sekolah/index', $data);
    }

    public function detail($idsekolah)
    {

        $data = [
            'title' => 'Detail Data',
            'sekolah' => $this->SekolahModel->getSekolah($idsekolah)
        ];

        return view('sekolah/detail', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Form Tambah Data Siswa',
            'validation' => \Config\Services::validation()
        ];

        return view('sekolah/tambah', $data);
    }

    public function simpan()
    {
        //validasi
        if (!$this->validate(
            [
                'nama' => [
                    'rules' => 'required',
                    'errors' => ['required' => '{field} harus diisi']
                ],

                'jurusan' => [
                    'rules' => 'required',
                    'errors' => ['required' => '{field} harus diisi']
                ],

                'alamat' => [
                    'rules' => 'required',
                    'errors' => ['required' => '{field} harus diisi']
                ],

                'tahun_masuk' => [
                    'rules' => 'required',
                    'errors' => ['required' => '{field} harus diisi']
                ],

                'asal_sekolah' => [
                    'rules' => 'required',
                    'errors' => ['required' => '{field} harus diisi']
                ],

                'no_telepon' => [
                    'rules' => 'required',
                    'errors' => ['required' => '{field} harus diisi']
                ],

                'status' => [
                    'rules' => 'required',
                    'errors' => ['required' => '{field} harus diisi']
                ],
                
                'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,10000]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Gambar Wajib Dipilih.',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'File wajib gambar',
                    'mime_in' => 'Tipe File Gambar Tidak Sesuai'
                ]
            ]]
        )) {
           
            // kirim kembali ke form + input lama + pesan error
            return redirect()->to('/sekolah/tambah')->withInput();
        }

        $filefoto = $this->request->getFile('foto');
        $filefoto->move('img');
        $nmfoto = $filefoto->getName();

        // simpan
        $this->SekolahModel->save([
            'nama'        => $this->request->getVar('nama'),
            'jurusan'    => $this->request->getVar('jurusan'),
            'alamat'     => $this->request->getVar('alamat'),
            'tahun_masuk' => $this->request->getVar('tahun_masuk'),
            'asal_sekolah' => $this->request->getVar('asal_sekolah'),
            'no_telepon' => $this->request->getVar('no_telepon'),
            'status' => $this->request->getVar('status'),
            'foto'       => $nmfoto
        ]);


        session()->setFlashdata('pesan','Data Berhasil Ditambahkan');
        return redirect()->to('/sekolah');
    }

    public function hapus($idsekolah)
    {
        $this->SekolahModel->delete($idsekolah);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/sekolah');
    }

    public function ubah($idsekolah)
    {
        $data = [
            'title'      => 'Form Ubah Data Siswa',
            'validation' => \Config\Services::validation(),
            'sekolah'       => $this->SekolahModel->getSekolah($idsekolah)
        ];

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
        return view('sekolah/ubah', $data);
    }


  public function update($idsekolah)
    {
        if (!$this->validate([
            'nama' => [
                'rules'  => 'required',
                'errors' => ['required' => '{field} harus diisi']
            ],

            'jurusan' => [
                'rules'  => 'required',
                'errors' => ['required' => '{field} harus diisi']
            ],

            'alamat' => [
                'rules'  => 'required',
                'errors' => ['required' => '{field} harus diisi']
            ],

            'tahun_masuk' => [
                'rules'  => 'required',
                'errors' => ['required' => '{field} harus diisi']
            ],

            'asal_sekolah' => [
                'rules'  => 'required',
                'errors' => ['required' => '{field} harus diisi']
            ],

            'no_telepon' => [
                'rules'  => 'required',
                'errors' => ['required' => '{field} harus diisi']
            ],

            'status' => [
                'rules'  => 'required',
                'errors' => ['required' => '{field} harus diisi']
            ],

            'foto' => [
                'rules'  => 'max_size[foto,10000]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'File wajib gambar',
                    'mime_in'  => 'Tipe File Gambar Tidak Sesuai'
                ]
            ]
        ])) {
        
        }

        // cek gambar
        $filefoto = $this->request->getFile('foto');

        if ($filefoto->getError() == 4) {
            // tidak upload baru -> pakai foto lama
            $nmfoto = $this->request->getVar('fotoLama');
        } else {
            // upload baru
            $nmfoto = $filefoto->getName();
            $filefoto->move('img', $nmfoto);
        }

        

        // simpan perubahan
        $this->SekolahModel->save([
            'NIS'      => $idsekolah,
            'nama'        => $this->request->getVar('nama'),
            'jurusan'    => $this->request->getVar('jurusan'),
            'alamat'     => $this->request->getVar('alamat'),
            'tahun_masuk' => $this->request->getVar('tahun_masuk'),
            'asal_sekolah' => $this->request->getVar('asal_sekolah'),
            'no_telepon' => $this->request->getVar('no_telepon'),
            'status' => $this->request->getVar('status'),
            'foto'       => $nmfoto
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
        return redirect()->to('/sekolah');
    }
}
?>