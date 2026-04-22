<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table            = 'tbl_settings';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['key_name', 'key_value'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    
    public function getSetting($key)
    {
        return $this->where('key_name', $key)->first();
    }

    public function setSetting($key, $value)
    {
        $exists = $this->getSetting($key);
        if ($exists) {
            return $this->where('key_name', $key)->set(['key_value' => $value])->update();
        } else {
            return $this->insert([
                'key_name'  => $key,
                'key_value' => $value
            ]);
        }
    }

    public function updateSetting($key, $value)
    {
        return $this->where('key_name', $key)->set(['key_value' => $value])->update();
    }
}
