<?php

namespace Database\Seeders;

use App\Models\School;

use App\Models\User;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@gmail.com',
        ]);
         DB::table('settings')->insert([
            ['name' => 'home1', 'text' => 'أولاً قبل البدء في تعبئة الاستمارة يجب عليكِ معرفة نصاب كل معلمة والمواد المسندة لها .'],
            ['name' => 'home2', 'text' => 'ثانيًا بعد تعبئة الاستمارة قومي بإرسالها على بريدنا الإلكتروني jdwli@hotmail.com أو على واتساب 0506000795'],
            ['name' => 'home3', 'text' => 'ثالثًا بعد ارسال الاستمارة قومي بتحويل المبلغ إلى أحد حسابتنا البنكية المرسلة لكِ عبر الواتس آب أو تويتر .'],

            ['name' => 'home4', 'text' => 'رابعًا بعد تحويل المبلغ سيتم البدء في تجهيز الجدول فورًا وسيكون الجدول جاهز خلال أقل من 24 ساعة بإذن الله تعالى .'],

            ['name' => 'home5', 'text' => 'خامسًا المعلومات الخاطئة تتسب في تأخير تسليم الجدول لكم لذلك نرجوا التأكد من ( اسناد المواد للمعلمات ) قبل الارسال .'],

            ['name' => 'home6', 'text' => 'سادسًا للاستفسار أو الملاحظات يمكنكم التواصل معنا ( اتصال - واتس آب ) عبر الرقم 795 6000 050 على مدار الساعة .'],

            ['name' => 'teacher2', 'text' => 'عند وجود تشابه في الأسماء بين معلمتين مثلا - نوره الحربي حاسب و نوره الحربي لغتي - الحل هنا نكتب اسم المعلمة واسم والدها فقط بدون اسم القبيلة فتصبح الأولى - نوره محمد حاسب والثانية نوره عبدالله لغتي - والهدف من ذلك حتى لا يصبح هناك خلط في جدول المعلمتين وبالتالي يخرج الجدول وبه أخطاء !!'],

            ['name' => 'teacher1', 'text' => 'تنبيه مهم جدًا'],


        ]);
    }
}
