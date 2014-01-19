define(['backbone'], function (Backbone) {
    "use strict";

    return Backbone.Model.extend({

        defaults: function () {
            return {
                productName: false,
                productSize: false,
                useByDate: false,
                batchCode: false
            };
        },

        initialize: function () {
        }
    });
});
