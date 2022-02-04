<?php

namespace Modules\ConfigModule\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\ConfigModule\Entities\Config;
use Modules\ConfigModule\Entities\ConfigCategory;
use Modules\WidgetsModule\Entities\WorkHours;

class ConfigModuleDatabaseSeeder extends Seeder
{

    public function run()
    {
        $config = Config::class;
        $config_categ = ConfigCategory::class;

        $config_categ::insert([
            'title' => 'General'
        ]);
        $config_categ::insert([
            'title' => 'Seo'
        ]);
        $config_categ::insert([
            'title' => 'Contact'
        ]);



        //////////////////////////////////////////////////////////////////////////////////////
        ///  General  ///////////////////////////////////////////////////////////////////////
        $config::create([
            'is_static' => 0,
            'static_value' => '',
            'var' => 'title',
            'ar' => [
                'display_name' => 'اسم الموقع',
                'value' => 'ايس ادمن',
            ],
            'en' => [
                'display_name' => 'website name',
                'value' => 'Ice Admin',
            ],
            'type' => 1,
            'category_id' => 1
        ]);

        $config::create([
            'is_static' => 0,
            'static_value' => '',
            'var' => 'about',
            'ar' => [
                'display_name' => 'وصف الموقع',
                'value' => 'وصف الموقع',
            ],
            'en' => [
                'display_name' => 'website description',
                'value' => 'website description',
            ],
            'type' => 3,
            'category_id' => 1
        ]);



        $config::create([
            'is_static' => 0,
            'static_value' => '',
            'var' => 'about_index',
            'ar' => [
                'display_name' => 'وصف مختصر للموقع',
                'value' => 'وصف مختصر للموقع',
            ],
            'en' => [
                'display_name' => 'short description',
                'value' => 'short description',
            ],
            'type' => 3,
            'category_id' => 1
        ]);


        //////////////////////////////////////////////////////////////////////////////////////
        ///  SEO  ///////////////////////////////////////////////////////////////////////
        $config::create([
            'is_static' => 0,
            'var' => 'meta_title',
            'ar' => [
                'display_name' => 'اسم الميتا',
                'value' => 'اسم الميتا',
            ],
            'en' => [
                'display_name' => 'meta_title',
                'value' => 'meta_title',
            ],
            'type' => 1,
            'category_id' => 2
        ]);
        $config::create([
            'is_static' => 0,
            'var' => 'meta_desc',
            'ar' => [
                'display_name' => 'وصف الميتا',
                'value' => 'وصف الميتا',
            ],
            'en' => [
                'display_name' => 'meta_desc',
                'value' => 'meta_desc',
            ],
            'type' => 3,
            'category_id' => 2
        ]);
        $config::create([
            'is_static' => 0,
            'var' => 'meta_keywords',
            'ar' => [
                'display_name' => 'كلمات الميتا',
                'value' => 'كلمات الميتا',
            ],
            'en' => [
                'display_name' => 'meta_keywords',
                'value' => 'meta_keywords',
            ],
            'type' => 3,
            'category_id' => 2
        ]);


        $config::create([
            'is_static' => 1,
            'static_value' => 'meta_Tag_Manager',
            'ar' => [
                'display_name' => ' تاج مانيجر',

            ],
            'en' => [
                'display_name' => 'meta_Tag_Manager',
            ],
            'var' => 'meta_Tag_Manager',
            'type' => 3,
            'category_id' => 2
        ]);

        $config::create([
            'is_static' => 1,
            'static_value' => 'meta_Google_Analyist',
            'ar' => [
                'display_name' => ' جوجل اناليست ',

            ],
            'en' => [
                'display_name' => 'Google_Analyist',
            ],
            'var' => 'meta_Google_Analyist',
            'type' => 3,
            'category_id' => 2
        ]);


        //////////////////////////////////////////////////////////////////////////////////////
        ///  Contact  ///////////////////////////////////////////////////////////////////////
        $config::create([
            'is_static' => 1,
            'static_value' => '0123456789',
            'ar' => [
                'display_name' => 'رقم الهاتف',
                'value' => 'dsadas',
            ],
            'en' => [
                'display_name' => 'phone',
            ],
            'var' => 'phone',
            'type' => 1,
            'category_id' => 3
        ]);
        $config::create([
            'is_static' => 1,
            'static_value' => '0123456789',
            'ar' => [
                'display_name' => 'رقم الهاتف الثاني',
                'value' => 'dsadas',
            ],
            'en' => [
                'display_name' => 'phone 2',
            ],
            'var' => 'phone_2',
            'type' => 1,
            'category_id' => 3
        ]);
        $config::create([
            'is_static' => 1,
            'static_value' => '0123456789',
            'ar' => [
                'display_name' => 'رقم  الهاتف الثالث',
                'value' => 'dsadas',
            ],
            'en' => [
                'display_name' => 'phone 3',
            ],
            'var' => 'phone_3',
            'type' => 1,
            'category_id' => 3
        ]);
        $config::create([
            'is_static' => 1,
            'static_value' => '0123456789',
            'ar' => [
                'display_name' => ' رقم  الهاتف الرابع',
                'value' => 'dsadas',
            ],
            'en' => [
                'display_name' => 'phone 4',
            ],
            'var' => 'phone_4',
            'type' => 1,
            'category_id' => 3
        ]);

        $config::create([
            'is_static' => 1,
            'static_value' => '0123456789',
            'ar' => [
                'display_name' => 'واتس اب',
                'value' => 'dsadas',
            ],
            'en' => [
                'display_name' => 'whatsapp',
            ],
            'var' => 'whatsapp',
            'type' => 1,
            'category_id' => 3
        ]);

        $config::create([
            'var' => 'email',
            'is_static' => 1,
            'static_value' => '0123456789',
            'ar' => [
                'display_name' => 'البريد الالكتروني',
            ],
            'en' => [
                'display_name' => 'email',
            ],
            'type' => 1,
            'category_id' => 3
        ]);
       $config::create([
            'var' => 'tw_link',
            'is_static' => 1,
            'static_value' => 'tw_link',
            'ar' => [
                'display_name' => 'تويتر',
            ],
            'en' => [
                'display_name' => 'twitter',
            ],
            'type' => 1,
            'category_id' => 3
        ]);
        $config::create([
            'var' => 'fb_link',
            'is_static' => 1,
            'static_value' => 'fb_link',
            'ar' => [
                'display_name' => 'فيس بوك',
            ],
            'en' => [
                'display_name' => 'facebook',
            ],
            'type' => 1,
            'category_id' => 3
        ]);

        $config::create([
                        'var' => 'youtube',
                        'is_static' => 1,
                        'static_value' => 'youtube',
                        'ar' => [
                            'display_name' => 'اليوتيوب',
                        ],
                        'en' => [
                            'display_name' => 'youtube',
                        ],
                        'type' => 1,
                        'category_id' => 3
                    ]);
       $config::create([
                        'var' => 'instgram',
                        'is_static' => 1,
                        'static_value' => 'instgram',
                        'ar' => [
                            'display_name' => 'انستجرام',
                        ],
                        'en' => [
                            'display_name' => 'Instgram',
                        ],
                        'type' => 1,
                        'category_id' => 3
         ]);
         $config::create([
                        'var' => 'telegram',
                        'is_static' => 1,
                        'static_value' => 'telegram',
                        'ar' => [
                            'display_name' => 'تليجرام',
                        ],
                        'en' => [
                            'display_name' => 'telegram',
                        ],
                        'type' => 1,
                        'category_id' => 3
                    ]);











//         //////////////////////////////////////////////////////////////////////////////////////
//         ///  Social  ///////////////////////////////////////////////////////////////////////
//         $config::create([
//             'var' => 'youtube',
//             'is_static' => 1,
//             'static_value' => 'youtube',
//             'ar' => [
//                 'display_name' => 'اليوتيوب',
//             ],
//             'en' => [
//                 'display_name' => 'youtube',
//             ],
//             'type' => 1,
//             'category_id' => 4
//         ]);
//         $config::create([
//             'var' => 'telegram',
//             'is_static' => 1,
//             'static_value' => 'telegram',
//             'ar' => [
//                 'display_name' => 'تليجرام',
//             ],
//             'en' => [
//                 'display_name' => 'telegram',
//             ],
//             'type' => 1,
//             'category_id' => 4
//         ]);
//         $config::create([
//             'var' => 'tw_link',
//             'is_static' => 1,
//             'static_value' => 'tw_link',
//             'ar' => [
//                 'display_name' => 'تويتر',
//             ],
//             'en' => [
//                 'display_name' => 'twitter',
//             ],
//             'type' => 1,
//             'category_id' => 4
//         ]);
//         $config::create([
//             'var' => 'fb_link',
//             'is_static' => 1,
//             'static_value' => 'fb_link',
//             'ar' => [
//                 'display_name' => 'فيس بوك',
//             ],
//             'en' => [
//                 'display_name' => 'facebook',
//             ],
//             'type' => 1,
//             'category_id' => 4
//         ]);


//   //////////////////////////////////////////////////////////////////////////////////////
//         ///  home  ///////////////////////////////////////////////////////////////////////
//         $config::create([
//             'is_static' => 0,
//             'static_value' => '',
//             'var' => 'all_back',
//             'ar' => [
//                 'display_name' => ' صوره الغلاف للصفح',
//                 'value' => '',
//             ],
//             'en' => [
//                 'display_name' => 'pages Back image',
//                 'value' => '',
//             ],
//             'type' => 2,
//             'category_id' => 5
//         ]);

//         $config::create([
//             'is_static' => 0,
//             'static_value' => '',
//             'var' => 'about_img',
//             'ar' => [
//                 'display_name' => 'صوره الاوبت ',
//                 'value' => '',
//             ],
//             'en' => [
//                 'display_name' => 'about photo',
//                 'value' => '',
//             ],
//             'type' => 2,
//             'category_id' => 5
//         ]);

//         $config::create([
//             'is_static' => 0,
//             'static_value' => '',
//             'var' => 'another_img ',
//             'ar' => [
//                 'display_name' => 'صوره اضافيه',
//                 'value' => '',
//             ],
//             'en' => [
//                 'display_name' => 'Another Photo',
//                 'value' => '',
//             ],
//             'type' => 2,
//             'category_id' => 5
//         ]);
//         $config::create([
//             'is_static' => 0,
//             'static_value' => '',
//             'var' => 'services_desc',
//             'ar' => [
//                 'display_name' => 'وصف الخدمات',
//                 'value' => 'وصف الخدمات',
//             ],
//             'en' => [
//                 'display_name' => 'services description',
//                 'value' => 'service description',
//             ],
//             'type' => 3,
//             'category_id' => 5
//         ]);
//         $config::create([
//             'is_static' => 0,
//             'static_value' => '',
//             'var' => 'projects_desc',
//             'ar' => [
//                 'display_name' => 'وصف المشاريع',
//                 'value' => 'وصف المشاريع',
//             ],
//             'en' => [
//                 'display_name' => 'projects description',
//                 'value' => 'projects description',
//             ],
//             'type' => 3,
//             'category_id' => 5
//         ]);
//         $config::create([
//             'is_static' => 0,
//             'static_value' => '',
//             'var' => 'blogs_desc',
//             'ar' => [
//                 'display_name' => 'وصف الاخبار',
//                 'value' => 'وصف الاخبار',
//             ],
//             'en' => [
//                 'display_name' => 'blogs description',
//                 'value' => 'blogs description',
//             ],
//             'type' => 3,
//             'category_id' => 5
//         ]);
//         $config::create([
//             'is_static' => 0,
//             'static_value' => '',
//             'var' => 'whyus_desc',
//             'ar' => [
//                 'display_name' => 'وصف لماذا نحن',
//                 'value' => 'وصف لماذا نحن',
//             ],
//             'en' => [
//                 'display_name' => 'whyus description',
//                 'value' => 'whyus description',
//             ],
//             'type' => 3,
//             'category_id' => 5
        // ]);




    }
}
