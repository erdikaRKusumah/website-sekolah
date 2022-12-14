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
                                role="tab">Agenda Terbaru </a>
                        </li>

                    </ul>
                </div>
            </div>
            <br>
            <div class="row">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="upcoming-events" role="tabpanel">
                        @foreach ($agendas as $agenda)
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="event-date">
                                            <h4>{{ date('d', strtotime($agenda->date)) }}</h4>
                                            <span>{{ date('M. y', strtotime($agenda->date)) }}</span>
                                        </div>
                                        <span
                                            class="event-time">{{ date('H:i', strtotime($agenda->created_at)) . ' WIB' }}</span>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="event-heading">
                                            <h3>{{ $agenda->title }}</h3>
                                            <p>{!! $agenda->body !!}</p>
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
