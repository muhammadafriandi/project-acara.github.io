<?php

namespace App\Controllers;

use App\Models\M_group;
use CodeIgniter\RESTful\ResourcePresenter;

class Groups extends ResourcePresenter
{
    //untuk load bnyak model
    function __construct()
    {
        $this->grup = new M_group();
    }

    //untuk load 1 model
    // protected $modelName = 'App\Models\M_group';
    protected $helpers = ['custom'];

    public function index()
    {
        $data['groups'] = $this->grup->findAll();
        return view('group/index', $data);
    }

    public function show($id = null)
    {
        //
    }

    public function new()
    {
        return view('group/tambah');
    }

    public function create()
    {
        $validate = $this->validate([
            'name_group' => [
                'rules'  => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Nama Group Tidak Boleh Kosong',
                    'min_length' => 'Minimal 5 Karakter',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
        $this->model->insert($data);
        return redirect()->to(site_url('groups'))->with('success', 'Data Berhasil di Tambahkan');
    }


    public function edit($id = null)
    {
        $group = $this->model->where('id_group', $id)->first();
        if (is_object($group)) {
            $data['group'] = $group;
            return view('group/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id = null)
    {
        $validate = $this->validate([
            'name_group' => [
                'rules'  => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Nama Group Tidak Boleh Kosong',
                    'min_length' => 'Minimal 5 Karakter',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
        $this->model->update($id, $data);
        return redirect()->to(site_url('groups'))->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id = null)
    {
        // cara1
        // $this->model->where('id_group', $id)->delete();

        // cara2
        $this->model->delete($id);
        return redirect()->to(site_url('groups'))->with('success', 'Data Berhasil Di Hapus');
    }

    //     public function trash()
    //     {
    //         $data['groups'] = $this->model->onlyDeleted()->find();
    //         return view('group/trash', $data);
    //     }

    //     public function restore($id = null)
    //     {
    //         $this->db = \Config\Database::connect();
    //         if ($id != null) {
    //             $this->db->table('groups')->set('deleted_at', null, true)->where(['id_group' => $id])->update();
    //             if ($this->db->affectedRows() > 0) {
    //                 return redirect()->to(site_url('groups'))->with('success', 'Data Berhasil Di kembalikan');
    //             } else {
    //                 $this->db = \Config\Database::connect();
    //                 $this->db->table('groups')->set('deleted_at', null, true)->where('deleted_at is NOT NULL', NULL, FALSE)->update();
    //                 if ($this->db->affectedRows() > 0) {
    //                     return redirect()->to(site_url('groups'))->with('success', 'Data Berhasil Di kembalikan');
    //                 }
    //             }
    //         }
    //     }

    //     public function delete2($id = null)
    //     {
    //         if ($id != null) {
    //             $this->model->delete($id, true);
    //             return redirect()->to(site_url('groups'))->with('success', 'Data Di Hapus Permanent');
    //         } else {
    //             $this->model->purgeDeleted();
    //             return redirect()->to(site_url('groups'))->with('success', 'Data Trash Di Hapus Permanent');
    //         }
    //     }
}
