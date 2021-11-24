<x-dashboard>
    @section('content')
        <div class="d-sm-flex align-items-center justify-content-between border-bottom">
            <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
            </li>
            </ul>
            <div>
            <div class="btn-wrapper">
                <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
            </div>
            </div>
        </div>
        <div class="tab-content tab-content-basic">
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                 <div class="row">
                    <div class="col-sm-12">
                        <div class="statistics-details d-flex align-items-center justify-content-between" id="statistic_ale">
                          <div>
                            <p class="statistics-title">Total Shards</p>
                            <h3 class="rate-percentage" id="alert_name"></h3>

                          </div>
                          <div>
                            <p class="statistics-title">Total Shards Succesful</p>
                            <h3 class="rate-percentage" id="alert_success">7,682</h3>

                          </div>
                          <div>
                            <p class="statistics-title">Total Shards Failed</p>
                            <h3 class="rate-percentage" id="alert_failed">68.8</h3>

                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title">Dropped Packet</p>
                            <h3 class="rate-percentage">2m:35s</h3>

                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title">New Sessions</p>
                            <h3 class="rate-percentage">68.8</h3>

                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title">Avg. Time on Site</p>
                            <h3 class="rate-percentage">2m:35s</h3>

                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div>
                                            <h4 class="card-title card-title-dash">Overview Malware</h4>
                                        </div>
                                    </div>
                                    <div class="table-responsive  mt-1">
                                        <table class="table select-table" id="table-data">
                                            <thead>
                                                <tr>
                                                    <th>Destination IP</th>
                                                    <th>Source IP</th>
                                                    <th>Signature</th>
                                                    <th>User Agent</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                          </div>
                      </div>
                 </div>
            </div>
        </div>
    @endsection

    @push('js')
        <script>

            var items = [];

            $.ajax({
                        url: "{!! URL::to('getResponse') !!}",
                        type: 'GET',

                        success: function(res)
                        {
                            $('#alert_name').html(res['_shards']['total'])
                            $('#alert_success').html(res['_shards']['successful'])
                            $('#alert_failed').html(res['_shards']['failed'])

                        }
             })

            $(document).ready(function (){

                var t = $('#table-data');

                t.DataTable({
                    "order":[
                        [0, "ASC"],
                        [1, "ASC"],
                        [2, "ASC"],
                        [3, "ASC"]
                    ],
                    ajax:{
                        url: "{!! URL::to('getResponseTable') !!}",
                        dataSrc: 'hits',
                        processing: true,


                    },
                    columnDefs:[
                        { targets: '_all', visible: true},
                        {
                            "targets": 0,
                            data: "_source.destination.ip"
                        },
                        {
                            "targets": 1,
                            data: "_source.source.ip"
                        },
                        {
                            "targets": 2,
                            data: "_source.suricata.eve.alert.signature"
                        },
                        {
                            "targets": 3,
                            data: "_source.user_agent.original"
                        },
                    ]
                })


                // $('#table-data').DataTable({
                //     processing: true,
                //     serverSide: true,
                //     "order":[
                //         [0, "ASC"],
                //         [1, "ASC"],
                //         [2, "ASC"],
                //         [3, "ASC"]
                //     ],
                //     ajax:{
                //             url: "{!! URL::to('getResponseTable') !!}",
                //             success: function(res){
                //                 // rez = JSON.stringify(res)
                //                 console.log('tab', res)
                //             }
                //         },

                //     columnDefs:[
                //         { targets: '_all', visible: true},
                //         {
                //                 "targets": 0,
                //                 data: '_index',
                //                 name: '_index'
                //         },
                //     ]

                // })
            })



        </script>
    @endpush
</x-dashboard>
