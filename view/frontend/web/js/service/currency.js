define(['mage/storage', 'jquery'], function (storage, $) {
    'use strict';

    return {
        getRateUSD: function () {
            return storage.get('rest/V1/currency/usd');
        },
        getRate: function (currency) {
            return storage.get('rest/V1/currency/bycode/' + currency);
        },
        getRateNBP: async function() {
             return await $.ajax({
                 url: "http://api.nbp.pl/api/exchangerates/rates/a/eur?format=json",
                 type: 'GET'
            });
        }
    }
});
