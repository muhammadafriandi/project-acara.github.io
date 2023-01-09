<?php

namespace App\Controllers;

class Gawe extends BaseController
{
    protected $helpers = ['custom'];

    public function index()
    {
        $builder = $this->db->table('gawe');
        $query = $builder->get()->getResult();
        $data['gawe'] = $query;

        return view('gawe/get', $data);
    }

    public function create()
    {

        return view('gawe/tambah');
    }

    public function store()
    {
        $validate = $this->validate([
            'name_gawe' => [
                'rules'  => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Nama Acara Tidak Boleh Kosong',
                    'min_length' => 'Minimal 5 Karakter',
                ],
            ],
            'date_gawe' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Tanggal Acara Tidak Boleh Kosong',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }

        //cara 1 kalo name di view sama dengan yang ada table data base untuk config conection database ada di base controller
        $data = $this->request->getPost();

        //cara kedua jika nama di view beda
        // $data = [
        //     'name_gawe' => $this->request->getPost('name_gawe'), //('name_gawe')->inputan di view
        //     'date_gawe' => $this->request->getPost('date_gawe'),
        //     'info_gawe' => $this->request->getPost('info_gawe'),
        // ];
        $this->db->table('gawe')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('gawe'))->with('success', 'Data Berhasil Di Simpan');
        }
    }

    public function edit($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('gawe')->getwhere(['id_gawe' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['gawe'] = $query->getRow();
                return view('gawe/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id)
    {
        $validate = $this->validate([
            'name_gawe' => [
                'rules'  => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Nama Acara Tidak Boleh Kosong',
                    'min_length' => 'Minimal 5 Karakter',
                ],
            ],
            'date_gawe' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Acara Tidak Boleh Kosong',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
        unset($data['_method']);

        //cara kedua manual 
        // $data = [
        //     'name_gawe' => $this->request->getPost('name_gawe'), //('name_gawe')->inputan di view
        //     'date_gawe' => $this->request->getPost('date_gawe'),
        //     'info_gawe' => $this->request->getPost('info_gawe'),
        // ];

        $this->db->table('gawe')->where(['id_gawe' => $id])->update($data);
        return redirect()->to(site_url('gawe'))->with('success', 'Data Berhasil Di Update');
    }

    public function destroy($id)
    {
        $this->db->table('gawe')->where(['id_gawe' => $id])->delete();
        return redirect()->to(site_url('gawe'))->with('success', 'Data Berhasil Di Hapus');
    }
}
