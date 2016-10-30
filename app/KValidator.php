<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class KValidator extends Model
{
    public $rules;
    protected $errors;

    public function validate($data, $rules = null)
    {
        if ($rules !=null)
            $this->rules = $rules;

        $v = \Validator::make($data, $this->rules);

        // check for failure
        if ($v->fails())
        {
            // set errors and return false
            $this->errors = $v->errors()->all();
            return false;
        }

        // validation pass
        return true;
    }

    public function errors()
    {
        return \KHelper::json_helper('422', null , $this->errors);
    }
}