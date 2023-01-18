<?php

namespace App\Traits;

use App\Models\Noticeboard;
use App\Traits\RouteTrait;
use Illuminate\Http\Request;

trait AdminNoticeboardControllerTrait
{
    use RouteTrait;

    public function noticeboardIndex(Request $request)
    {
        //
        $paginator = Noticeboard::paginate_();

        $pager = self::pager($request, $paginator);

        return (object) [
            'button' => ['href' => RouteTrait::create(), 'color' => 'success', 'icon' => 'fas fa-plus-circle', 'text' => 'Add New'],
            'input' => ['action' => 'noticeboard.show', 'name' => 'slug', 'disabled' => 'disabled'],
            'thead' => [
                '#',
                'Date',
                'Subject',
                'Message',
                // 'Recipients',
                '<abbr title="Attachments">ATT</abbr> <i class="fas fa-paperclip mx-1"></i>',
                'Action',
            ],
            'pager' => $pager,
        ];
    }

    public function noticeboardCreate()
    {
        return [
            'toolbar' => (object) [
                'button' => ['href' => RouteTrait::index(), 'color' => 'success', 'icon' => 'fas fa-arrow-circle-left', 'text' => 'View All', 'event' => null],

            ],
            'form' => [
                [
                    [
                        'label' => '*Subject :',
                        'name' => 'subject',
                        'placeholder' => 'Enter subject',
                        'constraint' => 'required',
                    ],
                ],
                [
                    [
                        'type' => 'textarea',
                        'label' => '*Message :',
                        'name' => 'message',
                        'placeholder' => 'Type your message here..',
                        'constraint' => 'required',
                    ],
                ],
                [
                    [
                        'col' => 6,
                        'type' => 'select',
                        'label' => 'Recipients :',
                        'name' => ' recipients',
                        'options' => ['Everyone', 'Lecturers', 'Students', 'Applicants'],
                    ],
                    [
                        'col' => 6,
                        'type' => 'file',
                        'label' => 'Attachments :',
                        'name' => 'attachments',
                        'constraint' => 'multiple',
                    ],
                ],
            ],
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
