<?php

class EnquiryController extends BaseController
{

    /** @var EnquiryForm  */
    private $form;

    /** @var array */
    private $errors = array();

    /**
     * Allow us to inject the form for this controller for testing
     *
     * @param EnquiryForm $form
     */
    public function __construct(EnquiryForm $form)
    {
        if (empty($form)) {
            $this->form = new EnquiryForm();
        } else {
            $this->form = $form;
        }
    }

    /**
     * Our Enquiry form has been submitted,
     * Run it through validation
     * If invalid, output form with errors
     * Otherwise output successful message
     *
     * @return mixed
     */
    public function submit()
    {
        Input::flash();
        if (!$this->form->isValid()) {
            $this->errors = $this->form->getErrors();
            return $this->form();
        } else {
            return "Submitted successfully";
        }

    }

    /**
     * @return mixed
     */
    public function form()
    {
        return View::make('form', array(
            'fields' => $this->form->getFieldsForTemplate(),
            'errors' => $this->errors,
        ));
    }
}