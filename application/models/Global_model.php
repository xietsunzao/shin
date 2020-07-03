<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Global_model extends CI_Model
{
    public function leftJoinTable($table, $join = [], $attr = 'left')
    {
        foreach ($join as $r) {
            $cekTable = $this->shin->findColumnAndTable($r['table']);
            if ($cekTable != NULL) {
                $this->db->join($r['table'], "{$r['table']}.{$r['column']} = {$table}.{$r['column']}", $attr);
                foreach ($cekTable as $t) {
                    $this->db->join($t['table'], "{$t['table']}.{$t['column']} = {$r['table']}.{$t['column']}", $attr);
                    $cekSubTable = $this->shin->findColumnAndTable($t['table']);
                    if ($cekSubTable != NULL) {
                        foreach ($cekSubTable as $s) {
                            $this->db->join($s['table'], "{$s['table']}.{$s['column']} = {$t['table']}.{$s['column']}", $attr);
                        }
                    }  
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
                $this->db->join($r['table'], "{$r['table']}.{$r['column']} = {$table}.{$r['column']}", $attr);
                foreach ($cekTable as $t) {
                    $this->db->join($t['table'], "{$t['table']}.{$t['column']} = {$r['table']}.{$t['column']}", $attr);
                    $cekSubTable = $this->shin->findColumnAndTable($t['table']);
                    if ($cekSubTable != NULL) {
                        foreach ($cekSubTable as $s) {
                            $this->db->join($s['table'], "{$s['table']}.{$s['column']} = {$t['table']}.{$s['column']}", $attr);
                        }
                    }  
                }
            } else {
                $this->db->join($r['table'], "{$r['table']}.{$r['column']} = {$table}.{$r['column']}", $attr);
            }
        }
        return $this->db->get($table);
    }
}

/* End of file Global_model.php */
