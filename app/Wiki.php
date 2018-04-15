<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use cebe\markdown\Markdown as Markdown;
use App\Libs\WikiMarkdown as Markdown;

// wikiモデル
class Wiki extends Model
{
    /**
     * 複数代入を行う属性
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body',
    ];

    /**
     * ulr()メソッドを返却する
     *
     * @var array
     */
    public function url()
    {
        return route('wiki.show', $this->title);
    }

    /**
     * url()メソッドの結果を返却
     *
     * @var array
     */
    public function getUrlAttribute()
    {
        return $this->url();
    }

    /**
     * url()メソッドの結果を返却
     *
     * @return title
     */
    public function getRouteKeyName()
    {
        return 'title';
    }

    /**
     * url()メソッドの結果を返却
     *
     * @return title
     */
    public function parse()
    {
        $parser = new Markdown();

        return $parser->parse($this->body);
    }

    /**
     * url()メソッドの結果を返却
     *
     * @return title
     */
    public function getMarkdownBodyAttribute()
    {
        return $this->parse();
    }
}
