<?php


namespace App\Services;


use App\Http\Requests\SubscribeRequest;
use App\Models\Subscribe;
use App\Models\Source;
use App\Models\User;
use Exception;

class SubscribeService
{
    /**
     * @var Subscribe
     */
    private $subscribe;

    /**
     * SubscribeService constructor.
     * @param Subscribe $subscribe
     */
    public function __construct(Subscribe $subscribe)
    {
        $this->subscribe = $subscribe;
    }

    /**
     * @param SubscribeRequest $request
     * @return mixed
     * @throws Exception
     * @author mj.safarali
     */
    public function subscribe(SubscribeRequest $request)
    {
        if ($this->subscribe->where('email', '=', $request->input('email'))->count() < config('constants.subscribe.canHave', 10))
            return $this->subscribe->firstOrCreate([
                'user_id' => User::where('name', '=', $request->input('user_name'))->first()->id,
                'source_id' => Source::where('name', '=', $request->input('source'))->first()->id,
                'email' => $request->input('email')
            ]);
        throw new Exception(trans('messages.max_subscribe'));

    }

}
