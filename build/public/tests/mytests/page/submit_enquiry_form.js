registerTest ('Submit Enquiry form test', {
    setup: function() {
        this.reqFields = ['firstName', 'surname', 'email', 'daytimeContactNumber', 'address', 'suburb', 'state', 'postcode', 'enquiryType'];
        this.complaintReqFields = ['productName', 'productSize', 'useByDate', 'batchCode'];
        this.doc = this.workspace.document;
        this.form = this.workspace.document.getElementById("enquiryForm");
        this.successContainer = this.workspace.document.getElementById("success");
    },
    load: function() {
        var self = this;

        self
        .test ("Do we have an element with the id 'enquiryForm'?",function() {
            ok(this.form,'An element with the id "enquiryForm" exists.');
        })

        .test ("Can form be submitted if any of the required fields are empty?",function($) {
            for(var i = 0; i < this.reqFields.length; i++) {
                //$('#enquiryForm', this.doc).submit();
                equal(this.form.submit(), false, 'Form should not be allowed to submit if any required fields are empty');
                var field = this.reqFields[i];
                this.doc.getElementById(field).value = 'not empty';
            }

            equal(this.form.submit(), true, 'Form should be allowed to submit if all required fields are not empty');
        })

        .test ("Can form be submitted if any of the product required fields are empty and enquiry type is a 'Product complaint'?",function($) {
            for(var i = 0; i < this.reqFields.length; i++) {
                var field = this.reqFields[i];
                this.doc.getElementById(field).value = 'not empty';
            }
            this.doc.getElementById('enquiryType').value = 'Product complaint';
            for(var i = 0; i < this.complaintReqFields.length; i++) {
                equal(this.form.submit(), false, 'Form should not be allowed to submit if any product required fields are empty are enquiry type is a complaint');
                var field = this.complaintReqFields[i];
                this.doc.getElementById(field).value = 'not empty';
            }

            equal(this.form.submit(), true, 'Form should be allowed to submit if all product required fields are not empty and enquiry type is a complaint');
        });

    }
});
