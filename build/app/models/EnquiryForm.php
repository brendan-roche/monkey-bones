<?php

class EnquiryForm extends BaseForm
{
    protected $fields = array(
        'firstName' => array(
            'label' => 'First Name',
            'type' => 'text',
            'rules' => array('required'),
        ),
        'surname' => array(
            'label' => 'Surname',
            'type' => 'text',
            'rules' => array('required'),
        ),
        'email' => array(
            'label' => 'Email',
            'type' => 'text',
            'rules' => array('required', 'email'),
        ),
        'daytimeContactNumber' => array(
            'label' => 'Daytime contact number',
            'type' => 'text',
            'rules' => array('required'),
        ),
        'address' => array(
            'label' => 'Address',
            'type' => 'text',
            'rules' => array('required'),
        ),
        'suburb' => array(
            'label' => 'Suburb',
            'type' => 'text',
            'rules' => array('required'),
        ),
        'state' => array(
            'label' => 'Address',
            'type' => 'select',
            'options' => array(
                "ACT" => "ACT",
                "NSW" => "NSW",
                "NT" => "NT",
                "QLD" => "QLD",
                "SA" => "SA",
                "TAS" => "TAS",
                "VIC" => "VIC",
                "WA" => "WA",
            ),
            'rules' => array('required'),
        ),
        'postcode' => array(
            'label' => 'Postcode',
            'type' => 'text',
            'rules' => array('required'),
        ),
        'enquiryType' => array(
            'label' => 'Enquiry type',
            'type' => 'select',
            'options' => array(
                "General enquiry" => "General enquiry",
                "Product feedback or enquiry" => "Product feedback or enquiry",
                "Product complaint" => "Product complaint",
            ),
            'rules' => array('required'),
        ),
        'productName' => array(
            'label' => 'Product name',
            'type' => 'text',
            'rules' => array(),
        ),
        'productSize' => array(
            'label' => 'Product size',
            'type' => 'text',
            'rules' => array(),
        ),
        'useByDate' => array(
            'label' => 'Use-by date',
            'type' => 'text',
            'rules' => array(),
        ),
        'batchCode' => array(
            'label' => 'Batch code',
            'type' => 'text',
            'rules' => array(),
        ),
        'enquiry' => array(
            'label' => 'Enquiry',
            'type' => 'textarea',
            'rules' => array(),
        ),
    );

    protected $additionalReqs = array('productName', 'productSize', 'useByDate', 'batchCode');

    /**
     * if a user has selected Product complaint for enquiry type
     * add additional rules to ensure
     * 'productName', 'productSize', 'useByDate', 'batchCode' are not empty
     *
     * @return array
     */
    protected function getRules()
    {
        $rules = parent::getRules();
        if($this->data['enquiryType'] == 'Product complaint') {

            foreach($this->additionalReqs as $name) {
                $rules[$name] = array('required');
            }
        }

        return $rules;
    }
}