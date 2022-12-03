@extends('layouts.main')
@section('container')
    <section class="events">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="event-title">{{ $title }}</h2>
                </div>
                <div class="col-md-8">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item nav-tab1">
                            <a class="nav-link tab-list active" data-toggle="tab" href="#upcoming-events"
                                role="tab">Pengumuman Terbaru </a>
                        </li>

                    </ul>
                </div>
            </div>
            <br>
            <div class="row">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="upcoming-events" role="tabpanel">
                        @foreach ($announcements as $announcement)
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="event-date">
                                            <h4>{{ date('d', strtotime($announcement->created_at)) }}</h4>
                                            <span>{{ date('M. y', strtotime($announcement->created_at)) }}</span>
                                        </div>
                                        <span
                                            class="event-time">{{ date('H:i', strtotime($announcement->created_at)) . ' WIB' }}</span>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="event-heading">
                                            <h3>{{ $announcement->title }}</h3>
                                            <p>{!! $announcement->body !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <hr class="event-underline">
                            </div>
                        @endforeach


                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
