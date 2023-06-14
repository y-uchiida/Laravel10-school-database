<?php

namespace App\Http\Controllers;

use App\Models\Homeroom;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeroomController extends Controller
{
    /* 一覧画面用のアクションメソッド */
    public function index(){
        $homerooms = Homeroom::all();
        return ( view('homeroom', ['homerooms' => $homerooms]) );
    }

    public function add(){
        $teachers = Teacher::all();
        $students = Student::all();
        return ( view('add_homeroom', ['teachers' => $teachers, 'students' => $students]) );
    }

    public function create(Request $request){
        $new_homeroom = new Homeroom();

        /* 名前を設定 */
        $new_homeroom->name = $request->name;

        /* 外部キーであるteacher_idを設定 */
        $new_homeroom->teacher_id = $request->teacher;

        /* 保存して、new_homeroomで自身のidが参照できるようにする */
        $new_homeroom->save();

        /* student とのリレーションを設定 */
        $students = Student::find($request->students); /* find()にidデータの配列を渡すことで、フォームで選択されたstudentのオブジェクトをまとめて取得する */
        if($students !== null){
            $new_homeroom->students()->saveMany($students); /* saveMany()にモデルオブジェクトを渡すと、まとめてリレーションを設定してくれる */
        }

        /* 一覧画面へ戻る */
        return ( redirect()->route('homerooms')->with(['success' => "{$new_homeroom->name}(ID: {$new_homeroom->id}) を追加しました"]) );
    }

    public function edit($id = -1){
        if ($id == -1){
            return ( redirect()->route('homeroom')->with(['error' => "homeroomのidが指定されていません"]) );
        }
        $homeroom = Homeroom::find($id);
        if ($homeroom === null){
            return ( redirect()->route('homeroom')->with(['error' => "homeroomが存在しません"]) );
        }

        $teachers = Teacher::all();
        $students = Student::all();

        return ( view('edit_homeroom', ['homeroom' => $homeroom, 'teachers' => $teachers, 'students' => $students]) );
    }

    public function update(Request $request, $id = -1){
        if ($id == -1){
            return ( redirect()->route('homeroom')->with(['error' => "対象のhomeroomのidが指定されていません"]) );
        }
        $homeroom = Homeroom::find($id);
        if ($homeroom === null){
            return ( redirect()->route('homeroom')->with(['error' => "homeroomが存在しません"]) );
        }

        /* 名前の更新 */
        $homeroom->name = $request->name;

        /* 外部キーであるteacher_idを更新 */
        $homeroom->teacher_id = $request->teacher;

        /* 変更をsave */
        $homeroom->save();

        /* studentとのリレーションを更新 */
        if ($homeroom->students !== null){
            /* 現在のリレーションをいったんすべて外す */
            $homeroom->students()->update(['homeroom_id' => null]);
        }
        $students = Student::find($request->students); /* requestで指定されたIDのstudentオブジェクトをまとめて取得 */
        if($students !== null){
            $homeroom->students()->saveMany($students); /* 連携を保存 */
        }

        /* 一覧画面へ戻る */
        return ( redirect()->route('homerooms')->with(['success' => "{$homeroom->name}(ID: {$homeroom->id}) を更新しました"]) );
    }

    /* 削除処理 */
    public function delete($id = -1){
        if ($id == -1){
            return ( redirect()->route('homeroom')->with(['error' => "削除するhomeroomのidが指定されていません"]) );
        }
        $homeroom = Homeroom::find($id);
        if ($homeroom === null){
            return ( redirect()->route('homeroom')->with(['error' => "削除するhomeroomが存在しません"]) );
        }

        /* studentとのリレーションを外す
         * update()は、コレクションの中身のオブジェクトすべてに対して、指定のプロパティの値を変更する処理を行える
         * students() で現在リレーションを持つ(外部キーに今回削除する対象のhomeroomのidを設定された)studentを取り出し、
         * 'homeroom_id' => null でまとめてnullを設定している
         */
        if ($homeroom->students !== null){
            $homeroom->students()->update(['homeroom_id' => null]);
        }

        /* delete() を実行 */
        $homeroom->delete();

        /* 一覧画面へ戻る */
        return ( redirect()->route('homerooms')->with(['success' => "{$homeroom->name}(ID: {$homeroom->id}) を削除しました"]) );
    }
}
