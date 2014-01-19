/* dummy */
define([
    'backbone',
    'app/model/enquiryForm',
    'app/view/enquiryFormView'
], function (Backbone, enquiryFormModel, enquiryFormView) {
    "use strict";

    return Backbone.Router.extend({

        initialize: function () {
            this.enquiryFormModel = new enquiryFormModel();

            this.mainView = new enquiryFormView({
                model: this.enquiryFormModel
            });

            Backbone.history.start();
        },

        routes: {
            "/*": "home"
        },

        home: function () {
            //console.log("home");
        }

    });

});
