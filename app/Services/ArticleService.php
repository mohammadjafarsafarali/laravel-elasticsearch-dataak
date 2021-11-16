<?php


namespace App\Services;


use App\Models\Article;
use App\Models\Source;
use App\Traits\Fileable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ArticleService
{
    use Fileable;

    /**
     * @var Article|Builder
     */
    private $article;

    /**
     * ArticleService constructor.
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * @param Request $request
     * @return Article
     * @author mj.safarali
     */
    public function create(Request $request): Article
    {
        $data = $this->prepareData($request);
        $article = $this->article->create($data);
        $this->attachFiles($request->input('file_url', []), $article);
        return $article;
    }

    /**
     * @param Request $request
     * @return array
     * @author mj.safarali
     */
    private function prepareData(Request $request): array
    {
        return [
            'source_id' => Source::whereName($request->input('source'))->first()->id,
            'user_id' => $request->input('user_id'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ];
    }
}
