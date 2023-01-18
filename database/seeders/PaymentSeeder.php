<?php

namespace Database\Seeders;

use SchemaHelper;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $factory = $this->factory();
        foreach ($factory as $table => $data) {
            SchemaHelper::insertMultiple($table, $data);
        }
    }

    public function factory(): array
    {
        $data['payment_gateways'] = [
            [
                "gateway" => "Interswitch",
                "charges" => 500,
                "contact_name" => "Pamela Imobieye",
                "contact_email" => "pamela.imobieye@interswitchgroup.com",
                "contact_phone" => "07033327999",
                "api_docs" => "https://docs.interswitchgroup.com/docs/web-checkout",
                "test_cards" => '{"mastercard":{"card":null,"exp":null,"cvv":null,"pin":null,"otp":null},"verve":{"card":"506099 0580 00021 7499","exp":"03\/50","cvv":111,"pin":1111,"otp":123456},"visa":{"card":"4000 0000 0000 0002","exp":"03\/50","cvv":111,"pin":1234,"otp":null}}',
                "test_param" => '{"url":"https:\/\/webpay-ui.k8.isw.la\/collections\/w\/pay","method":"POST","payload":{"merchant_code":"MX15510","cust_name":null,"cust_email":null,"cust_id":null,"pay_item_name":null,"pay_item_id":"Default_Payable_MX15510","txn_ref":null,"amount":null,"currency":566,"site_redirect_url":"https:\/\/api.biuportal.org\/"}}',
                "test_curl" => '{"url":"https:\/\/qa.interswitchng.com\/collections\/api\/v1\/gettransaction.json","method":"GET","payload":{"merchantcode":"MX15510","transactionreference":null,"amount":null}}',
            ],
        ];

        $data['payment_invoices'] = [
            [
                "invoice" => "Admission Form",
                "fee" => 9500,
                "vat" => 500,
                "payment_gateway_id" => 1,
                "map_sessions_to_programme_id" => 1,
            ],
        ];

        $data['payment_transactions'] = [
            [
                "transaction" => "2021000001",
                "mode" => 'Web Checkout',
                "amount" => 10500,
                "narration" => 'Admission Form (2020/2021) UG FT',
                "depositor" => 'John Doe',
                "user_id" => 1,
                "payment_invoice_id" => 1,
                "map_sessions_to_programme_id" => 1,
                "response_code" => '00',
            ],
            [
                "transaction" => "2021000002",
                "mode" => 'Web Checkout',
                "amount" => 10500,
                "narration" => 'Admission Form (2020/2021) UG FT',
                "depositor" => 'Jane Doe',
                "user_id" => 1,
                "payment_invoice_id" => 1,
                "map_sessions_to_programme_id" => 1,
                "response_code" => '00',
            ],
            [
                "transaction" => "2021000003",
                "mode" => 'Web Checkout',
                "amount" => 10500,
                "narration" => 'Admission Form (2020/2021) UG FT',
                "depositor" => 'Jack Doe',
                "user_id" => 1,
                "payment_invoice_id" => 1,
                "map_sessions_to_programme_id" => 1,
                "response_code" => '00',
            ],
            [
                "transaction" => "2021000004",
                "mode" => 'Web Checkout',
                "amount" => 10500,
                "narration" => 'Admission Form (2020/2021) UG FT',
                "depositor" => 'Jill Doe',
                "user_id" => 1,
                "payment_invoice_id" => 1,
                "map_sessions_to_programme_id" => 1,
                "response_code" => '00',
            ],
            [
                "transaction" => "2021000005",
                "mode" => 'Web Checkout',
                "amount" => 10500,
                "narration" => 'Admission Form (2020/2021) UG FT',
                "depositor" => 'Jeff Doe',
                "user_id" => 1,
                "payment_invoice_id" => 1,
                "map_sessions_to_programme_id" => 1,
                "response_code" => '51',
            ],
        ];

        return $data;
    }
}
