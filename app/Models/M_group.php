<?php

namespace App\Models;

use CodeIgniter\Model;

class M_group extends Model
{
    protected $table            = 'groups';
    protected $primaryKey       = 'id_group';
    protected $returnType       = 'object';
    protected $allowedFields    = ['name_group', 'info_group'];
    protected $useTimestamps    = true;
    // protected $useSoftDeletes   = true;
}


// join table
// function getAll(){
//     $builder = $this->db->table('groups');
//     $builder->join('contacts', 'contacts.id_contact = groups.id_contact');
//     $query = $builder->get();
//     return $query->getresult();
// }

// function getPaginated($num, $keyword = null){
// $builder = $this->builder();
//     $builder->join('contacts', 'contacts.id_contact = groups.id_contact');
//     return [
//         'groups' => $this->pagination($num);
//         'pager' => $this->pager,
//     ];
