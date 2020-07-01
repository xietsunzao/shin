<?php

/**
 * Shin Library
 * author: Jeff Maruli
 */
class Shin
{
    public $message;
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
                $check[] =
                    [
                        'table' => $table[1],
                        'column' => $r->name,
                    ];
            }
        }
        return $check ?? NULL; 
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

    public function findColumnWithoutUpload($table)
    {
        $getColumn =  $this->ci->db->field_data($table);
        foreach ($getColumn as $r) {
            if ($r->primary_key === 0 && $r->max_length < 100) {
                $col[] =
                    [
                        'column' => $r->name,
                    ];
            }
        }
        return $col;
    }
}
