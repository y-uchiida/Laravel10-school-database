<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; /* Student モデルを読み込み */
use App\Models\Homeroom;
use App\Models\Subject;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return ( view('students', ['students' => $students]) );
    }

    public function edit($id = -1){
        if ($id == -1){
            return (view('edit_student', ['error' => 'idが指定されていません']));
        }
        $student = Student::find($id);
        if ($student === null){
            return (view('edit_student', ['error' => '指定されたidのデータが存在しません']));
        }
        $homerooms = Homeroom::all('id', 'name');
        $subjects = Subject::all('id', 'name');
        return ( view('edit_student', ['student' => $student, 'homerooms' => $homerooms, 'subjects' => $subjects]) );
    }

    /* 追加画面から送信されたデータの内容で、新規にstudentのデータを作成する */
    public function create(Request $request){
        $new_student = new Student();

        /* 名前を設定 */
        $new_student->name = $request->input('name');

        /* 外部キーであるhomeroom_idを設定 */
        $new_student->homeroom_id = $request->input('homeroom');

        /* ひとまず保存し、idを得る */
        $new_student->save();

        /* subjectとのリレーションを設定 */
        $new_student->subjects()->sync($request->subjects);

        /* 一覧画面へ戻る */
        return ( redirect()->route('student')->with(['success' => "{$new_student->name}(ID: {$new_student->id}) を追加しました"]) );
    }

    public function add(){
        $homerooms = Homeroom::all('id', 'name');
        $subjects = Subject::all('id', 'name');
        return ( view('add_student', ['homerooms' => $homerooms, 'subjects' => $subjects]) );
    }

    /* 編集画面からPOST送信されたデータの内容で、指定IDのstudentのデータを更新する */
    public function update(Request $request, $id = -1){
        if ($id == -1){
            return (view('edit_student', ['error' => 'idが指定されていません']));
        }
        $student = Student::find($id);
        if ($student === null){
            return (view('edit_student', ['error' => '指定されたidのデータが存在しません']));
        }

        /* name の更新 */
        $student->name = $request->input('name');

        /* homeroom の更新 (現在登録されているhomeroomの値と異なっている場合、更新する) */
        if ($student->homeroom_id !== (int)$request->input('homeroom')){
            $student->homeroom_id = (int)$request->input('homeroom');
        }

        /* subjects の更新 (sync メソッドが利用できる) */
        $student->subjects()->sync($request->subjects);

        /* 変更を保存する */
        $student->save();

        /* 一覧画面へ戻る */
        return ( redirect()->route('student')->with(['success' => "{$student->name}(ID{$student->id}) を更新しました"]) );
    }

    /* 指定IDのstudentのデータを削除する */
    public function delete($id = -1) {
        if ($id == -1){
            return ( redirect()->route('student')->with(['error' => "削除するstudentのidが指定されていません"]) );
        }
        $student = Student::find($id);
        if ($student === null){
            return ( redirect()->route('student')->with(['error' => "削除するstudentが存在しません"]) );
        }

        /* まず、subjectとのリレーションを外す */
        $student->subjects()->sync([]);

        /* studentのモデルから、delete() メソッドでレコードを削除 */
        $student->delete();

        /* 一覧画面へ戻る */
        return ( redirect()->route('student')->with(['success' => "{$student->name}(ID: {$student->id}) を削除しました"]) );
    }
}
