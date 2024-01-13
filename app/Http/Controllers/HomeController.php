<?php

namespace App\Http\Controllers;

use App\Mail\SendAnswer;
use App\Models\AnswerAsk;
use App\Models\AnswerStudent;
use App\Models\AskingStudent;
use App\Models\Course;
use App\Models\EndStudent;
use App\Models\StudentGrades;
use App\Models\Subscriber;
use App\Models\User;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Ramsey\Uuid\Type\Integer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'blok_user']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Course::where('class_corses', Auth::user()->specialty)->get();
        $Student = User::where('role', 'user')
            ->join('end_students', 'end_students.student_id', '=', 'users.id')

            ->latest('end_students.created_at')->limit(20)->get();
        return view('home', ['data' => $data, 'Student' => $Student]);
    }

    public  static function grades($cores_id)
    {
        return  $data2 = StudentGrades::where('student_id', Auth::user()->id)
            ->where('cores_id', $cores_id)->get()->first()->grades;
    }
    public static function grades_end()
    {
        $data = StudentGrades::where('student_id', Auth::user()->id)->get()->count();;
        $data2 = Course::where('class_corses', Auth::user()->specialty)->get()->count();
        if ($data == $data2) :
            return true;
        else :
            return false;
        endif;
    }
    public function setting_profile()
    {
        return view('user.setting-profile');
    }
    public function update_profile(Request $request)
    {
        if ($request->specialty == 0) {
            return redirect()->back()->with('specialty', 'الرجاء اختيار التخصص  بشكل صحيح');
        }
        User::where('id', Auth::user()->id)->update(
            [
                'name' => $request->name,
                'graduation' => $request->graduation,
                'specialty' => $request->specialty,
                'age' => $request->age,
            ]
        );
        return redirect()->back();
    }
    public function re_password_user()
    {
        return view('user.re-password');
    }
    public function update_password_user(Request $request)
    {

        if ($request->password != $request->re_password) {
            return redirect()->back()->with('msg', ' كلمة المرور الجديده غير متطابقه  ');
        }

        $hashedValue = User::where('id', Auth::user()->id)->get()->first()->password;
        if (Hash::check($request->password_old, $hashedValue)) {
            User::where('id', Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->back()->with('msg', 'تم تحديث كلمة المرور');
        }
        return redirect()->back()->with('msg', 'خطاء في كلمة المرور');
    }


    public function setting_app()
    {
        return view('user.setting-site');
    }

    public function setting_corses()
    {
        $data = Course::latest()->get();
        return view('user.setting-corses', ['data' => $data]);
    }
    public function add_corses(Request $request)
    {
        if ($request->specialty == 0) {
            return redirect()->back()->with('msg', 'تأكد من اختيار التخصص');
        }
        Course::create([
            'name' => $request->name_corses,
            'class_corses' => $request->specialty,
            'd1' => $request->d1,
            'd2' => $request->d2
        ]);
        return redirect()->back()->with('msg', 'تم اضافة المقرر بنجاح');
    }
    public function delete_corses($id)
    {
        Course::where('id', $id)->delete();
        return redirect()->back()->with('msg', 'تم حذف المقرر بنجاح');
    }
    public function update_corses(Request $request)
    {
        Course::where('id', $request->id)->update([
            'name' => $request->name_corses,
            'class_corses' => $request->specialty,
            'd1' => $request->d1,
            'd2' => $request->d2
        ]);
        return redirect()->back()->with('msg', 'تم تحديث المقرر بنجاح');
    }

    public function add_grades_cores(Request $request)
    {

        for ($i = 1; $i <= $request->count; $i++) {


            $old = StudentGrades::where('student_id', Auth::user()->id)
                ->where('cores_id', $request->input("cores_id" . $i))->get()->count();



            if ($old == 0) {
            
                StudentGrades::create(
                    [
                        'student_id' => Auth::user()->id,
                        'cores_id' => $request->input("cores_id" . $i),
                        'grades' => $request->input("grades" . $i)
                    ]
                );

            } else {

                StudentGrades::where('student_id', Auth::user()->id)
                    ->where('cores_id', $request->input("cores_id" . $i))
                    ->update([
                        'student_id' => Auth::user()->id,
                        'cores_id' => $request->input("cores_id" . $i),
                        'grades' => $request->input("grades" . $i)
                    ]);
            }

        }



        return redirect()->back();
    }
    public function add_ask()
    {
        return view('user.setting-add-ask', [
            'data' => AskingStudent::latest()->get(),
            'data2' => AnswerAsk::latest()->get(),
        ]);
    }
    public function new_ask(Request $request)
    {
        $ask_stu = AskingStudent::create($request->all());
        AnswerAsk::create(
            [
                'res1' => $request->res1,
                'res2' => $request->res2,
                'res3' => $request->res3,

                'ans1' => $request->ans1 ? true : false,
                'ans2' => $request->ans2 ? true : false,
                'ans3' => $request->ans3 ? true : false,

                'ask_id' => $ask_stu->id,
            ]
        );
        return redirect()->back();
    }
    public function update_ask(Request $request)
    {
        AskingStudent::where('id', $request->id)->update([
            'ask' => $request->ask,
            'show_hide' => $request->show_hide,
            'classes' => $request->classes,
            'type_ask' => $request->type_ask,
        ]);
        AnswerAsk::where('ask_id', $request->id)->update([
            'res1' => $request->res1,
            'res2' => $request->res2,
            'res3' => $request->res3,

            'ans1' => $request->ans1 ? true : false,
            'ans2' => $request->ans2 ? true : false,
            'ans3' => $request->ans3 ? true : false,
        ]);
        return redirect()->back();
    }
    public function delete_ask($id)
    {
        AskingStudent::where('id', $id)->delete();
        return redirect()->back();
    }
    public  function ask_page($num)
    {

        $data = AskingStudent::where('show_hide', 1)->where('classes', Auth::user()->specialty)->get();
        $asking = array();
        $ask_id = array();
        $I = 0;
        foreach ($data as $value) {
            $asking[$I] = $value->ask;
            $ask_id[$I] = $value->id;
            $I++;
        }
        $old_num = $data->count();

        if ($data->count() >  $num) {
            $old_num = $num;
        }
        $res = AnswerAsk::where('ask_id', $ask_id[$old_num - 1])->get()->first();
        return view('user.page-ask', ['page' => $old_num, 'ask' => $asking, 'ask_id' => $ask_id, 'data' => $data, 'res' => $res]);
    }
    public function student_answer(Request $request)
    {
        $d = AnswerStudent::where('ask_id', $request->ask_id)->where('student_id', $request->student_id)->get()->count();
        $answer_data =   AnswerAsk::where('ask_id', $request->ask_id)->get()->first();
        $answer = 0;

        $answer_id = 0;
        if ($request->ans1 == true) {
            $answer_id = 1;
        }
        if ($request->ans2 == true) {
            $answer_id = 2;
        }
        if ($request->ans3 == true) {
            $answer_id = 3;
        }

        if ($request->ans1 == true && $answer_data->ans1 == 1) {
            $answer = 1;
        }
        if ($request->ans2 == true && $answer_data->ans2 == 1) {
            $answer = 1;
        }
        if ($request->ans3 == true && $answer_data->ans3 == 1) {
            $answer = 1;
        }



        if ($d == 0) :
            AnswerStudent::create([
                'ask' => $request->ask,
                'answer' => $answer,
                'ask_id' => $request->ask_id,
                'student_id' => $request->student_id,
                'answer_id' => $answer_id,
                'number_ask' => $request->number_ask,
            ]);



        else :
            AnswerStudent::where('ask_id', $request->ask_id)->where('student_id', $request->student_id)
                ->update([
                    'ask' => $request->ask,
                    'answer' => $answer,
                    'ask_id' => $request->ask_id,
                    'student_id' => $request->student_id,
                    'answer_id' => $answer_id,
                    'number_ask' => $request->number_ask,
                ]);
        endif;
        $data = AskingStudent::where('show_hide', 1)->where('classes', Auth::user()->specialty)->get();
        if ($data->count() < ($request->number_ask)) {
            return view('user.end-answer');
        }

        return HomeController::ask_page($request->number_ask);
    }

    /*
      public function student_answer(Request $request)
    {
        $d = AnswerStudent::where('ask_id', $request->ask_id)->get()->count();
        if ($d == 0) :
            AnswerStudent::create($request->all());
        else :
            AnswerStudent::where('ask_id', $request->ask_id)->where('student_id', $request->student_id)
                ->update($request->all());
        endif;
        $ans = AnswerStudent::where('student_id', $request->student_id)->get()->count();
        if (($request->number_ask ) == ($ans + 1 )) {
            return view('user.end-answer');
        }

        return HomeController::ask_page($request->number_ask);
    }
    */
    public function end_student()
    {
        $id = Auth::user()->id;
        $d = EndStudent::where('student_id', $id)->get()->count();
        if ($d == 0) :
            EndStudent::create(['student_id' => $id]);
        else :
            EndStudent::where('student_id', $id)->update(['student_id' => $id]);
        endif;

        $data = AnswerAsk::join('answer_students', 'answer_students.ask_id', 'answer_asks.ask_id')
            ->join('asking_students', 'asking_students.id', 'answer_asks.ask_id')
            ->where('student_id',  $id)->get()->count();

        $data1 = AnswerAsk::join('answer_students', 'answer_students.ask_id', 'answer_asks.ask_id')
            ->join('asking_students', 'asking_students.id', 'answer_asks.ask_id')
            ->where('student_id',  $id)->where('answer', '1')
            ->where('type_ask', 1)->get()->count();
        $data2 = AnswerAsk::join('answer_students', 'answer_students.ask_id', 'answer_asks.ask_id')
            ->join('asking_students', 'asking_students.id', 'answer_asks.ask_id')
            ->where('student_id',  $id)->where('answer', '1')
            ->where('type_ask', 2)->get()->count();



        $text = "نتيجة الاجابة عن الاسئلة";

        $text .= " علوم التطبيقية ";
        $text .=  ":" . (string) round(((float)$data1 / (int)$data) * 100, 2) . '%';
        $text .= "\n";
        $text .= " علوم الانسانية ";
        $text .= ":" . (string) round(((float)$data2 / (int)$data) * 100, 2) . "%";
        $text .= "\n";
        $text .= "سيتم تحويل اجابتك الي المرشد لأرشادك بشكل دقيق  وذلك خلال 24 ساعه نتمني لك التوفبق .";
        Mail::to(Auth::user()->email)->send(new SendAnswer(
            Auth::user()->email,
            Auth::user()->name,
            $text
        ));
        return redirect()->route('home');
    }
    public static function  is_end_answer()
    {
        $id = Auth::user()->id;
        return EndStudent::where('student_id', $id)->get()->count();
    }
    public static function answer_ask($id)
    {
        return  AnswerStudent::where('student_id', Auth::user()->id)->where('ask_id', $id)->get()->first()->answer;
    }
    public function edit_users()
    {
        $data = User::latest()->get();
        return view('user.page-edit-user', ['data' => $data]);
    }
    public static function user_web($type)
    {
        return  User::where('role', $type)->get()->count();
    }

    public static function role_user($id)
    {
        User::where('id', $id)->update(['role' => 'user']);
        return redirect()->back();
    }
    public static function role_Guide($id)
    {
        User::where('id', $id)->update(['role' => 'guide']);
        return redirect()->back();
    }
    public static function role_admin($id)
    {
        User::where('id', $id)->update(['role' => 'admin']);
        return redirect()->back();
    }
    public static function user_blok($id)
    {
        User::where('id', $id)->update(['blok' => '0']);
        return redirect()->back();
    }
    public static function user_unblok($id)
    {
        User::where('id', $id)->update(['blok' => '1']);
        return redirect()->back();
    }
    public  function page_answer_student($id)
    {
        $student = User::where('id', $id)->get()->first();
        $answer = AnswerStudent::where('student_id', $id)->get();
        $data = StudentGrades::where('student_id', $id)
            ->join('courses', 'courses.id', '=', 'student_grades.cores_id')->get();
        $data2 = AnswerAsk::get();
        return view('answer.page-answer-student', ['data' => $data, 'student' => $student, 'answer' => $answer, 'data2' => $data2]);
    }
    public function send_msg(Request $request)
    {
        Mail::to($request->email)->send(new SendAnswer($request->email, $request->name, $request->text));
        Subscriber::create([
            'email' => $request->email,
            'msg' => $request->text,
            'id_user' => Auth::user()->id,
            'id_student' => $request->id_student
        ]);
        return redirect()->back()->with('msg', 'تم ارسال بنجاح');
    }
    public static function student_answer_send($id)
    {
        return  Subscriber::where('id_student', $id)->get()->count();
    }
    public function guide_student_send_msg()
    {
        $Student = User::where('role', 'user')
            ->join('end_students', 'end_students.student_id', '=', 'users.id')
            ->latest('end_students.created_at')->get();
        return view('user.page-student-not-send', ['Student' => $Student]);
    }
    public function guide_student_not_send_msg()
    {
        $Student = User::where('role', 'user')
            ->join('end_students', 'end_students.student_id', '=', 'users.id')
            ->latest('end_students.created_at')->get();
        return view('user.page-student-send', ['Student' => $Student]);
    }
}
