<?php


class EnquiryForm extends BaseForm
{
    protected $fields = array(
        'firstName' => array(
            'label' => 'First Name',
            'type' => 'text',
            'rules' => 'required',
        ),
        'surname' => array(
            'label' => 'Surname',
            'type' => 'text',
            'rules' => 'required',
        ),
        'email' => array(
            'label' => 'Email',
            'type' => 'text',
            'rules' => 'required',
        ),
        'daytimeContactNumber' => array(
            'label' => 'Daytime contact number',
            'type' => 'text',
            'rules' => 'required',
        ),
        'address' => array(
            'label' => 'Address',
            'type' => 'text',
            'rules' => 'required',
        ),
        'suburb' => array(
            'label' => 'Suburb',
            'type' => 'text',
            'rules' => 'required',
        ),
        'state' => array(
            'label' => 'Address',
            'type' => 'select',
            'options' => array(
                "ACT","NSW","NT","QLD","SA","TAS","VIC","WA",
            ),
            'rules' => 'required',
        ),
        'postcode' => array(
            'label' => 'Postcode',
            'type' => 'text',
            'rules' => 'required',
        ),
        'enquiryType' => array(
            'label' => 'Enquiry type',
            'type' => 'select',
            'options' => array(
                "General enquiry","Product feedback or enquiry","Product complaint",
            ),
            'rules' => 'required',
        ),
        'productName' => array(
            'label' => 'Product name',
            'type' => 'text',
            'rules' => '',
        ),
        'productSize' => array(
            'label' => 'Product size',
            'type' => 'text',
            'rules' => '',
        ),
        'useByDate' => array(
            'label' => 'Use-by date',
            'type' => 'text',
            'rules' => '',
        ),
        'batchCode' => array(
            'label' => 'Batch code',
            'type' => 'text',
            'rules' => '',
        ),
        'enquiry' => array(
            'label' => 'Enquiry',
            'type' => 'textarea',
            'rules' => '',
        ),
    );
} 