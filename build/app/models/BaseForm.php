<?php

class BaseForm
{
    /** @var array $data */
    protected $data;

    /** @var array $fields */
    protected $fields = array();

    /** @var array $errors */
    protected $errors = array();

    /**
     * @param null|array $data
     */
    public function __construct($data = null)
    {
        $this->data = $data ?: Input::all();
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        $validator = Validator::make($this->data, $this->getRules());

        if ($validator->passes()) {
            return true;
        }

        $this->errors = $validator->messages()->all();

        return false;
    }

    /**
     * @return array
     */
    protected function getRules()
    {
        $rules = array();

        foreach($this->fields as $name => $field) {
            $rules[$name] = $field['rules'];
        }
        return $rules;
    }

    /**
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Return all fields for this form
     * and add an array of attributes for each form element
     *
     * @return array
     */
    public function getFieldsForTemplate()
    {
        $fields = $this->fields;
        foreach($fields as &$field) {
            $field['attributes'] = in_array('required', $field['rules']) ? array('required') : array();
        }
        return $fields;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}