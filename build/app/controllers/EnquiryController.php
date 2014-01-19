<?php

class EnquiryController extends BaseController
{

    /** @var EnquiryForm  */
    private $form;

    private $errors = array();

    /**
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
            'fields' => $this->form->getFields(),
            'errors' => $this->errors,
        ));
    }
}