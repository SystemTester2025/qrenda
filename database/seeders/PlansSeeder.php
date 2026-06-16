<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\Plan;
use App\Models\PlanFeature;
use App\Models\Template;
use Illuminate\Database\Seeder;

class PlansSeeder extends Seeder
{
    public function run(): void
    {
        $usd = Currency::whereCurrencyCode('USD')->first()->id;
        $allTemplateIds = Template::pluck('id')->toArray();

        $plans = [
            [
                'name' => 'Premium',
                'price' => 29,
                'no_of_vcards' => 25,
                'no_of_whatsapp_store' => 5,
                'no_of_visitors' => 5000,
                'no_of_organization_users' => 5,
                'storage_limit' => 1024,
                'features' => [
                    'products_services' => true,
                    'testimonials' => true,
                    'hide_branding' => true,
                    'enquiry_form' => true,
                    'social_links' => true,
                    'custom_links' => true,
                    'password' => true,
                    'custom_fonts' => true,
                    'products' => true,
                    'appointments' => true,
                    'gallery' => true,
                    'analytics' => true,
                    'seo' => true,
                    'blog' => true,
                    'affiliation' => true,
                    'custom_qrcode' => true,
                    'insta_embed' => true,
                    'iframes' => true,
                    'dynamic_vcard' => true,
                    'linkedin_embed' => true,
                ],
                'template_limit' => 20,
            ],
            [
                'name' => 'VIP',
                'price' => 49,
                'no_of_vcards' => 100,
                'no_of_whatsapp_store' => 20,
                'no_of_visitors' => 25000,
                'no_of_organization_users' => 15,
                'storage_limit' => 5120,
                'features' => [
                    'products_services' => true,
                    'testimonials' => true,
                    'hide_branding' => true,
                    'enquiry_form' => true,
                    'social_links' => true,
                    'custom_links' => true,
                    'password' => true,
                    'custom_css' => true,
                    'custom_js' => true,
                    'custom_fonts' => true,
                    'products' => true,
                    'appointments' => true,
                    'gallery' => true,
                    'analytics' => true,
                    'seo' => true,
                    'blog' => true,
                    'affiliation' => true,
                    'custom_qrcode' => true,
                    'insta_embed' => true,
                    'iframes' => true,
                    'dynamic_vcard' => true,
                    'allow_custom_domain' => true,
                    'whatsapp_store' => true,
                    'linkedin_embed' => true,
                    'visitors' => true,
                    'organization_users' => true,
                ],
                'template_limit' => 50,
            ],
            [
                'name' => 'Enterprise',
                'price' => 99,
                'no_of_vcards' => 9999,
                'no_of_whatsapp_store' => 99,
                'no_of_visitors' => 999999,
                'no_of_organization_users' => 99,
                'storage_limit' => 99999,
                'features' => [
                    'products_services' => true,
                    'testimonials' => true,
                    'hide_branding' => true,
                    'enquiry_form' => true,
                    'social_links' => true,
                    'custom_links' => true,
                    'password' => true,
                    'custom_css' => true,
                    'custom_js' => true,
                    'custom_fonts' => true,
                    'products' => true,
                    'appointments' => true,
                    'gallery' => true,
                    'analytics' => true,
                    'seo' => true,
                    'blog' => true,
                    'affiliation' => true,
                    'custom_qrcode' => true,
                    'insta_embed' => true,
                    'iframes' => true,
                    'dynamic_vcard' => true,
                    'allow_custom_domain' => true,
                    'whatsapp_store' => true,
                    'linkedin_embed' => true,
                    'visitors' => true,
                    'organization_users' => true,
                ],
                'template_limit' => 68,
            ],
        ];

        foreach ($plans as $data) {
            $features = $data['features'];
            $templateLimit = $data['template_limit'];
            unset($data['features'], $data['template_limit']);

            $data['currency_id'] = $usd;
            $data['frequency'] = Plan::MONTHLY;
            $data['is_default'] = 0;
            $data['trial_days'] = 0;
            $data['status'] = Plan::IS_ACTIVE;

            $plan = Plan::create($data);

            $features['plan_id'] = $plan->id;
            PlanFeature::create($features);

            $plan->templates()->sync(array_slice($allTemplateIds, 0, $templateLimit));
        }
    }
}
