(()=>{"use strict";const e=window.wp.element,t=window.wc.wcBlocksRegistry,a=window.wp.i18n,n=window.wc.wcSettings,o=window.wp.htmlEntities;var l;const i=(0,n.getPaymentMethodData)("paypal",{}),c=()=>(0,o.decodeEntities)(i.description||""),r={name:"paypal",label:(0,e.createElement)("img",{src:`${n.WC_ASSET_URL}/images/paypal.png`,alt:(0,o.decodeEntities)(i.title||(0,a.__)("PayPal","woocommerce"))}),placeOrderButtonLabel:(0,a.__)("Proceed to PayPal","woocommerce"),content:(0,e.createElement)(c,null),edit:(0,e.createElement)(c,null),canMakePayment:()=>!0,ariaLabel:(0,o.decodeEntities)((null==i?void 0:i.title)||(0,a.__)("Payment via PayPal","woocommerce")),supports:{features:null!==(l=i.supports)&&void 0!==l?l:[]}};(0,t.registerPaymentMethod)(r)})();