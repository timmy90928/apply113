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

    /** Check if the field exists. */
    protected function isFieldAllowed(array $datas)
    {
        foreach ($datas as $field => $value) {
            if (!in_array($field, $this->allowedFields)) {
                throw new \InvalidArgumentException("Invalid field name: $field");
            }
        }
    }

    /** Update multiple fields by ID number. */
    public function updateFieldsByIdNumber(string $idNumber, array $data)
    {
        $this->isFieldAllowed($data); // Validate the data array.

        if ($this->checkIfExists('ID_number', $idNumber)) {
            // Update the fields.
            return $this->update(                               
                $this->where('ID_number', $idNumber)->get()->getRow()->ID,
                $data
            ); 
        } else {
            return false; // Return false if no record was found with the given ID number.
        }
    }

    /** Check if the record with the given ID number exists. */
    public function checkIfExists(string $fieldName, string $value)
    {
        $query = $this->where($fieldName, $value)->get();
        return ($query->getRow()) ? true : false;
    }

    /** Check Taiwan ID card number format. */
    public function checkTWIDFormat(string $idNumber)
    {
        $pattern = '/^[A-Z]{1}[1-2]{1}[0-9]{8}$/';  // Taiwan ID card number regular expression.

        if (preg_match($pattern, $idNumber)) {
            return true;
        } else {
            return false;
        }
    }

    /** Validate if a given phone number is a valid Taiwanese mobile number. */
    public function isValidTWMobileNumber($phoneNumber) 
    {
        $pattern = '/^09\d{8}$/';
    
        if (preg_match($pattern, $phoneNumber)) {
            return true;
        } else {
            return false;
        }
    }

    public function isValidURL($url) 
    {
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return true;
        } else {
            return false;
        }
    }

    /** Check if the `name` field is empty for a given ID number. */
    public function isNameEmptyForIdNumber($idNumber)
    {
        $query = $this->where('ID_number', $idNumber)->first(); // Assuming there is only one record for this ID_number

        if (!$query) {
            return true; // Record not found
        }

        $name = $query['name'];

        return empty($name);
    }
}
