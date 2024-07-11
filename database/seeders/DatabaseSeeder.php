<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       $u1=User::create([

        'name' => 'HeinMinHtun',
        'email' => 'Hein@example.com',
        'password' => Hash::make('password'),
        'phone' => '1234567890',
        'image' => 'default.jpg',
        'role' => 'admin',
        'email_verified_at' => now(),
       ]);
       $u2=User::create([

        'name' => 'user',
        'email' => 'user@example.com',
        'password' => Hash::make('password'),
        'phone' => '1234567890',
        'image' => 'default.jpg',
        'role' => 'user',
        'email_verified_at' => now(),
       ]);


      $c1=  Category::create([
            'image' => 'public/asset/images/a.jpg',
            'name' => 'ရေပိုက်ဝန်ဆောင်မှုများ',
            'description' => ' ရေပေးဝေရေး၊ ရေနုတ်မြောင်းနှင့် အပူပေးစနစ်များအတွက် ပိုက်များ၊ ပရိဘောဂများနှင့် ဆက်စပ်ပစ္စည်းများ တပ်ဆင်ခြင်း၊ ပြုပြင်ခြင်းနှင့် ထိန်းသိမ်းခြင်းတို့ ပါဝင်သည်။.',
        ]);
      $c2=  Category::create([
            'image' => 'public/asset/images/a.jpg',
            'name' => 'လျှပ်စစ်ဝန်ဆောင်မှုများ',
            'description' => 'ဝိုင်ယာကြိုးများ၊ ပလပ်များ၊ ပလပ်ပေါက်များနှင့် စက်ပစ္စည်းများအပါအဝင် လျှပ်စစ်စနစ်များ တပ်ဆင်ခြင်း၊ ပြုပြင်ခြင်းနှင့် ပြုပြင်ထိန်းသိမ်းခြင်းများ ပါဝင်သည်။',
        ]);
       $c3= Category::create([
            'image' => 'public/asset/images/a.jpg',
            'name' => 'HVAC ဝန်ဆောင်မှုများ',
            'description' => '(အပူပေးခြင်း၊ လေဝင်လေထွက်နှင့် အဲယားကွန်း)

            ဖော်ပြချက်- အိမ်များတွင် တပ်ဆင်ခြင်း၊ ပြုပြင်ခြင်းနှင့် ပြုပြင်ထိန်းသိမ်းခြင်းတို့ကို ဆောင်ရွက်ပေးပါသည်။.',
        ]);
        $c4=Category::create([
            'image' => 'public/asset/images/a.jpg',
            'name' => 'လက်သမားဝန်ဆောင်မှုများ',
            'description' => 'ပရိဘောဂများ၊ ဗီဒိုများ၊ စင်များနှင့် အိမ်၏ဖွဲ့စည်းပုံဆိုင်ရာ အစိတ်အပိုင်းများကို တည်ဆောက်ခြင်းနှင့် ပြုပြင်ခြင်းကဲ့သို့သော သစ်သားလုပ်ငန်းတာဝန်များ ပါဝင်သည်။',
        ]);
        $c5=Category::create([
            'image' => 'public/asset/images/a.jpg',
            'name' => 'Landscaping နှင့် Gardening ဝန်ဆောင်မှုများ',
            'description' => 'မြက်ခင်းစောင့်ရှောက်မှု၊ ဥယျာဉ်ဒီဇိုင်း၊ စိုက်ပျိုးမှု၊ ဆည်မြောင်းနှင့် ရှုခင်းတည်ဆောက်မှုအပါအဝင် ပြင်ပနေရာများကို ပြုပြင်ထိန်းသိမ်းခြင်းနှင့် မြှင့်တင်ခြင်းတို့ကို အကျုံးဝင်သည်။',
        ]);
        $c6=Category::create([
            'image' => 'public/asset/images/a.jpg',
            'name' => 'အမိုးဝန်ဆောင်မှုများ',
            'description' => 'အမိုးများ တပ်ဆင်ခြင်း၊ ပြုပြင်ခြင်းနှင့် ပြုပြင်ထိန်းသိမ်းခြင်းများ ပါဝင်သည်။ ဝန်ဆောင်မှုများတွင် စစ်ဆေးခြင်း၊ ရေမြောင်းသန့်ရှင်းရေးနှင့် ယိုစိမ့်မှုများ သို့မဟုတ် တည်ဆောက်ပုံဆိုင်ရာ ပျက်စီးမှုများကို ဖြေရှင်းပေးခြင်းတို့ ပါဝင်နိုင်သည်။',
        ]);
        $c7= Category::create([
            'image' => 'public/asset/images/a.jpg',
            'name' => 'စက်ပစ္စည်း ပြုပြင်ရေး ဝန်ဆောင်မှုများ',
            'description' => 'ရေခဲသေတ္တာ၊ အဝတ်လျှော်စက်၊ ပန်းကန်ဆေးစက်၊ မီးဖိုများနှင့် HVAC စနစ်များကဲ့သို့သော အိမ်သုံးပစ္စည်းများအတွက် ပြုပြင်ထိန်းသိမ်းမှု ဝန်ဆောင်မှုများကို ဆောင်ရွက်ပေးပါသည်။',
        ]);

    }
}
