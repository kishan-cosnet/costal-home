@extends('theme.default')

@section('content')

<div class="container-fluid">

    <div class="page-title">

        <div class="row">

            <div class="col-sm-6 p-0">

                <h3>Booking </h3>

            </div>

            <div class="col-sm-6 p-0">

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="index.html">

                            <svg class="stroke-icon">

                                <use href="{{ asset('svg/icon-sprite.svg#stroke-knowledgebase') }}"></use>

                            </svg></a></li>

                    <li class="breadcrumb-item">Booking</li>

                    <li class="breadcrumb-item active">Settings</li>

                </ol>

            </div>

            @if (session('success'))

            <div class="alert alert-success mt-2">

                {{ session('success') }}

            </div>

            @endif

        </div>

    </div>

</div>

<!-- Container-fluid starts-->

<div class="container-fluid">

    <div id='calendar'></div>

</div>

<style>
    #calendar {

        max-width: 1100px;

        margin: 10px auto;

    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        var calendarEl = document.getElementById('calendar');



        var calendar = new FullCalendar.Calendar(calendarEl, {

            themeSystem: 'bootstrap5',

            timeZone: 'UTC',

            editable: true,

            initialView: 'resourceTimelineDay',

            initialDate: '2024-06-05',

            headerToolbar: {

                left: 'prev,next today',

                center: 'title',

                right: 'resourceTimelineDay,resourceTimeGridDay,resourceTimelineWeek'

            },

            resourceAreaHeaderContent: ' UNALLOCATED ',

            views: {

                resourceTimelineDay: {

                    buttonText: 'timeline'

                },

                resourceTimeGridDay: {

                    buttonText: 'timeGrid'

                },

                resourceTimelineWeek: {

                    buttonText: 'week'

                }

            },

            selectable: true,

            select: function(info) {

                var title = prompt('Enter Event Title:');

                if (title) {

                    calendar.addEvent({

                        title: title,

                        start: info.startStr,

                        end: info.endStr

                    });

                }

                calendar.unselect();

            },

            events: [{

                    resourceId: 'a',

                    title: 'Timed Event',

                    start: '2024-06-05T16:00:00+00:00'

                },

                {

                    resourceId: 'b',

                    title: 'Conference',

                    start: '2024-06-05'

                },

                {

                    resourceId: 'c',

                    title: 'Meeting',

                    start: '2024-06-05T10:30:00+00:00',

                    end: '2024-06-05T12:30:00+00:00'

                },

                {

                    resourceId: 'a',

                    title: 'Lunch',

                    start: '2024-06-05T12:00:00+00:00'

                }

            ],

            resources: [{

                    id: 'a',

                    title: ' Adams,  Claudie '

                },

                {

                    id: 'b',

                    title: ' Agate,  Mrs Tina '

                },

                {

                    id: 'c',

                    title: ' Allen,  Catherine '

                },

                {

                    id: 'd',

                    title: ' Barnes,  Mrs Susan '

                }

            ]

        });



        calendar.render();

    });
</script>

@endsection