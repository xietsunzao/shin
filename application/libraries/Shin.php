<?php

/**
 * Shin Library
 * author: Jeff Maruli
 */
class Shin
{
    protected $table;
    protected $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function findColumnAndTable($table)
    {
        $getColumn =  $this->ci->db->field_data($table);
        foreach ($getColumn as $r) {
            $id = "id";
            $foreign = stripos($r->name, $id);
            if ($r->primary_key === 0 && $foreign === 0) {
                $table = explode('_', $r->name);
                $main[] =
                    [
                        'table' => $table[1],
                        'column' => $r->name,
                    ];
            }
        }
        return $main ?? NULL;
    }

    public function findColumn($table)
    {
        $getColumn =  $this->ci->db->field_data($table);
        foreach ($getColumn as $r) {
            if ($r->primary_key === 0) {
                $col[] =
                    [
                        'column' => $r->name,
                    ];
            }
        }
        return $col;
    }


    public function findPrimaryKey($table)
    {
        $getColumn =  $this->ci->db->field_data($table);
        foreach ($getColumn as $r) {
            if ($r->primary_key === 1) {
                $col[] =
                    [
                        'column' => $r->name,
                    ];
            }
        }
        return $col;
    }
}
