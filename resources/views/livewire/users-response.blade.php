<div class="row inbox">
    <div class="col-md-2">
        <ul class="inbox-nav margin-bottom-10">
            <li class="compose-btn">
                <a href="javascript:;" data-title="Compose" class="btn green">
                    <i class="fa fa-edit"></i> Compose </a>
            </li>
            <li class="inbox active">
                <a class="btn" data-title="Inbox" wire:click.prevent="inbox"> الشكاوي </a>
                <b></b>
            </li>
        </ul>
    </div>
    @if ($show_problem)
    <div class="col-md-10">
        @includeIf('livewire.employeesProblems.problem')
    </div>
    @elseif($show_problems)
    <div class="col-md-10">
        <div class="inbox-header">
            <h1 class="pull-left">Inbox</h1>
            <form class="form-inline pull-right" action="index.html">
                <div class="input-group input-medium">
                    <input type="text" class="form-control" placeholder="Password">
                    <span class="input-group-btn">
                        <button type="submit" class="btn green"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
        <div class="inbox-content">
            <table class="table table-striped table-advance table-hover">
                <thead>
                    <tr>
                        <th colspan="3">
                            <input type="checkbox" class="mail-checkbox mail-group-checkbox">
                            <div class="btn-group">
                                <a class="btn btn-sm blue dropdown-toggle" href="javascript:;" data-toggle="dropdown">
                                    More <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-pencil"></i> Mark as Read </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-ban"></i> Spam </a>
                                    </li>
                                    <li class="divider">
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-trash-o"></i> Delete </a>
                                    </li>
                                </ul>
                            </div>
                        </th>
                        <th class="pagination-control" colspan="3">
                            <span class="pagination-info">
                                1-30 of 789 </span>
                            <a class="btn btn-sm blue">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="btn btn-sm blue">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($responses as $response)
                    <tr class="unread" data-messageid="1" wire:click.prevent="read({{ $response->id }})">
                        <td class="inbox-small-cells">
                            <input type="checkbox" class="mail-checkbox">
                        </td>
                        <td class="inbox-small-cells">
                            <i class="fa fa-star"></i>
                        </td>
                        <td class="view-message hidden-xs">
                            {{ $response->data['response'] }}
                        </td>
                        <td class="view-message ">
                        </td>
                        <td class="view-message inbox-small-cells">
                            <i class="fa fa-paperclip"></i>
                        </td>
                        <td class="view-message text-right">
                            {{-- {{ $response->getSendTime() }} --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>