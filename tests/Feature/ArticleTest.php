<?php

namespace Tests\Feature;

use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use App\Models\Source;
use App\Models\User;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    private $source;

    protected function setUp(): void
    {
        parent::setUp();
        $this->source = Source::factory()->create();
    }

    public function test_a_user_can_create_article(): void
    {
        $data = $this->prepareData();
        $response = $this->attemptToSave($data);

        $response->assertOk();
        $response->assertJson(function (AssertableJson $json) use ($data) {
            $json->where('status', 'success')
                ->where('error', null)
                ->where('message', 'ok')
                ->has('value', function (AssertableJson $json) use ($data) {
                    $json->where('title' , $data['title'])
                        ->has('id')
                        ->etc();
                });
        });

        $this->assertDatabaseHas('articles', [
            'title' => $data['title'],
            'user_id' => $data['user_id'],
            'source_id' => $this->source->id,
            'content' => $data['content']
        ]);

        foreach ($data['file_url'] as $url) {
            $extension = Arr::last(explode('.' , $url));

            $this->assertDatabaseHas('files', [
                'url' => $url,
                'fileable_type' => 'article',
                'fileable_id' => $response['value']['id'],
                'extension' => $extension
            ]);
        }
    }

    public function test_it_should_fail_if_title_is_numeric(): void
    {
        $data = $this->prepareData();
        $data['title'] = 123456789;

        $response = $this->attemptToSave($data);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJson(function (AssertableJson $json) {
            $json->where('code' , Response::HTTP_UNPROCESSABLE_ENTITY)
                ->where('success' , false)
                ->where('message' , 'Validation Exception')
                ->where('error.title.0', trans('validation.string', ['attribute' => 'title']));
        });
    }

    private function attemptToSave(array $data)
    {
        return $this->post(route('api.v1.articles.store'), $data);
    }

    /**
     * @return array
     * @author mj.safarali
     */
    private function prepareData(): array
    {
        return [
            'source' => $this->source->name,
            'user_id' => User::factory()->create()->id,
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(10),
            'file_url' => [$this->faker->imageUrl()],
        ];
    }
}
