<?php

namespace Christhompsontldr\LaraboardAdmin\Http\Controllers;

use App\Http\Controllers\Controller;
use Christhompsontldr\Laraman\Traits\LaramanController;
use Christhompsontldr\Laraboard\Models\Thread;

class ThreadController extends Controller
{
    use LaramanController;

    public function __construct()
    {
        $this->model = \Christhompsontldr\Laraboard\Models\Thread::class;

        $this->columns = [
            [
                'field' => 'created_at',
                'display' => 'Created',
                'formatter' => 'datetime',
                'options'   => [
                    'format' => 'F j, Y g:ia',
                ]
            ],
            [
                'field' => 'name',
            ],
            [
                'field' => 'status',
            ],
            [
                'field' => 'replies',
                'formatter' => 'count',
            ],
        ];

        $this->buttons = [
            config('laraboard-admin.view.hintpath') . '::buttons.thread-view',
        ];

        $this->filters = [
            [
                'field' => 'status',
                'type' => 'select',
                'values' => [
                    'Open'    => 'Open',
                    'Closed'  => 'Closed',
                    'Deleted' => 'Deleted',
                ]
            ]
        ];
    }

    public function show($id)
    {
        $thread = Thread::whereId($id)->first();

        if (!$thread) {
            return back()
                ->with('error', 'That is not a valid thread.');
        }

        return view(config('laraboard-admin.view.hintpath') . '::threads.show', compact('thread'));
    }
}