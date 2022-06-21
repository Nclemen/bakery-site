<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CantBeGreater implements Rule
{
    private $firstField;
    private $secondField;
    private $request;


    /**
     * @param $firstField string the field that cant be bigger than the second field
     * @param $secondField string the field that cant be smaller than the first field
     * @param $request the full request containing the field datas
     */
    public function __construct($firstField, $secondField, $request)
    {
        $this->firstField = $firstField;
        $this->secondField = $secondField;
        $this->request = $request;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->request[$this->firstField] > $this->request[$this->secondField]) {
            return true;
        } else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->firstField . ' cannot be bigger than' . $this->secondField;
    }
}
