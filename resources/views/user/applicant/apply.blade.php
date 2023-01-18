@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    @includeIf('shared.jumbotron')

    <div class="row mb-4">

        <div class="col-xl-12">
            <x-tabs :p="$data->nav_tabs_props">
                <div class="tab-pane active" id="bio" role="tabpanel">
                    <x-form.host>
                        <x-form.items :p="$data->tab_pane_bio_props" />
                        <x-form.buttons :p="['clear', 'save', 'next']" />
                    </x-form.host>
                </div>

                <div class="tab-pane activ" id="nok" role="tabpanel">
                    <x-form.host>
                        <x-form.items :p="$data->tab_pane_nok_props" />
                        <x-form.buttons :p="['clear', 'save', 'next']" />
                    </x-form.host>
                </div>

                <div class="tab-pane activ" id="sponsor" role="tabpanel">
                    <x-form.host>
                        <x-form.items :p="$data->tab_pane_sponsor_props" />
                        <x-form.buttons :p="['clear', 'save', 'next']" />
                    </x-form.host>
                </div>

                <div class="tab-pane activ" id="jamb" role="tabpanel">
                    <x-form.host>
                        <x-form.items :p="$data->tab_pane_jamb_props" />
                        <x-form.buttons :p="['clear', 'save', 'next']" />
                    </x-form.host>
                </div>

                <div class="tab-pane activ" id="exams" role="tabpanel">
                    <x-table :p="$data->tab_pane_exams_props" :x="['card-body' => false]">
                        @php $p = $data->tab_pane_exams_props->pager; @endphp

                        @forelse ($p->data as $item)
                            <tr>
                                @td($item['exam'])
                                @td($item['exam_month'] . ' ' . $item['exam_year'])
                                @td($item['exam_no'])
                                @td($item['subject'])
                                @td($item['grade'])

                                <x-table.time-br :p="$item['created_at']" />
                                <x-table.item :p="['item' => 'action-td-del']" />
                            </tr>
                        @empty
                            <x-table.empty />
                        @endforelse
                    </x-table>
                </div>

                <div class="tab-pane activ" id="course" role="tabpanel">
                    <x-form.host>
                        <x-form.items :p="$data->tab_pane_course_props" />

                        <div class="mt-3 mb-4">
                            <x-card.article :p="$data->appendix_props['declare']" :x="['card-body' => false]" />
                        </div>

                        <x-form.item :p="$data->appendix_props['sign']" />

                        <div class="row mt-0 pt-3" style="border-top:1px dotted #999;">
                            <div class="col-md-12" style="text-align:right;">
                                @includeIf('shared.button.toast')
                            </div>
                        </div>
                    </x-form.host>
                </div>
            </x-tabs>
        </div>
    </div>
    <!-- end row -->
@endsection
