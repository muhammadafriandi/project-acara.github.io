<?php

namespace App\Models;

use CodeIgniter\Model;

class M_contact extends Model
{
    protected $table            = 'contacts';
    protected $primaryKey       = 'id_contact';
    protected $returnType       = 'object';
    protected $allowedFields    = ['name_contact', 'name_alias', 'phone', 'email', 'address', 'info_contact', 'id_group'];
    protected $useTimestamps = true;
    protected $useSoftDeletes   = false;

    protected $validationRules = [
        'name_contact'     => 'required|min_length[5]',
        'id_group'        => 'required',
        'phone'        => 'required',
        'email'        => 'required',
    ];
    protected $validationMessages = [
        'id_group' => [
            'required' => 'Nama Group Belum Di Pilih',
        ],
        'name_contact' => [
            'required' => 'Nama Contact Harus Di Isi',
            'min_length' => 'Minimal 5 Karakter',
        ],
        'phone' => [
            'required' => 'Nomor Kontak Harus di Isi',
        ],
        'email' => [
            'required' => 'Email Harus Di Isi',
        ],
    ];

    function getAll()
    {
        $builder = $this->db->table('contacts');
        // $builder->join('groups', 'groups.id_group = contacts.id_contact'); //meangurutkan berdasarkan dari id_contact
        $builder->join('groups', 'groups.id_group = contacts.id_group'); //meangurutkan berdasarkan dari id_group
        $query = $builder->get();
        return $query->getResult();
    }
}
