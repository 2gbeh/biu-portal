<?php

namespace App\Traits;

use App\Models\Noticeboard;
use App\Traits\RouteTrait;
use Illuminate\Http\Request;

trait UserApplicantNoticeboardControllerTrait
{
    public function noticeboardIndex(Request $request)
    {
        //
        $paginator = Noticeboard::paginate_();

        $pager = self::pager($request, $paginator);

        return (object) [
            'button' => ['href' => '#!','color' => 'danger', 'icon' => 'far fa-trash-alt', 'text' => 'Selected', 'event' => 'handleTableInbox()'],
            'input' => ['action' => 'logs.show', 'name' => 'slug', 'disabled' => 'disabled'],
            'list' => $pager->data,
            'pager' => $pager,
        ];
    }

    public function noticeboardShow(int $id)
    {
        //
        $noticeboard = Noticeboard::findOrFail($id);

        return (object) [
            'back' => RouteTrait::index("/{$id}"),
            'avatar' => $noticeboard->user->photo,
            'name' => $noticeboard->user->name,
            'email' => $noticeboard->user->email,
            'subject' => $noticeboard->subject,
            'message' => $noticeboard->message,
        ];
    }
}
