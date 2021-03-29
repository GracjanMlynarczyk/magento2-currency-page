define([
    'uiComponent',
    'jquery',
    'Ghratzoo_EuroCurrency/js/service/currency',
], function (Component, $, restService) {
    'use strict';

    return Component.extend({
        defaults: {
            usd: "",
            euro: ""
        },
        initObservable: function () {
            this._super().observe(['euro', 'usd']);
            this.getRate('USD');
            this.getRateNBP();

            return this;
        },
        getRate: function (currency) {
            const self = this;
            restService.getRate(currency).then(function (rate) {
                self.usd(rate)
                console.log("REFRESH");
                setTimeout(function () {
                    self.getRate(currency);
                }, 180000)
            });
        },
        getRateNBP: function () {
            const self = this;
            restService.getRateNBP().then(function (result) {
                self.euro(result.rates[0]['mid'])
                setTimeout(function () {
                    self.getRateNBP();
                }, 180000)
            });
        }

    });
})
