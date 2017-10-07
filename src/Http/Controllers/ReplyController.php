<?php

namespace Christhompsontldr\LaraboardAdmin\Http\Controllers;

use App\Http\Controllers\Controller;
use Christhompsontldr\Laraman\Traits\LaramanController;
use Christhompsontldr\Laraboard\Models\Reply;

class ReplyController extends Controller
{
    use LaramanController;

    public function delete($id)
    {
        $reply = Reply::whereId($id)->first();

        if (!$reply) {
            return back()
                ->with('error', 'That is not a valid reply.');
        }

        $reply->delete();

        return back()
            ->with('success', 'Reply deleted.');
    }
}