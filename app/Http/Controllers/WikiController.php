<?php

namespace App\Http\Controllers;

use App\Wiki;
use Illuminate\Http\Request;

// wikiコントローラ
class WikiController extends Controller
{
    /**
     * wikiページのトップ画面の参照
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // テーブル取得
        $wikis = Wiki::all();

        // ページトップのviewを表示
        return view('wiki.index')->with([
            'wikis' => $wikis,
        ]);
    }

    /**
     * 記事の新規作成
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // 新規インスタンス生成
        $wiki = new Wiki();
        
        // 「title」を受け取る
        $wiki->title = $request->title;

        // 編集フォームのviewを表示（存在しないwikiタイトルから遷移してきた場合は、「title」をセットする）
        return view('wiki.form', [
            'wiki' => $wiki,
        ]);
    }

    /**
     * wikiページの保存
     *
     * @param  新規記事の情報
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション
        $this->validate($request, [
            /**
             * バリデーションルール
             * レコードが一意であることをバリデート[一意（データベース）]：
             *   フィールド => unique:テーブル,カラム,除外ID,IDカラム
             */
            'title' => 'required|unique:wikis,title',
            'body' => 'required',
        ]);

        // 記事作成
        $post = Wiki::create($request->all());

        // 作成した記事画面へ遷移
        return redirect($post->url);
    }

    /**
     * 記事の参照
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $title)
    {
        // 「title」に一致するレコード取得
        $wiki = Wiki::whereTitle($title)->first();

        // 存在しないwikiタイトルの場合は、新たにwikiページ作成を促す画面に遷移
        if (empty($wiki)) {
            $wiki = new Wiki();
            $wiki->title = $title;
        }

        // 記事画面のviewを表示
        return view('wiki.show')->with([
            'wiki' => $wiki,
        ]);
    }

    /**
     * 記事の編集
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Wiki $wiki)
    {
        // 編集フォームのviewを表示
        return view('wiki.form', [
            'wiki' => $wiki,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wiki $wiki)
    {
        // バリデーション
        $this->validate($request, [
            /**
             * バリデーションルール
             * レコードが一意であることをバリデート[一意（データベース）]：
             *   フィールド => unique:テーブル,カラム,除外ID,IDカラム
             *
             * titleを変更する場合は、自分自身を除外して、titleが一意であることをバリデート
             */
            'title' => 'required|unique:wikis,title,'.$wiki->id,
            'body' => 'required',
        ]);

        //
        $wiki->update($request->all());

        // 編集した記事画面へ遷移
        return redirect($wiki->url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
