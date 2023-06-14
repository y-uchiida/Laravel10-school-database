<?php

namespace App\Http\Controllers;

use App\Models\Homeroom;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /* 一覧画面用のアクションメソッド */
    public function index(){
        $teachers = Teacher::all();
        return ( view('teacher', ['teachers' => $teachers]) );
    }

    /* 編集画面用のアクションメソッドを作成 */
    public function edit($id = -1){
        $teacher = Teacher::find($id);
        $homerooms = Homeroom::all('id', 'name');
        return ( view('edit_teacher', ['teacher' => $teacher, 'homerooms' => $homerooms]) );
    }

    public function add(){
        $homerooms = Homeroom::all('id', 'name');
        return ( view('add_teacher', ['homerooms' => $homerooms]) );
    }

    /* 追加画面の入力フォームから受け取った内容で、teacherのデータを作成する */
    public function create(Request $request){
        $new_teacher = new Teacher();

        /* 名前を設定 */
        $new_teacher->name = $request->name;

        /* データを保存 */
        $new_teacher->save();

        /* homeroomとの連携を追加 */
        $homeroom = Homeroom::find($request->homeroom);
        if ($homeroom !== null){
            $homeroom->teacher_id = $new_teacher->id;
            $homeroom->save();
        }
        /* 一覧画面へリダイレクト */
        return ( redirect()->route('teachers')->with(['success' => "{$new_teacher->name}(ID: {$new_teacher->id}) を追加しました"]) );
    }

    /* 編集画面の入力フォームから受け取った内容でteacherのデータを更新する */
    public function update(Request $request, $id = -1){
        $teacher = Teacher::find($id);

        /* 名前を変更 */
        $teacher->name = $request->name;

        /* 担任クラスの情報を更新 */
        if ($teacher->homeroom === null) { /* 担任クラスが設定されていない場合 */
            /* 入力されたhomrtoomのidと連携せる */
            $new_homeroom = Homeroom::find($request->homeroom);
            $new_homeroom->teacher_id = $teacher->id;
            $new_homeroom->save();
        } else { /* 担任クラスが設定されている場合 */
            /* 現在の担任クラスと異なるhomeroom_idが入力フォームから送られていれば、更新する */
            if ($teacher->homeroom->id !== (int)$request->homeroom)
            {
                $old_homeroom = Homeroom::find($teacher->homeroom->id);
                $old_homeroom->teacher_id = null;
                $old_homeroom->save();

                $new_homeroom = Homeroom::find($request->homeroom);
                $new_homeroom->teacher_id = $teacher->id;
                $new_homeroom->save();
            }
        }

        /* 変更の内容を保存 */
        $teacher->save();

        /* 一覧画面へリダイレクト */
        return ( redirect()->route('teachers')->with(['success' => "{$teacher->name}(ID{$teacher->id}) を更新しました"]) );
    }

    /* 削除処理 */
    public function delete($id = -1){
        if ($id == -1){
            return ( redirect()->route('teacher')->with(['error' => "削除するteacherのidが指定されていません"]) );
        }
        $teacher = Teacher::find($id);
        if ($teacher === null){
            return ( redirect()->route('teacher')->with(['error' => "削除するteacherが存在しません"]) );
        }

        /* homeroom の連携を解除 */
        if ($teacher->homeroom !== null){
            /* homeroomとの連携がある場合、外部キーの値を削除 */
            $homeroom = Homeroom::find($teacher->homeroom->id);
            $homeroom->teacher_id = null;
            $homeroom->save();
        }

        /* 削除処理を実行 */
        $teacher->delete();

        /* 一覧画面にリダイレクト */
        return ( redirect()->route('teachers')->with(['success' => "{$teacher->name}(ID: {$teacher->id}) を削除しました"]) );
    }
}
