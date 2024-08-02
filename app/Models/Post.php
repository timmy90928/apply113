<?php

namespace App\Models;

use CodeIgniter\Model;

class Post extends Model
{
    protected $table            = 'apply113';
    protected $primaryKey       = 'ID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'username', 'password', 'Permissions','ID_number','gender','name', 'origin_school', 'subject', 'phone_number', 'email', 'address', 'status'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function checkIfExists($fieldName, $value)
    {
        $query = $this->where($fieldName, $value)->get();
        return ($query->getRow()) ? true : false;
    }
    
    public function checkTWIDFormat($idNumber)      // Check Taiwan ID card number format.
    {
        $pattern = '/^[A-Z]{1}[1-2]{1}[0-9]{8}$/';  // Taiwan ID card number regular expression

        if (preg_match($pattern, $idNumber)) {
            return true;
        } else {
            return false;
        }
    }

    public function isValidTWMobileNumber($phoneNumber) {
        $pattern = '/^09\d{8}$/';
    
        if (preg_match($pattern, $phoneNumber)) {
            return true;
        } else {
            return false;
        }
    }

    public function isValidURL($url) {
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return true;
        } else {
            return false;
        }
    }
}
