<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Instructor;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(50)->create();

        // User::create([
        //     'first_name' => 'Ahmed',
        //     'last_name' => 'Rizk',
        //     'phone_number' => '01010248971',
        //     'email' => 'a@a.com',
        //     'password' => Hash::make(12345678)
        // ]);
        $admin = Admin::create([
            'name' => 'Ahmed',
            'email' => 'a@a.com',
            'password' => Hash::make(12345678)
        ]);
        $admin->markEmailAsVerified();
        DB::table('website_settings')->insert([
            'student' => "تنمية وزيادة حصيلته المعرفية في مجال تخصصه الدراسي بالانضمام لمواد ذات علاقة بما يدرسه في الجامعة، ويدرّسها عبر رواق مجاناً نخب أكاديمية عربية متميزة",
            'employee' => "في وقت فراغه بإمكانه دراسة مواد تساعده في تطوير ذاته في مجال عمله وتخصصه الحالي أو حتى في مجال آخر يرغب في اكتساب مهارات جديدة فيه.",
            'job_searcher' => "لديه الكثير من الوقت وبعض الفضول الإيجابي، ربما تعلّم شيء جديد في تخصص معين يثير اهتمامه ويساعده في تطوير مهاراته، ويفتح له آفاق جديدة للدخول في الحياة العملية.",
            'knowledge_seeker' => "يستمتع بالتعلم والاستزادة المعرفية لذاتها، لديه فضول استكشاف معرفي في تخصصه العملي أو حتى تخصص جديد لا يعمل فيه ولم يدرسه في الجامعة من قبل، يسعى للعلم ويبحث عن المعرفة لذاتها ولملئ فضوله ونهمه.",
            'seen_lectures' => "نعتني بأدق التفاصيل وقت التسجيل مع المحاضرين لتكون المواد المصورة ذات جودة عالية تشجع الطالب على المشاهدة والمواصلة. كل محاضرة تخضع للمونتاج الاحترافي، ويتم نشرها على شكل عدد من المقاطع القصيرة لأجل التسهيل على الطالب المتابعة والتركيز.",
            'training' => 'للتأكد من استيعاب الطالب لمضمون المحاضرات، سيجد تمارين تفاعلية تحتوي على
                                        سؤال/أسئلة تدور حول المقطع مع تصحيح فوري لإجاباته. بالإضافة إلى التمارين
                                        التفاعلية، هناك واجبات ومهام أسبوعية يقوم بتهيئتها المحاضر أو فريق عمل المحتوى
                                        وتشكل نسبة من درجة النجاح في المادة بالإضافة إلى الاختبار النهائي.',
            'certificates' => 'بعض المواد سيُمنح للطالب المنضم لها شهادة إكمال بعد تجاوزه الاختبار النهائي. نأمل مع مرور الوقت في المستقبل القريب عقد اتفاقية مع جهة أكاديمية للإشراف ومنح الشهادات بإسمها.',
            'community' => 'لقاء دوري مباشر مع المحاضر يجيب فيه على أسئلة الطلاب، كما أنه في صفحة كل مقطع من كل محاضرة سيجد الطالب مكان للسؤال والمناقشة مع المدرس والطلاب الآخرين حول مضمون المقطع.إضافة إلى ذلك يوجد قسم للمناقشات العامة حول المادة.'

        ]);
         $instructor = Instructor::create([
            'name' => 'Ahmed Rizk',
            'email' => 'a@a.com',
            'job' => 'General Manager at Milestone Training Center',
            'description' => 'PfMP,PgMP, PMP, PMI-RMP, PMI-SP, Project +, MPM, CIPM,PRINCE2 Practitioner, MSP Practitioner,M_o_R Practitioner, P3O Practitioner, MoP Practitioner.',
            'gender' => 'ذكر',
            'avatar' => 'IG3ncQ2b4JGRBfJuYYYZ1ns92d7Mxlr6NLyT2vZ6.jpg',
            'country' => 'مصر',
            'password' => Hash::make(12345678)
        ]);
        $instructor->markEmailAsVerified();

        $this->call([
            DepartmentSeeder::class,
            CurrencySeeder::class,
            CourseSeeder::class
        ]);
        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
