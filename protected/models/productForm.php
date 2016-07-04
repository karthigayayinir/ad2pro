<?php

class productForm extends CFormModel {

    public $productName, $productDescription, $locationID, $vendorid, $quantity, $stock, $startDate, $endDate;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            array('productName, productDescription, locationID, vendorid, quantity, stock, startDate, endDate', 'required',  'message' => 'Please enter your {attribute}.'),
            array('startDate', 'date', 'format' => 'd MMM yyyy'),
            array('startDate', 'verifyDates'),
            array('endDate', 'date', 'format' => 'd MMM yyyy'),
        );
    }

    /**
     * Method to validate the dates
     * @param type $attribute
     * @param type $params
     */
    public function verifyDates($attribute, $params) {
        if (!$this->hasErrors()) {
            if (!strtotime($this->{$attribute})) {
                $this->addError($attribute, 'The date is incorrect.');
            }
            if (($this->endDate !== '') && (strtotime($this->startDate) > strtotime($this->endDate))) {
                $this->addError($attribute, 'Start Date must be less than End Date.');
            }
        }
    }

}
