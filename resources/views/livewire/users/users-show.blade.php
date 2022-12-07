<div>
    <div style="display: contents">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Users Show') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"> {{ __('Home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('users') }}"> {{ __('Users') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Users Show') }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="card card-solid">
            <div class="card-body p-0">
                <table class="table color-bordered-table info-table  info-bordered-table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center" style="width: -1px;">{{ __('name Student') }}</th>
                            <th class="text-center" style="width: -1px;">{{ __('Name Course') }}</th>
                            <th class="text-center">{{ __('attendance') }}</th>
                            <th class="text-center">{{ __('recitation') }}</th>
                            <th class="text-center">{{ __('mark_1') }}</th>
                            <th class="text-center">{{ __('mark_2') }}</th>
                            <th class="text-center btn btn-warning">{{ __('Total') }}</th>
                            <th class="text-center">{{ __('mark_3') }}</th>
                            <th class="text-center">{{ __('mark_4') }}</th>
                            <th class="text-center">{{ __('mark_5') }}</th>
                            <th class="text-center btn btn-warning">{{ __('Total') }}</th>
                            <th class="text-center">{{ __('recitation_next') }}</th>
                            <th class="text-center">{{ __('note') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user->student_marks as $mark)
                            <tr>
                                <td class="text-center align-middle">{{ $mark->id }}</td>
                                <td class="text-center align-middle">{{ $mark->user ? $mark->user->name : '' }}</td>
                                <td class="text-center align-middle">{{ $mark->course ? $mark->course->name : '' }}</td>
                                <td class="text-center align-middle">
                                    @if($mark->attendance == 2)
                                        <span class="btn btn-success btn-sm">{{ \App\Models\StudentMark::attendance($mark->attendance) }}</span>
                                    @elseif($mark->attendance == 1)
                                        <span class="btn btn-danger btn-sm">{{ \App\Models\StudentMark::attendance($mark->attendance) }}</span>
                                    @endif
                                </td>
                                <td class="text-center align-middle">{{ $mark->recitation }}</td>
                                <td class="text-center align-middle">{{ $mark->mark_1 }}</td>
                                <td class="text-center align-middle">{{ $mark->mark_2 }}</td>
                                <td class="text-center align-middle"><span class="btn btn-warning btn-sm">{{ $mark->mark_1 + $mark->mark_2 }}</span></td>
                                <td class="text-center align-middle">{{ $mark->mark_3 }}</td>
                                <td class="text-center align-middle">{{ $mark->mark_4 }}</td>
                                <td class="text-center align-middle">{{ $mark->mark_5 }}</td>
                                <td class="text-center align-middle"><span class="btn btn-warning btn-sm"> {{ $mark->mark_3 + $mark->mark_4  + $mark->mark_5 }} </span></td>
                                <td class="text-center align-middle">{{ $mark->recitation_next }}</td>
                                <td class="text-center align-middle">{{ $mark->note }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
