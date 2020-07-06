<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Global_model extends CI_Model
{
    protected $pk;
    protected $table;
    protected $left = 'left';
    protected $right = 'right';
    protected $inner = 'inner';
    
    public function leftJoinTable($table, $join = [])
    {
        foreach ($join as $r) {
            $cekTable = $this->shin->findColumnAndTable($r['table']);
            if ($cekTable != NULL) {
                $this->db->join($r['table'], "{$r['table']}.{$r['column']} = {$table}.{$r['column']}", $this->left);
                foreach ($cekTable as $t) {
                    $this->db->join($t['table'], "{$t['table']}.{$t['column']} = {$r['table']}.{$t['column']}", $this->left);
                    $cekSubTable = $this->shin->findColumnAndTable($t['table']);
                    if ($cekSubTable != NULL) {
                        foreach ($cekSubTable as $s) {
                            $this->db->join($s['table'], "{$s['table']}.{$s['column']} = {$t['table']}.{$s['column']}", $this->left);
                        }
                    }
                }
            } else {
                $this->db->join($r['table'], "{$r['table']}.{$r['column']} = {$table}.{$r['column']}", $this->left);
            }
        }
        return $this->db->get($table);
    }

    public function rightJoinTable($table, $join = [])
    {
        foreach ($join as $r) {
            $cekTable = $this->shin->findColumnAndTable($r['table']);
            if ($cekTable != NULL) {
                $this->db->join($r['table'], "{$r['table']}.{$r['column']} = {$table}.{$r['column']}", $this->right);
                foreach ($cekTable as $t) {
                    $this->db->join($t['table'], "{$t['table']}.{$t['column']} = {$r['table']}.{$t['column']}", $this->right);
                    $cekSubTable = $this->shin->findColumnAndTable($t['table']);
                    if ($cekSubTable != NULL) {
                        foreach ($cekSubTable as $s) {
                            $this->db->join($s['table'], "{$s['table']}.{$s['column']} = {$t['table']}.{$s['column']}", $this->right);
                        }
                    }
                }
            } else {
                $this->db->join($r['table'], "{$r['table']}.{$r['column']} = {$table}.{$r['column']}", $this->right);
            }
        }
        return $this->db->get($table);
    }

    public function leftJoinWhere($table, $join = [],$val)
    {
        $pk = $this->getPrimaryKey($table);
        foreach ($join as $r) {
            $cekTable = $this->shin->findColumnAndTable($r['table']);
            if ($cekTable != NULL) {
                $this->db->join($r['table'], "{$r['table']}.{$r['column']} = {$table}.{$r['column']}", $this->left);
                foreach ($cekTable as $t) {
                    $this->db->join($t['table'], "{$t['table']}.{$t['column']} = {$r['table']}.{$t['column']}", $this->left);
                    $cekSubTable = $this->shin->findColumnAndTable($t['table']);
                    if ($cekSubTable != NULL) {
                        foreach ($cekSubTable as $s) {
                            $this->db->join($s['table'], "{$s['table']}.{$s['column']} = {$t['table']}.{$s['column']}", $this->left);
                        }
                    }
                }
            } else {
                $this->db->join($r['table'], "{$r['table']}.{$r['column']} = {$table}.{$r['column']}", $this->left);
            }
        }
        $this->db->where("{$table}.{$pk}", $val);
        return $this->db->get($table);
    }

    public function getPrimaryKey($table)
    {
        $this->pk = $this->shin->findPrimaryKey($table);
        return $this->pk[0]['column'];
    }
}

/* End of file Global_model.php */
