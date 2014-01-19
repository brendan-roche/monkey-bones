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
            'rules' => array('required'),
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
                "ACT","NSW","NT","QLD","SA","TAS","VIC","WA",
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
                "General enquiry","Product feedback or enquiry","Product complaint",
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
} 