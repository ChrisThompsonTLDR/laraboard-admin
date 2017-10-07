@extends(config('laraman.view.layout', config('laraman.view.hintpath') . '::layout'))

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col col-xs-12">
            <h1>{{ $thread->name }}</h1>
            <h3>Replies: {{ $thread->replies->count() }}</h3>
            <table class="table">
                <thead>
                <tr>
                    <th>Reply</th>
                    <th>Created</th>
                    <th>User</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($thread->replies as $reply)
                <tr>
                    <td>{{ str_limit($reply->body, 50) }}</td>
                    <td>{{ $reply->created_at->format('F j, Y g:ia') }}</td>
                    <td>{{ $reply->user->display_name }}</td>
                    <td>
                        <div class="button-group">
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteThreadModal{{ $reply->id }}"><i class="fa fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                @push('after-scripts')
                <div class="modal fade" id="deleteThreadModal{{ $reply->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteThreadModal{{ $reply->id }}Label">
                    <div class="modal-dialog" role="document">
                        {{ Form::open(['route' => [config('laraboard-admin.route.prefixDot') . 'replies.delete', $reply->id]]) }}
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="deleteThreadModal{{ $reply->id }}Label">Delete reply</h4>
                            </div>
                            <div class="modal-body">
                                You are about to delete a reply.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
                @endpush
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection