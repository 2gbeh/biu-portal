@extends('layouts.host.content')

@section('page', $data->breadcrumb['breadcrumb_page'])

@section('content')
    <div class="row mb-4">

        <x-card.profile :p="$data->card_profile_props" />

        <div class="col-xl-8">
            <x-tabs :p="$data->nav_tabs_props">
                <div class="tab-pane active" id="profile" role="tabpanel">
                    <x-form.host>
                        <x-form.items :p="$data->tab_pane_profile_props" />
                        <x-form.buttons :p="['save']" />
                    </x-form.host>
                </div>

                <div class="tab-pane activ" id="contacts" role="tabpanel">
                    <x-table :p="$data->tab_pane_contacts_props" :x="['card-body' => false]">
                        @php $p = $data->tab_pane_contacts_props->pager; @endphp

                        @forelse ($p->data as $item)
                            <tr>
                                <x-table.avatar :p="['text' => sprintf('%s (%s)', $item['names'], $item['sex'])]" />

                                <td>
                                    @br($f::link($item['email']))
                                    @out($item['phone_no'])
                                </td>

                                @td($item['address'])

                                <td>
                                    <x-badge.secondary :p="[$item['contact'] => isset($item['contact'])]" /> <br />
                                    <x-badge.secondary :p="[$item['rel'] => isset($item['rel'])]" />
                                </td>

                                <x-table.time-br :p="$item['created_at']" />
                                <x-table.item :p="['item' => 'action-td-del']" />
                            </tr>
                        @empty
                            <x-table.empty />
                        @endforelse
                    </x-table>
                </div>

                <div class="tab-pane activ" id="files" role="tabpanel">
                    <x-table :p="$data->tab_pane_files_props" :x="['card-body' => false]">
                        @php $p = $data->tab_pane_files_props->pager; @endphp

                        @forelse ($p->data as $item)
                            <tr>
                                @td($f::link($item['path'], 'uploads/'))
                                @td($item['size'])

                                <td>
                                    <x-badge.secondary :p="[$item['file'] => true]" />
                                </td>

                                <x-table.time-br :p="$item['created_at']" />
                                <x-table.item :p="['item' => 'action-td-del']" />
                            </tr>
                        @empty
                            <x-table.empty />
                        @endforelse
                    </x-table>
                </div>

                <div class="tab-pane activ" id="links" role="tabpanel">
                    <x-table :p="$data->tab_pane_links_props" :x="['card-body' => false]">
                        @php $p = $data->tab_pane_links_props->pager; @endphp

                        @forelse ($p->data as $item)
                            <tr>
                                @td($f::link($item['url']))

                                <td>
                                    <x-badge.secondary :p="[$item['link'] => true]" />
                                </td>

                                <x-table.time-br :p="$item['created_at']" />
                                <x-table.item :p="['item' => 'action-td-del']" />
                            </tr>
                        @empty
                            <x-table.empty />
                        @endforelse
                    </x-table>
                </div>

                <div class="tab-pane activ" id="activity" role="tabpanel">
                    <x-table :p="$data->tab_pane_logs_props" :x="['card-body' => false]">
                        @php $p = $data->tab_pane_logs_props->pager; @endphp

                        @forelse ($p->data as $item)
                            <tr>
                                <x-table.time-br :p="$item['created_at']" />

                                @td($item['ip'])

                                <td>
                                    <x-badge.primary :p="[$item['request'] => 'GET']" />
                                    <x-badge.success :p="[$item['request'] => 'POST']" />
                                    <x-badge.warning :p="[$item['request'] => 'PATCH']" />
                                    <x-badge.warning :p="[$item['request'] => 'PUT']" />
                                    <x-badge.danger :p="[$item['request'] => 'DELETE']" />
                                </td>
                                <td>
                                    @br($f::rmhost($item['route']))

                                    @if (substr($item['action'], 0, 5) == 'SIGN_')
                                        <x-text.primary :p="[$item['action'] => 'SIGN_UP']" />
                                        <x-text.success :p="[$item['action'] => 'SIGN_IN']" />
                                        <x-text.danger :p="[$item['action'] => 'SIGN_OUT']" />
                                    @endif
                                </td>

                                @td($item['notes'])
                            </tr>
                        @empty
                            <x-table.empty />
                        @endforelse
                    </x-table>
                </div>
            </x-tabs>
        </div>
    </div>
    <!-- end row -->
@endsection
