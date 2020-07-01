<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Global_model extends CI_Model
{

    public function getData($table)
    {
        return $this->db->get($table);
    }

    public function getId($id, $val, $table)
    {
        return $this->db->where($id, $val)->get($table);
    }

    public function insertData($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function updateData($id, $val, $table, $data)
    {
        return $this->db->where($id, $val)->update($table, $data);
    }

    public function deleteData($id, $val, $table)
    {
        return $this->db->where($id, $val)->delete($table);
    }

    public function countData($table)
    {
        return $this->db->get($table)->num_rows();
    }

    public function leftJoinTable($table, $join = [], $attr = 'left')
    {
        foreach ($join as $r) {
            $cekTable = $this->shin->findColumnAndTable($r['table']);
            if ($cekTable != NULL) {
                $this->db->join($r['table'], "{$r['table']}.{$r['column']} = {$table}.{$r['column']}", $attr);
                foreach ($cekTable as $t) {
                    $this->db->join($t['table'], "{$t['table']}.{$t['column']} = {$r['table']}.{$t['column']}", $attr);
                }
            } else {
                $this->db->join($r['table'], "{$r['table']}.{$r['column']} = {$table}.{$r['column']}", $attr);
            }
        }
        return $this->db->get($table);
    }

    public function rightJoinTable($table, $join = [], $attr = 'right')
    {
        foreach ($join as $r) {
            $cekTable = $this->shin->findColumnAndTable($r['table']);
            if ($cekTable != NULL) {
                foreach ($cekTable as $t) {
                    $this->db->join($t['table'], "{$t['table']}.{$t['column']} = {$t['table']}.{$t['column']}", $attr);
                }
                $this->db->join($r['table'], "{$r['table']}.{$r['column']} = {$table}.{$r['column']}", $attr);
            } else {
                $this->db->join($r['table'], "{$r['table']}.{$r['column']} = {$table}.{$r['column']}", $attr);
            }
        }
        return $this->db->get($table);
    }
}

/* End of file Global_model.php */
