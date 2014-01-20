registerTest ('Submit Enquiry form test', {
    setup: function() {
        this.reqFields = ['firstName', 'surname', 'email', 'daytimeContactNumber', 'address', 'suburb', 'postcode'];
        this.complaintReqFields = ['productName', 'productSize', 'useByDate', 'batchCode'];
        this.doc = this.workspace.document;
        this.form = this.workspace.document.getElementById("enquiryForm");
    },
    load: function() {
        var self = this;

        self
        .test ("Do we have an element with the id 'enquiryForm'?",function() {
            ok(this.form,'An element with the id "enquiryForm" exists.');
        })

        .test ("Can form be submitted if any of the required fields are empty?",function() {
            var field;
            // clear any fields loaded by session data
            for(var i = 0; i < this.reqFields.length; i++) {
                field = this.reqFields[i];
                this.doc.getElementById(field).value = '';
            }

            for(i = 0; i < this.reqFields.length; i++) {
                field = this.reqFields[i];
                equal(this.form.checkValidity(), false, 'Form should not be allowed to submit if any required fields are empty');
                this.doc.getElementById(field).value = 'not empty';
            }

            equal(this.form.checkValidity(), true, 'Form should be allowed to submit if all required fields are not empty');
        })

        .test ("Can form be submitted if any of the product required fields are empty and enquiry type is a 'Product complaint'?",function($) {
            var field;

            $('#enquiryType', this.doc).val('Product complaint').change();

            // clear any fields loaded by session data
            for(var i = 0; i < this.complaintReqFields.length; i++) {
                field = this.complaintReqFields[i];
                this.doc.getElementById(field).value = '';
            }

            for(i = 0; i < this.reqFields.length; i++) {
                field = this.reqFields[i];
                this.doc.getElementById(field).value = 'not empty';
            }

            for(i = 0; i < this.complaintReqFields.length; i++) {
                equal(this.form.checkValidity(), false, 'Form should not be allowed to submit if any product required fields are empty are enquiry type is a complaint');
                field = this.complaintReqFields[i];
                this.doc.getElementById(field).value = 'not empty';
            }

            equal(this.form.checkValidity(), true, 'Form should be allowed to submit if all product required fields are not empty and enquiry type is a complaint');
        });

    }
});
