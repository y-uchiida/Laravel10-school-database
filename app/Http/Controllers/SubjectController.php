<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Student;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){

        /* subject のデータを5件ずつ表示する */
        $subjects = Subject::paginate(5);
        return ( view('subjects', ['subjects' => $subjects]) );
    }

    public function add(){
        $students = Student::all();
        return (view('add_subject', ['students' => $students]));
    }

    /* 追加画面から送信されたデータの内容で、新規にsubjectのデータを作成する */
    public function create(Request $request){

        // dd($request->students);

        $this->validate($request, [
            'name' => ['required']
        ]);

        $new_subject = new Subject();
        $new_subject->name = $request->name;
        $new_subject->save();

        /* studentsとのリレーションを作成 */
        $new_subject->students()->sync($request->students);

        return (redirect()->route('subjects')->with(['message' => "新しい科目{$request->name} を作成しました"]));
    }

    public function edit($id = -1){
        if ($id == -1){
            return (view('edit_subject', ['error' => 'idが指定されていません']));
        }
        $subject = Subject::find($id);
        if ($subject === null){
            return (view('edit_subject', ['error' => '指定されたidのデータが存在しません']));
        }
        $students = Student::all();
        return ( view('edit_subject', ['subject' => $subject, 'students' => $students]));
    }

    /* 編集画面からPOST送信されたデータの内容で、指定IDのsubjectのデータを更新する */
    public function update(Request $request, $id = -1){

        // dd($request->students);

        if ($id == -1){
            return (view('edit_subject', ['error' => 'idが指定されていません']));
        }
        $subject = Subject::find($id);
        if ($subject === null){
            return (view('edit_subject', ['error' => '指定されたidのデータが存在しません']));
        }

        /* name の更新 */
        $subject->name = $request->name;

        /* studentとの連携の更新 */
        $subject->students()->sync($request->students);

        /* 変更を保存する */
        $subject->save();

        /* 一覧画面へ戻る */
        return ( redirect()->route('subjects')->with(['success' => "{$subject->name}(ID: {$subject->id}) を更新しました"]) );
    }


    /* 指定IDのsubjectのデータを削除する */
    public function delete($id = -1) {
        if ($id == -1) {
            return ( redirect()->route('subjects')->with(['error' => "削除するsubjectのidが指定されていません"]) );
        }
        $subject = Subject::find($id);
        if ($subject === null) {
            return ( redirect()->route('subjects')->with(['error' => "削除するsubjectが存在しません"]) );
        }

        /* studentとのリレーションを外す */
        $subject->students()->sync([]);

        /* deleteメソッドで削除を実行 */
        $subject->delete();

        /* 一覧画面へ戻る */
        return (redirect()->route('subjects')->with(['success' => "{$subject->name}(ID: {$subject->id})を削除しました"]));
    }
}
