define(['underscore', 'backbone'], function (_, Backbone) {
    "use strict";

    return Backbone.View.extend({

        el: '#enquiryForm',

        template: _.template($('#enquiryForm').html()),

        events: {
            'change #enquiryType': 'enquiryTypeChange'
        },

        initialize: function () {
            this.listenTo(this.model, "change", this.render);
        },

        render: function () {
            var self = this;
            _.forEach(this.model.attributes, function(val, name) {
                self.toggleRequired(name, val);
            });

            return this;
        },

        toggleRequired: function(name, required) {
            this.$('#'+name).attr('required', required);
            if(required) {
                this.$('#'+name).siblings('span').removeClass('hidden');
            } else {
                this.$('#'+name).siblings('span').addClass('hidden');
            }
        },

        enquiryTypeChange: function () {
            if(this.$('#enquiryType').val() == 'Product complaint') {
                this.model.set({
                    productName: true,
                    productSize: true,
                    useByDate: true,
                    batchCode: true
                });
            } else {
                this.model.set({
                    productName: false,
                    productSize: false,
                    useByDate: false,
                    batchCode: false
                });
            }
            return true;
        }
    });
});
